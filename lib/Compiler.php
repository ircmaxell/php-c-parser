<?php

namespace PHPCParser;

use PHPCParser\IR\Declaration;
use PHPCParser\IR\FieldDeclaration;
use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl;
use PHPCParser\Node\Decl;
use PHPCParser\Node\DeclGroup;
use PHPCParser\Node\Type;
use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\Stmt;

class Compiler
{

    protected Scope $scope;

    public function begin(Scope $scope) {
        $this->scope = $scope;
    }

    /** @param Decl\Specifiers\AttributeList[] $attributeLists
     *  @param Type[] $types
     *  @param Declaration[] $declarations
     *  @return Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl[]
     */
    public function compileFunction(int $qualifiers, array $attributeLists, array $types, IR\Declarator $declarator, array $declarations, Stmt\CompoundStmt $stmts, array $attributes = []): array {
        $type = $this->compileType($types);
        $parts = $this->compileNamedDeclarator($declarator, $type);
        $name = $parts[0];
        $signature = $parts[1];
        $declaratorAsm = $parts[2];
        if ($parts[3]) {
            $attributeLists[] = $parts[3];
        }
        if ($qualifiers !== 0 || $attributeLists) {
            $signature = Type\AttributedType::fromDecl($qualifiers, $attributeLists, $signature, $attributes);
        }
        if (empty($declarations)) {
            return [new Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl($name, $declaratorAsm, $signature, $stmts)];
        }
        throw new \LogicException('Not implemented (yet)');
    }

    /** @return Node\Decl[] */
    public function compileExternalDeclaration(IR\Declaration $declaration, array $attributes = []): array {
        $qualifiers = $declaration->qualifiers;
        $attributeLists = $declaration->attributeLists;
        $type = $this->compileType($declaration->types);
restart:
        $result = [];
        if ($declaration->qualifiers & Decl::KIND_TYPEDEF) {
            // this is wrong
            foreach ($declaration->declarators as $declarator) {
                $result[] = $this->compileTypedef($declarator, $type, $attributes);;
            }
        } elseif ($qualifiers === 0 && empty($attributeLists) && empty($declaration->declarators)) {
            if ($type instanceof Type\TagType) {
                if ($type->decl->name !== null) {
                    $this->scope->structdef($type->decl->name, $type->decl);
                }
                return [$type->decl];
            }
            throw new \LogicException('Also not implemented yet');
        } elseif ($qualifiers === 0 && empty($attributeLists)) {
            foreach ($declaration->declarators as $initDeclarator) {
                $result[] = $this->compileInitDeclarator($initDeclarator, $type, $attributes);
            }     
        } elseif ($qualifiers > 0 || !empty($attributeLists)) {
            $type = Type\AttributedType::fromDecl($qualifiers, $attributeLists, $type, $attributes);
            $qualifiers = 0;
            $attributeLists = [];
            goto restart;
        } else {
            var_dump($declaration);
            throw new \LogicException("Not implemented yet");
        }
        return $result;
    }

    public function compileDeclarationStmt(IR\Declaration $declaration, array $attributes = []): Stmt\DeclStmt {
        $qualifiers = $declaration->qualifiers;
        $attributeLists = $declaration->attributeLists;
        $type = $this->compileType($declaration->types);
restart:
        if ($declaration->qualifiers & Decl::KIND_TYPEDEF) {
            throw new \LogicException("No typedefs inside statement blocks");
        } elseif ($qualifiers === 0 && empty($attributeLists) && empty($declaration->declarators)) {
            throw new \LogicException('Also struct/enum defs inside statement blocks');
        } elseif ($qualifiers === 0 && empty($attributeLists)) {
            $declGroup = new DeclGroup([], $attributes);
            foreach ($declaration->declarators as $initDeclarator) {
                $declGroup->addDecl($this->compileInitDeclarator($initDeclarator, $type, $attributes));
            }
            return new Stmt\DeclStmt($declGroup, $attributes);
        } elseif ($qualifiers > 0 || !empty($attributeLists)) {
            $type = Type\AttributedType::fromDecl($qualifiers, $attributeLists, $type, $attributes);
            $qualifiers = 0;
            $attributeLists = [];
            goto restart;
        } else {
            var_dump($declaration);
            throw new \LogicException("Not implemented yet");
        }
    }

