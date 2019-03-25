<?php

namespace PHPCParser;

use PHPCParser\PreProcessor\Context;
use PHPCParser\Node\TranslationUnitDecl;

class CParser
{

    private Parser $parser;
    private array $headerSearchPaths = [];

    public function __construct() {
        $this->parser = new Parser(new Lexer);
    }

    public function parse(string $filename, ?Context $context = null): TranslationUnitDecl {
        // Create the preprocessor every time, since it shouldn't ever share state
        $context = $context ?? new Context($this->headerSearchPaths);
        $preprocessor = new PreProcessor($context);
        $tokens = $preprocessor->process($filename);
        file_put_contents($filename . '.debug', (new Printer)->printTokens($tokens));
        return $this->parser->parse($tokens);
    }

    public function addSearchPath(string $path) {
        $this->headerSearchPaths[] = rtrim($path, '/');
    }

}