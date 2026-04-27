--TEST--
Pointer arithmetic (address-of, dereference, pointer addition/subtraction)
--FILE--
int main() {
  int a = 42;
  int *ptr = &a;
  int b = *ptr;
  int arr[10];
  int *ptr2 = arr + 1;
  return 0;
}
--EXPECT--
int main() {
  int a = 42;
  int *ptr = (& a);
  int b = (* ptr);
  int arr[10];
  int *ptr2 = (arr + 1);
  return 0;
}
