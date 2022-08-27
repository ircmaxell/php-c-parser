<?php

declare(strict_types=1);

namespace PHPCParser\PreProcessor;

class Tokenizer {


    /** @param string[] $lines
     *  @return Token[]
     */
    public function tokenize(string $file, array $lines): array {
        $result = [];
        foreach ($lines as $lineno => $line) {
            $result[$lineno + 1] = $this->tokenizeLine($file, $lineno + 1, $line);
        }
        return $result;
    }

    protected function convertEscapeSequences(string $str): string {
        return preg_replace_callback('(\\\\(?:(?<chr>[\\\\\'"?abfnrtve])|x(?<hex>[a-fA-F0-9]+)|(?<oct>[0-7]+)|(?s).+))', function ($m) {
            if ($m['chr'] !== "") {
                return [
                    'a' => "\x7",
                    'b' => "\x8",
                    'f' => "\f",
                    'n' => "\n",
                    'r' => "\r",
                    't' => "\t",
                    'v' => "\v",
                    'e' => "\e",
                ][$m['chr']] ?? $m['chr'];
            }
            if ($m['hex'] !== "") {
                return \chr(intval($m['hex'], 16));
            }
            if ($m['oct'] !== "") {
                return \chr(intval($m['oct'], 8));
            }
            throw new \LogicException("Unknown character literal escape sequence: " . var_export($m[0], true));
        }, $str);
    }

    protected function tokenizeLine(string $file, int $lineno, string $line): ?Token {
        $result = $first = new Token(0, '', $file);
        $length = strlen($line);
        $pos = 0;
        while ($pos < $length) {
            $char = $line[$pos++];
            if (ctype_alpha($char) || $char === '_') {
                // identifier
                if ($char === 'L' && $pos < $length && $line[$pos] === "'") {
                    ++$pos;
                    goto single_quoted_string;
                }
                $buffer = $char;
                while ($pos < $length && (ctype_alnum($line[$pos]) || $line[$pos] === '_')) {
                    $buffer .= $line[$pos++];
                }
                $result = $result->next = new Token(Token::IDENTIFIER, $buffer, $file, $lineno);
            } elseif ($char === ' ' || $char === "\t" || $char === "\0") {
                // white space, ignore
                $buffer = $char;
                while ($pos < $length && ($line[$pos] === ' ' || $line[$pos] === "\t" || $line[$pos] === "\0")) {
                    $buffer .= $line[$pos++];
                }
                $result = $result->next = new Token(Token::WHITESPACE, $buffer, $file, $lineno);
            } elseif (ctype_digit($char) || ($char === '.' && $pos < $length && ctype_digit($line[$pos]))) {
                // Numeric literal
                $buffer = $char;
                $had_decimal_separator = false;
                while ($pos < $length) {
                    $char = $line[$pos];
                    if ($char === 'e' || $char === 'E' || $char === 'p' || $char === 'P') {
                        $buffer .= $char;
                        $pos++;
                        if ($pos < $length && ($line[$pos] === '-' || $line[$pos] === '+')) {
                            // emit both
                            $buffer .= $line[$pos++];
                        }
                    } elseif (ctype_alnum($char) || (!$had_decimal_separator && $char === '.') || $char === '_') {
                        $buffer .= $char;
                        $had_decimal_separator = true;
                        $pos++;
                    } else {
                        break;
                    }
                }
                $result = $result->next = new Token(Token::NUMBER, $buffer, $file, $lineno);
            } elseif ($char === '"') {
                $buffer = '';
                while ($pos < $length) {
                    $char = $line[$pos++];
                    if ($char === '"') {
                        break;
                    } elseif ($char === '\\' && $pos < $length) {
                        // eat both characters since it's an escape
                        $char = $line[$pos++];
                        $buffer .= '\\' . $char;
                    } else {
                        $buffer .= $char;
                    }
                }
                $result = $result->next = new Token(Token::LITERAL, $this->convertEscapeSequences($buffer), $file, $lineno);
            } elseif ($char === "'") {
single_quoted_string:
                $buffer = '';
                while ($pos < $length) {
                    $char = $line[$pos++];
                    if ($char === "'") {
                        break;
                    } elseif ($char === '\\' && $pos < $length) {
                        // eat both characters since it's an escape
                        $char = $line[$pos++];
                        $buffer .= '\\' . $char;
                    } else {
                        $buffer .= $char;
                    }
                }
                $buffer = $this->convertEscapeSequences($buffer);
                if (strlen($buffer) === 1) {
                    $value = $buffer;
                } else {
                    throw new \LogicException("Syntax error: unexpected illegal string literal found '$buffer' in $file at position $pos");
                }
                $result = $result->next = new Token(Token::NUMBER, (string) \ord($value), $file, $lineno);
            } elseif (ctype_punct($char)) {
                if ($char === '.' && $pos + 1 < $length && $line[$pos] === '.' && $line[$pos + 1] === '.') {
                    // special case for ... token
                    $result = $result->next = new Token(Token::PUNCTUATOR, '...', $file, $lineno);
                    $pos = $pos + 2;
                } elseif ($char === '@' || $char === '$' || $char === '`') {
                    $result = $result->next = new Token(Token::OTHER, $char, $file, $lineno);
                } elseif ($char === '#' && $pos < $length && $line[$pos] === '#') {
                    $result = $result->next = new Token(Token::PUNCTUATOR, '##', $file, $lineno);
                    $pos++;
                } elseif ($char === '<' && $pos < $length && $line[$pos] === '%') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '{', $file, $lineno);
                    $pos++;
                } elseif ($char === '%' && $pos < $length && $line[$pos] === '>') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '}', $file, $lineno);
                    $pos++;
                } elseif ($char === '<' && $pos < $length && $line[$pos] === ':') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '[', $file, $lineno);
                    $pos++;
                } elseif ($char === ':' && $pos < $length && $line[$pos] === '>') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, ']', $file, $lineno);
                    $pos++;
                } elseif ($char === '%' && $pos + 2 < $length && $line[$pos] === ':' && $line[$pos + 1] === '%' && $line[$pos + 2] === ':') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '##', $file, $lineno);
                    $pos = $pos + 3;
                } elseif ($char === '%' && $pos < $length && $line[$pos] === ':') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '#', $file, $lineno);
                    $pos++;
                } else {
                    $result = $result->next = new Token(Token::PUNCTUATOR, $char, $file, $lineno);
                }
            } else {
                var_dump($char, ord($char), ord("\n"));
                die("Unknown Character in $file:$lineno");
            }
        }
        return $first->next;
    }


}

