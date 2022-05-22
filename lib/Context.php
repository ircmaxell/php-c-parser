<?php

declare(strict_types=1);

namespace PHPCParser;

use PHPCParser\PreProcessor\Token;

class Context {
    /** @var Token[] */
    private array $definitions = [];
    /** @var string[] */
    public array $headerSearchPaths = [];

    public Scope $scope;

    const DEFAULT_HEADER_SEARCH_PATHS = [
        '/usr/local/include',
        '/usr/include',
        '/usr/include/x86_64-linux-gnu',
        '/Applications/Xcode.app/Contents/Developer/Platforms/MacOSX.platform/Developer/SDKs/MacOSX.sdk/usr/include/',
        '/Applications/Xcode.app/Contents/Developer/Platforms/MacOSX.platform/Developer/SDKs/MacOSX.sdk/System/Library/Frameworks/Kernel.framework/Versions/A/Headers/',
    ];

    // defines needed for <float.h>
    const NUMERICAL_DEFINES = [
        "__DBL_DECIMAL_DIG__" => "17",
        "__DBL_DENORM_MIN__" => "4.9406564584124654e-324",
        "__DBL_DIG__" => "15",
        "__DBL_EPSILON__" => "2.2204460492503131e-16",
        "__DBL_HAS_DENORM__" => "1",
        "__DBL_MANT_DIG__" => "53",
        "__DBL_MAX_10_EXP__" => "308",
        "__DBL_MAX_EXP__" => "1024",
        "__DBL_MAX__" => "1.7976931348623157e+308",
        "__DBL_MIN_10_EXP__" => "(-307)",
        "__DBL_MIN_EXP__" => "(-1021)",
        "__DBL_MIN__" => "2.2250738585072014e-308",
        "__DECIMAL_DIG__" => "21",
        "__FLT_DECIMAL_DIG__" => "9",
        "__FLT_DENORM_MIN__" => "1.40129846e-45F",
        "__FLT_DIG__" => "6",
        "__FLT_EPSILON__" => "1.19209290e-7F",
        "__FLT_EVAL_METHOD__" => "0",
        "__FLT_HAS_DENORM__" => "1",
        "__FLT_MANT_DIG__" => "24",
        "__FLT_MAX_10_EXP__" => "38",
        "__FLT_MAX_EXP__" => "128",
        "__FLT_MAX__" => "3.40282347e+38F",
        "__FLT_MIN_10_EXP__" => "(-37)",
        "__FLT_MIN_EXP__" => "(-125)",
        "__FLT_MIN__" => "1.17549435e-38F",
        "__FLT_RADIX__" => "2",
        "__LDBL_DECIMAL_DIG__" => "21",
        "__LDBL_DENORM_MIN__" => "3.64519953188247460253e-4951L",
        "__LDBL_DIG__" => "18",
        "__LDBL_EPSILON__" => "1.08420217248550443401e-19L",
        "__LDBL_HAS_DENORM__" => "1",
        "__LDBL_MANT_DIG__" => "64",
        "__LDBL_MAX_10_EXP__" => "4932",
        "__LDBL_MAX_EXP__" => "16384",
        "__LDBL_MAX__" => "1.18973149535723176502e+4932L",
        "__LDBL_MIN_10_EXP__" => "(-4931)",
        "__LDBL_MIN_EXP__" => "(-16381)",
        "__LDBL_MIN__" => "3.36210314311209350626e-4932L",
    ];

    public function __construct(array $headerSearchPaths = []) {
        if (PHP_INT_MAX > 1<<32) {
            $this->define('__x86_64__', new Token(Token::NUMBER, '1', 'built-in'));
            $this->define('__LP64__', new Token(Token::NUMBER, '1', 'built-in'));
        }
        // The FFI library defines VA_LIST
        $this->define('__GNUC_VA_LIST', new Token(Token::NUMBER, '1', 'built-in'));
        $this->define('__GNUC__', new Token(Token::NUMBER, '4', 'built-in'));
        $this->define('__GNUC_MINOR__', new Token(Token::NUMBER, '2', 'built-in'));
        $this->define('__STDC__', new Token(Token::NUMBER, '1', 'built-in'));
        foreach (self::NUMERICAL_DEFINES as $name => $value) {
            $this->define($name, new Token(Token::NUMBER, $value, 'built-in'));
        }
        $this->headerSearchPaths = array_merge($headerSearchPaths, self::DEFAULT_HEADER_SEARCH_PATHS);
        $this->locateGCCHeaderPaths();
        $this->scope = new Scope;
    }

