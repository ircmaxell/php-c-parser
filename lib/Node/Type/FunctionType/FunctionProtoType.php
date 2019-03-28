<?php declare(strict_types=1);

namespace PHPCParser\Node\Type\FunctionType;

use PHPCParser\Node\Type\FunctionType;

use PHPCParser\Node\Type;

class FunctionProtoType extends FunctionType
{
    public Type $return;
    public array $params;
    public array $paramNames;
    public bool $isVariadic;

    public function __construct(Type $return, array $params, array $paramNames, bool $isVariadic, array $attributes = []) {
        parent::__construct($attributes);
        $this->return = $return;
        $this->params = $params;
        $this->paramNames = $paramNames;
        $this->isVariadic = $isVariadic;
    }

    public function getSubNodeNames(): array {
        return ['return', 'params', 'paramNames', 'isVariadic'];
    }

}