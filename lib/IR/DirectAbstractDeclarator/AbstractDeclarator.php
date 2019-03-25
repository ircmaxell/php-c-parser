<?php declare(strict_types=1);

namespace PHPCParser\IR\DirectAbstractDeclarator;

use PHPCParser\IR\DirectAbstractDeclarator;
use PHPCParser\IR\AbstractDeclarator as CoreDeclarator;

class AbstractDeclarator extends DirectAbstractDeclarator
{
    public CoreDeclarator $declarator;

    public function __construct(CoreDeclarator $declarator, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
    }
}
