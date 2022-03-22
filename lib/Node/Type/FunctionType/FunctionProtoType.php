<?php declare(strict_types=1);

namespace PHPCParser\Node\Type\FunctionType;

use PHPCParser\Node\Decl\Specifiers\AttributeList;
use PHPCParser\Node\Type\FunctionType;

use PHPCParser\Node\Type;

class FunctionProtoType extends FunctionType
{
    public Type $return;
    public array $params;
    public array $paramNames;
    public bool $isVariadic;
    public ?AttributeList $attributeList;

    public function __construct(Type $return, array $params, array $paramNames, bool $isVariadic, ?AttributeList $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->return = $return;
        $this->params = $params;
        $this->paramNames = $paramNames;
        $this->isVariadic = $isVariadic;
        $this->attributeList = $attributeList;
    }

    public function getSubNodeNames(): array {
        return ['return', 'params', 'paramNames', 'isVariadic', 'attributeList'];
    }

}