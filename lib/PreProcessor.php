<?php

declare(strict_types=1);

namespace PHPCParser;
use PHPCParser\PreProcessor\Token;
use PHPCParser\PreProcessor\Parser;


class PreProcessor {

    private Parser $parser;
    private array $headers = [];
    private Context $context;
    private ?CallStack $callStack = null;
    private ?Token $rerun = null;

    public function __construct(Context $context, Parser $parser = null) {
        $this->parser = $parser ?? new Parser;
        $this->context = $context;
    }

    /** @return Token[] */
    public function process(string $header): array {
        if (empty($header)) {
            throw new \LogicException("Header cannot be empty");
        }

        $result = [];
        $includeStack = [$this->findAndParse($header, '', '')];
        while (!empty($includeStack)) {
            [$file, $lines] = array_pop($includeStack);
            while (!empty($lines)) {
                $line = \reset($lines);
                $lineno = \key($lines);
                unset($lines[$lineno]);
                $line = Token::skipWhitespace($line);
                if (empty($line)) {
                    continue;
                }
                if ($line->type === Token::PUNCTUATOR && $line->value === '#') {
                    $line = Token::skipWhitespace($line->next);
                    if (empty($line)) {
                        continue; // ignore blank preprocessor directives
                    }
                    $directive = $line;
                    $line = Token::skipWhitespace($directive->next);

                    if ($directive->type !== Token::IDENTIFIER) {
                        var_dump($directive, $line);
                        throw new \LogicException("Unknown directive found {$directive->value}");
                    }
                    switch ($directive->value) {
                        case 'include':
                            $includeStack[] = [$file, $lines];
                            [$file, $lines] = $this->resolveInclude($line, $directive->file);
                            break;
                        case 'include_next':
                            $includeStack[] = [$file, $lines];
                            [$file, $lines] = $this->resolveInclude($line, $directive->file, true);
                            break;
                        case 'define':
                            if (empty($line)) {
                                throw new \LogicException("#define must have a name");
                            }
                            $identifier = $line;
                            if ($identifier->type !== Token::IDENTIFIER) {
                                throw new \LogicException("Only #define identifiers");
                            }
                            $this->context->define($identifier->value, $line->next);
                            break;
                        case 'undef':
                            if (empty($line)) {
                                throw new \LogicException("#undef must only have a single argument");
                            }
                            $identifier = $line;
                            if ($identifier->type !== Token::IDENTIFIER) {
                                throw new \LogicException("Undef only works on identifiers");
                            }
                            if (!empty(Token::skipWhitespace($line->next))) {
                                var_dump($directive, $identifier, $line);
                                die("failed parsing undef");
                            }
                            $this->context->undefine($identifier->value);
                            break;
                        case 'if':
                            if (empty($line)) {
                                throw new \LogicException("At least one declaration is required for if");
                            }
                            if (!$this->evaluateIf($line)) {
                                $this->skipIf($lines);
                            }
                            break;
                        case 'ifdef':
                        case 'ifndef':
                            if (empty($line)) {
                                throw new \LogicException("Only a single arg is allowed for #{$directive->value}");
                            }
                            if ($line->type !== Token::IDENTIFIER) {
                                throw new \LogicException("Only an identifier arg is allowed for #{$directive->value}");
                            }
                            $tmp = $this->context->isDefined($line->value);
                            if ($tmp xor $directive->value === 'ifdef') {
                                // skip if they aren't the same boolean value
                                // if value is ifdef, skip if result is false
                                // if value is ifndef, skip if result is true
                                $this->skipIf($lines);
                            }
                            break;
                        case 'else':
                        case 'elif':
                            $this->skipIf($lines, true);
                            break;
                        case 'endif':
                            // ignore
                            break;
                        case 'pragma':
                            if (empty($line)) {
                                throw new \LogicException("At least one declaration is required for pragma");
                            }
                            $pragmaMode = $line;
                            if ($pragmaMode->value === "once") {
                                if (Token::skipWhitespace($pragmaMode->next)) {
                                    throw new \LogicException("pragma once has no further arguments");
                                }
                                $this->headers[$pragmaMode->file] = true;
                            }
                            break;
                        case 'line':
                            // not interesting, ignore
                            break;
                        case 'warning':
                            // ignore
                            break;
                        case 'error':
                            //var_dump($this->context);
                            //var_dump(array_keys($this->context->getDefines()));
                            $this->debug($directive);
                            throw new \LogicException('We reached an error preprocessor token:');
                        default:
                            var_dump($line);
                            var_dump($directive->value);
                            throw new \LogicException("Unknown directive found {$directive->value}");
                    }
                } else {
                    $result[] = $this->expandMacros($file, $lineno, $line);
                }
            }
        }
        if ($this->callStack !== null) {
            throw new \LogicException("Non-empty call stack found");
        }
        return $result;
    }

