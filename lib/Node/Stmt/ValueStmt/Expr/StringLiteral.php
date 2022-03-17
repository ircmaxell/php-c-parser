<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class StringLiteral extends Expr
{
    public string $value;

    public function __construct(string $value, array $attributes = []) {
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