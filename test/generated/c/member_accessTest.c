
struct Point {
  int x;
  int y;
};
int main() {
  struct Point p;
  int a;
  a = p.x;
  int b;
  b = p.y;
  struct Point *ptr;
  int c;
  c = ptr->x;
  struct Point arr[5];
  int d;
  d = arr[0].x;
  return 0;
}

