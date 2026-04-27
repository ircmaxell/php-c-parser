--TEST--
Switch and case statements
--FILE--
int main() {
  int value = 2;
  int result = 0;
  switch (value) {
    case 1:
      result = 10;
      break;
    case 2:
      result = 20;
      break;
    case 3:
      result = 30;
      break;
    default:
      result = -1;
      break;
  }
  return 0;
}
--EXPECT--
int main() {
  int value = 2;
  int result = 0;
  switch (value) {
    (result = 10);
    break;
    (result = 20);
    break;
    (result = 30);
    break;
    (result = (- 1));
    break;
  }

  return 0;
}