    private function evaluateIf(?Token $expr): bool {
        $expr = Token::skipWhitespace($expr);
        if ($expr === null) {
            return false;
        }

        $token = $this->context->evaluate($expr);
        if ($token->type === Token::NUMBER && $token->value === '0') {
            return false;
        }
        return true;
    }

    /** @param Token[] $lines */
    private function skipIf(array &$lines, bool $skipAll = false): void {
        while (!empty($lines)) {
            $line = \reset($lines);
            unset($lines[\key($lines)]);
            $line = Token::skipWhitespace($line);
            if (empty($line) || empty($line->next)) {
                continue;
            }
            if ($line->type === Token::PUNCTUATOR && $line->value === '#') {
                $next = Token::skipWhitespace($line->next);
                if ($next !== null && $next->type === Token::IDENTIFIER) {
                    switch ($next->value) {
                        case 'if':
                        case 'ifdef':
                        case 'ifndef':
                            $this->skipIf($lines, true);
                            break;
                        case 'endif':
                            return;
                        case 'elif':
                            if ($skipAll) {
                                break;
                            }
                            $line = Token::skipWhitespace($next->next);
                            if ($this->evaluateIf($line)) {
                                return;
                            }
                            break;
                        case 'else':
                            if ($skipAll) {
                                break;
                            }
                            return;
                        case 'define':
                        case 'include':
                        case 'include_next':
                        case 'pragma': // there are no special pragmas supposed to be in #if's
                        case 'undef':
                        case 'error':
                        case 'warning':
                        case 'message':
                            break;
                        default:
                            throw new \LogicException("Unknown preprocessor directive to skip: " . $next->value);
                    }
                }
            }
        }
    }

    /** @return array{string, Token[]} */
    private function findAndParse(string $header, string $contextDir, string $contextFile, bool $next = false): array {
        $contextDir = rtrim($contextDir, '/');
        $file = $this->findHeaderFile($header, $contextDir, $contextFile, $next);
        if (($this->headers[$file] ?? false) === true) { // has pragma once
            return [$file, []];
        }
        $this->headers[$file] = false;
        $code = file_get_contents($file);
        $lines = $this->parser->parse($file, $code);
        return [$file, $lines];
    }

    /** @return array{string, Token[]} */
    private function resolveInclude(?Token $arg, string $contextFile, bool $next = false): array {
        $contextDir = dirname($contextFile);
        if (empty($arg)) {
            throw new \LogicException("Empty include declaration");
        }
        $type = $arg;
        if ($type->type === Token::LITERAL) {
            $file = $type->value;
            if (Token::skipWhitespace($arg->next)) {
                throw new \LogicException("extra tokens in #include" . ($next ? "_next" : "") . " directive");
            }
            return $this->findAndParse($file, $contextDir, $contextFile, $next);
        } elseif ($type->type === Token::PUNCTUATOR && $type->value === '<' && !empty($arg->next)) {
            // handle <> include:
            $file = '';
            while (!empty($arg->next)) {
                $arg = $arg->next;
                if ($arg->type === Token::PUNCTUATOR && $arg->value === '>') {
                    break;
                }
                $file .= $arg->value;
            }
            if (Token::skipWhitespace($arg->next)) {
                throw new \LogicException("extra tokens in #include" . ($next ? "_next" : "") . " directive");
            }
            // always a system import
            return $this->findAndParse($file, $next ? $contextDir : "", $contextFile, $next);
        }
        var_dump($type, $arg);
        throw new \LogicException("Illegal include directive");
    }

    private function findHeaderFile(string $header, string $contextDir, string $contextFile, bool $next): string {
        if ($headerFile = $this->context->findHeaderFile($header, $contextDir, $contextFile, $next)) {
            return $headerFile;
        }
        var_dump($this->context->headerSearchPaths);
        throw new \LogicException("Could not find header file: $header given context $contextDir (called from $contextFile)");
    }

    private function debug(?Token $token): void {
        echo "T: ";
        if ($token) {
            echo "@{$token->file} :";
        }
        while ($token !== null) {
            echo $token->value . ' ';
            $token = $token->next;
        }
        echo "\n";
    }

    private function isRecursiveExpansionAttempt($token, $value = null) {
        $value ??= $token->value;
        foreach ($token->origin as $origin) {
            if ($value === $origin->value || $this->isRecursiveExpansionAttempt($origin, $value)) {
                return true;
            }
        }
        return false;
    }

