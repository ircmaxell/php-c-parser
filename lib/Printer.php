<?php declare(strict_types=1);
namespace PHPCParser;

use PHPCParser\Node\TranslationUnitDecl;

class Printer
{

    public function print(TranslationUnitDecl $node): void {
        $this->printNode($node, 0);
    }

    public function printNodes(array $nodes, int $level): void {
        foreach ($nodes as $node) {
            echo str_repeat('  ', $level), 
            $this->printNode($node, $level);
        }
    }

    public function printNode(Node $node, int $level): void {
        echo $node->getType(), "\n";
        foreach ($node->getSubnodeNames() as $name) {
            echo str_repeat('  ', $level + 1), $name, ': ';
            $subNode = $node->$name;
            if ($subNode === null) {
                echo "null\n";
            } elseif ($subNode instanceof Node) {
                $this->printNode($subNode, $level + 2);
            } elseif (is_string($subNode)) {
                echo '"', $subNode, "\"\n";
            } elseif (is_array($subNode)) {
                echo "[\n";
                $this->printNodes($subNode, $level + 2);
                echo str_repeat('  ', $level + 1), "]\n";
            } elseif (is_int($subNode)) {
                echo $subNode, "\n";
            } elseif (is_bool($subNode)) {
                echo ($subNode ? 'true' : 'false'), "\n";
            } else {
                throw new \LogicException("Unknown subnode type encountered: " . gettype($subNode));
            }
        }
    }

}