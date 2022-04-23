<?php declare(strict_types=1);

namespace PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl;

use PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl;

use PHPCParser\Node\Type;
use PHPCParser\Node\Stmt;

class ParamVarDecl extends VarDecl
{

    public function __construct(?string $name, ?string $declaratorAsm, Type $type, array $attributes = []) {
        parent::__construct($name, $declaratorAsm, $type, null, $attributes);
    }

    public function getSubNodeNames(): array {
        return ['name', 'type', 'declaratorAsm'];
    }

}