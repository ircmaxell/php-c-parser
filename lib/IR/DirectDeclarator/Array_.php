<?php

namespace PHPCParser\IR\DirectDeclarator;

use PHPCParser\IR\DirectDeclarator;

class Array_ extends DirectDeclarator
{
    public DirectDeclarator $declarator;
    public int $modifiers;

    public function __construct(DirectDeclarator $declarator, int $modifiers, array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->modifiers = $modifiers;
        $this->attributeList = $attributeList;
    }
}