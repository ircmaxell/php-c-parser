<?php declare(strict_types=1);
namespace PHPCParser;

interface Node
{
    public function getSubNodeNames(): array;
    public function getType(): string;
}