<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class CastExpr extends Expr
{
    public Expr $expr;
    public TypeRefExpr $type;

    public function __construct(Expr $expr, TypeRefExpr $type, array $attributes = []) {
        parent::__construct($attributes);
        $this->expr = $expr;
        $this->type = $type;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['expr', 'type']);
    }

    public function isConstant(): bool {
        return $this->expr->isConstant();
    }

}