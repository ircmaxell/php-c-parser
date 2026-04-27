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
class sizeof_testTest extends TestCase {

    const EXPECTED = 'struct S {
  int x;
  int y;
};
int main() {
  int a = (sizeof (int));
  int b = (sizeof 3);
  int c = (sizeof (struct S));
  int *ptr;
  int d = (sizeof (int *));
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
     * @textdox sizeof operator
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/sizeof_testTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}