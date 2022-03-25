<?php declare(strict_types=1);

namespace PHPCParser\Node;

use PHPCParser\NodeAbstract;

abstract class Stmt extends NodeAbstract
{
    public array $labels = [];

    public function getSubNodeNames(): array {
        return ['labels'];
    }
}
