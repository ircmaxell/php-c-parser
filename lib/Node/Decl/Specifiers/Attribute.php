<?php

namespace PHPCParser\Node\Decl\Specifiers;

use PHPCParser\Node\Stmt\ValueStmt\Expr;
use PHPCParser\NodeAbstract;

class Attribute extends NodeAbstract {

    public string $attribute;
    public ?Expr $expr;

    public function __construct(string $attribute, ?Expr $expr, array $attributes = []) {
        parent::__construct($attributes);
        $this->attribute = $attribute;
        $this->expr = $expr;
    }

    public function getSubNodeNames(): array {
        return ['attribute', 'expr'];
    }

    public function getAttributeName() {
        $attr = $this->attribute;
        $len = \strlen($attr);
        if ($len > 4 && $attr[0] === '_' && $attr[1] === '_' && $attr[$len - 2] === '_' && $attr[$len - 1] === '_') {
            return substr($attr, 2, $len - 4);
        }
        return $attr;
    }

}