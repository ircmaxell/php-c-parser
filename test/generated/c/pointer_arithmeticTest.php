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
class pointer_arithmeticTest extends TestCase {

    const EXPECTED = 'int main() {
  int a = 42;
  int *ptr = (& a);
  int b = (* ptr);
  int arr[10];
  int *ptr2 = (arr + 1);
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
     * @textdox Pointer arithmetic (address-of, dereference, pointer addition/subtraction)
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/pointer_arithmeticTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}