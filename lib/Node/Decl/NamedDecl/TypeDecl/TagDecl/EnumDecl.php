<?php declare(strict_types=1);

namespace PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl;

use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl;

use PHPCParser\Node\Type;

class EnumDecl extends TagDecl
{

    public ?string $name;
    public ?array $fields;

    public function __construct(?string $name, ?array $fields, array $attributes = []) {
        parent::__construct($attributes);
        $this->name = $name;
        $this->fields = $fields;
    }

    public function getSubNodeNames(): array {
        return ['name', 'fields'];
    }

}