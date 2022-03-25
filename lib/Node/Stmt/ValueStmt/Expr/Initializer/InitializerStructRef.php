<?php
declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr\Initializer;

class InitializerStructRef extends NamedInitializer
{
    public string $memberName;

    public function __construct(string $memberName, array $attributes = []) {
        parent::__construct($attributes);
        $this->memberName = $memberName;
    }

    public function getSubNodeNames(): array {
        return ['memberName'];
    }

    public function isConstant(): bool {
        return true;
    }
}