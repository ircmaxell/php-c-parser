<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\DeclGroup;
use PHPCParser\Node\Stmt;

class DeclStmt extends Stmt
{
    public DeclGroup $declarations;

    public function __construct(DeclGroup $declarations, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarations = $declarations;
    }

    public function getSubNodeNames(): array {
        return ['declarations'];
    }

    public function getType(): string {
        return 'Stmt_DeclStmt';
    }
}