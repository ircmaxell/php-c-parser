<?php declare(strict_types=1);

namespace PHPCParser\Node\Asm;

use PHPCParser\NodeAbstract;

class Registers extends NodeAbstract {
    /** @var string[] */
    public array $registers = [];

    public function getSubNodeNames(): array {
        return ['registers'];
    }
}