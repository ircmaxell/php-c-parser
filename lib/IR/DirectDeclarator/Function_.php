<?php declare(strict_types=1);

namespace PHPCParser\IR\DirectDeclarator;

use PHPCParser\IR\DirectDeclarator;

class Function_ extends DirectDeclarator
{
    public DirectDeclarator $name;
    /** @var \PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl\ParamVarDecl[] */
    public array $params;
    public bool $isVariadic;

    /** @var \PHPCParser\Node\Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl\ParamVarDecl[] */
    public function __construct(DirectDeclarator $name, array $params, bool $isVariadic, array $attributes = []) {
        parent::__construct($attributes);
        $this->name = $name;
        $this->params = $params;
        $this->isVariadic = $isVariadic;
    }
}
