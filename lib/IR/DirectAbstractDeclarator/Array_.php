<?php

namespace PHPCParser\IR\DirectAbstractDeclarator;

use PHPCParser\IR\DirectAbstractDeclarator;

class Array_ extends DirectAbstractDeclarator
{
    public ?DirectAbstractDeclarator $declarator;
    public int $modifiers;
    public array $attributeList;

    public function __construct(?DirectAbstractDeclarator $declarator, int $modifiers, array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->modifiers = $modifiers;
        $this->attributeList = $attributeList;
    }
}