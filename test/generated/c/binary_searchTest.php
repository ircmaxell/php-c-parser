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
class binary_searchTest extends TestCase {

    const EXPECTED = 'int binarySearch(int arr[], int size, int target) {
  int left;
  (left = 0);
  int right;
  (right = (size - 1));
  while ((left <= right)) {
    int mid;
    (mid = ((left + right) / 2));
    if (((arr)[mid] == target)) {
      return mid;
    }
 else if (((arr)[mid] < target)) {
      (left = (mid + 1));
    }
 else {
      (right = (mid - 1));
    }

  }

  return (- 1);
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
     * @textdox Binary search algorithm with for loop and ternary
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/binary_searchTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}