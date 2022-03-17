<?php

namespace PHPCParser\Node\Type;

use PHPCParser\Node\Decl\Specifiers\Attribute;
use PHPCParser\Node\Type;

class ArbitraryAttributedType extends AttributedType {

    public Attribute $attribute;

    public function __construct(Attribute $attribute, Type $parent, array $attributes = []) {
        parent::__construct($parent, $attributes);
        $this->attribute = $attribute;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['attribute']);
    }

}