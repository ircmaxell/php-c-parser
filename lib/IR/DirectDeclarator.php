<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;

class DirectDeclarator extends IR
{
    public ?string $declaratorAsm = null;
    /** @var \PHPCParser\Node\Decl\Specifiers\AttributeList[] */
    public array $attributeList = [];
}
