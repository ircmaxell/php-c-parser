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
class function_pointersTest extends TestCase {

    const EXPECTED = 'typedef void *(*test_func)(int);';

    protected CParser $parser;
    protected Printer $printer;

    public function setUp(): void {
        $this->parser = new CParser;
        $this->parser->addSearchPath(__DIR__);
        $this->printer = new C;
    }

    /**
     * @textdox Test basic parsing of function pointers
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/function_pointersTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}