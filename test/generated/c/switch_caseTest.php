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
class switch_caseTest extends TestCase {

    const EXPECTED = 'int main() {
  int value = 2;
  int result = 0;
  switch (value) {
    (result = 10);
    break;
    (result = 20);
    break;
    (result = 30);
    break;
    (result = (- 1));
    break;
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
     * @textdox Switch and case statements
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/switch_caseTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}