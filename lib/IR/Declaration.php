<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;

class Declaration extends IR
{
    public int $qualifiers;
    /** @var \PHPCParser\Node\Type[] */
    public array $types;
    /** @var InitDeclarator[] */
    public array $declarators;
    /** @var \PHPCParser\Node\Decl\Specifiers\AttributeList[] */
    public array $attributeLists;

    /** @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList
     *  @param \PHPCParser\Node\Type[] $types
     *  @param InitDeclarator[] $declarators
     */
    public function __construct(int $qualifiers, array $attributeLists, array $types, array $declarators, array $attributes = []) {
        parent::__construct($attributes);
        $this->qualifiers = $qualifiers;
        $this->types = $types;
        $this->declarators = $declarators;
        $this->attributeLists = $attributeLists;
    }
}
