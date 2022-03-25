<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt;

use PHPCParser\Node\Stmt\ValueStmt;

abstract class Expr extends ValueStmt
{
    public abstract function isConstant(): bool;
}