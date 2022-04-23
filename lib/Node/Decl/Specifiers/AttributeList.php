<?php

namespace PHPCParser\Node\Decl\Specifiers;

use PHPCParser\NodeAbstract;

class AttributeList extends NodeAbstract {
    /** @var Attribute[] */
    public array $attributeList;

    /** @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList */
    public function __construct(array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->attributeList = $attributeList;
    }

    public function getSubNodeNames(): array {
        return ['attributeList'];
    }
}