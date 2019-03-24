<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;

class Declarator extends IR
{
    public ?QualifiedPointer $pointer;
    public DirectDeclarator $declarator;


    public function __construct(?QualifiedPointer $pointer, DirectDeclarator $declarator, array $attributes = []) {
        parent::__construct($attributes);
        $this->pointer = $pointer;
        $this->declarator = $declarator;
    }
}
