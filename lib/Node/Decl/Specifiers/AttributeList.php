<?php

namespace PHPCParser\Node\Decl\Specifiers;

use PHPCParser\NodeAbstract;

class AttributeList extends NodeAbstract {

    public array $attributeList;

    public function __construct(array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->attributeList = $attributeList;
    }

    public function getSubNodeNames(): array {
        return ['attributeList'];
    }
}