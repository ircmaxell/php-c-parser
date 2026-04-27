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
class goto_labelsTest extends TestCase {

    const EXPECTED = 'int main() {
  int result = 0;
  int i = 0;
  while ((i < 10)) {
    if ((i == 5)) {
      goto end;
    }

    (i = (i + 1));
  }

  (result = i);
  return result;
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
     * @textdox Goto and labeled statements
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/goto_labelsTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}