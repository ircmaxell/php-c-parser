--TEST--
Infinite while loop (while(1))
--FILE--
int main() {
  int running = 1;
  while (1) {
    int result = 1;
    if (result) {
      running = 0;
      break;
    }
  }
  return 0;
}
--EXPECT--
int main() {
  int running = 1;
  while (1) {
    int result = 1;
    if (result) {
      (running = 0);
      break;
    }

  }

  return 0;
}
