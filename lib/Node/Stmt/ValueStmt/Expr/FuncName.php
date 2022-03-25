<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\Decl;

class FuncName extends DeclRefExpr
{
    public function __construct(array $attributes = []) {
        parent::__construct('__func__', null, $attributes);
    }

    public function isConstant(): bool {
        return true;
    }

}