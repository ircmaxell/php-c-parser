<?php declare(strict_types=1);

namespace PHPCParser\Node;

use PHPCParser\NodeAbstract;

abstract class Decl extends NodeAbstract
{
    const KIND_TYPEDEF      = 0b0000000000001;
    const KIND_EXTERN       = 0b0000000000010;
    const KIND_STATIC       = 0b0000000000100;
    const KIND_THREAD_LOCAL = 0b0000000001000;
    const KIND_AUTO         = 0b0000000010000;
    const KIND_REGISTER     = 0b0000000100000;

    const KIND_CONST        = 0b0000001000000;
    const KIND_RESTRICT     = 0b0000010000000;
    const KIND_VOLATILE     = 0b0000100000000;
    const KIND_ATOMIC       = 0b0001000000000;

    const KIND_INLINE       = 0b0010000000000;
    const KIND_NORETURN     = 0b0100000000000;
}