    private function locateGCCHeaderPaths() {
        if (is_dir('/usr/lib/gcc/x86_64-linux-gnu/')) {
            $dirs = scandir('/usr/lib/gcc/x86_64-linux-gnu/');
            sort($dirs, SORT_NUMERIC);
            foreach ($dirs as $dir) {
                if (is_numeric($dir) && is_dir('/usr/lib/gcc/x86_64-linux-gnu/' . $dir . '/include')) {
                    $this->headerSearchPaths[] = '/usr/lib/gcc/x86_64-linux-gnu/' . $dir . '/include';
		    // Note, linux sometimes adds empty directories, so let's add all in order. This may be wrong long term though...
		    //return;
                }
            }
        }
    }

    public function findHeaderFile(string $header, string $contextDir, string $contextFile, bool $next): ?string {
        if ($header[0] === '/' || ($header[1] === ':' && $header[2] === '\\')) {
            if (file_exists($header)) {
                return $header;
            }
        } else {
            if ($contextDir && !$next) {
                $dir = $contextDir;
                while (!empty($dir) && $dir !== '/') {
                    $file = "$dir/$header";
                    if (file_exists($file)) {
                        return $file;
                    }
                    $dir = dirname($dir);
                }
            }
            foreach ($this->headerSearchPaths as $path) {
                if ($next) {
                    if ($contextDir === $path) {
                        $next = false;
                    }
                    break;
                }
                $test = $path . '/' . $header;
                if (file_exists($test)) {
                    return $test;
                }
            }
        }
        return null;
    }

    /** @return Token[] */
    public function getDefines(): array {
        return $this->definitions;
    }

    protected function trim(?Token $token): ?Token {
        if (is_null($token)) {
            return $token;
        }
        $first = $next = new Token(0, '', 'computed');
        while ($token !== null) {
            if ($token->type !== Token::WHITESPACE) {
               $next = $next->next = new Token($token->type, $token->value, $token->file);
            }
            $token = $token->next;
        }
        return $first->next;
    }

    /** @return string[] */
    public function getNumericDefines(): array {
        $result = [];
        foreach ($this->definitions as $identifier => $token) {
            $token = $this->trim($token);
            if ($token instanceof Token && $token->type === Token::NUMBER && $token->next === null) {
                $result[$identifier] = $token->value;
            }
        }
        return $result;
    }

    public function defineIdentifier(string $identifier, string $value) {
        $this->definitions[$identifier] = new Token(Token::IDENTIFIER, $value, 'predefined');
    }

    public function defineInt(string $identifier, int $value) {
        $this->definitions[$identifier] = new Token(Token::NUMBER, "$value", 'predefined');
    }

    public function defineFloat(string $identifier, float $value) {
        $this->definitions[$identifier] = new Token(Token::NUMBER, "$value", 'predefined');
    }

    public function defineString(string $identifier, string $value) {
        $this->definitions[$identifier] = new Token(Token::LITERAL, $value, 'predefined');
    }

    public function define(string $identifier, ?Token $token): void {
        $this->definitions[$identifier] = $token;
    }

    public function undefine(string $identifier): void {
        unset($this->definitions[$identifier]);
    }

    public function isDefined(string $identifier): bool {
        return array_key_exists($identifier, $this->definitions);
    }

    public function isCall(string $identifier): bool {
        if (!$this->isDefined($identifier) || null === $this->definitions[$identifier]) {
            return false;
        }
        if ($this->definitions[$identifier]->value === '(') {
            return true;
        }
        return false;
    }

    public function expand(string $identifier): ?Token {
        if (!$this->isDefined($identifier)) {
            return null;
        }
        $def = $this->definitions[$identifier];
        $first = $newToken = new Token(0, '', 'internal');
        while ($def !== null) {
            $newToken = $newToken->next = new Token($def->type, $def->value, $def->file);
            $def = $def->next;
        }
        return Token::skipWhitespace($first->next);
    }

