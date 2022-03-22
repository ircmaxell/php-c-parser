<?php declare(strict_types=1);
namespace PHPCParser\Printer;

use PHPCParser\Node;
use PHPCParser\Node\Decl;
use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl;
use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl;
use PHPCParser\Node\Stmt;
use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\TranslationUnitDecl;
use PHPCParser\Node\Type;
use PHPCParser\Printer;


class C implements Printer
{

    public bool $omitConst = true;

    public function print(TranslationUnitDecl $node): string {
        return $this->printNode($node, 0);
    }

    public function printNodes(array $nodes, int $level): string {
        $result = '';
        foreach ($nodes as $node) {
            $result .= str_repeat('  ', $level);
            $result .= $this->printNode($node, $level);
            $result .= "\n";
        }
        return $result;
    }

    public function printNode(Node $node, int $level): string {
        $result = '';
        if ($node instanceof TranslationUnitDecl) {
            return $this->printNodes($node->declarations, $level);
        } elseif ($node instanceof Decl) {
            return $this->printDecl($node, $level) . ($level === 0 ? ';' : '');
        } elseif ($level === 0) {
            throw new \LogicException('Unexpected node type found for level 0: ' . get_class($node));
        } elseif ($node instanceof Expr) {
            return $this->printExpr($node, $level);
        } elseif ($node instanceof Stmt) {
            return $this->printStmt($node, $level);
        } else {
            throw new \LogicException('Top level node ' . get_class($node) . ' not implemented yet');
        }
        return $result;
    }

    protected function printDecl(Decl $decl, int $level): string {
        if ($decl instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl) {
            return 'typedef ' . $this->printType($decl->type, $decl->name, $level);
        }
        if ($decl instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
            $result = $this->printType($decl->type, $decl->name, $level);
            if ($decl->declaratorAsm !== null) {
                $result .= ' __asm__ (' . $this->formatString($decl->declaratorAsm) . ')';
            }
            if ($decl->initializer !== null) {
                $result .= ' = ' . $this->printExpr($decl->initializer, $level);
            }
            return $result;
        }
        if ($decl instanceof EnumDecl) {
            $result = 'enum';
            if ($decl->name !== null) {
                $result .= ' ' . $decl->name;
            }
            if ($decl->fields !== null) {
                $result .= " {\n";
                foreach ($decl->fields as $field) {
                    $result .= str_repeat('  ', $level + 1);
                    $result .= $field->name;
                    if ($field->value) {
                        $result .= ' = ' . $this->printExpr($field->value, $level);
                    }
                    $result .= ",\n";
                }
                $result .= str_repeat('  ', $level) . "}";
            }
            return $result;
        }
        if ($decl instanceof RecordDecl) {
            $return = '';
            if ($decl->kind === RecordDecl::KIND_UNION) {
                $return = 'union';
            } elseif ($decl->kind === RecordDecl::KIND_STRUCT) {
                $return = 'struct';
            } else {
                throw new \LogicException('Unknown RecordDecl kind encountered: ' . $decl->kind);
            }
            if ($decl->name !== null) {
                $return .= ' ' . $decl->name;
            }
            if ($decl->fields !== null) {
                $return .= " {\n";
                foreach ($decl->fields as $field) {
                    $return .= str_repeat('  ', $level + 1);
                    $return .= $this->printType($field->type, $field->name, $level + 1);
                    if ($field->initializer !== null) {
                        $return .= ': ' . $this->printExpr($field->initializer, $level + 1);
                    }
                    $return .= ";\n";
                }
                $return .= str_repeat('  ', $level) . "}";
            }
            return $return;
        }
        if ($decl instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
            $type = $decl->type;
            $attribute = '';
            while ($type instanceof Type\AttributedType) {
                if ($type instanceof Type\ExplicitAttributedType) {
                    switch ($type->kind) {
                        case Type\ExplicitAttributedType::KIND_EXTERN:
                            $attribute .= 'extern ';
                            break;
                        case Type\ExplicitAttributedType::KIND_STATIC:
                            $attribute .= 'static ';
                            break;
                        case Type\ExplicitAttributedType::KIND_INLINE:
                            $attribute .= 'inline ';
                            break;
                        case Type\ExplicitAttributedType::KIND_ALWAYS_INLINE:
                            $attribute .= '__attribute__((always_inline)) ';
                            break;
                        default:
                            throw new \LogicException('Unknown function attributed type qualifier: ' . $type->kind);
                    }
                } elseif ($type instanceof Type\ArbitraryAttributedType) {
                    $attr = $type->attribute;
                    $attribute .= '__attribute__((' . $attr->attribute . ($attr->expr ? '(' . $this->printExpr($attr->expr, $level) . ')' : '') . ')) ';
                } else {
                    throw new \LogicException('Unknown AttributedType: ' . get_class($type));
                }
                $type = $type->parent;
            }
            $result = $decl->name . '(';
            $next = '';
            foreach ($type->params as $idx => $param) {
                $result .= $next . $this->printType($param, $type->paramNames[$idx], $level);
                $next = ', ';
            }
            if ($type->isVariadic) {
                $result .= $next . '...';
            }
            $result .= ')';
            if ($decl->declaratorAsm !== null) {
                $result .= ' __asm__ (' . $this->formatString($decl->declaratorAsm) . ')';
            }
            if ($decl->stmts !== null) {
                $result .= " " . $this->printCompoundStmt($decl->stmts, $level);
            }
            $subType = $this->printType($type->return, '__NAME_PLACEHOLDER__', $level);
            return $attribute . str_replace('__NAME_PLACEHOLDER__', $result, $subType);
        }
        var_dump($decl);
    }

