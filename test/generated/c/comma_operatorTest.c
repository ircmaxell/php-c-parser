int main() {
  int a = 0, b = 0;
  int c = (a, b);
  int d = (a = 1, b = 2, a + b);
  return 0;
}
