<?php

namespace PHPCParser\IR\DirectAbstractDeclarator;

use PHPCParser\IR\DirectAbstractDeclarator;
use PHPCParser\Node\Decl\Specifiers\AttributeList;

class Function_ extends DirectAbstractDeclarator
{
    public DirectAbstractDeclarator $declarator;
    public array $params;
    public bool $isVariadic;
    public ?AttributeList $attributeList;

    public function __construct(DirectAbstractDeclarator $declarator, array $params, bool $isVariadic, ?AttributeList $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->params = $params;
        $this->isVariadic = $isVariadic;
        $this->attributeList = $attributeList;
    }

}