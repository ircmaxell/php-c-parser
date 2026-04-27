
#define ZERO 0
#define INC(x) (1 + (x))
#define THREE (INC(INC(INC(ZERO))))

int main() {
  int result = THREE;
  return 0;
}
