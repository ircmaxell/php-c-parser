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
class logical_operatorsTest extends TestCase {

    const EXPECTED = 'int main() {
  int a = 0;\\n int b = 0;\\n int c = 0;\\n int d = 0;
  int e = (a && b);
  int f = (a || b);
  int g = (! a);
  int h = ((a && b) || (! c));
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
     * @textdox Logical operators
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/logical_operatorsTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}