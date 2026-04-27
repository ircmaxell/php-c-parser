--TEST--
typedef declarations
--FILE--
typedef int Integer;
typedef struct {
  int x;
  int y;
} Point;
Integer main() {
  Point p;
  return 0;
}
--EXPECT--
typedef int Integer;
typedef struct {
  int x;
  int y;
} Point;
Integer main() {
  Point p;
  return 0;
}
