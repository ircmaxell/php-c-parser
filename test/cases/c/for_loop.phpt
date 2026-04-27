--TEST--
For loop statement
--FILE--
int main() {
  int i;
  for (int i = 0; i < 10; i++) {
    int sum;
    sum = sum + i;
  }
  return 0;
}
--EXPECT--
int main() {
  int i;
  for (int i = 0; (i < 10); (i++)) {
    int sum;
    (sum = (sum + i));
  }

  return 0;
}
