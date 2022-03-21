<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\Type;

class DimFetchExpr extends Expr
{
    public Expr $expr;
    public Expr $dimension;

    public function __construct(Expr $expr, Expr $dimension, array $attributes = []) {
        parent::__construct($attributes);
        $this->expr = $expr;
        $this->dimension = $dimension;
    }

    public function getSubNodeNames(): array {
        return ['expr', 'dimension'];
    }
}