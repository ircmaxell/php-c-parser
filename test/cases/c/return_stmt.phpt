--TEST--
Return statement with and without values
--FILE--
void doNothing() {
  return;
}
int getValue() {
  int x = 42;
  return x;
}
int main() {
  int result = getValue();
  doNothing();
  return 0;
}
--EXPECT--
void doNothing() {
  return;
}

int getValue() {
  int x = 42;
  return x;
}

int main() {
  int result = getValue();
  doNothing();
  return 0;
}
