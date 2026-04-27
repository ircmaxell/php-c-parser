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
class compound_assignmentTest extends TestCase {

    const EXPECTED = 'int main() {
  int a;
  (a = 0);
  int b;
  (b = 0);
  int c;
  (c = 0);
  int d;
  (d = 0);
  int e;
  (e = 0);
  int f;
  (f = 0);
  int g;
  (g = 0);
  int h;
  (h = 0);
  int i;
  (i = 0);
  int j;
  (j = 0);
  int k;
  (k = 0);
  int l;
  (l = 0);
  (a += 1);
  (b -= 1);
  (c *= 2);
  (d /= 2);
  (e %= 3);
  (f <<= 1);
  (g >>= 1);
  (h &= 0xFF);
  (i |= 0x01);
  (j ^= 0xFF);
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
     * @textdox Compound assignment operators
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/compound_assignmentTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}