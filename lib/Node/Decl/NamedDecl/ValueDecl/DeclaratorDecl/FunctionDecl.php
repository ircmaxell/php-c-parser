<?php declare(strict_types=1);

namespace PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl;

use PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl;

use PHPCParser\Node\Type;
use PHPCParser\Node\Stmt;

class FunctionDecl extends DeclaratorDecl
{

    public string $name;
    public Type $type;

    public function __construct(string $name, Type $type, array $attributes = []) {
        parent::__construct($attributes);
        $this->name = $name;
        $this->type = $type;
    }

    public function getSubNodeNames(): array {
        return ['name', 'type'];
    }

}