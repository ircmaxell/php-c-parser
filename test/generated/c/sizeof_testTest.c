
struct S {
  int x;
  int y;
};
int main() {
  int a = sizeof(int);
  int b = sizeof(3);
  int c = sizeof(struct S);
  int *ptr;
  int d = sizeof(int *);
  return 0;
}

