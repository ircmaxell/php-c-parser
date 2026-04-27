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
class continue_stmtTest extends TestCase {

    const EXPECTED = 'int main() {
  int i;
  int sum = 0;
  for ((i = 0); (i < 10); (i++)) {
    if (((i % 2) == 0)) {
      continue;
    }

    (sum = (sum + i));
  }

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
     * @textdox Continue statement in loop
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/continue_stmtTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}