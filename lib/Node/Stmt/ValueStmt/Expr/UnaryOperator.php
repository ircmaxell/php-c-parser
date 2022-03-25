<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class UnaryOperator extends Expr
{

    const KIND_POSTINC = 1;
    const KIND_POSTDEC = 2;
    const KIND_PREINC = 3;
    const KIND_PREDEC = 4;
    const KIND_ADDRESS_OF = 5;
    const KIND_DEREF = 6;
    const KIND_PLUS = 7;
    const KIND_MINUS = 8;
    const KIND_BITWISE_NOT = 9;
    const KIND_LOGICAL_NOT = 10;
    const KIND_SIZEOF = 11;
    const KIND_ALIGNOF = 12;

    public int $kind;
    public Expr $expr;

    public function __construct(Expr $expr, int $kind, array $attributes = []) {
        parent::__construct($attributes);
        $this->expr = $expr;
        $this->kind = $kind;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['expr', 'kind']);
    }

    public function isConstant(): bool {
        return $this->expr->isConstant();
    }

}