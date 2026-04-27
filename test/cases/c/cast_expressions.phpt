--TEST--
Cast expressions
--FILE--

int main() {
  int a;
  a = (int)3.14;
  double b;
  b = (double)42;
  int *c;
  c = (int *)0;
  int d;
  d = (int)(3 + 4);
  return 0;
}

--EXPECT--
int main() {
  int a;
  (a = ((int)3.14));
  double b;
  (b = ((double)42));
  int *c;
  (c = ((int *)0));
  int d;
  (d = ((int)(3 + 4)));
  return 0;
}
