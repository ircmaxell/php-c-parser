<?php declare(strict_types=1);

namespace PHPCParser\Node\Type\ArrayType;

use PHPCParser\Node\Type;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class VariableArrayType extends CompleteArrayType
{
    public Expr $size;

    public function __construct(Type $parent, Expr $size, int $modifiers, array $attributeList, array $attributes = []) {
        parent::__construct($parent, $modifiers, $attributeList, $attributes);
        $this->size = $size;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['parent', 'size']);
    }

}