    protected function printCompoundStmt(Stmt\CompoundStmt $stmts, int $level): string {
        $return = "{\n";
        $return .= $this->printNodes($stmts->stmts, $level + 1);
        $return .= str_repeat('  ', $level) . "}\n";
        return $return;
    }

    const ATTRIBUTED_MAP = [
        Type\ExplicitAttributedType::KIND_EXTERN => 'extern',
        Type\ExplicitAttributedType::KIND_STATIC => 'static',
        Type\ExplicitAttributedType::KIND_THREAD_LOCAL => 'thread_local',
        Type\ExplicitAttributedType::KIND_AUTO => 'auto',
        Type\ExplicitAttributedType::KIND_REGISTER => 'register',
        Type\ExplicitAttributedType::KIND_CONST => 'const',
        Type\ExplicitAttributedType::KIND_RESTRICT => 'restrict',
        Type\ExplicitAttributedType::KIND_VOLATILE => 'volatile',
        Type\ExplicitAttributedType::KIND_ATOMIC => 'atomic',
        Type\ExplicitAttributedType::KIND_INLINE => 'inline',
        Type\ExplicitAttributedType::KIND_NORETURN => 'noreturn',
        Type\ExplicitAttributedType::KIND_ALWAYS_INLINE => '__attribute__((always_inline))',
    ];

    protected function isFunctionPointer(Type $type): bool {
        if (!$type instanceof Type\PointerType) {
            return false;
        }
        if (!$type->parent instanceof Type\ParenType) {
            return false;
        }
        if (!$type->parent->parent instanceof Type\FunctionType\FunctionProtoType) {
            return false;
        }
        return true;
    }

    protected function printType(Type $type, ?string $name, int $level): string {
        if ($type instanceof Type\BuiltinType || $type instanceof Type\TypedefType) {
            return $type->name . ($name !== null ? ' ' . $name : '');
        }
        if ($type instanceof Type\TagType\RecordType) {
            return $this->printDecl($type->decl, $level) . ($name !== null ? ' ' . $name : '') ;
        }
        if ($type instanceof Type\TagType\EnumType) {
            return $this->printDecl($type->decl, $level) . ($name !== null ? ' ' . $name : '');
        }
        if ($type instanceof Type\ExplicitAttributedType) {
            if ($type->kind === Type\ExplicitAttributedType::KIND_CONST && $this->omitConst) {
                return $this->printType($type->parent, $name, $level);
            }
            if (isset(self::ATTRIBUTED_MAP[$type->kind])) {
                return self::ATTRIBUTED_MAP[$type->kind] . ' ' . $this->printType($type->parent, $name, $level);
            }
            throw new \LogicException('Unknown attributed type kind: ' . $type->kind);
        }
        if ($type instanceof Type\ArbitraryAttributedType) {
            $attr = $type->attribute;
            return '__attribute__((' . $attr->attribute . ($attr->expr ? '(' . $this->printExpr($attr->expr, $level) . ')' : '') . '))' . ' ' . $this->printType($type->parent, $name, $level);
        }
        if ($type instanceof Type\FunctionType\FunctionProtoType) {
            $result = $this->printType($type->return, $name, $level) . '(';
            $next = '';
            foreach ($type->params as $idx => $param) {
                $result .= $next . $this->printType($param, $type->paramNames[$idx], $level);
                $next = ', ';
            }
            if ($type->isVariadic) {
                $result .= $next . '...';
            }
            return $result . ')';
        }
        if ($this->isFunctionPointer($type)) {
            $func = $type->parent->parent;
            $result = '(*' . $name . ')(';
            $next = '';
            foreach ($func->params as $idx => $param) {
                $result .= $next . $this->printType($param, $func->paramNames[$idx], $level);
                $next = ', ';
            }
            if ($func->isVariadic) {
                $result .= $next . '...';
            }
            $result .= ')';
            $subType = $this->printType($func->return, '__NAME_PLACEHOLDER__', $level);
            return str_replace('__NAME_PLACEHOLDER__', $result, $subType);
        }
        if ($type instanceof Type\PointerType) {
            $subType = $this->printType($type->parent, '__NAME_PLACEHOLDER__', $level);
            return str_replace('__NAME_PLACEHOLDER__', '*' . $name, $subType);
        }
        if ($type instanceof Type\ParenType) {
            return $this->printType($type->parent, '(' . $name . ')', $level);
        }
        if ($type instanceof Type\ArrayType\IncompleteArrayType) {
            $subType = $this->printType($type->parent, '__NAME_PLACEHOLDER__', $level);
            return str_replace('__NAME_PLACEHOLDER__', $name . '[]', $subType);
        }
        if ($type instanceof Type\ArrayType\ConstantArrayType) {
            $subType = $this->printType($type->parent, '__NAME_PLACEHOLDER__', $level);
            return str_replace('__NAME_PLACEHOLDER__', $name . '[' . $this->printExpr($type->size, $level) . ']', $subType);
        }
        var_dump($type);
    }

