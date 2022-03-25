<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class StructRefExpr extends Expr
{
    public Expr $expr;
    public string $memberName;

    public function __construct(Expr $expr, string $memberName, array $attributes = []) {
        parent::__construct($attributes);
        $this->expr = $expr;
        $this->memberName = $memberName;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['expr', 'memberName']);
    }

    public function isConstant(): bool {
        return $this->expr->isConstant();
    }
}