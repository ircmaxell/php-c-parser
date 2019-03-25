<?php declare(strict_types=1);

namespace PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl;

use PHPCParser\Node\Decl\NamedDecl\TypeDecl\TagDecl;

use PHPCParser\Node\Type;

class RecordDecl extends TagDecl
{
    const KIND_STRUCT = 1;
    const KIND_UNION = 2;

    public int $kind;
    public ?string $name;
    public ?array $fields;

    public function __construct(int $kind, ?string $name, ?array $fields, array $attributes = []) {
        parent::__construct($attributes);
        $this->kind = $kind;
        $this->name = $name;
        $this->fields = $fields;
    }

    public function getSubNodeNames(): array {
        return ['kind', 'name', 'fields'];
    }

    public function getType(): string {
        return 'Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl';
    }
}