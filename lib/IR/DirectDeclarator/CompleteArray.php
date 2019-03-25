<?php declare(strict_types=1);

namespace PHPCParser\IR\DirectDeclarator;

use PHPCParser\IR\DirectDeclarator;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class CompleteArray extends DirectDeclarator
{
    public DirectDeclarator $declarator;
    public Expr $size;

    public function __construct(DirectDeclarator $declarator, Expr $size, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->size = $size;
    }
}