    const BINARYOPERATOR_MAP = [
        Expr\BinaryOperator::KIND_ADD         => '+',
        Expr\BinaryOperator::KIND_SUB         => '-',
        Expr\BinaryOperator::KIND_MUL         => '*',
        Expr\BinaryOperator::KIND_DIV         => '/',
        Expr\BinaryOperator::KIND_REM         => '%',
        Expr\BinaryOperator::KIND_SHL         => '<<',
        Expr\BinaryOperator::KIND_SHR         => '>>',
        Expr\BinaryOperator::KIND_LT          => '<',
        Expr\BinaryOperator::KIND_GT          => '>',
        Expr\BinaryOperator::KIND_LE          => '<=',
        Expr\BinaryOperator::KIND_GE          => '>=',
        Expr\BinaryOperator::KIND_EQ          => '==',
        Expr\BinaryOperator::KIND_NE          => '!=',
        Expr\BinaryOperator::KIND_BITWISE_AND => '&',
        Expr\BinaryOperator::KIND_BITWISE_XOR => '^',
        Expr\BinaryOperator::KIND_BITWISE_OR  => '|',
        Expr\BinaryOperator::KIND_LOGICAL_AND => '&&',
        Expr\BinaryOperator::KIND_LOGICAL_OR  => '||',
        Expr\BinaryOperator::KIND_COMMA       => ',',
        Expr\BinaryOperator::KIND_ASSIGN      => '=',
        Expr\BinaryOperator::KIND_MUL_ASSIGN  => '*=',
        Expr\BinaryOperator::KIND_DIV_ASSIGN  => '/=',
        Expr\BinaryOperator::KIND_REM_ASSIGN  => '%=',
        Expr\BinaryOperator::KIND_ADD_ASSIGN  => '+=',
        Expr\BinaryOperator::KIND_SUB_ASSIGN  => '-=',
        Expr\BinaryOperator::KIND_SHL_ASSIGN  => '<<=',
        Expr\BinaryOperator::KIND_SHR_ASSIGN  => '>>=',
        Expr\BinaryOperator::KIND_AND_ASSIGN  => '&-',
        Expr\BinaryOperator::KIND_XOR_ASSIGN  => '^=',
        Expr\BinaryOperator::KIND_OR_ASSIGN   => '|=',
    ];

    const UNARYOPERATOR_PRE_MAP = [
        Expr\UnaryOperator::KIND_PREINC => '++',
        Expr\UnaryOperator::KIND_PREDEC => '--',
        Expr\UnaryOperator::KIND_ADDRESS_OF => '&',
        Expr\UnaryOperator::KIND_DEREF => '*',
        Expr\UnaryOperator::KIND_PLUS => '+',
        Expr\UnaryOperator::KIND_MINUS => '-',
        Expr\UnaryOperator::KIND_BITWISE_NOT => '~',
        Expr\UnaryOperator::KIND_LOGICAL_NOT => '!',
        Expr\UnaryOperator::KIND_SIZEOF => 'sizeof',
        Expr\UnaryOperator::KIND_ALIGNOF => 'alignof',
    ];

    const UNARYOPERATOR_POST_MAP = [
        Expr\UnaryOperator::KIND_POSTINC => '++',
        Expr\UnaryOperator::KIND_POSTDEC => '--',
    ];

    protected function formatString(string $string): string {
        static $replacements;
        if (!$replacements) {
            $replacements = ["\0" => '\0', "\n" => '\n', "\t" => '\t', "\v" => '\v', "\e" => '\e', '??' => '\??', '\\' => '\\\\', '"' => '\"'];
            for ($i = 1; $i < 0x20; ++$i) {
                $replacements[\chr($i)] = sprintf('\x%02x', $i);
            }
            for ($i = 0x7f; $i <= 0xFF; ++$i) {
                $replacements[\chr($i)] = sprintf('\x%02x', $i);
            }
        }
        return strtr($string, $replacements);
    }

