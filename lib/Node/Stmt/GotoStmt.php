<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\Stmt;

class GotoStmt extends Stmt
{
    public string $label;

    public function __construct(string $label, array $attributes = []) {
        parent::__construct($attributes);
        $this->label = $label;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['label']);
    }
}