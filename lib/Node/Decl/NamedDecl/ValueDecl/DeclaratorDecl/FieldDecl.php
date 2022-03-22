<?php declare(strict_types=1);

namespace PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl;

use PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl;

use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\Node\Type;

class FieldDecl extends DeclaratorDecl
{

    public ?string $name;
    public ?Type $type;
    public ?Expr $bitfieldSize;

    public function __construct(?string $name, ?Type $type, ?Expr $bitfieldSize, array $attributes = []) {
        parent::__construct($attributes);
        $this->name = $name;
        $this->type = $type;
        $this->bitfieldSize = $bitfieldSize;
    }

    public function getSubNodeNames(): array {
        return ['name', 'type', 'bitfieldSize'];
    }

    public function getType(): string {
        return 'Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl';
    }
}