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
class escape_sequencesTest extends TestCase {

    const EXPECTED = 'char a[] = {0, 10, 34, 92, 34, 18, 255};
char *str = "a\'b\\x0a\\"\\\\\\"\\x12\\xff\\x01";';

    protected CParser $parser;
    protected Printer $printer;

    public function setUp(): void {
        $this->parser = new CParser;
        $this->parser->addSearchPath(__DIR__);
        $this->parser->addSearchPath(__DIR__ . '/../../include');
        $this->printer = new C;
    }

    /**
     * @textdox Test escape sequence printing
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/escape_sequencesTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}