--TEST--
Array initialization with brace-enclosed initializers
--FILE--
int main() {
  int a[] = {1, 2, 3, 4, 5};
  int b[1] = {0};
  int d[3] = {1, 2, 3};
  return 0;
}
--EXPECT--
int main() {
  int a[] = {1, 2, 3, 4, 5};
  int b[1] = {0};
  int d[3] = {1, 2, 3};
  return 0;
}