    /** @param Decl\Specifiers\AttributeList[] $attributeLists
     *  @param Type[] $types
     *  @param FieldDeclaration[] $declarators
     *  @return Decl\NamedDecl\ValueDecl\DeclaratorDecl\FieldDecl[]
     */
    public function compileStructField(int $qualifiers, array $attributeLists, array $types, ?array $declarators, array $attributes = []): array {
        $result = [];
        $type = $this->compileType($types);
        if (is_null($declarators)) {
            return [new Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl\FieldDecl(null, $type, null, $attributes)];
        }
        foreach ($declarators as $fieldDeclarator) {
            if ($fieldDeclarator->declarator) {
                $parts = $this->compileNamedDeclarator($fieldDeclarator->declarator, $type);
            } else {
                $parts = [null, $type, null, null];
            }
            if ($parts[3]) {
                $attributeLists[] = $parts[3];
            }
            $result[] = new Decl\NamedDecl\ValueDecl\DeclaratorDecl\FieldDecl($parts[0], $parts[1], $fieldDeclarator->bitfieldSize, $attributes);
        }
        return $result;
    }

    /** @param Decl\Specifiers\AttributeList[] $attributeLists
     *  @param Type[] $types
     */
    public function compileParamVarDeclaration(int $qualifiers, array $attributeLists, array $types, IR\Declarator $declarator, array $attributes = []): Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl\ParamVarDecl {
        $type = $this->compileType($types);
        $parts = $this->compileNamedDeclarator($declarator, $type);
        if ($parts[3]) {
            $attributeLists[] = $parts[3];
        }
        if ($qualifiers !== 0 || $attributeLists) {
            $parts[1] = Type\AttributedType::fromDecl($qualifiers, $attributeLists, $parts[1], $attributes);
        }
        return new Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl\ParamVarDecl($parts[0], $parts[2], $parts[1], $attributes);
    }

    /** @param Decl\Specifiers\AttributeList[] $attributeLists
     *  @param Type[] $types
     */
    public function compileParamAbstractDeclaration(int $qualifiers, array $attributeLists, array $types, ?IR\AbstractDeclarator $declarator, array $attributes = []): Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl\ParamVarDecl {
        $type = $this->compileType($types);
        if ($declarator !== null) {
            $type = $this->compileAbstractDeclarator($declarator, $type);
        }
        if ($qualifiers !== 0 || $attributeLists) {
            $type = Type\AttributedType::fromDecl($qualifiers, $attributeLists, $type, $attributes);
        }
        return new Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl\ParamVarDecl(null, null, $type, $attributes);
    }

    /** @param Decl\Specifiers\AttributeList[] $attributeLists
     *  @param Type[] $types
     */
    public function compileTypeReference(int $qualifiers, array $attributeLists, array $types, ?IR\AbstractDeclarator $declarator, array $attributes = []): Expr\TypeRefExpr {
        $type = $this->compileType($types);
        if ($declarator !== null) {
            $type = $this->compileAbstractDeclarator($declarator, $type);
        }
        if ($qualifiers !== 0 || $attributeLists) {
            $type = Type\AttributedType::fromDecl($qualifiers, $attributeLists, $type, $attributes);
        }
        return new Expr\TypeRefExpr($type);
    }

