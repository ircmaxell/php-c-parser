<?php declare(strict_types=1);

namespace PHPCParser\Node;

use PHPCParser\NodeAbstract;

abstract class DeclContext extends NodeAbstract
{
    public array $declarations;

    public function __construct(array $declarations, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarations = $declarations;
    }

    public function getSubNodeNames() : array {
        return ['declarations'];
    }

}
