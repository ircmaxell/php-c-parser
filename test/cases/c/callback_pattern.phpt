--TEST--
Function pointer callback pattern with typedef
--FILE--
typedef int (*CompareFunc)(const void *, const void *);
int bubbleSort(int arr[], int size, CompareFunc cmp) {
  int i;
  i = 0;
  while (i < size - 1) {
    int j;
    j = 0;
    while (j < size - i - 1) {
      if (cmp(&arr[j], &arr[j + 1]) > 0) {
        int temp;
        temp = arr[j];
        arr[j] = arr[j + 1];
        arr[j + 1] = temp;
      }
      j = j + 1;
    }
    i = i + 1;
  }
  return 0;
}
--EXPECT--
typedef int (*CompareFunc)(void *, void *);
int bubbleSort(int arr[], int size, CompareFunc cmp) {
  int i;
  (i = 0);
  while ((i < (size - 1))) {
    int j;
    (j = 0);
    while ((j < ((size - i) - 1))) {
      if ((cmp((& (arr)[j]), (& (arr)[(j + 1)])) > 0)) {
        int temp;
        (temp = (arr)[j]);
        ((arr)[j] = (arr)[(j + 1)]);
        ((arr)[(j + 1)] = temp);
      }

      (j = (j + 1));
    }

    (i = (i + 1));
  }

  return 0;
}
