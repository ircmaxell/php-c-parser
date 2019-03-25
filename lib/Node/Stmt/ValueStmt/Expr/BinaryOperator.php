<?php declare(strict_types=1);

namespace PHPCParser\Node\Stmt\ValueStmt\Expr;

use PHPCParser\Node\Stmt\ValueStmt\Expr;

class BinaryOperator extends Expr
{

    const KIND_ADD         = 0b0000001;
    const KIND_SUB         = 0b0000010;
    const KIND_MUL         = 0b0000011;
    const KIND_DIV         = 0b0000100;
    const KIND_REM         = 0b0000101;
    const KIND_SHL         = 0b0000110;
    const KIND_SHR         = 0b0000111;
    const KIND_LT          = 0b0001000;
    const KIND_GT          = 0b0001001;
    const KIND_LE          = 0b0001010;
    const KIND_GE          = 0b0001011;
    const KIND_EQ          = 0b0001100;
    const KIND_NE          = 0b0001101;
    const KIND_BITWISE_AND = 0b0001110;
    const KIND_BITWISE_XOR = 0b0001111;
    const KIND_BITWISE_OR  = 0b0010000;
    const KIND_LOGICAL_AND = 0b0010001;
    const KIND_LOGICAL_OR  = 0b0010010;
    const KIND_COMMA       = 0b0010011;

    const KIND_ASSIGN      = 0b1100000;

    const KIND_MUL_ASSIGN  = self::KIND_ASSIGN | self::KIND_MUL; 
    const KIND_DIV_ASSIGN  = self::KIND_ASSIGN | self::KIND_DIV;
    const KIND_REM_ASSIGN  = self::KIND_ASSIGN | self::KIND_REM;
    const KIND_ADD_ASSIGN  = self::KIND_ASSIGN | self::KIND_ADD;
    const KIND_SUB_ASSIGN  = self::KIND_ASSIGN | self::KIND_SUB;
    const KIND_SHL_ASSIGN  = self::KIND_ASSIGN | self::KIND_SHL;
    const KIND_SHR_ASSIGN  = self::KIND_ASSIGN | self::KIND_SHR;
    const KIND_AND_ASSIGN  = self::KIND_ASSIGN | self::KIND_BITWISE_AND;
    const KIND_XOR_ASSIGN  = self::KIND_ASSIGN | self::KIND_BITWISE_XOR;
    const KIND_OR_ASSIGN   = self::KIND_ASSIGN | self::KIND_BITWISE_OR;

    public Expr $left;
    public Expr $right;

    public function __construct(Expr $left, Expr $right, int $kind, array $attributes = []) {
        parent::__construct($attributes);
        $this->left = $left;
        $this->right = $right;
        $this->kind = $kind;
    }

    public function getSubNodeNames(): array {
        return ['left', 'right', 'kind'];
    }

    public function isConstant(): bool {
        return $this->left->isConstant() && $this->right->isConstant();
    }

}