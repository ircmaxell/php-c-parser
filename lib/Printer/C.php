<?php declare(strict_types=1);
namespace PHPCParser\Printer;

use PHPCParser\Printer;
use PHPCParser\Node;
use PHPCParser\Node\Stmt;
use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\Decl;
use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl;
use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl;
use PHPCParser\Node\Type;
use PHPCParser\Node\TranslationUnitDecl;


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
            $return = '';
            while ($type instanceof Type\AttributedType) {
                switch ($type->kind) {
                    case Type\AttributedType::KIND_STATIC:
                        $return .= 'static ';
                        break;
                    case Type\AttributedType::KIND_INLINE:
                        $return .= 'inline ';
                        break;
                    default:
                        throw new \LogicException('Unknown function attributed type qualifier: ' . $type->kind);
                }
                $type = $type->parent;
            }
            $return .= $this->printType($type->return, null, $level);
            $return .= ' ' . $decl->name . '(';
            $next = '';
            foreach ($type->params as $param) {
                $return .= $next . $this->printType($param, $param->name, $level);
                $next = ', ';
            }
            if ($type->isVariadic) {
                $return .= $next . '...';
            }
            $return .= ')';
            if ($decl->stmts === null) {
                $return .= $this->printCompoundStmt($decl->stmts, $level);
            }
            return $return;
        }
        var_dump($decl);
    }

    protected function printCompoundStmt(Stmt\CompoundStmt $stmts, int $level): string {
        $return = " {\n";
        $return .= $this->printNodes($stmts->stmts, $level + 1);
        $return .= str_repeat('  ', $level) . "}\n";
        return $return;
    }

    const ATTRIBUTED_MAP = [
        Type\AttributedType::KIND_EXTERN => 'extern',
        Type\AttributedType::KIND_STATIC => 'static',
        Type\AttributedType::KIND_THREAD_LOCAL => 'thread_local',
        Type\AttributedType::KIND_AUTO => 'auto',
        Type\AttributedType::KIND_REGISTER => 'register',
        Type\AttributedType::KIND_CONST => 'const',
        Type\AttributedType::KIND_RESTRICT => 'restrict', 
        Type\AttributedType::KIND_VOLATILE => 'volatile', 
        Type\AttributedType::KIND_ATOMIC => 'atomic',
        Type\AttributedType::KIND_INLINE => 'inline',
        Type\AttributedType::KIND_NORETURN => 'noreturn',
    ];

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
        if ($type instanceof Type\AttributedType) {
            if ($type->kind === Type\AttributedType::KIND_CONST && $this->omitConst) {
                return $this->printType($type->parent, $name, $level);
            }
            if (isset(self::ATTRIBUTED_MAP[$type->kind])) {
                return self::ATTRIBUTED_MAP[$type->kind] . ' ' . $this->printType($type->parent, $name, $level);
            }
            throw new \LogicException('Unknown attributed type kind: ' . $type->kind);
        }
        if ($type instanceof Type\PointerType) {
            if ($type->parent instanceof Type\ParenType && $type->parent->parent instanceof Type\FunctionType\FunctionProtoType) {
                $func = $type->parent->parent;
                // function pointer
                $result = $this->printType($func->return, null, $level) . '(*' . $name . ')(';
                $next = '';
                foreach ($func->params as $param) {
                    $result .= $next . $this->printType($param, null, $level);
                    $next = ', ';
                }
                if ($func->isVariadic) {
                    $result .= $next . '...';
                }
                return $result . ')';
            }
            return $this->printType($type->parent, $name, $level) . '*';
        }
        if ($type instanceof Type\ParenType) {
            return '(' . $this->printType($type->parent, $name, $level) . ')';
        }
        if ($type instanceof Type\ArrayType\IncompleteArrayType) {
            $subType = $this->printType($type->parent, '__NAME_PLACEHOLDER__', $level);
            return str_replace('__NAME_PLACEHOLDER__', $name . '[]', $subType);
        }
        if ($type instanceof Type\ArrayType\ConstantArrayType) {
            $subType = $this->printType($type->parent, '__NAME_PLACEHOLDER__', $level);
            return str_replace('__NAME_PLACEHOLDER__', $name . '[' . $this->printExpr($type->size, $level) . ']', $subType);
        }
        if ($type instanceof Type\FunctionType\FunctionProtoType) {
            $result = $this->printType($type->return, null, $level) . '(';
            $next = '';
            foreach ($type->params as $param) {
                $result .= $next . $this->printType($param, null, $level);
                $next = ', ';
            }
            if ($type->isVariadic) {
                $result .= $next . '...';
            }
            return $result . ')';
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

    protected function printExpr(Expr $expr, int $level): string {
        if ($expr instanceof Expr\IntegerLiteral) {
            return (string) $expr->value;
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
            return '(' . $this->printType($expr->type, $level) . ')';
        }
        if ($expr instanceof Expr\CastExpr) {
            return '(' . $this->printExpr($expr->type, $level) . $this->printExpr($expr->expr, $level) . ')';
        }
        if ($expr instanceof Expr\DeclRefExpr) {
            return $expr->name;
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
        var_dump($stmt);
    }

}