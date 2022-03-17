<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;

class QualifiedPointer extends IR
{
    public int $qualification;
    public array $attributesList;
    public ?QualifiedPointer $parent;


    public function __construct(int $qualification, array $attributesList, ?self $parent, array $attributes = []) {
        parent::__construct($attributes);
        $this->qualification = $qualification;
        $this->attributesList = $attributesList;
        $this->parent = $parent;
    }
}
