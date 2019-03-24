<?php declare(strict_types=1);

namespace PHPCParser\Node;

class TranslationUnitDecl extends DeclContext
{

    public function __construct(Decl $declaration, array $attributes = []) {
        parent::__construct([$declaration], $attributes);
    }

    public function getType(): string {
        return 'TranslationUnitDecl';
    }

    public function addDecl(Decl $decl): void {
        $this->declarations[] = $decl;
    }
}