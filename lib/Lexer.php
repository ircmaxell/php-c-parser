<?php

namespace PHPCParser;

use PHPCParser\PreProcessor\Token;

class Lexer
{
    /** @var Token[] */
    private array $tokens;
    private int $tokenPos = -1;
    private ?Token $currentToken = null;
    private Scope $scope;

    /** @param Token[] $tokens */
    public function begin(Scope $scope, array $tokens): void {
        $this->tokens = $tokens;
        $this->tokenPos = -1;
        $this->currentToken = null;
        $this->scope = $scope;
    }

    public function getNextToken(&$value = null, &$startAttributes = null, &$endAttributes = null): int {
        $startAttributes = [];
        $endAttributes   = [];

        while(true) {
            if ($this->currentToken === null) {
                if (!array_key_exists(++$this->tokenPos, $this->tokens)) {
                    $value = "\0";
                    return 0;
                }

                $this->currentToken = $this->tokens[$this->tokenPos];
                continue;
            } else {
                $currentStartToken = $this->currentToken;
                $token = $this->extractToken();
                if ($token === null) {
                    // tells us to go to the next token
                    continue;
                }
            }
            $startAttributes['sourceToken'] = $currentStartToken;
            $startAttributes['startLine'] = $this->tokenPos + 1;

            if (is_string($token)) {
                $id = ord($token);
                $value = $token;
            } else {
                $value = $token[1];
                $id = $token[0];
            }
            return $id;
        }
        throw new \LogicException("Reached the end of lexer loop, should never happen");
    }

    /** @return array{int, string}|null */
    private function extractToken(): ?array {
        if ($this->currentToken->type === Token::IDENTIFIER) {
            return $this->extractIdentifier();
        } elseif ($this->currentToken->type === Token::NUMBER) {
            return $this->extractNumber();
        } elseif ($this->currentToken->type === Token::LITERAL) {
            return $this->extractLiteral();
        } elseif ($this->currentToken->type === Token::PUNCTUATOR) {
            return $this->extractPunctuation();
        } elseif ($this->currentToken->type === Token::WHITESPACE) {
            $this->currentToken = $this->currentToken->next;
            return null;
        } elseif ($this->currentToken->type === Token::OTHER) {
            if ($this->currentToken->value === '') {
                $this->currentToken = $this->currentToken->next;
                return null;
            }
            return $this->extractOther();
        }
        throw new \LogicException("Unknown token type encountered: {$this->currentToken->type}");
    }

    /** @return array{int, string} */
    private function extractNumber(): array {
        $number = $this->currentToken->value;
        $this->currentToken = $this->currentToken->next;
        // TODO: fix this
        if (ctype_digit($number)) {
            return [Tokens::T_I_CONSTANT, $number];
        }
        if (strpos($number, '.') !== false) {
            return [Tokens::T_F_CONSTANT, $number];
        }
        return [Tokens::T_I_CONSTANT, $number];
    }

    /** @var string[] */
    private array $literalsBuffer = [];
    /** @return array{int, string}|null */
    private function extractLiteral(): ?array {
        $string = $this->currentToken->value;
        $this->currentToken = $this->currentToken->next;
        $tokenLine = $this->tokenPos;
        $token = $this->currentToken;
        for (;;) {
            if ($token === null) {
                if (\count($this->tokens) > ++$tokenLine) {
                    $token = $this->tokens[$tokenLine];
                } else {
                    break;
                }
            } elseif ($token->type === Token::WHITESPACE || $token->value === '') {
                $token = $token->next;
            } else {
                break;
            }
        }
        if ($token !== null && $token->type === Token::LITERAL) {
            $this->literalsBuffer[] = $string;
            return null;
        }
        if ($this->literalsBuffer) {
            $this->literalsBuffer[] = $string;
            $string = implode($this->literalsBuffer);
            $this->literalsBuffer = [];
        }
        return [Tokens::T_STRING_LITERAL, $string];
    }

