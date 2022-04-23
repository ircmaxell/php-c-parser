<?php declare(strict_types=1);

namespace PHPCParser\Node;

use PHPCParser\NodeAbstract;

abstract class Stmt extends NodeAbstract
{
    /** @var \PHPCParser\Node\Stmt\Label[] */
    public array $labels = [];

    public function getSubNodeNames(): array {
        return ['labels'];
    }
}