    /** @param Type[] $types */
    public function compileType(array $types): Type {
restart:
        if (empty($types)) {
            throw new \LogicException('Cannot compile empty type list');
        }
        if (count($types) === 1) {
            return $types[0];
        }
        if ($types[0] instanceof Type\BuiltinType && $types[1] instanceof Type\BuiltinType) {
            // combine in order
            $first = array_shift($types);
            $types[0] = new Type\BuiltinType($first->name . ' ' . $types[0]->name, $first->getAttributes());
            goto restart;
        } elseif ($types[0] instanceof Type\BuiltinType && $types[1] instanceof Type\TypedefType) {
            $first = array_shift($types);
            $types[0] = new Type\BuiltinType($first->name . ' ' . $types[0]->name, $first->getAttributes());
            goto restart;
        } else {
            if (!($types[0] instanceof Type\TypedefType && $types[1] instanceof Type\TypedefType)) {
                var_dump($types);
                throw new \LogicException("Unexpected typedef");
            }
            // this can happen when typedef'ing already existing typedefs or having special typedefs for basic types like "typedef __SIZE_TYPE__ size_t;"
            // in case the left operand is a primitive type, skip this. Otherwise error out that its a redefinition
            if ($this->scope->isBuiltinType($types[count($types) - 1]->name)) {
                return $types[count($types) - 1];
            }

            var_dump($types);
            throw new \LogicException("typedef {$types[1]->name} cannot be redefined as {$types[0]->name}");
        }
    }

    public function compileQualifiedPointer(IR\QualifiedPointer $pointer, Type $type): Type {
restart:
        $type = new Type\PointerType($type);
        if ($pointer->qualification > 0) {
            $type = Type\AttributedType::fromDecl($pointer->qualification, $pointer->attributeList, $type);
        }
        if ($pointer->parent !== null) {
            $pointer = $pointer->parent;
            goto restart;
        }
        return $type;
    }

    public function compileTypedef(IR\InitDeclarator $init, Type $type, array $attributes = []): Decl {
        if (!$init->initializer === null) {
            throw new \LogicException("Typedef cannot come with an initializer");
        }
        $declarator = $init->declarator;
        return $this->compileTypedefDeclarator($declarator, $type, $attributes);
    }

    public function compileInitDeclarator(IR\InitDeclarator $initDeclarator, Type $type, array $attributes = []): Decl {
        $parts = $this->compileNamedDeclarator($initDeclarator->declarator, $type, $attributes);
        if ($parts[1] instanceof Type\FunctionType) {
            return new Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl($parts[0], $parts[2], $parts[1], null, $attributes);
        }
        return new Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl($parts[0], $parts[2], $parts[1], $initDeclarator->initializer, $attributes);
    }

    public function compileTypedefDeclarator(IR\Declarator $declarator, Type $type, array $attributes = []): Decl {
        $parts = $this->compileNamedDeclarator($declarator, $type, $attributes);
        $this->scope->typedef($parts[0], $parts[1]);
        return new TypedefDecl($parts[0], $parts[1], $attributes);
    }

    public function compileAbstractDeclarator(IR\AbstractDeclarator $declarator, Type $type): Type {
restart:
        if ($declarator->pointer !== null) {
            $type = $this->compileQualifiedPointer($declarator->pointer, $type);
        }
        $directabstractdeclarator = $declarator->declarator;
restart_direct:
        if (is_null($directabstractdeclarator)) {
            return $type;
        } elseif ($directabstractdeclarator instanceof IR\DirectAbstractDeclarator\AbstractDeclarator) {
            $type = new Type\ParenType($type, $directabstractdeclarator->attributes);
            $declarator = $directabstractdeclarator->declarator;
            goto restart;
        } elseif ($directabstractdeclarator instanceof IR\DirectAbstractDeclarator\Function_) {
            $params = $paramNames = [];
            foreach ($directabstractdeclarator->params as $param) {
                $params[] = $param->type;
                $paramNames[] = $param->name;
            }
            $type = new Type\FunctionType\FunctionProtoType($type, $params, $paramNames, $directabstractdeclarator->isVariadic, $directabstractdeclarator->attributeList, $directabstractdeclarator->attributes);
            $directabstractdeclarator = $directabstractdeclarator->declarator;
            goto restart_direct;
        } elseif ($directabstractdeclarator instanceof IR\DirectAbstractDeclarator\Array_) {
            if ($directabstractdeclarator instanceof IR\DirectAbstractDeclarator\IncompleteArray) {
                $type = new Type\ArrayType\IncompleteArrayType($type, $directabstractdeclarator->modifiers, $directabstractdeclarator->attributeList, $directabstractdeclarator->attributes);
            } elseif ($directabstractdeclarator instanceof IR\DirectAbstractDeclarator\CompleteArray) {
                if ($directabstractdeclarator->size->isConstant()) {
                    $type = new Type\ArrayType\ConstantArrayType($type, $directabstractdeclarator->size, $directabstractdeclarator->modifiers, $directabstractdeclarator->attributeList, $directabstractdeclarator->attributes);
                } else {
                    $type = new Type\ArrayType\VariableArrayType($type, $directabstractdeclarator->size, $directabstractdeclarator->modifiers, $directabstractdeclarator->attributeList, $directabstractdeclarator->attributes);
                }
            }
            $directabstractdeclarator = $directabstractdeclarator->declarator;
            goto restart_direct;
        }
        var_dump($directabstractdeclarator);
        throw new \LogicException('AbstractDeclarator not fully implemented yet');
    }

