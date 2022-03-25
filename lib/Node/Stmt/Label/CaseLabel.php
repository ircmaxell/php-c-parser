<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\Label;

use PHPCParser\Node\Stmt\Label;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class CaseLabel extends Label
{
    public Expr $expr;

    public function __construct(Expr $expr, array $attributes = []) {
        parent::__construct($attributes);
        $this->expr = $expr;
    }

    public function getSubNodeNames(): array {
        return ['expr'];
    }
}