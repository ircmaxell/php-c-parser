<?php declare(strict_types=1);

namespace PHPCParser\Node;

class TranslationUnitDecl extends DeclContext
{

    public function getType(): string {
        return 'TranslationUnitDecl';
    }

    
}