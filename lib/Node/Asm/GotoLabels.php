<?php declare(strict_types=1);

namespace PHPCParser\Node\Asm;

use PHPCParser\NodeAbstract;

class GotoLabels extends NodeAbstract {
    /** @var string[] */
    public array $labels = [];

    public function getSubNodeNames(): array {
        return ['labels'];
    }
}