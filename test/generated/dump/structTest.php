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
class structTest extends TestCase {

    const EXPECTED = 'TranslationUnitDecl
  declarations: [
    Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl
      kind: 1
      name: "foo"
      fields: [
        Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
          name: "x"
          type: Type_BuiltinType
              name: "int"
          initializer: null
        Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
          name: "y"
          type: Type_BuiltinType
              name: "int"
          initializer: null
        Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
          name: "z"
          type: Type_BuiltinType
              name: "float"
          initializer: null
      ]
      attributeList: null
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "foo"
      type: Type_BuiltinType
          name: "int"
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "bar"
      type: Type_TagType_RecordType
          decl: Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl
              kind: 1
              name: "foo"
              fields: null
              attributeList: null
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
     * @textdox Test basic parsing of structs
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/structTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}