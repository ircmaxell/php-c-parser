<?php declare(strict_types=1);

namespace PHPCParser\IR\DirectDeclarator;

use PHPCParser\IR\DirectDeclarator;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class CompleteArray extends Array_
{
    public ?Expr $size;

    /** @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList */
    public function __construct(DirectDeclarator $declarator, ?Expr $size, int $modifiers, array $attributeList, array $attributes = []) {
        parent::__construct($declarator, $modifiers, $attributeList, $attributes);
        $this->size = $size;
    }
}
