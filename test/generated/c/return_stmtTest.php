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
class return_stmtTest extends TestCase {

    const EXPECTED = 'void doNothing() {
  return;
}

int getValue() {
  int x = 42;
  return x;
}

int main() {
  int result = getValue();
  doNothing();
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
     * @textdox Return statement with and without values
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/return_stmtTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}