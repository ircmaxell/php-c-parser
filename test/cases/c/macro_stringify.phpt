--TEST--
Macro with stringification (# operator)
--FILE--

#define LOG(msg) printf(msg)

int main() {
  LOG("hello world");
  return 0;
}
--EXPECT--
int main() {
  printf("hello world");
  return 0;
}
