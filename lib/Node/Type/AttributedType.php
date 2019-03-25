<?php declare(strict_types=1);

namespace PHPCParser\Node\Type;

use PHPCParser\Node\Type;
use PHPCParser\Node\Decl;

class AttributedType extends Type
{

    const KIND_STATIC       = 2;
    const KIND_THREAD_LOCAL = 3;
    const KIND_AUTO         = 4;
    const KIND_REGISTER     = 5;

    const KIND_CONST        = 6;
    const KIND_RESTRICT     = 7;
    const KIND_VOLATILE     = 8;
    const KIND_ATOMIC       = 9;

    const KIND_INLINE       = 10;
    const KIND_NORETURN     = 11;

    public int $kind;
    public Type $parent;

    public function __construct(int $kind, Type $parent, array $attributes = []) {
        parent::__construct($attributes);
        $this->kind = $kind;
        $this->parent = $parent;
    }

    public function getSubNodeNames(): array {
        return ['kind', 'parent'];
    }

    public static function fromDecl(int $kind, Type $parent, array $attributes = []): Type {
        if ($kind & Decl::KIND_TYPEDEF) {
            throw new \LogicException('Cannot compile typedef AttributedType');
        }
        if ($kind & Decl::KIND_STATIC) {
            $parent = new self(self::KIND_STATIC, $parent, $attributes);
        }
        if ($kind & Decl::KIND_THREAD_LOCAL) {
            $parent = new self(self::KIND_THREAD_LOCAL, $parent, $attributes);
        }
        if ($kind & Decl::KIND_AUTO) {
            $parent = new self(self::KIND_AUTO, $parent, $attributes);
        }
        if ($kind & Decl::KIND_REGISTER) {
            $parent = new self(self::KIND_REGISTER, $parent, $attributes);
        }
        if ($kind & Decl::KIND_CONST) {
            $parent = new self(self::KIND_CONST, $parent, $attributes);
        }
        if ($kind & Decl::KIND_RESTRICT) {
            $parent = new self(self::KIND_RESTRICT, $parent, $attributes);
        }
        if ($kind & Decl::KIND_VOLATILE) {
            $parent = new self(self::KIND_VOLATILE, $parent, $attributes);
        }
        if ($kind & Decl::KIND_ATOMIC) {
            $parent = new self(self::KIND_ATOMIC, $parent, $attributes);
        }
        if ($kind & Decl::KIND_INLINE) {
            $parent = new self(self::KIND_INLINE, $parent, $attributes);
        }
        if ($kind & Decl::KIND_NORETURN) {
            $parent = new self(self::KIND_NORETURN, $parent, $attributes);
        }
        return $parent;
    }

}