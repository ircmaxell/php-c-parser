<?php declare(strict_types=1);

namespace PHPCParser\IR;

use PHPCParser\IR;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class FieldDeclaration extends IR
{
    public ?Declarator $declarator;
    public ?Expr $bitfieldSize;


    public function __construct(?Declarator $declarator, ?Expr $bitfieldSize, array $attributes = []) {
        parent::__construct($attributes);
        $this->declarator = $declarator;
        $this->bitfieldSize = $bitfieldSize;
    }
}
