<?php

namespace PHPCParser\IR\DirectAbstractDeclarator;

use PHPCParser\IR\DirectAbstractDeclarator;

class Array_ extends DirectAbstractDeclarator
{
    public ?DirectAbstractDeclarator $declarator;
    public int $modifiers;
    /** @var \PHPCParser\Node\Decl\Specifiers\AttributeList[] */
    public array $attributeList;

    /** @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList */
    public function __construct(?DirectAbstractDeclarator $declarator, int $modifiers, array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->modifiers = $modifiers;
        $this->attributeList = $attributeList;
    }
}