    private function expandMacros(string $file, int $lineno, ?Token $expr, int $recurseLevel = 0): ?Token {
        $result = $head = new Token(0, '', 'internal');
        if ($this->callStack !== null) {
            $result = $this->callStack->currentArg->tail();
        } elseif ($this->rerun !== null) {
            $head = $this->rerun;
            $result = $this->rerun->tail();
            $this->rerun = null;
        }
        $rerun = false;
        while ($expr !== null) {
            // prevent token recursion
            if ($expr->type === Token::IDENTIFIER && $this->context->isDefined($expr->value) && !$this->isRecursiveExpansionAttempt($expr)) {
                if ($this->context->isCall($expr->value)) {
                    $next = Token::skipWhitespace($expr->next);
                    if ($next !== null && $next->value === '(') {
                        $this->callStack = new CallStack($expr, $this->callStack);
                        $result = $this->callStack->currentArg;
                        goto next;
                    }
                    // It's not a call, so treat it literally
                    $result = $result->next = clone $expr;
                    $result->next = null;
                    goto next;
                }
                $result->next = $this->context->expand($expr->value);
                for ($cur = $result->next; $cur; $cur = $cur->next) {
                    $cur->origin[] = $expr;
                }
                $rerun = true;
                $result = $result->tail();
                goto next;
            } elseif ($expr->type === Token::IDENTIFIER && ($expr->value === '__FILE__' || $expr->value === '__LINE__')) {
                if ($expr->value === '__LINE__') {
                    $expr->type = Token::NUMBER;
                    $expr->value = (string)$lineno;
                }
                if ($expr->value === '__FILE__') {
                    $expr->type = Token::LITERAL;
                    $expr->value = $file;
                }
            } elseif ($this->callStack !== null && $this->callStack->openCount === 1 && $expr->value === ',') {
                $this->callStack->nextArg();
                $result = $this->callStack->currentArg;
                goto next;
            } elseif ($this->callStack !== null && $expr->value === '(') {
                $this->callStack->openCount++;
                if ($this->callStack->openCount === 1) {
                    // don't emit the call brackets
                    goto next;
                }
            } elseif ($this->callStack !== null && $expr->value === ')') {
                $this->callStack->openCount--;
                if ($this->callStack->openCount === 0) {
                    // execute the call
                    $rerun = true;
                    if ($this->callStack->currentArg->next !== null || !empty($this->callStack->args)) {
                        $this->callStack->nextArg();
                    }
                    $tmp = $this->context->doCall($this->callStack->toCall->value, ...$this->callStack->args);
                    for ($cur = $tmp; $cur; $cur = $cur->next) {
                        $cur->origin[] = $this->callStack->toCall;
                    }
                    $this->callStack = $this->callStack->prior;
                    if (is_null($this->callStack)) {
                        $head->tail()->next = $tmp;
                        $result = $head->tail();
                    } else {
                        $this->callStack->currentArg->tail()->next = $tmp;
                        $result = $this->callStack->currentArg->tail();
                    }
                    goto next;
                }
            } elseif ($this->callStack === null && $expr->value === '##') {
                // perform concatenation
                $next = Token::skipWhitespace($expr->next);
                if ($next === null) {
                    throw new \LogicException("Unknown concat between {$result->value} and null");
                }
                $result->value .= $next->value;
                $expr = Token::skipWhitespace($next->next);
                continue;
            }
            if ($expr->type !== Token::WHITESPACE) {
                $result = $result->next = clone $expr;
                $result->next = null;
            }
next:
            $expr = $expr->next;
        }
        if ($rerun) {
            if ($this->callStack !== null) {
                // enqueue rerun
                $this->rerun = $head;
                return null;
            } elseif ($recurseLevel > 100) {
                throw new \LogicException("Too much recurseLevel in $file:$lineno!!!");
                return $head->next;
            }
            return $this->expandMacros($file, $lineno, $head->next, $recurseLevel + 1);
        }
        return $head->next;
    }


}

class CallStack {
    public Token $toCall;
    public int $openCount = 0;
    /** @var Token[] */
    public array $args = [];
    public Token $currentArg;
    public ?CallStack $prior;

    public function __construct(Token $toCall, ?CallStack $prior) {
        $this->toCall = $toCall;
        $this->prior = $prior;
        $this->currentArg = new Token(0, '', 'internal');
    }

    public function nextArg(): void {
        $this->args[] = $this->currentArg->next;
        $this->currentArg = new Token(0, '', 'internal');
    }
}
