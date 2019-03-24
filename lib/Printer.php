<?php declare(strict_types=1);
namespace PHPCParser;

class Printer
{
    public function print(array $nodes, int $level = 0): void {
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
                $this->print($subNode, $level + 2);
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