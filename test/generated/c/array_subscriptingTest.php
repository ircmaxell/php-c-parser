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
class array_subscriptingTest extends TestCase {

    const EXPECTED = 'int main() {
  int a[10];
  int b;
  (b = (a)[0]);
  int c;
  (c = (a)[5]);
  int d;
  (d = (a)[(a)[1]]);
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
     * @textdox Array subscripting
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/array_subscriptingTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}