--TEST--
Built-in preprocessor macros (__LINE__, __FILE__)
--FILE--

#define PRINT_LINE() printf("line %d\n", __LINE__)

int main() {
  int x = 42;
  PRINT_LINE();
  return 0;
}
--EXPECT--
int main() {
  int x = 42;
  printf("line %d\x0a", 6);
  return 0;
}
