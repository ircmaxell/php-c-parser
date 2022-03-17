<?php

namespace PHPCParser\Node\Type;

use PHPCParser\Node\Decl\Specifiers\AttributeList;
use PHPCParser\Node\Type;

class ExplicitAttributedType extends AttributedType {

    const KIND_EXTERN        = 1;
    const KIND_STATIC        = 2;
    const KIND_THREAD_LOCAL  = 3;
    const KIND_AUTO          = 4;
    const KIND_REGISTER      = 5;

    const KIND_CONST         = 6;
    const KIND_RESTRICT      = 7;
    const KIND_VOLATILE      = 8;
    const KIND_ATOMIC        = 9;

    const KIND_INLINE        = 10;
    const KIND_NORETURN      = 11;
    const KIND_ALWAYS_INLINE = 12;

    public int $kind;

    public function __construct(int $kind, Type $parent, array $attributes = []) {
        parent::__construct($parent, $attributes);
        $this->kind = $kind;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['kind']);
    }

}