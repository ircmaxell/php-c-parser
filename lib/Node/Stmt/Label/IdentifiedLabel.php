<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\Label;

use PHPCParser\Node\Stmt\Label;

class IdentifiedLabel extends Label
{
    public string $label;
    public array $attributeList;

    public function __construct(string $label, array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->label = $label;
        $this->attributeList = $attributeList;
    }

    public function getSubNodeNames(): array {
        return ['label', 'attributeList'];
    }
}