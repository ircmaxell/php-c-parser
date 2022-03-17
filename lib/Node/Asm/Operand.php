<?php

namespace PHPCParser\Node\Asm;

use PHPCParser\NodeAbstract;

class Operand extends NodeAbstract {

    public string $clobberMode;
    public string $variable;

    public function __construct(string $clobberMode, string $variable, array $attributes = []) {
        parent::__construct($attributes);
        $this->clobberMode = $clobberMode;
        $this->variable = $variable;
    }

    public function getSubNodeNames(): array {
        return ['clobberMode', 'variable'];
    }
}