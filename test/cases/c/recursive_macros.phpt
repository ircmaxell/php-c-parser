--TEST--
Recursive macro expansion
--FILE--

#define ZERO 0
#define INC(x) (1 + (x))
#define THREE (INC(INC(INC(ZERO))))

int main() {
  int result = THREE;
  return 0;
}
--EXPECT--
int main() {
  int result = (1 + (1 + (1 + 0)));
  return 0;
}
