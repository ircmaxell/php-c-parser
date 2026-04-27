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
class function_callsTest extends TestCase {

    const EXPECTED = 'void foo(int a) {
}

int main() {
  int a;
  (a = foo(0));
  int b;
  (b = foo(1, 2));
  int c;
  (c = foo(foo(0), 1));
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
     * @textdox Function calls
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/function_callsTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}