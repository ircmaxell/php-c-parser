<?php

namespace PHPCParser\IR\DirectAbstractDeclarator;

use PHPCParser\IR\DirectAbstractDeclarator;

class Function_ extends DirectAbstractDeclarator
{
    public ?DirectAbstractDeclarator $declarator;
    public array $params;
    public bool $isVariadic;
    public array $attributeList;

    public function __construct(?DirectAbstractDeclarator $declarator, array $params, bool $isVariadic, array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->params = $params;
        $this->isVariadic = $isVariadic;
        $this->attributeList = $attributeList;
    }

}