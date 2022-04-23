<?php declare(strict_types=1);

namespace PHPCParser\Node\Asm;

use PHPCParser\NodeAbstract;

class Operands extends NodeAbstract {
    /** @var Operand[] */
    public array $operands = [];

    public function getSubNodeNames(): array {
        return ['operands'];
    }
}