<?php declare(strict_types=1);
namespace PHPCParser\Test\dump;
use PHPCParser\CParser;
use PHPCParser\Printer;
use PHPCParser\Printer\Dumper;
use PHPCParser\Printer\C;
use PHPUnit\Framework\TestCase;

/**
 * Note: this is a generated file, do not edit this!!!
 */
class bare_function_typedefTest extends TestCase {

    const EXPECTED = 'TranslationUnitDecl
  declarations: [
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "func_def"
      type: Type_ParenType
          parent: Type_FunctionType_FunctionProtoType
              return: Type_PointerType
                  parent: Type_BuiltinType
                      name: "void"
              params: [
                Type_PointerType
                  parent: Type_BuiltinType
                      name: "int"
              ]
              paramNames: [
                arg
              ]
              isVariadic: false
              attributeList: [
              ]
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "func_alias"
      type: Type_TypedefType
          name: "func_def"
    Decl_NamedDecl_ValueDecl_DeclaratorDecl_FunctionDecl
      name: "foo"
      type: Type_ExplicitAttributedType
          parent: Type_TypedefType
              name: "func_alias"
          kind: 2
      stmts: null
      declaratorAsm: null
  ]';

    protected CParser $parser;
    protected Printer $printer;

    public function setUp(): void {
        $this->parser = new CParser;
        $this->parser->addSearchPath(__DIR__);
        $this->parser->addSearchPath(__DIR__ . '/../../include');
        $this->printer = new Dumper;
    }

    /**
     * @textdox Test parsing of bare function typedefs being resolved to function decls
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/bare_function_typedefTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}