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
class cast_expressionsTest extends TestCase {

    const EXPECTED = 'int main() {
  int a;
  (a = ((int)3.14));
  double b;
  (b = ((double)42));
  int *c;
  (c = ((int *)0));
  int d;
  (d = ((int)(3 + 4)));
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
     * @textdox Cast expressions
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/cast_expressionsTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}