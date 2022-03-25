<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\Stmt;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class IfStmt extends Stmt
{

    public Expr $condition;
    public Stmt $trueStmt;
    public ?Stmt $falseStmt;

    public function __construct(Expr $condition, Stmt $trueStmt, ?Stmt $falseStmt, array $attributes = []) {
        parent::__construct($attributes);
        $this->condition = $condition;
        $this->trueStmt = $trueStmt;
        $this->falseStmt = $falseStmt;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['condition', 'trueStmt', 'falseStmt']);
    }
}