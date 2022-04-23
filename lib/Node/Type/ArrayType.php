<?php declare(strict_types=1);

namespace PHPCParser\Node\Type;

use PHPCParser\Node\Type;

abstract class ArrayType extends Type
{
    public Type $parent;
    public int $modifiers;
    /** @var \PHPCParser\Node\Decl\Specifiers\AttributeList[] */
    public array $attributeList;

    /** @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList */
    public function __construct(Type $parent, int $modifiers, array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->parent = $parent;
        $this->modifiers = $modifiers;
        $this->attributeList = $attributeList;
    }

    public function getSubNodeNames(): array {
        return ['parent', 'modifiers', 'attributeList'];
    }
}