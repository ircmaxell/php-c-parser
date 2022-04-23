<?php declare(strict_types=1);
namespace PHPCParser\Printer;

use PHPCParser\Printer;
use PHPCParser\Node;
use PHPCParser\Node\TranslationUnitDecl;


class Dumper implements Printer
{

    public function print(TranslationUnitDecl $node): string {
        return $this->printNode($node, 0);
    }

    /** @param Node[] $nodes */
    public function printNodes(array $nodes, int $level): string {
        $result = '';
        foreach ($nodes as $node) {
            $result .= str_repeat('  ', $level);
            if ($node instanceof Node) {
                $result .= $this->printNode($node, $level);
            } elseif (is_string($node)) {
                $result .= $node . "\n";
            }
        }
        return $result;
    }

    public function printNode(Node $node, int $level): string {
        $result = $node->getType() . "\n";
        foreach ($node->getSubnodeNames() as $name) {
            $result .= str_repeat('  ', $level + 1) . $name . ': ';
            $subNode = $node->$name;
            if ($subNode === null) {
                $result .= "null\n";
            } elseif ($subNode instanceof Node) {
                $result .= $this->printNode($subNode, $level + 2);
            } elseif (is_string($subNode)) {
                $result .= '"' . $subNode . "\"\n";
            } elseif (is_array($subNode)) {
                $result .= "[\n";
                $result .= $this->printNodes($subNode, $level + 2);
                $result .= str_repeat('  ', $level + 1) . "]\n";
            } elseif (is_int($subNode)) {
                $result .= $subNode . "\n";
            } elseif (is_bool($subNode)) {
                $result .= ($subNode ? 'true' : 'false') . "\n";
            } else {
                throw new \LogicException("Unknown subnode type encountered: " . gettype($subNode));
            }
        }
        return $result;
    }

}