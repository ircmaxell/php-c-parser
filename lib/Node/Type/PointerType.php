<?php declare(strict_types=1);

namespace PHPCParser\Node\Type;

use PHPCParser\Node\Type;

class PointerType extends Type
{
    public Type $parent;

    public function __construct(Type $parent, array $attributes = []) {
        parent::__construct($attributes);
        $this->parent = $parent;
    }

    public function getSubNodeNames(): array {
        return ['parent'];
    }

    public function getType(): string {
        return 'Type_PointerType';
    }
}