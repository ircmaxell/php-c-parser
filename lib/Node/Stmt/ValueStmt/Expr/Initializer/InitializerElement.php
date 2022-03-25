<?php

namespace PHPCParser\Node\Stmt\ValueStmt\Expr\Initializer;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class InitializerElement extends Expr
{
    public array $designators;
    public Expr $expr;

    public function __construct(array $designators, Expr $expr, array $attributes = []) {
        parent::__construct($attributes);
        $this->designators = $designators;
        $this->expr = $expr;
    }

    public function isConstant(): bool {
        foreach ($this->designators as $designator) {
            if (!$designator->isConstant()) {
                return false;
            }
        }
        return $this->expr->isConstant();
    }
}