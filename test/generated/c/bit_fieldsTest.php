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
class bit_fieldsTest extends TestCase {

    const EXPECTED = 'int main() {
  int flags;
  (flags = 0);
  (flags = (flags | (1 << 0)));
  (flags = (flags | (1 << 3)));
  (flags = (flags & (~ (1 << 0))));
  int result;
  (result = (flags & (1 << 3)));
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
     * @textdox Bit field manipulation with bitwise operators
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/bit_fieldsTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}