    /** @return array{string, Type, null|string, Decl\Specifiers\AttributeList[]} */
    public function compileNamedDeclarator(IR\Declarator $declarator, Type $type): array {
restart:
        if ($declarator->pointer !== null) {
            $type = $this->compileQualifiedPointer($declarator->pointer, $type);
        }
        $directdeclarator = $declarator->declarator;
        $declaratorAsm = $directdeclarator->declaratorAsm;
        $attributeList = $directdeclarator->attributeList;
restart_direct:
        if ($directdeclarator instanceof IR\DirectDeclarator\Identifier) {
            return [$directdeclarator->name, $type, $declaratorAsm, $attributeList];
        } elseif ($directdeclarator instanceof IR\DirectDeclarator\Array_) {
            if ($directdeclarator instanceof IR\DirectDeclarator\IncompleteArray) {
                $type = new Type\ArrayType\IncompleteArrayType($type, $directdeclarator->modifiers, $directdeclarator->attributeList, $directdeclarator->attributes);
            } elseif ($directdeclarator instanceof IR\DirectDeclarator\CompleteArray) {
                if ($directdeclarator->size->isConstant()) {
                    $type = new Type\ArrayType\ConstantArrayType($type, $directdeclarator->size, $directdeclarator->modifiers, $directdeclarator->attributeList, $directdeclarator->attributes);
                } else {
                    $type = new Type\ArrayType\VariableArrayType($type, $directdeclarator->size, $directdeclarator->modifiers, $directdeclarator->attributeList, $directdeclarator->attributes);
                }
            }
            $directdeclarator = $directdeclarator->declarator;
            goto restart_direct;
        } elseif ($directdeclarator instanceof IR\DirectDeclarator\Declarator) {
            $type = new Type\ParenType($type);
            $declarator = $directdeclarator->declarator;
            goto restart;
        } elseif ($directdeclarator instanceof IR\DirectDeclarator\Function_) {
            $type = new Type\FunctionType\FunctionProtoType(
                $type,
                $this->compileDirectParamTypes(...$directdeclarator->params),
                $this->compileDirectParamTypeNames(...($directdeclarator->params)),
                $directdeclarator->isVariadic,
                $directdeclarator->attributeList
            );
            $directdeclarator = $directdeclarator->name;
            goto restart_direct;
        }
        var_dump($directdeclarator);
        throw new \LogicException("Unknown declarator found for typedef");
    }

    /** @return Type[] */
    public function compileDirectParamTypes(Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl\ParamVarDecl ... $params): array {
        $result = [];
        foreach ($params as $param) {
            $result[] = $param->type;
        }
        return $result;
    }

    /** @return string[] */
    public function compileDirectParamTypeNames(Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl\ParamVarDecl ... $params): array {
        $result = [];
        foreach ($params as $param) {
            $result[] = $param->name;
        }
        return $result;
    }
}