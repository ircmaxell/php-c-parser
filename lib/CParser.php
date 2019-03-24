<?php

namespace PHPCParser;

use PHPCParser\PreProcessor\Context;

class CParser
{

    private Parser $parser;

    public function __construct() {
        $this->parser = new Parser(new Lexer);
    }

    public function parse(string $filename, ?Context $context = null): array {
        // Create the preprocessor every time, since it shouldn't ever share state
        $context = $context ?? new Context;
        $preprocessor = new PreProcessor($context);
        $tokens = $preprocessor->process($filename);
        return $this->parser->parse($tokens);
    }

}