
#define FEATURE_A 1
int main() {
  int result = 0;
#if defined(FEATURE_A) && defined(FEATURE_B)
  result = 2;
#elif defined(FEATURE_A)
  result = 1;
#else
  result = -1;
#endif
  return 0;
}
