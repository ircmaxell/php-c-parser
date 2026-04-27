#define BIT_SET(val, bit) ((val) | (1 << (bit)))
#define BIT_CLEAR(val, bit) ((val) & (~(1 << (bit))))
#define BIT_TEST(val, bit) ((val) & (1 << (bit)))
int main() {
  int flags;
  flags = 0;
  flags = BIT_SET(flags, 0);
  flags = BIT_SET(flags, 3);
  flags = BIT_CLEAR(flags, 0);
  int result;
  result = BIT_TEST(flags, 3);
  return result;
}
