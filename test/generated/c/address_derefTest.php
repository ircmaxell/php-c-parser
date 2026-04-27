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
class address_derefTest extends TestCase {

    const EXPECTED = 'void increment(int *p) {
  ((* p) = ((* p) + 1));
}

int main() {
  int a = 10;
  int *ptr = (& a);
  increment(ptr);
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
     * @textdox Address-of and dereference unary operators
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/address_derefTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}