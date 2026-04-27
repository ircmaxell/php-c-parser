
void foo(int a) {
}
int main() {
  int a;
  a = foo(0);
  int b;
  b = foo(1, 2);
  int c;
  c = foo(foo(0), 1);
  return 0;
}

