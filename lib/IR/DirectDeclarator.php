<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;

class DirectDeclarator extends IR
{
    public ?string $declaratorAsm = null;
    public array $attributeList = [];
}
