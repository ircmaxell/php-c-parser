int main() {
  int result = 0;
  int i = 0;
  while (i < 10) {
    if (i == 5) {
      goto end;
    }
    i = i + 1;
  }
  end:
  result = i;
  return result;
}
