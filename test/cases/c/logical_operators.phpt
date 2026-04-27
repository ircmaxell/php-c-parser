--TEST--
Logical operators
--FILE--
int main() {
  int a = 0, b = 0, c = 0, d = 0;
  int e = a && b;
  int f = a || b;
  int g = !a;
  int h = (a && b) || (!c);
  return 0;
}
--EXPECT--
int main() {
  int a = 0;\n int b = 0;\n int c = 0;\n int d = 0;
  int e = (a && b);
  int f = (a || b);
  int g = (! a);
  int h = ((a && b) || (! c));
  return 0;
}
