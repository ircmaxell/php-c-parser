<?php declare(strict_types=1);

namespace PHPCParser\Node\Type\FunctionType;

use PHPCParser\Node\Type\FunctionType;
use PHPCParser\Node\Type;

class FunctionProtoType extends FunctionType
{
    public Type $return;
    /** @var Type[] */
    public array $params;
    /** @var string[]|null[] */
    public array $paramNames;
    public bool $isVariadic;
    /** @var \PHPCParser\Node\Decl\Specifiers\AttributeList[] */
    public array $attributeList;

    /** @param Type[] $params
     *  @param string[]|null[] $paramNames
     *  @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList
     */
    public function __construct(Type $return, array $params, array $paramNames, bool $isVariadic, array $attributeList, array $attributes = []) {
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