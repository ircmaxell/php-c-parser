
#define MAKEVAR(name) my##name

int main() {
  int myValue = 42;
  int x = myValue;
  return 0;
}