    protected function printExpr(Expr $expr, int $level): string {
        if ($expr instanceof Expr\IntegerLiteral) {
            return (string) $expr->value;
        }
        if ($expr instanceof Expr\StringLiteral) {
            return '"' . $this->formatString($expr->value) . '"';
        }
        if ($expr instanceof Expr\BinaryOperator) {
            if (isset(self::BINARYOPERATOR_MAP[$expr->kind])) {
                return '(' . $this->printExpr($expr->left, $level) . ' ' . self::BINARYOPERATOR_MAP[$expr->kind] . ' ' . $this->printExpr($expr->right, $level) . ')';
            }
            throw new \LogicException('Unknown binaryoperator kind: ' . $expr->kind);
        }
        if ($expr instanceof Expr\UnaryOperator) {
            if (isset(self::UNARYOPERATOR_PRE_MAP[$expr->kind])) {
                return '(' . self::UNARYOPERATOR_PRE_MAP[$expr->kind] . ' ' . $this->printExpr($expr->expr, $level) . ')';
            }
            if (isset(self::UNARYOPERATOR_POST_MAP[$expr->kind])) {
                return '(' . $this->printExpr($expr->expr, $level) . self::UNARYOPERATOR_POST_MAP[$expr->kind] . ')';
            }
            throw new \LogicException('Unknown unary operator kind: ' . $expr->kind);
        }
        if ($expr instanceof Expr\TypeRefExpr) {
            return '(' . $this->printType($expr->type, null, $level) . ')';
        }
        if ($expr instanceof Expr\CastExpr) {
            return '(' . $this->printExpr($expr->type, $level) . $this->printExpr($expr->expr, $level) . ')';
        }
        if ($expr instanceof Expr\StructRefExpr) {
            return '(' . $this->printExpr($expr->expr, $level) . '.' . $expr->memberName . ')';
        }
        if ($expr instanceof Expr\StructDerefExpr) {
            return '(' . $this->printExpr($expr->expr, $level) . '->' . $expr->memberName . ')';
        }
        if ($expr instanceof Expr\DimFetchExpr) {
            return '(' . $this->printExpr($expr->expr, $level) . ')[' . $this->printExpr($expr->dimension, $level) . ']';
        }
        if ($expr instanceof Expr\DeclRefExpr) {
            return $expr->name;
        }
        if ($expr instanceof Expr\AbstractConditionalOperator\ConditionalOperator) {
            return '(' . $this->printExpr($expr->cond, $level) . ' ? ' . $this->printExpr($expr->ifTrue, $level) . ' : ' . $this->printExpr($expr->ifFalse, $level) . ')';
        }
        if ($expr instanceof Expr\CallExpr) {
            $args = [];
            foreach ($expr->args as $arg) {
                $args[] = $this->printExpr($arg, $level);
            }
            return $this->printExpr($expr->fn, $level) . '(' . implode(', ', $args) . ')';
        }
        var_dump($expr);
    }

    protected function printStmt(Stmt $stmt, int $level): string {
        if ($stmt instanceof Stmt\ReturnStmt) {
            $return = 'return';
            if ($stmt->result !== null) {
                $return .= ' ' . $this->printExpr($stmt->result, $level);
            }
            return $return . ';';
        }
        if ($stmt instanceof Stmt\AsmStmt) {
            $asm = '__asm__ ';
            if ($stmt->modifiers & Stmt\AsmStmt::VOLATILE) {
                $asm .= 'volatile ';
            }
            if ($stmt->modifiers & Stmt\AsmStmt::GOTO) {
                $asm .= 'goto ';
            }
            $asm .= '(' . $this->formatString($stmt->asm) . ' : ';
            $formatOperand = function ($op) { return $this->formatString($op->clobberMode) . ' (' . $op->variable . ') '; };
            $asm .= implode(',', array_map($formatOperand, $stmt->outputOperands->operands)) . ': ';
            $asm .= implode(',', array_map($formatOperand, $stmt->inputOperands->operands)) . ': ';
            $asm .= implode(', ', array_map([$this, "formatString"], $stmt->registers->registers));
            return $asm . ');';
        }
        if ($stmt instanceof Stmt\IfStmt) {
            $if = 'if (' . $this->printExpr($stmt->condition, $level) . ") ";
            $if .= $this->printNode($stmt->trueStmt, $level);
            if ($stmt->falseStmt) {
                $if .= ' else ';
                $if .= $this->printNode($stmt->falseStmt, $level);
            }
            return $if;
        }
        if ($stmt instanceof Stmt\CompoundStmt) {
            return $this->printCompoundStmt($stmt, $level);
        }
        var_dump($stmt);
    }

}