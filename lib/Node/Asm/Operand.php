<?php

namespace PHPCParser\Node\Asm;

use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\NodeAbstract;

class Operand extends NodeAbstract {

    public string $clobberMode;
    public Expr $variable;

    public function __construct(string $clobberMode, Expr $variable, array $attributes = []) {
        parent::__construct($attributes);
        $this->clobberMode = $clobberMode;
        $this->variable = $variable;
    }

    public function getSubNodeNames(): array {
        return ['clobberMode', 'variable'];
    }
}