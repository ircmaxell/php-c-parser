<?php
declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class InitializerExpr extends Expr
{
    /** @var Expr\Initializer\InitializerElement[] */
    public array $initializers;
    public ?TypeRefExpr $explicitType;

    /** @param Expr\Initializer\InitializerElement[] $initializers */
    public function __construct(array $initializers, ?TypeRefExpr $explicitType, array $attributes = []) {
        parent::__construct($attributes);
        $this->initializers = $initializers;
        $this->explicitType = $explicitType;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['initializers', 'explicitType']);
    }

    public function isConstant(): bool {
        foreach ($this->initializers as $initializer) {
            if (!$initializer->isConstant()) {
                return false;
            }
        }
        return true;
    }

}