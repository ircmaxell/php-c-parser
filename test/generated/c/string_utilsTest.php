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
class string_utilsTest extends TestCase {

    const EXPECTED = 'int myStrlen(char *s) {
  int len;
  (len = 0);
  while ((s)[len]) {
    (len = (len + 1));
  }

  return len;
}

int myStrcmp(char *a, char *b) {
  int i;
  (i = 0);
  while (((a)[i] && ((a)[i] == (b)[i]))) {
    if (((a)[i] == 0)) {
      return 0;
    }

    (i = (i + 1));
  }

  return ((a)[i] - (b)[i]);
}

void myStrcpy(char *dest, char *src) {
  int i;
  (i = 0);
  while ((src)[i]) {
    ((dest)[i] = (src)[i]);
    (i = (i + 1));
  }

  ((dest)[i] = 0);
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
     * @textdox String utility functions (strlen, strcmp, strcpy)
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/string_utilsTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}