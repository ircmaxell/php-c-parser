--TEST--
Do-while loop statement
--FILE--
int main() {
  int i = 0;
  int sum = 0;
  do {
    sum = sum + i;
    i = i + 1;
  } while (i < 10);
  return 0;
}
--EXPECT--
int main() {
  int i = 0;
  int sum = 0;
  do {
    (sum = (sum + i));
    (i = (i + 1));
  }
 while ((i < 10));
  return 0;
}
