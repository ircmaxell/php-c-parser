<?php declare(strict_types=1);

namespace PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl;

use PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl;

use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\Type;

class VarDecl extends DeclaratorDecl
{

    public ?string $name;
    public Type $type;
    public ?Expr $initializer;
    public ?string $declaratorAsm = null;

    public function __construct(?string $name, ?string $declaratorAsm, Type $type, ?Expr $initializer, array $attributes = []) {
        parent::__construct($attributes);
        $this->name = $name;
        $this->declaratorAsm = $declaratorAsm;
        $this->type = $type;
        $this->initializer = $initializer;
    }

    public function getSubNodeNames(): array {
        return ['name', 'type', 'initializer', 'declaratorAsm'];
    }

}