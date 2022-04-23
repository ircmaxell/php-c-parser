<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;

class QualifiedPointer extends IR
{
    public int $qualification;
    /** @var \PHPCParser\Node\Decl\Specifiers\AttributeList[] */
    public array $attributeList;
    public ?QualifiedPointer $parent;


    /** @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList */
    public function __construct(int $qualification, array $attributeList, ?self $parent, array $attributes = []) {
        parent::__construct($attributes);
        $this->qualification = $qualification;
        $this->attributeList = $attributeList;
        $this->parent = $parent;
    }
}
