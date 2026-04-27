--TEST--
If and else statements
--FILE--
int main() {
  int a = 0;
  if (a) {
    int b = 1;
  }
  return 0;
}
--EXPECT--
int main() {
  int a = 0;
  if (a) {
    int b = 1;
  }

  return 0;
}
