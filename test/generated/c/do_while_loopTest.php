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
class do_while_loopTest extends TestCase {

    const EXPECTED = 'int main() {
  int i = 0;
  int sum = 0;
  do {
    (sum = (sum + i));
    (i = (i + 1));
  }
 while ((i < 10));
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
     * @textdox Do-while loop statement
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/do_while_loopTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}