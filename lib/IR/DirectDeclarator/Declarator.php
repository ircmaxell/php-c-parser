<?php declare(strict_types=1);

namespace PHPCParser\IR\DirectDeclarator;

use PHPCParser\IR\DirectDeclarator;
use PHPCParser\IR\Declarator as CoreDeclarator;

class Declarator extends DirectDeclarator
{
    public CoreDeclarator $declarator;

    public function __construct(CoreDeclarator $declarator, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
    }
}
