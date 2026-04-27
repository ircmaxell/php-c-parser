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
class ring_bufferTest extends TestCase {

    const EXPECTED = 'typedef struct {
  int data[256];
  int head;
  int tail;
  int count;
} RingBuffer;
void ringInit(RingBuffer *rb) {
  ((rb->head) = 0);
  ((rb->tail) = 0);
  ((rb->count) = 0);
}

int ringPush(RingBuffer *rb, int value) {
  if (((rb->count) == 256)) {
    return (- 1);
  }

  (((rb->data))[(rb->tail)] = value);
  ((rb->tail) = (((rb->tail) + 1) % 256));
  ((rb->count) = ((rb->count) + 1));
  return 0;
}

int ringPop(RingBuffer *rb) {
  if (((rb->count) == 0)) {
    return (- 1);
  }

  int value;
  (value = ((rb->data))[(rb->head)]);
  ((rb->head) = (((rb->head) + 1) % 256));
  ((rb->count) = ((rb->count) - 1));
  return value;
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
     * @textdox Ring buffer implementation with struct, macros, and loop
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/ring_bufferTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}