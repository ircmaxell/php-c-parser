<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt;

use PHPCParser\Node\Asm\Operands;
use PHPCParser\Node\Asm\Registers;
use PHPCParser\Node\Stmt;

class AsmStmt extends Stmt
{

    const VOLATILE = 0x1;
    const GOTO = 0x2;

    public string $asm;
    public Operands $outputOperands;
    public Operands $inputOperands;
    public Registers $registers;
    public int $modifiers = 0;

    public function __construct(string $asm, Operands $outputOperands, Operands $inputOperands, Registers $registers, array $attributes = []) {
        parent::__construct($attributes);
        $this->asm = $asm;
        $this->outputOperands = $outputOperands;
        $this->inputOperands = $inputOperands;
        $this->registers = $registers;
    }

    public function getSubNodeNames(): array {
        return ['asm', 'outputOperands', 'inputOperands', 'registers', 'modifiers'];
    }
}