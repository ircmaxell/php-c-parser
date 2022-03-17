<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;

class Declaration extends IR
{
    public int $qualifiers;
    public array $types;
    public array $declarators;
    public array $attributeLists;

    public function __construct(int $qualifiers, array $attributeLists, array $types, array $declarators, array $attributes = []) {
        parent::__construct($attributes);
        $this->qualifiers = $qualifiers;
        $this->types = $types;
        $this->declarators = $declarators;
        $this->attributeLists = $attributeLists;
    }
}
