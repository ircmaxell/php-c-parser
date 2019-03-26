<?php declare(strict_types=1);
namespace PHPCParser;

use PHPCParser\Node\TranslationUnitDecl;

interface Printer
{

    public function print(TranslationUnitDecl $node): string;

}