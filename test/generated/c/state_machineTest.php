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
class state_machineTest extends TestCase {

    const EXPECTED = 'typedef enum {
  STATE_IDLE,
  STATE_RUNNING,
  STATE_PAUSED,
  STATE_ERROR,
} State;
int processState(State current, int input) {
  State next;
  (next = current);
  switch (current) {
    case STATE_IDLE: if ((input == 1)) {
      (next = STATE_RUNNING);
    }

    break;
    case STATE_RUNNING: if ((input == 0)) {
      (next = STATE_PAUSED);
    }
 else {
      (next = STATE_RUNNING);
    }

    break;
    case STATE_PAUSED: if ((input == 1)) {
      (next = STATE_RUNNING);
    }
 else if ((input == (- 1))) {
      (next = STATE_IDLE);
    }

    break;
    (next = STATE_IDLE);
    break;
  }

  return next;
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
     * @textdox Switch-based state machine with enum and break/continue
     */
    public function testCode() {
        $translationUnit = $this->parser->parse(__DIR__ . '/state_machineTest.c');
        $actual = $this->printer->print($translationUnit);
        $this->assertEquals(self::EXPECTED, trim($actual));
    }
}