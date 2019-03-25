<?php declare(strict_types=1);

namespace PHPCParser\IR\DirectAbstractDeclarator;

use PHPCParser\IR\DirectAbstractDeclarator;

class IncompleteArray extends DirectAbstractDeclarator
{
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
    }
}
