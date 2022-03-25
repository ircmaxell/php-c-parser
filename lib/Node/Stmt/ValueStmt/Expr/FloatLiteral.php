<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class FloatLiteral extends Expr
{
    public string $value;

    public function __construct(string $value, array $attributes = []) {
        parent::__construct($attributes);
        $this->value = $value;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['value']);
    }

    public function isConstant(): bool {
        return true;
    }

}