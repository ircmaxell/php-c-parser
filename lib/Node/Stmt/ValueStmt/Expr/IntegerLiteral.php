<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class IntegerLiteral extends Expr
{
    public int $value;

    public function __construct(int $value, array $attributes = []) {
        parent::__construct($attributes);
        $this->value = $value;
    }

    public function getSubNodeNames(): array {
        return ['value'];
    }

    public function isConstant(): bool {
        return true;
    }
}