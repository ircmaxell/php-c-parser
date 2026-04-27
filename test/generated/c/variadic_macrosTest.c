
#define DEBUG_PRINT(fmt, ...) printf(fmt, __VA_ARGS__)

int main() {
  DEBUG_PRINT("%d %s %d", 1, "hello", 2);
  return 0;
}
