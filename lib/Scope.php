<?php

namespace PHPCParser;

class Scope {

    private array $entries = [
        'void' => Tokens::T_TYPEDEF_NAME,
        'char' => Tokens::T_TYPEDEF_NAME,
        'bool' => Tokens::T_TYPEDEF_NAME,
        'int8_t' => Tokens::T_TYPEDEF_NAME,
        'uint8_t' => Tokens::T_TYPEDEF_NAME,
        'int16_t' => Tokens::T_TYPEDEF_NAME,
        'uint16_t' => Tokens::T_TYPEDEF_NAME,
        'int32_t' => Tokens::T_TYPEDEF_NAME,
        'uint32_t' => Tokens::T_TYPEDEF_NAME,
        'int64_t' => Tokens::T_TYPEDEF_NAME,
        'uint64_t' => Tokens::T_TYPEDEF_NAME,
        'float' => Tokens::T_TYPEDEF_NAME,
        'double' => Tokens::T_TYPEDEF_NAME,
        'uintptr_t' => Tokens::T_TYPEDEF_NAME,
        'intptr_t' => Tokens::T_TYPEDEF_NAME,
        'size_t' => Tokens::T_TYPEDEF_NAME,
//        'ssize_t' => Tokens::T_TYPEDEF_NAME,
        'ptrdiff_t' => Tokens::T_TYPEDEF_NAME,
//        'off_t' => Tokens::T_TYPEDEF_NAME,
//        'va_list' => Tokens::T_TYPEDEF_NAME,
        '__builtin_va_list' => Tokens::T_TYPEDEF_NAME,
        '__gnuc_va_list' => Tokens::T_TYPEDEF_NAME,
    ];

    private array $types = [];
    private array $decls = [];

    public function typedef(string $identifier, Node\Type $type): void {
        $this->entries[$identifier] = Tokens::T_TYPEDEF_NAME;
        $this->types[$identifier] = $type;
    }

    public function enum(string $identifier, Node\Decl $decl): void {
        $this->entries[$identifier] = Tokens::T_ENUMERATION_CONSTANT;
        $this->decls[$identifier] = $decl;
    }

    public function lookup(string $identifier): int {
        if (isset($this->entries[$identifier])) {
            return $this->entries[$identifier];
        }
        return Tokens::T_IDENTIFIER;
    }

    public function lookupType(string $identifier): Node\Type {
        if (!isset($this->types[$identifier])) {
            throw new \LogicException("Attempt to lookup unknown type '$identifier'");
        }
        return $this->types[$identifier];
    }

    public function lookupDecl(string $identifier): Node\Decl {
        if (!isset($this->decls[$identifier])) {
            throw new \LogicException("Attempt to lookup unknown decl '$identifier'");
        }
        return $this->decls[$identifier];
    }
}