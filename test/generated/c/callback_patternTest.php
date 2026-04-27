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
class callback_patternTest extends TestCase {

    const EXPECTED = 'typedef int (*CompareFunc)(void *, void *);
int bubbleSort(int arr[], int size, CompareFunc cmp) {
  int i;
  (i = 0);
  while ((i < (size - 1))) {
    int j;
    (j = 0);
    while ((j < ((size - i) - 1))) {
      if ((cmp((& (arr)[j]), (& (arr)[(j + 1)])) > 0)) {
        int temp;
        (temp = (arr)[j]);
        ((arr)[j] = (arr)[(j + 1)]);
        ((arr)[(j + 1)] = temp);
      }

      (j = (j + 1));
    }

    (i = (i + 1));
  }

  return 0;
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
     * @textdox Function pointer callback pattern with typedef
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/callback_patternTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}