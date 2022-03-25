<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr\AbstractConditionalOperator;

use PHPCParser\Node\Stmt\ValueStmt\Expr\AbstractConditionalOperator;
use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\Type;

class ConditionalOperator extends AbstractConditionalOperator
{

    public Expr $cond;
    public Expr $ifTrue;
    public Expr $ifFalse;

    public function __construct(Expr $cond, Expr $ifTrue, Expr $ifFalse, array $attributes = []) {
        parent::__construct($attributes);
        $this->cond = $cond;
        $this->ifTrue = $ifTrue;
        $this->ifFalse = $ifFalse;
    }

    public function getSubNodeNames(): array {
        return ['cond', 'ifTrue', 'ifFalse'];
    }

    public function isConstant(): bool {
        return $this->cond->isConstant() ? $this->ifTrue->isConstant() && $this->ifFalse->isConstant() : false;
    }
}