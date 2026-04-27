--TEST--
Switch-based state machine with enum and break/continue
--FILE--
typedef enum {
  STATE_IDLE,
  STATE_RUNNING,
  STATE_PAUSED,
  STATE_ERROR
} State;
int processState(State current, int input) {
  State next;
  next = current;
  switch (current) {
    case STATE_IDLE:
      if (input == 1) {
        next = STATE_RUNNING;
      }
      break;
    case STATE_RUNNING:
      if (input == 0) {
        next = STATE_PAUSED;
      } else {
        next = STATE_RUNNING;
      }
      break;
    case STATE_PAUSED:
      if (input == 1) {
        next = STATE_RUNNING;
      } else if (input == -1) {
        next = STATE_IDLE;
      }
      break;
    default:
      next = STATE_IDLE;
      break;
  }
  return next;
}
--EXPECT--
typedef enum {
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
}
