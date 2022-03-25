<?php
declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr\Initializer;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class InitializerDimension extends NamedInitializer
{
    public Expr $dimension;

    public function __construct(Expr $dimension, array $attributes = []) {
        parent::__construct($attributes);
        $this->dimension = $dimension;
    }

    public function getSubNodeNames(): array {
        return ['expr'];
    }

    public function isConstant(): bool {
        return $this->dimension->isConstant();
    }
}