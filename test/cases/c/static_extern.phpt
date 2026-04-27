--TEST--
static and extern storage class specifiers
--FILE--
static int counter;
int getValue();
static void initCounter() {
  counter = 0;
}
int main() {
  initCounter();
  return 0;
}
--EXPECT--
static int counter;
int getValue();
static void initCounter() {
  (counter = 0);
}

int main() {
  initCounter();
  return 0;
}
