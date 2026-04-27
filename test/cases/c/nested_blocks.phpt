--TEST--
Nested compound blocks
--FILE--
int main() {
  int a = 0;
  {
    int b = 1;
    {
      int c = 2;
    }
  }
  return 0;
}
--EXPECT--
int main() {
  int a = 0;
  {
    int b = 1;
    {
      int c = 2;
    }

  }

  return 0;
}
