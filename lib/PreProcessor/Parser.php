<?php

declare(strict_types=1);

namespace PHPCParser\PreProcessor;

class Parser {

    private Tokenizer $tokenizer;

    public function __construct(Tokenizer $tokenizer = null) {
        $this->tokenizer = $tokenizer ?? new Tokenizer;
    }

    /** @return Token[] */
    public function parse(string $file, string $code): array {
        $lines = preg_split("(\r\n|\n|\r)", $code);
        $lines = $this->mergeContinuedLines($lines);
        $lines = $this->stripComments($lines);
        $lines = $this->stripEmptyLines($lines);
        $tokens = $this->tokenizer->tokenize($file, $lines);
        return $tokens;
    }

    /** @param string[] $lines
     *  @return string[]
     */
    private function stripEmptyLines(array $lines): array {
        foreach ($lines as $lineno => $line) {
            if ($line == "") {
                unset($lines[$lineno]);
            }
        }
        return $lines;
    }

    /** @param string[] $lines
     *  @return string[]
     */
    private function mergeContinuedLines(array $lines): array {
        $lineno = 0;
        $length = count($lines);

        while ($lineno < $length) {
            $buffer = &$lines[$lineno++];
            while (substr($buffer, -1) === '\\') {
                $buffer = substr($buffer, 0, -1);
                if ($lineno < $length) {
                    $buffer .= $lines[$lineno];
                    unset($lines[$lineno++]);
                } else {
                    break;
                }
            }
        }
        return $lines;
    }

    /** @param string[] $lines
     *  @return string[]
     */
    private function stripComments(array $lines): array {
        $result = [];
        $pos = 0;
        $length = array_key_last($lines);

        while ($pos <= $length) {
            while (!isset($lines[$pos])) {
                ++$pos;
            }
            $buffer = $lines[$pos];
            if (strpos($buffer, '//') === false && strpos($buffer, "/*") === false) {
                $result[$pos++] = $buffer;
                continue;
            }
            $subbuffer = &$result[$pos++];
            $subbuffer = '';
            $i = 0;
            $lineLength = strlen($buffer);
            while ($i < $lineLength) {
                $char = $buffer[$i++];
                if ($char === '/' && $i < $lineLength) {
                    if ($buffer[$i] === '/') {
                        // Single line comment: kill entire line from here out
                        break;
                    } elseif ($buffer[$i] === '*') {
                        // Consume until we find a */
                        $i++;
                        while (true) {
                            if ($i >= $lineLength) {
                                if ($pos <= $length) {
                                    while (!isset($lines[$pos])) {
                                        ++$pos;
                                    }
                                    $buffer = $lines[$pos++];
                                    $i = 0;
                                    $lineLength = strlen($buffer);
                                    continue;
                                    // Continue to handle empty lines gracefully
                                } else {
                                    // syntax error, unterminated /*
                                    throw new \RuntimeException("Unterminated /*");
                                }
                            }
                            $char = $buffer[$i++];
                            if ($char === '*' && $i < $lineLength && $buffer[$i] === '/') {
                                // Found */
                                $i++;
                                break;
                            } 
                        }
                    } else {
                        $subbuffer .= $char;
                    }
                } elseif ($char === '"') {
                    // Todo: handle string literals
                    $subbuffer .= $char;
                    // Consume until we find an unescaped "
                    while (true) {
                        if ($i >= $lineLength) {
                            if ($pos <= $length) {
                                while (!isset($lines[$pos])) {
                                    ++$pos;
                                }
                                $buffer = $lines[$pos++];
                                $i = 0;
                                $lineLength = strlen($buffer);
                                continue;
                            } else {
                                throw new \RuntimeException("Unterminated \"");
                            }
                        }
                        $char = $buffer[$i++];
                        if ($char === '\\') {
                            $subbuffer .= $char;
                            if ($i < $lineLength) {
                                // Be sure to eat escaped character
                                $subbuffer .= $buffer[$i++];
                            }
                        } elseif ($char === '"') {
                            // terminating "
                            $subbuffer .= $char;
                            break;
                        } else {
                            $subbuffer .= $char;
                        }
                    }
                } else {
                    $subbuffer .= $char;
                }
            }
        }
        return $result;
    }
}