    public function getValue(string $identifier): mixed {
        return $this->evaluate($this->expand($identifier));
    }

    public function evaluate(?Token $expr): Token {
        $expr = Token::skipWhitespace($expr);
        if (empty($expr)) {
            return new Token(Token::NUMBER, '0', 'computed');
        } elseif ($this->count($expr) === 1) {
            // special case
            switch ($expr->type) {
                case Token::IDENTIFIER:
                    if ($this->isDefined($expr->value)) {
                        return $this->evaluate($this->definitions[$expr->value]);
                    }
                    return new Token(Token::NUMBER, '0', 'computed');
            }
            return $expr;
        }
        list ($result, $expr) = $this->evaluateInternal($expr);
        if ($expr !== null) {
            throw new \LogicException('Syntax error: unknown trailing expr: ' . $expr->value);
        }
        return $result;
    }

    /** @return array{Token, Token|null} */
    public function evaluateInternal(?Token $expr, bool $single = false): array {
        if ($expr === null) {
            return [new Token(Token::NUMBER, '0', 'computed'), null];
        }
        $negate = false;
restart:
        $expr = Token::skipWhitespace($expr);
        if ($expr === null) {
            throw new \LogicException("Unexpected end of line, expecting value after operator");
        }
        if ($expr->type === Token::PUNCTUATOR && $expr->value === '(') {
            list ($result, $expr) = $this->evaluateInternal($expr->next);
            if ($expr === null) {
                throw new \LogicException('Syntax error, missing )');
            } elseif ($expr->type !== Token::PUNCTUATOR || $expr->value !== ')') {
                throw new \LogicException('Syntax error, ) expected, found ' . $expr->value);
            }
            $expr = Token::skipWhitespace($expr->next);
        } elseif ($expr->type === Token::IDENTIFIER && $expr->value === 'defined') {
            $expr = Token::skipWhitespace($expr->next);
            if ($expr === null) {
                throw new \LogicException("Syntax Error for #defined expression: not enough tokens");
            }
            if ($expr->type === Token::PUNCTUATOR && $expr->value === '(') {
                $id = Token::skipWhitespace($expr->next);
                if ($id === null || $id->type !== Token::IDENTIFIER) {
                    throw new \LogicException("Syntax Error for defined(identifier) expression: identifier not found");
                }
                $expr = Token::skipWhitespace($id->next);
                if ($expr === null || $expr->type !== Token::PUNCTUATOR && $expr->value !== ')') {
                    throw new \LogicException("Syntax Error for defined(identifier) expression: ) not found");
                }
                $result = new Token(Token::NUMBER, $this->isDefined($id->value) ? '1' : '0', 'computed');
                $expr = Token::skipWhitespace($expr->next);
            } elseif ($expr->type === Token::IDENTIFIER) {
                $result = new Token(Token::NUMBER, $this->isDefined($expr->value) ? '1' : '0', 'computed');
                $expr = Token::skipWhitespace($expr->next);
            } else {
                throw new \LogicException("Syntax Error for #defined expression, expecting ( or IDENTIFIER, found " . $expr->value);
            }
        } elseif ($expr->type === Token::IDENTIFIER && $expr->value === '__has_include') {
            $expr = Token::skipWhitespace($expr->next);
            if ($expr === null) {
                throw new \LogicException("Syntax Error for __has_include() expression: not enough tokens");
            }
            if ($expr->type === Token::PUNCTUATOR && $expr->value === '(') {
                $expr = Token::skipWhitespace($expr->next);
                if ($expr->type === Token::LITERAL) {
                    $file = $expr->value;
                } elseif ($expr->type === Token::PUNCTUATOR && $expr->value === '<') {
                    // handle <> include:
                    $file = '';
                    while (!empty($expr->next)) {
                        $expr = $expr->next;
                        if ($expr->type === Token::PUNCTUATOR && $expr->value === '>') {
                            break;
                        }
                        $file .= $expr->value;
                    }
                } else {
                    throw new \LogicException("Syntax Error for __has_include() expression, expecting < or LITERAL, found " . $expr->value);
                }
                $expr = Token::skipWhitespace($expr->next);
                if ($expr === null || $expr->type !== Token::PUNCTUATOR && $expr->value !== ')') {
                    throw new \LogicException("Syntax Error for __has_include() expression: ) not found");
                }
                $contextDir = dirname($expr->file);
                $result = new Token(Token::NUMBER, $this->findHeaderFile($file, $contextDir, $expr->file, false) !== null ? '1' : '0', 'computed');
                $expr = Token::skipWhitespace($expr->next);
            } else {
                throw new \LogicException("Syntax Error for #__has_include expression, expecting (, found " . $expr->value);
            }
        } elseif ($expr->type === Token::IDENTIFIER) {
            $next = Token::skipWhitespace($expr->next);
            if ($this->isDefined($expr->value)) {
                if ($next !== null && $next->value === '(') {
                    // This is a call!!!
                    $toCall = $expr->value;
                    $expr = $next->next;
                    $args = [];
                    while ($expr !== null && $expr->value !== ')') {
                        list ($arg, $expr) = $this->evaluateInternal($expr, false);
                        $args[] = $arg;
                        if ($expr !== null && $expr->value === ',') {
                            $expr = Token::skipWhitespace($expr->next);
                        }
                    }
                    if ($expr === null) {
                        throw new \LogicException('Unexpected end of line, expected ) to close call');
                    }
                    $result = Token::skipWhitespace($this->doCall($toCall, ...$args));
                } else {
                    $result = Token::skipWhitespace($this->expand($expr->value));
                }
                if ($result === null) {
                    $expr = $next;
                } else {
                    $result->tail()->next = $expr->next;
                    $expr = $result;
                }
                goto restart;
            } else {
                $result = new Token(Token::IDENTIFIER, $expr->value, 'computed');
                $expr = Token::skipWhitespace($expr->next);
            }
        } elseif ($expr->type === Token::PUNCTUATOR && $expr->value === '!' && ($expr->next === null || $expr->next->value !== '=')) {
            $negate = true;
            $expr = Token::skipWhitespace($expr->next);
            goto restart;
        } elseif ($expr->type === Token::NUMBER) {
            $result = new Token(Token::NUMBER, $expr->value, 'computed');
            $expr = Token::skipWhitespace($expr->next);
        } else {
            var_dump($expr);
            throw new \LogicException('Unknown operator ' . $expr->value);
        }
        if ($negate) {
            if ($result->type === Token::NUMBER) {
                $result = new Token(Token::NUMBER, $result->value === '0' ? '1' : '0', 'computed');
            } else {
                throw new \LogicException('Unknown how to negate result type: ' . $result->value);
            }
        }

        if ($single) {
            return [$result, $expr];
        }
result:
        if (is_null($expr)) {
            return [$result, null];
        }
        if (is_null($result)) {
            // Since there's more, default null to 0
            $result = new Token(Token::NUMBER, '0', 'computed');
        }
        if ($expr->value === '|' && $expr->next !== null && $expr->next->value === '|') {
            // OR combinator
            $expr = Token::skipWhitespace($expr->next->next);
            list ($right, $expr) = $this->evaluateInternal($expr);
            if ($result->type === Token::NUMBER && $result->value !== '0') {
                // don't care about right
                goto result;
            } else {
                $result = $right;
                goto result;
            }
        } elseif ($expr->value === '&' && $expr->next !== null && $expr->next->value === '&') {
            // AND combinator
            $expr = Token::skipWhitespace($expr->next->next);
            list ($right, $expr) = $this->evaluateInternal($expr);
            if ($result->type === Token::NUMBER && $result->value === '0') {
                // don't care about right
                goto result;
            } else {
                $result = $right;
                goto result;
            }
        } elseif ($expr->value === ',') {
            // , is used in args lists, and are parsed recursively
            return [$result, $expr];
        } elseif ($expr->value === ')') {
            // () are handled recursively, try returning
            return [$result, $expr];
        } elseif ($expr->value === '>') {
            if ($expr->next !== null && $expr->next->value === '=') {
                // >=
                list ($right, $expr) = $this->evaluateInternal($expr->next->next, true);
                $result = new Token(Token::NUMBER, $this->normalize($result) >= $this->normalize($right) ? '1' : '0', 'computed');
                goto result;
            }
            if ($expr->next !== null && $expr->next->value === '>') {
                // >>
                list ($right, $expr) = $this->evaluateInternal($expr->next->next, true);
                $result = new Token(Token::NUMBER, (string) ($this->normalize($result) >> $this->normalize($right)), 'computed');
                goto result;
            }
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, $this->normalize($result) > $this->normalize($right) ? '1' : '0', 'computed');
            goto result;
        } elseif ($expr->value === '<') {
            if ($expr->next !== null && $expr->next->value === '=') {
                // >=
                list ($right, $expr) = $this->evaluateInternal($expr->next->next, true);
                $result = new Token(Token::NUMBER, $this->normalize($result) <= $this->normalize($right) ? '1' : '0', 'computed');
                goto result;
            }
            if ($expr->next !== null && $expr->next->value === '<') {
                // <<
                list ($right, $expr) = $this->evaluateInternal($expr->next->next, true);
                $result = new Token(Token::NUMBER, (string) ($this->normalize($result) << $this->normalize($right)), 'computed');
                goto result;
            }
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, $this->normalize($result) < $this->normalize($right) ? '1' : '0', 'computed');
            goto result;
        } elseif ($expr->value === '=' && $expr->next !== null && $expr->next->value === '=') {
            list ($right, $expr) = $this->evaluateInternal($expr->next->next, true);
            $result = new Token(Token::NUMBER, $this->normalize($result) === $this->normalize($right) ? '1' : '0', 'computed');
            goto result;
        } elseif ($expr->value === '!' && $expr->next !== null && $expr->next->value === '=') {
            list ($right, $expr) = $this->evaluateInternal($expr->next->next, true);
            $result = new Token(Token::NUMBER, $this->normalize($result) === $this->normalize($right) ? '0' : '1', 'computed');
            goto result;
        } elseif ($expr->value === '-') {
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, (string) ($this->normalize($result) - $this->normalize($right)), 'computed');
            goto result;
        } elseif ($expr->value === '+') {
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, (string) ($this->normalize($result) + $this->normalize($right)), 'computed');
            goto result;
        } elseif ($expr->value === '*') {
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, (string) ($this->normalize($result) * $this->normalize($right)), 'computed');
            goto result;
        } elseif ($expr->value === '/') {
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, (string) ($this->normalize($result) / $this->normalize($right)), 'computed');
            goto result;
        } elseif ($expr->value === '?') {
            // Ternary
            list ($if, $expr) = $this->evaluateInternal($expr->next, false);
            if ($expr === null || $expr->value !== ':' || $expr->next === null) {
                throw new \LogicException('Syntax Error: expecting ": EXPR" in ternary expression');
            }
            list ($else, $expr) = $this->evaluateInternal($expr->next, true);
            $result = $this->normalize($result) === 0 ? $else : $if;
            goto result;
        } elseif ($expr->value === ':') {
            // assume part of ternary, these are handled recursively, try returning
            return [$result, $expr];
        } elseif ($expr->type === Token::LITERAL) {
            // check prior operator
            if ($result->type === Token::IDENTIFIER && $result->value === 'L') {
                $result = new Token(Token::NUMBER, (string) ord($expr->value), 'computed');
                $expr = Token::skipWhitespace($expr->next);
                goto result;
            }
            // fallthrough intentional
        }
        var_dump($expr);
        throw new \LogicException("Unknown token to evaluate: {$expr->type} with value " . var_export($expr->value, true) . " in {$expr->file}");
    }

    private function count(?Token $expr): int {
        $count = 0;
        while (!empty($expr)) {
            $count++;
            $expr = Token::skipWhitespace($expr->next);
        }
        return $count;
    }

    private function normalize(Token $expr): int {
        if ($expr->type !== Token::NUMBER) {
            return 0;
        }
        $str = $expr->value;
        $result = 0;
        $length = strlen($str);
        $base = 10;
        $idx = 0;
        $negate = false;
        $values = [
            '0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8,
            '9' => 9, 'a' => 10, 'A' => 10, 'b' => 11, 'B' => 11, 'c' => 12, 'C' => 12, 'd' => 13,
            'D' => 13, 'e' => 14, 'E' => 14, 'f' => 15, 'F' => 15
        ];
        if ($length > 1 && $str[0] === '0') {
            $base = 8;
            $idx = 1;
        }
        if ($length > 2 && $str[0] === '0' && ($str[1] === 'x' || $str[1] === 'X')) {
            $base = 16;
            $idx = 2;
        }
        while ($idx < $length) {
            if (isset($values[$str[$idx]])) {
                $chr = $values[$str[$idx]];
                if ($chr >= $base) {
                    throw new \LogicException("Base mismatch for {$str}, found $chr for $idx");
                }
                $result = ($result * $base) + $chr;
            } elseif ($str[$idx] === 'U') {
                // unsigned number, let's not touch it
            } elseif ($str[$idx] === 'L') {
                // indicates number is a long, return as is
                if ($idx + 1 !== $length) {
                    throw new \LogicException('Trailing characters after type indicator: ' . $str);
                }
            } elseif ($str[$idx] === '-') {
                $negate = !$negate;
            } else {
                throw new \LogicException("Unknown number token provided in '$str' " . $str[$idx]);
            }
            $idx++;
        }
        if ($negate) {
            return -1 * $result;
        }
        return $result;
    }

    public function doCall(string $toCall, ?Token ...$args): Token {
        $token = $this->expand($toCall);
        if ($token === null) {
            return new Token(Token::NUMBER, '0', 'computed');
        }
        $argMap = [];
        $argIdx = 0;
        if ($token->value === '(') {
            $token = Token::skipWhitespace($token->next);
            $isVariadic = false;
            while ($token !== null && $token->value !== ')') {
                if ($isVariadic) {
                    throw new \LogicException('Unexpected token found, expecting ) after ... found ' . $token->value);
                }
                if ($token->type === Token::PUNCTUATOR && $token->value === "...") {
                    $isVariadic = true;
                    if (isset($args[$argIdx])) {
                        $argMap["__VA_ARGS__"] = $variadic = $args[$argIdx++];
                        while (isset($args[$argIdx])) {
                            while ($variadic->next) {
                                $variadic = $variadic->next;
                            }
                            $variadic->next = new Token(Token::PUNCTUATOR, ',', 'computed');
                            $variadic = $variadic->next;
                            $variadic->next = $args[$argIdx++];
                        }
                    } else {
                        $argMap["__VA_ARGS__"] = new Token(Token::OTHER, '', 'computed');
                    }
                    $token = Token::skipWhitespace($token->next);
                    continue;
                }

                if ($token->type !== Token::IDENTIFIER) {
                    throw new \LogicException('Unexpected argument found, expecting IDENTIFIER found ' . $token->value);
                } elseif (!array_key_exists($argIdx, $args)) {
                    var_dump($args);
                    throw new \LogicException("Unexpected argument count, $toCall expects at least " . ($argIdx + 1) . " arguments, " . count($args) . " found");
                }
                $argMap[$token->value] = $args[$argIdx++];
                $token = Token::skipWhitespace($token->next);
                if ($token !== null && $token->value === ',') {
                    $token = Token::skipWhitespace($token->next);
                }
            }
            if ($token === null) {
                throw new \LogicException('Unexpected end of definition for ' . $toCall . ', expecting )');
            }
            $token = $token->next;
        }
        if ($token === null) {
            return new Token(Token::OTHER, '', 'computed');
        }
        // Copy token stream
        $lastNonWhitespaceToken = $first = $newToken = new Token(0, '', 'internal');
        while ($token !== null) {
            if ($token->type === Token::PUNCTUATOR && $token->value === '#') {
                $nextToken = Token::skipWhitespace($token->next);
                if ($nextToken && $nextToken->type === Token::IDENTIFIER && array_key_exists($nextToken->value, $argMap)) {
                    $arg = $argMap[$nextToken->value];
                    $toAdd = $toAddNext = new Token(Token::OTHER, '', 'computed');
                    while ($arg !== null) {
                        $toAddNext = $toAddNext->next = new Token(Token::LITERAL, $arg->value, $arg->file);
                        $arg = $arg->next;
                    }
                    $newToken->next = $toAdd->next ?? $toAdd;
                    $newToken = $newToken->tail();
                    $lastNonWhitespaceToken = $newToken;
                    $token = $nextToken;
                    goto nexttoken;
                }
            }
            if ($token->type === Token::PUNCTUATOR && $token->value === '##') {
                $newToken = $lastNonWhitespaceToken;
                $token = Token::skipWhitespace($token->next);
                if (($lastNonWhitespaceToken->type !== Token::IDENTIFIER && $lastNonWhitespaceToken->type !== Token::PUNCTUATOR && $lastNonWhitespaceToken->type !== Token::LITERAL && $lastNonWhitespaceToken->type !== Token::NUMBER)
                 || ($token->type !== Token::IDENTIFIER && $token->type !== Token::PUNCTUATOR && $token->type !== Token::LITERAL && $token->type !== Token::NUMBER)) {
                    continue;
                }
                $toAdd = null;
                $checkToken = $token;
                if ($token->type === Token::IDENTIFIER && array_key_exists($token->value, $argMap)) {
                    $arg = $argMap[$token->value];
                    $toAdd = $toAddNext = new Token(Token::OTHER, '', 'computed');
                    while ($arg !== null && ($arg->type === Token::WHITESPACE || $arg->value === '')) {
                        $arg = $arg->next;
                    }
                    while ($arg !== null) {
                        $toAddNext = $toAddNext->next = new Token($arg->type, $arg->value, $arg->file);
                        $arg = $arg->next;
                    }
                    $toAdd = $toAdd->next;
                    if (!$toAdd) {
                        goto nexttoken;
                    }
                    $checkToken = $toAdd;
                }
                if ($checkToken->type !== $newToken->type) {
                    if ($checkToken->type === Token::NUMBER && $newToken->type === Token::IDENTIFIER) {
                        $newToken->type = Token::IDENTIFIER;
                    } elseif ($checkToken->type !== Token::IDENTIFIER || $newToken->type !== Token::NUMBER) {
                        continue;
                    }
                }
                $newToken->value .= $checkToken->value;
                if ($toAdd) {
                    $newToken->next = $toAdd->next;
                    while ($newToken->next) {
                        $newToken = $newToken->next;
                        if ($newToken->type !== Token::WHITESPACE && ($newToken->type !== Token::OTHER || $newToken->value !== '')) {
                            $lastNonWhitespaceToken = $newToken;
                        }
                    }
                }
                goto nexttoken;
            }
            // handle , ##__VA_ARGS__
            if ($token->type === Token::PUNCTUATOR && $token->value === ',') {
                $nextToken = Token::skipWhitespace($token->next);
                if ($nextToken && $nextToken->type === Token::PUNCTUATOR && $nextToken->value === '##') {
                    if (\count($argMap) > $argIdx) {
                        // preserve the comma
                        $newToken = $newToken->next = new Token($token->type, $token->value, $token->file);
                    }
                    $nextToken = Token::skipWhitespace($nextToken->next);
                    if ($nextToken && $nextToken->type === Token::IDENTIFIER && array_key_exists($nextToken->value, $argMap)) {
                        $token = $nextToken;
                    }
                }
            }
            if ($token->type === Token::IDENTIFIER && array_key_exists($token->value, $argMap)) {
                $arg = $argMap[$token->value];
                $toAdd = $toAddNext = new Token(Token::OTHER, '', 'computed');
                while ($arg !== null) {
                    $toAddNext = $toAddNext->next = new Token($arg->type, $arg->value, $arg->file);
                    if ($toAddNext->type !== Token::WHITESPACE && ($toAddNext->type !== Token::OTHER || $toAddNext->value !== '')) {
                        $lastNonWhitespaceToken = $toAddNext;
                    }
                    $arg = $arg->next;
                }
                $newToken->next = $toAdd->next ?? $toAdd;
                $newToken = $newToken->tail();
                goto nexttoken;
            } else {
                $newToken->next = new Token($token->type, $token->value, $token->file);
                if ($token->type !== Token::WHITESPACE && ($token->type !== Token::OTHER || $token->value !== '')) {
                    $lastNonWhitespaceToken = $newToken->next;
                }
            }
            $newToken = $newToken->next;
nexttoken:
            $token = $token->next;
        }
        return $first->next;
    }

}
