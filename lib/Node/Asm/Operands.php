<?php declare(strict_types=1);

namespace PHPCParser\Node\Asm;

use PHPCParser\NodeAbstract;

class Operands extends NodeAbstract {

    public array $operands = [];

    public function getSubNodeNames(): array {
        return ['operands'];
    }
}