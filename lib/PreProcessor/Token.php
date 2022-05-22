<?php

declare(strict_types=1);

namespace PHPCParser\PreProcessor;

class Token {
    const IDENTIFIER = 1;
    const NUMBER = 2;
    const LITERAL = 3;
    const PUNCTUATOR = 4;
    const WHITESPACE = 5;
    const OTHER = 6;

    public int $type;
    public string $value;
    public string $file;
    public int $line;
    public ?Token $next;

    public function __construct(int $type, string $value, string $file, int $line = 0, ?Token $next = null) {
        $this->type = $type;
        $this->value = $value;
        $this->file = $file;
        $this->line = $line;
        $this->next = $next;
    }

    public function tail(): self {
        $node = $this;
        while (!is_null($node->next)) {
            $node = $node->next;
        }
        return $node;
    }

    public static function skipWhitespace(?self $node): ?self {
        while ($node !== null && $node->type === self::WHITESPACE) {
            $node = $node->next;
        }
        return $node;
    }

}