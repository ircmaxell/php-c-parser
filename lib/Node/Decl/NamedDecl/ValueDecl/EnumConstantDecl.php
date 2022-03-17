<?php declare(strict_types=1);

namespace PHPCParser\Node\Decl\NamedDecl\ValueDecl;

use PHPCParser\Node\Decl\Specifiers\AttributeList;
use PHPCParser\Node\Decl\ValueDecl;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class EnumConstantDecl extends ValueDecl
{

    public string $name;
    public ?Expr $value;
    public ?AttributeList $attributeList;

    public function __construct(string $name, ?Expr $value, ?AttributeList $attributeList, array $attributes = []) {
        parent::__construct($attributes);
        $this->name = $name;
        $this->value = $value;
        $this->attributeList = $attributeList;
    }

    public function getSubNodeNames(): array {
        return ['name', 'value', 'attributeList'];
    }
}