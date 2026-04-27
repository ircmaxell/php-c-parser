--TEST--
Continue statement in loop
--FILE--
int main() {
  int i;
  int sum = 0;
  for (i = 0; i < 10; i++) {
    if (i % 2 == 0) {
      continue;
    }
    sum = sum + i;
  }
  return 0;
}
--EXPECT--
int main() {
  int i;
  int sum = 0;
  for ((i = 0); (i < 10); (i++)) {
    if (((i % 2) == 0)) {
      continue;
    }

    (sum = (sum + i));
  }

  return 0;
}
