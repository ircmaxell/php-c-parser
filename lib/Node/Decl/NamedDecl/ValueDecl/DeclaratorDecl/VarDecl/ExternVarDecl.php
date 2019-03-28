<?php declare(strict_types=1);

namespace PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl;

use PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl;

use PHPCParser\Node\Type;
use PHPCParser\Node\Stmt;

class ExternVarDecl extends VarDecl
{

    public function __construct(?string $name, Type $type, array $attributes = []) {
        parent::__construct($name, $type, null, $attributes);
    }

    public function getSubNodeNames(): array {
        return ['name', 'type'];
    }

}