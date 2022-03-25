<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class InitDeclarator extends IR
{
    public Declarator $declarator;
    public ?Expr $initializer;

    public function __construct(Declarator $declarator, ?Expr $initializer, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->initializer = $initializer;
    }
}
