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
class basic_mathTest extends TestCase {

    const EXPECTED = 'static long add2(long a, long b) {
  return (a + b);
}

static long add_and_sub(long a, long b) {
  return ((((a + b) + 2) - 1) - b);
}

static long mul_sub(long a, long b) {
  return ((a * b) - 3);
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
     * @textdox Test basic math operations
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/basic_mathTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}