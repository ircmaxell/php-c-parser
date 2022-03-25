<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\Stmt;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class LoopStmt extends Stmt
{

    public ?Expr $condition;
    public ?Stmt $initStmt;
    public ?Expr $loopExpr;
    public Stmt $loopStmt;

    public function __construct(?Expr $condition, ?Stmt $initStmt, ?Expr $loopExpr, Stmt $loopStmt, array $attributes = []) {
        parent::__construct($attributes);
        $this->condition = $condition;
        $this->initStmt = $initStmt;
        $this->loopExpr = $loopExpr;
        $this->loopStmt = $loopStmt;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['condition', 'initExpr', 'loopExpr', 'loopStmt']);
    }
}