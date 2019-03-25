<?php

namespace PHPCParser;

class Scope {

    private array $entries = [
        'void' => Tokens::T_TYPEDEF_NAME,
        'char' => Tokens::T_TYPEDEF_NAME,
        'bool' => Tokens::T_TYPEDEF_NAME,
//        'int8_t' => Tokens::T_TYPEDEF_NAME,
//        'uint8_t' => Tokens::T_TYPEDEF_NAME,
//        'int16_t' => Tokens::T_TYPEDEF_NAME,
//        'uint16_t' => Tokens::T_TYPEDEF_NAME,
//        'int32_t' => Tokens::T_TYPEDEF_NAME,
//        'uint32_t' => Tokens::T_TYPEDEF_NAME,
//        'int64_t' => Tokens::T_TYPEDEF_NAME,
//        'uint64_t' => Tokens::T_TYPEDEF_NAME,
        'float' => Tokens::T_TYPEDEF_NAME,
        'double' => Tokens::T_TYPEDEF_NAME,
//        'uintptr_t' => Tokens::T_TYPEDEF_NAME,
//        'intptr_t' => Tokens::T_TYPEDEF_NAME,
        'size_t' => Tokens::T_TYPEDEF_NAME,
//        'ssize_t' => Tokens::T_TYPEDEF_NAME,
//        'ptrdiff_t' => Tokens::T_TYPEDEF_NAME,
//        'off_t' => Tokens::T_TYPEDEF_NAME,
//        'va_list' => Tokens::T_TYPEDEF_NAME,
        '__builtin_va_list' => Tokens::T_TYPEDEF_NAME,
        '__gnuc_va_list' => Tokens::T_TYPEDEF_NAME,
        'wchar_t' => Tokens::T_TYPEDEF_NAME,
    ];

    private array $types = [];
    private array $enums = [];
    private array $structs = [];

    private ?Scope $parent;

    public function __construct(?Scope $parent = null) {
        $this->parent = $parent;
    }

    public function typedef(string $identifier, Node\Type $type): void {
        $this->entries[$identifier] = Tokens::T_TYPEDEF_NAME;
        $this->types[$identifier] = $type;
    }

    public function enumdef(string $identifier, Node\Decl $enum): void {
        $this->entries[$identifier] = Tokens::T_ENUMERATION_CONSTANT;
        $this->enums[$identifier] = $enum;
    }

    public function structdef(string $identifier, Node\Decl $struct): void {
        $this->structs[$identifier] = $struct;
    }

    public function lookup(string $identifier): int {
        if (isset($this->entries[$identifier])) {
            return $this->entries[$identifier];
        }
        if ($this->parent !== null) {
            return $this->parent->lookup($identifier);
        }
        return Tokens::T_IDENTIFIER;
    }

    public function type(string $identifier): Node\Type {
        if (!isset($this->types[$identifier])) {
            if ($this->parent !== null) {
                return $this->parent->type($identifier);
            }
            throw new \LogicException("Attempt to lookup unknown type '$identifier'");
        }
        return $this->types[$identifier];
    }

    public function enum(string $identifier): Node\Decl {
        if (!isset($this->enums[$identifier])) {
            if ($this->parent !== null) {
                return $this->parent->enum($identifier);
            }
            throw new \LogicException("Attempt to lookup unknown enum '$identifier'");
        }
        return $this->enums[$identifier];
    }

    public function struct(string $identifier): Node\Decl {
        if (!isset($this->structs[$identifier])) {
            if ($this->parent !== null) {
                return $this->parent->struct($identifier);
            }
            throw new \LogicException("Attempt to lookup unknown struct '$identifier'");
        }
        return $this->structs[$identifier];
    }
}