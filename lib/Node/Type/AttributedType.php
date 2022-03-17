<?php declare(strict_types=1);

namespace PHPCParser\Node\Type;

use PHPCParser\Node\Type;
use PHPCParser\Node\Decl;

abstract class AttributedType extends Type
{

    public Type $parent;

    protected function __construct(Type $parent, array $attributes = []) {
        parent::__construct($attributes);
        $this->parent = $parent;
    }

    public function getSubNodeNames(): array {
        return ['parent'];
    }

    public static function fromDecl(int $kind, array $attributeLists, Type $parent, array $attributes = []): Type {
        if ($kind & Decl::KIND_TYPEDEF) {
            throw new \LogicException('Cannot compile typedef AttributedType');
        }
        if ($kind & Decl::KIND_EXTERN) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_EXTERN, $parent, $attributes);
        }
        if ($kind & Decl::KIND_STATIC) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_STATIC, $parent, $attributes);
        }
        if ($kind & Decl::KIND_THREAD_LOCAL) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_THREAD_LOCAL, $parent, $attributes);
        }
        if ($kind & Decl::KIND_AUTO) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_AUTO, $parent, $attributes);
        }
        if ($kind & Decl::KIND_REGISTER) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_REGISTER, $parent, $attributes);
        }
        if ($kind & Decl::KIND_CONST) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_CONST, $parent, $attributes);
        }
        if ($kind & Decl::KIND_RESTRICT) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_RESTRICT, $parent, $attributes);
        }
        if ($kind & Decl::KIND_VOLATILE) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_VOLATILE, $parent, $attributes);
        }
        if ($kind & Decl::KIND_ATOMIC) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_ATOMIC, $parent, $attributes);
        }
        if ($kind & Decl::KIND_INLINE) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_INLINE, $parent, $attributes);
        }
        if ($kind & Decl::KIND_NORETURN) {
            $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_NORETURN, $parent, $attributes);
        }
        foreach ($attributeLists as $attributeList) {
            foreach ($attributeList->attributeList as $attribute) {
                switch ($attribute->getAttributeName()) {
                    case "noreturn":
                        $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_NORETURN, $parent, $attributes);
                        break;
                    case "always_inline":
                        $parent = new ExplicitAttributedType(ExplicitAttributedType::KIND_ALWAYS_INLINE, $parent, $attributes);
                        break;
                    default:
                        $parent = new ArbitraryAttributedType($attribute, $parent, $attributes);
                }
            }
        }
        return $parent;
    }

}