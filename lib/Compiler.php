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

    public function compileExternalDeclaration(array $declaration, array $attributes = []): array {
        if (count($declaration) !== 3) {
            throw new \LogicException('Expected external declarations to have 3 members');
        }
        if ($declaration[0] === Decl::KIND_TYPEDEF) {
            $type = $this->compileType($declaration[1]);
            $result = [];
            foreach ($declaration[2] as $names) {
                if (!$names[1] === null) {
                    // provided an initializer to a typedef
                    throw new \LogicException('Typedefs cannot have initializers');
                }
                $result[] = new TypedefDecl($names[0], $type, $attributes);
                $this->scope->typedef($names[0], $type);
            }
            return $result;
        }
        // todo
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
}