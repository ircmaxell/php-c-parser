<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\Type;

class TypeRefExpr extends Expr
{
    public Type $type;

    public function __construct(Type $type, array $attributes = []) {
        parent::__construct($attributes);
        $this->type = $type;
    }

    public function getSubNodeNames(): array {
        return ['type'];
    }

    public function isConstant(): bool {
        return true;
    }

}