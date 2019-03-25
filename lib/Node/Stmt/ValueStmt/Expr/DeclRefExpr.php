<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\Decl;

class DeclRefExpr extends Expr
{
    public string $name;
    public ?Decl $decl;

    public function __construct(string $name, ?Decl $decl, array $attributes = []) {
        parent::__construct($attributes);
        $this->name = $name;
        $this->decl = $decl;
    }

    public function getSubNodeNames(): array {
        return ['name', 'decl'];
    }

    public function isConstant(): bool {
        if ($this->decl instanceof Decl\NamedDecl\ValueDecl\EnumConstantDecl) {
            return true;
        }
        throw new \LogicException('Unknown decl reference type');
    }

}