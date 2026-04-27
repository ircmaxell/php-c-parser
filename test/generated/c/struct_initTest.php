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
class struct_initTest extends TestCase {

    const EXPECTED = 'struct Point {
  int x;
  int y;
};
int main() {
  struct Point p = {0, 0};
  struct Point arr[3] = {{1, 2}, {3, 4}, {5, 6}};
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
     * @textdox Struct with initialization
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/struct_initTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}