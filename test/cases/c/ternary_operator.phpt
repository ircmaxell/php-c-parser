--TEST--
Ternary (conditional) operator
--FILE--
int main() {
  int a = 1 ? 2 : 3;
  int b = a > 0 ? 10 : 20;
  int c = a > 0 ? (b > 0 ? 1 : 2) : 3;
  return 0;
}
--EXPECT--
int main() {
  int a = (1 ? 2 : 3);
  int b = ((a > 0) ? 10 : 20);
  int c = ((a > 0) ? ((b > 0) ? 1 : 2) : 3);
  return 0;
}
