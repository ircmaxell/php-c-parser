<?php

namespace PHPCParser;

use PHPCParser\Node\TranslationUnitDecl;

class CParser
{

    private Context $context;
    private Parser $parser;
    private array $headerSearchPaths = [];

    public function __construct() {
        $this->parser = new Parser(new Lexer);
    }

    public function parse(string $filename, ?Context $context = null): TranslationUnitDecl {
        // Create the preprocessor every time, since it shouldn't ever share state
        $this->context = $context ?? new Context($this->headerSearchPaths);
        $preprocessor = new PreProcessor($this->context);
        $tokens = $preprocessor->process($filename);
        return $this->parser->parse($tokens, $this->context);
    }

    public function getLastContext(): Context {
        return $this->context;
    }

    public function addSearchPath(string $path) {
        $this->headerSearchPaths[] = rtrim($path, '/');
    }

}