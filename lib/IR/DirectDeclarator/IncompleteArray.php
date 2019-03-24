<?php declare(strict_types=1);

namespace PHPCParser\IR\DirectDeclarator;

use PHPCParser\IR\DirectDeclarator;

class IncompleteArray extends DirectDeclarator
{
    public DirectDeclarator $declarator;

    public function __construct(DirectDeclarator $declarator, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
    }
}
