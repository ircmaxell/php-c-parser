<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\Stmt;

class BreakStmt extends Stmt
{

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
    }
}