--TEST--
Comma operator
--FILE--
int main() {
  int a = 0, b = 0;
  int c = (a, b);
  int d = (a = 1, b = 2, a + b);
  return 0;
}
--EXPECT--
int main() {
  int a = 0;\n int b = 0;
  int c = (a , b);
  int d = (((a = 1) , (b = 2)) , (a + b));
  return 0;
}
