--TEST--
long and unsigned type qualifiers
--FILE--
int main() {
  long x = 0;
  long y = 0L;
  unsigned int z = 0;
  long long w = 0;
  return 0;
}
--EXPECT--
int main() {
  long x = 0;
  long y = 0L;
  unsigned int z = 0;
  long long w = 0;
  return 0;
}
