int binarySearch(int arr[], int size, int target) {
  int left;
  left = 0;
  int right;
  right = size - 1;
  while (left <= right) {
    int mid;
    mid = (left + right) / 2;
    if (arr[mid] == target) {
      return mid;
    } else if (arr[mid] < target) {
      left = mid + 1;
    } else {
      right = mid - 1;
    }
  }
  return -1;
}
