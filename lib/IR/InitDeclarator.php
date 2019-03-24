<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;
use PHPCParser\Node;

class InitDeclarator extends IR
{
    public Declarator $declarator;
    public ?Node\Stmt $initializer;

    public function __construct(Declarator $declarator, ?Node\Stmt $initializer, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->initializer = $initializer;
    }
}
