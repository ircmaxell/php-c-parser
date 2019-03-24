<?php declare(strict_types=1);

namespace PHPCParser\IR\DirectDeclarator;

use PHPCParser\IR\DirectDeclarator;

class Identifier extends DirectDeclarator
{
    public string $name;

    public function __construct(string $name, array $attributes = []) {
        parent::__construct($attributes);
        $this->name = $name;
    }
}
