<?php declare(strict_types=1);

namespace PHPCParser\Node\Type\TagType;

use PHPCParser\Node\Type\TagType;
use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl;

class EnumType extends TagType
{
    public EnumDecl $decl;

    public function __construct(EnumDecl $decl, array $attributes = []) {
        parent::__construct($attributes);
        $this->decl = $decl;
    }

    public function getSubNodeNames(): array {
        return ['decl'];
    }

}