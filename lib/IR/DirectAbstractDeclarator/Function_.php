<?php

namespace PHPCParser\IR\DirectAbstractDeclarator;

use PHPCParser\IR\DirectAbstractDeclarator;
use PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl\ParamVarDecl;

class Function_ extends DirectAbstractDeclarator
{
    public ?DirectAbstractDeclarator $declarator;
    /** @var ParamVarDecl[] */
    public array $params;
    public bool $isVariadic;
    /** @var \PHPCParser\Node\Decl\Specifiers\AttributeList[] */
    public array $attributeList;

    /** @param ParamVarDecl[] $params
     *  @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList
     */
    public function __construct(?DirectAbstractDeclarator $declarator, array $params, bool $isVariadic, array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->params = $params;
        $this->isVariadic = $isVariadic;
        $this->attributeList = $attributeList;
    }

}