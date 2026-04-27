--TEST--
Macro with token pasting (## operator)
--FILE--

#define MAKEVAR(name) my##name

int main() {
  int myValue = 42;
  int x = myValue;
  return 0;
}
--EXPECT--
int main() {
  int myValue = 42;
  int x = myValue;
  return 0;
}
