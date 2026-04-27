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
class member_accessTest extends TestCase {

    const EXPECTED = 'struct Point {
  int x;
  int y;
};
int main() {
  struct Point p;
  int a;
  (a = (p.x));
  int b;
  (b = (p.y));
  struct Point *ptr;
  int c;
  (c = (ptr->x));
  struct Point arr[5];
  int d;
  (d = ((arr)[0].x));
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
     * @textdox Member access (struct dot and arrow)
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/member_accessTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}