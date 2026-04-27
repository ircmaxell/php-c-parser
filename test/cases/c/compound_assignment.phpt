--TEST--
Compound assignment operators
--FILE--

int main() {
  int a;
  a = 0;
  int b;
  b = 0;
  int c;
  c = 0;
  int d;
  d = 0;
  int e;
  e = 0;
  int f;
  f = 0;
  int g;
  g = 0;
  int h;
  h = 0;
  int i;
  i = 0;
  int j;
  j = 0;
  int k;
  k = 0;
  int l;
  l = 0;
  a += 1;
  b -= 1;
  c *= 2;
  d /= 2;
  e %= 3;
  f <<= 1;
  g >>= 1;
  h &= 0xFF;
  i |= 0x01;
  j ^= 0xFF;
  return 0;
}

--EXPECT--
int main() {
  int a;
  (a = 0);
  int b;
  (b = 0);
  int c;
  (c = 0);
  int d;
  (d = 0);
  int e;
  (e = 0);
  int f;
  (f = 0);
  int g;
  (g = 0);
  int h;
  (h = 0);
  int i;
  (i = 0);
  int j;
  (j = 0);
  int k;
  (k = 0);
  int l;
  (l = 0);
  (a += 1);
  (b -= 1);
  (c *= 2);
  (d /= 2);
  (e %= 3);
  (f <<= 1);
  (g >>= 1);
  (h &= 0xFF);
  (i |= 0x01);
  (j ^= 0xFF);
  return 0;
}
