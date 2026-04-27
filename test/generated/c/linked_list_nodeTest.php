<?php declare(strict_types=1);
namespace PHPCParser\Test\c;
use PHPCParser\CParser;
use PHPCParser\Printer;
use PHPCParser\Printer\Dumper;
use PHPCParser\Printer\C;
use PHPUnit\Framework\TestCase;

/**
 * Note: this is a generated file, do not edit this!!!
 */
class linked_list_nodeTest extends TestCase {

    const EXPECTED = 'typedef struct Node {
  int data;
  struct Node *next;
} Node;
Node *createNode(int value) {
  Node *node;
  (node = ((Node *)0));
  if (node) {
    ((node->data) = value);
    ((node->next) = ((Node *)0));
  }

  return node;
}

int sumList(Node *head) {
  int total;
  (total = 0);
  Node *current;
  (current = head);
  while (current) {
    (total = (total + (current->data)));
    (current = (current->next));
  }

  return total;
}';

    protected CParser $parser;
    protected Printer $printer;

    public function setUp(): void {
        $this->parser = new CParser;
        $this->parser->addSearchPath(__DIR__);
        $this->parser->addSearchPath(__DIR__ . '/../../include');
        $this->printer = new C;
    }

    /**
     * @textdox Linked list node struct with typedef and pointer arithmetic
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/linked_list_nodeTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}