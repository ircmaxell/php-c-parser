<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;
use PHPCParser\Node\Decl\Specifiers\AttributeList;

class DirectDeclarator extends IR
{
    public ?string $declaratorAsm = null;
    public ?AttributeList $attributeList = null;
}
