<?php declare(strict_types=1);

namespace PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl;

use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl;

class RecordDecl extends TagDecl
{
    const KIND_STRUCT = 1;
    const KIND_UNION = 2;

    public int $kind;
    public ?string $name;
    public ?array $fields;
    /** @var \PHPCParser\Node\Decl\Specifiers\AttributeList[] */
    public array $attributeList;

    /** @param \PHPCParser\Node\Decl\Specifiers\AttributeList[] $attributeList */
    public function __construct(int $kind, ?string $name, ?array $fields, array $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->kind = $kind;
        $this->name = $name;
        $this->fields = $fields;
        $this->attributeList = $attributeList;
    }

    public function getSubNodeNames(): array {
        return ['kind', 'name', 'fields', 'attributeList'];
    }

    public function getType(): string {
        return 'Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl';
    }
}