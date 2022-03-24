<?php declare(strict_types=1);

namespace PHPCParser\IR\DirectAbstractDeclarator;

use PHPCParser\IR\DirectAbstractDeclarator;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class CompleteArray extends Array_
{
    public ?Expr $size;

    public function __construct(?DirectAbstractDeclarator $declarator, ?Expr $size, int $modifiers, array $attributeList, array $attributes = []) {
        parent::__construct($declarator, $modifiers, $attributeList, $attributes);
        $this->size = $size;
    }
}
