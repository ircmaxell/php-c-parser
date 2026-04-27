--TEST--
const and volatile type qualifiers
--FILE--
int main() {
  const int x = 10;
  volatile int y = 20;
  const int *ptr = &x;
  return 0;
}
--EXPECT--
int main() {
  int x = 10;
  volatile int y = 20;
  int *ptr = (& x);
  return 0;
}
