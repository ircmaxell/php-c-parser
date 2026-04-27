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
class ternary_operatorTest extends TestCase {

    const EXPECTED = 'int main() {
  int a = (1 ? 2 : 3);
  int b = ((a > 0) ? 10 : 20);
  int c = ((a > 0) ? ((b > 0) ? 1 : 2) : 3);
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
     * @textdox Ternary (conditional) operator
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/ternary_operatorTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}