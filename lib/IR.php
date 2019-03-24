<?php declare(strict_types=1);
namespace PHPCParser;

abstract class IR
{
    
    public array $attributes;
    
    public function __construct(array $attributes = []) {
        $this->attributes = $attributes;
    }
    
}