    /** @return array{int, string} */
    private function extractPunctuation(): array {
        $value = $this->currentToken->value;
        $this->currentToken = $this->currentToken->next;
        switch ($value) {
            case '...':
                return [Tokens::T_ELLIPSIS, $value];
            case '-':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_SUB_ASSIGN, '-='];
                } elseif ($this->currentToken !== null && $this->currentToken->value === '>') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_PTR_OP, '->'];
                } elseif ($this->currentToken !== null && $this->currentToken->value === '-') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_DEC_OP, '--'];
                }
                goto emit_single;
            case '+':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_ADD_ASSIGN, '+='];
                } elseif ($this->currentToken !== null && $this->currentToken->value === '+') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_INC_OP, '++'];
                }
                goto emit_single;
            case '*':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_MUL_ASSIGN, '*='];
                }
                goto emit_single;
            case '%':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_MOD_ASSIGN, '%='];
                }
                goto emit_single;
            case '/':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_DIV_ASSIGN, '/='];
                }
                goto emit_single;
            case '=':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_EQ_OP, '=='];
                }
                goto emit_single;
            case '!':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_NE_OP, '!='];
                }
                goto emit_single;
            case '|':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_OR_ASSIGN, '|='];
                } elseif ($this->currentToken !== null && $this->currentToken->value === '|') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_OR_OP, '||'];
                }
                goto emit_single;
            case '&':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_AND_ASSIGN, '&='];
                } elseif ($this->currentToken !== null && $this->currentToken->value === '&') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_AND_OP, '&&'];
                }
                goto emit_single;
            case '^':
                if ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_XOR_ASSIGN, '^='];
                }
                goto emit_single;
            case '>':
                if ($this->currentToken !== null && $this->currentToken->value === '>') {
                    $this->currentToken = $this->currentToken->next;
                    if ($this->currentToken !== null && $this->currentToken->value === '=') {
                        $this->currentToken = $this->currentToken->next;
                        return [Tokens::T_RIGHT_ASSIGN, '>>='];
                    }
                    return [Tokens::T_RIGHT_OP, '>>'];
                } elseif ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_GE_OP, '>='];
                }
                goto emit_single;
            case '<':
                if ($this->currentToken !== null && $this->currentToken->value === '<') {
                    $this->currentToken = $this->currentToken->next;
                    if ($this->currentToken !== null && $this->currentToken->value === '=') {
                        $this->currentToken = $this->currentToken->next;
                        return [Tokens::T_LEFT_ASSIGN, '<<='];
                    }
                    return [Tokens::T_LEFT_OP, '<<'];
                } elseif ($this->currentToken !== null && $this->currentToken->value === '=') {
                    $this->currentToken = $this->currentToken->next;
                    return [Tokens::T_LE_OP, '<='];
                }
                goto emit_single;
            case ';':
            case '(':
            case '~':
            case ')':
            case '{':
            case '}':
            case ',':
            case '[':
            case ']':
            case '?':
            case '.':
            case ':':
emit_single:
                return [ord($value), $value];
        }
        throw new \LogicException("Unsure how to extract unknown punctuator '$value'");
    }

    private const IDENTIFIER_MAP = [
        'asm' => Tokens::T_ASM,
        '__asm' => Tokens::T_ASM,
        '__asm__' => Tokens::T_ASM,
        '__attribute__' => Tokens::T_ATTRIBUTE,
        'auto' => Tokens::T_AUTO,
        'break' => Tokens::T_BREAK,
        'case' => Tokens::T_CASE,
        'char' => Tokens::T_CHAR,
        'const' => Tokens::T_CONST,
        'continue' => Tokens::T_CONTINUE,
        'default' => Tokens::T_DEFAULT,
        'do' => Tokens::T_DO,
        'double' => Tokens::T_DOUBLE,
        'else' => Tokens::T_ELSE,
        'enum' => Tokens::T_ENUM,
        'extern' => Tokens::T_EXTERN,
        'float' => Tokens::T_FLOAT,
        'for' => Tokens::T_FOR,
        'goto' => Tokens::T_GOTO,
        'if' => Tokens::T_IF,
        'inline' => Tokens::T_INLINE,
        '__inline' => Tokens::T_INLINE,
        '__inline__' => Tokens::T_INLINE,
        'int' => Tokens::T_INT,
        'long' => Tokens::T_LONG,
        '__int128' => Tokens::T_INT128,
        '__float128' => Tokens::T_FLOAT128,
        'register' => Tokens::T_REGISTER,
        'restrict' => Tokens::T_RESTRICT,
        '__restrict' => Tokens::T_RESTRICT,
        'return' => Tokens::T_RETURN,
        'short' => Tokens::T_SHORT,
        'signed' => Tokens::T_SIGNED,
        'sizeof' => Tokens::T_SIZEOF,
        'static' => Tokens::T_STATIC,
        'struct' => Tokens::T_STRUCT,
        'switch' => Tokens::T_SWITCH,
        'typedef' => Tokens::T_TYPEDEF,
        'union' => Tokens::T_UNION,
        'unsigned' => Tokens::T_UNSIGNED,
        'void' => Tokens::T_VOID,
        'volatile' => Tokens::T_VOLATILE,
        '__volatile__' => Tokens::T_VOLATILE,
        'while' => Tokens::T_WHILE,
        '_Alignas' => Tokens::T_ALIGNAS,
        '_Alignof' => Tokens::T_ALIGNOF,
        '_Atomic' => Tokens::T_ATOMIC,
        '_Bool' => Tokens::T_BOOL,
        '_Complex' => Tokens::T_COMPLEX,
        '_Generic' => Tokens::T_GENERIC,
        '_Imaginary' => Tokens::T_IMAGINARY,
        '_Noreturn' => Tokens::T_NORETURN,
        '_Static_assert' => Tokens::T_STATIC_ASSERT,
        '_Thread_local' => Tokens::T_THREAD_LOCAL,
        '__thread' => Tokens::T_THREAD_LOCAL,
        '__func__' => Tokens::T_FUNC_NAME,
    ];

    /** @return array{int, string}|null */
    private function extractIdentifier(): ?array {
        $tok = $this->currentToken;
        $this->currentToken = $this->currentToken->next;

        if (isset(self::IDENTIFIER_MAP[$tok->value])) {
            return [self::IDENTIFIER_MAP[$tok->value], $tok->value];
        }
        // This is a no-op keyword in gcc, just skip it, is has no value for us
        if ($tok->value === '__extension__') {
            return null;
        }
        return [$this->scope->lookup($tok->value), $tok->value];
    }
}