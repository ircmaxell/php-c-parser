
#define PRINT_LINE() printf("line %d\n", __LINE__)

int main() {
  int x = 42;
  PRINT_LINE();
  return 0;
}
