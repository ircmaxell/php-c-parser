<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\Asm;
use PHPCParser\Node\Stmt;

class AsmStmt extends Stmt
{

    const VOLATILE = 0x1;
    const GOTO = 0x2;

    public string $asm;
    public Asm\Operands $outputOperands;
    public Asm\Operands $inputOperands;
    public Asm\Registers $registers;
    public Asm\GotoLabels $gotoLabels;
    public int $modifiers = 0;

    public function __construct(string $asm, Asm\Operands $outputOperands, Asm\Operands $inputOperands, Asm\Registers $registers, Asm\GotoLabels $gotoLabels, array $attributes = []) {
        parent::__construct($attributes);
        $this->asm = $asm;
        $this->outputOperands = $outputOperands;
        $this->inputOperands = $inputOperands;
        $this->registers = $registers;
        $this->gotoLabels = $gotoLabels;
    }

    public function getSubNodeNames(): array {
        return array_merge(parent::getSubNodeNames(), ['asm', 'outputOperands', 'inputOperands', 'registers', 'gotoLabels', 'modifiers']);
    }
}