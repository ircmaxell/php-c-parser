--TEST--
#warning directive
--FILE--

#define ENABLE_FEATURE 1
#if ENABLE_FEATURE
#warning "Feature is enabled"
#endif

int main() {
  int x = 42;
  return 0;
}
--EXPECT--
int main() {
  int x = 42;
  return 0;
}
