<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\Label;

use PHPCParser\Node\Stmt\Label;

class IdentifiedLabel extends Label
{
    public string $label;
    /** @var \PHPCParser\Node\Decl\Specifiers\AttributeList[] */
    public array $attributeList;

    /** @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList */
    public function __construct(string $label, array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->label = $label;
        $this->attributeList = $attributeList;
    }

    public function getSubNodeNames(): array {
        return ['label', 'attributeList'];
    }
}