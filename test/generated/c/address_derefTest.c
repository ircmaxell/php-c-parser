void increment(int *p) {
  *p = *p + 1;
}
int main() {
  int a = 10;
  int *ptr = &a;
  increment(ptr);
  return 0;
}
