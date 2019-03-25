<?php

namespace PHPCParser;

use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl;
use PHPCParser\Node\Decl;
use PHPCParser\Node\Type;

class Compiler
{

    protected Scope $scope;

    public function begin(Scope $scope) {
        $this->scope = $scope;
    }

    public function compileExternalDeclaration(IR\Declaration $declaration, array $attributes = []): array {
        $result = [];
        if ($declaration->qualifiers === Decl::KIND_TYPEDEF) {
            $type = $this->compileType($declaration->types);
            foreach ($declaration->declarators as $declarator) {
                $result[] = $this->compileTypedef($declarator, $type, $attributes);;
            }
        } elseif ($declaration->qualifiers === 0 && empty($declaration->declarators)) {
            // look for structs/unions
            foreach ($declaration->types as $type) {
                if ($type instanceof Type\TagType\RecordType) {
                    $result[] = $type->decl; 
                }
            }
        } else {
            var_dump($declaration);
            throw new \LogicException("Not implmented yet");
        }
        return $result;
    }

    public function compileStructField(int $qualifiers, array $types, ?array $declarators, array $attributes = []): array {
        $result = [];
        $type = $this->compileType($types);
        if (is_null($declarators)) {
            throw new \LogicException("Not implemented yet: empty struct/union declarators");
        }
        foreach ($declarators as $fieldDeclarator) {
            $parts = $this->compileNamedDeclarator($fieldDeclarator->declarator, $type);
            $result[] = new Decl\NamedDecl\ValueDecl\DeclaratorDecl\FieldDecl($parts[0], $parts[1], $fieldDeclarator->initializer, $attributes);
        }
        return $result;
    }

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
        }
        var_dump($types);
        // Todo
    }

    public function compileQualifiedPointer(IR\QualifiedPointer $pointer, Type $type): Type {
restart:
        if ($pointer->qualification === 0) {
            $type = new Type\PointerType($type);
        } else {
            throw new \LogicException('Qualified Pointers not implemented yet');
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

    public function compileTypedefDeclarator(IR\Declarator $declarator, Type $type, array $attributes = []): Decl {
        $parts = $this->compileNamedDeclarator($declarator, $type, $attributes);
        $this->scope->typedef($parts[0], $parts[1]);
        return new TypedefDecl($parts[0], $parts[1], $attributes);
    }

    public function compileNamedDeclarator(IR\Declarator $declarator, Type $type): array {
restart:
        if ($declarator->pointer !== null) {
            $type = $this->compileQualifiedPointer($declarator->pointer, $type);
        }
        $directdeclarator = $declarator->declarator;
restart_direct:
        if ($directdeclarator instanceof IR\DirectDeclarator\Identifier) {
            return [$directdeclarator->name, $type];
        } elseif ($directdeclarator instanceof IR\DirectDeclarator\IncompleteArray) {
            $type = new Type\ArrayType\IncompleteArrayType($type);
            $directdeclarator = $directdeclarator->declarator;
            goto restart_direct;
        } elseif ($directdeclarator instanceof IR\DirectDeclarator\Declarator) {
            $type = new Type\ParenType($type);
            $declarator = $directdeclarator->declarator;
            goto restart;
        }
        throw new \LogicException("Unknown declarator found for typedef");
    }
}