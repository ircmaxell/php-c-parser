--TEST--
Array subscripting
--FILE--

int main() {
  int a[10];
  int b;
  b = a[0];
  int c;
  c = a[5];
  int d;
  d = a[a[1]];
  return 0;
}

--EXPECT--
int main() {
  int a[10];
  int b;
  (b = (a)[0]);
  int c;
  (c = (a)[5]);
  int d;
  (d = (a)[(a)[1]]);
  return 0;
}
