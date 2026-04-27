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
class bitwise_operatorsTest extends TestCase {

    const EXPECTED = 'int main() {
  int a = 0xFF;
  int b = 0x0F;
  int c = (a & b);
  int d = (a | b);
  int e = (a ^ b);
  int f = (~ a);
  int g = ((! a) & b);
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
     * @textdox Bitwise operators (AND, OR, XOR, NOT)
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/bitwise_operatorsTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}