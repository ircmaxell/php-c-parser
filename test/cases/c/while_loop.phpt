--TEST--
While loop statement
--FILE--
int main() {
  int i = 0;
  int sum = 0;
  while (i < 10) {
    sum = sum + i;
    i = i + 1;
  }
  return 0;
}
--EXPECT--
int main() {
  int i = 0;
  int sum = 0;
  while ((i < 10)) {
    (sum = (sum + i));
    (i = (i + 1));
  }

  return 0;
}
