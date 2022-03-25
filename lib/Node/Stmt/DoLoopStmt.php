<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\Stmt;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class DoLoopStmt extends Stmt
{

    public Expr $condition;
    public Stmt $loopStmt;

    public function __construct(Expr $condition, Stmt $loopExpr, array $attributes = []) {
        parent::__construct($attributes);
        $this->condition = $condition;
        $this->loopStmt = $loopExpr;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['condition', 'loopStmt']);
    }
}