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
class preprocessor_x_macroTest extends TestCase {

    const EXPECTED = 'enum AST {
  ZEND_AST_BINARY_OP,
};
static int *zend_ast_create_binary_op(int opcode, int *op0, int *op1) {
  return zend_ast_create_ex_2(ZEND_AST_BINARY_OP, opcode, op0, op1);
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
     * @textdox Test for nested expansion with macros
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/preprocessor_x_macroTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}