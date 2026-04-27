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
class increment_decrementTest extends TestCase {

    const EXPECTED = 'int main() {
  int a;
  (a = 0);
  int b;
  (b = 0);
  int c;
  (c = 0);
  int d;
  (d = 0);
  (a++);
  (b--);
  (++ c);
  (-- d);
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
     * @textdox Increment and decrement operators
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/increment_decrementTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}