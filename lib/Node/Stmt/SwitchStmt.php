<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\Stmt;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class SwitchStmt extends Stmt
{

    public Expr $condition;
    public Stmt $stmt;

    public function __construct(Expr $condition, Stmt $stmt, array $attributes = []) {
        parent::__construct($attributes);
        $this->condition = $condition;
        $this->stmt = $stmt;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['condition', 'stmt']);
    }
}