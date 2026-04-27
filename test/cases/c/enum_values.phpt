--TEST--
Enum with explicit values
--FILE--
typedef enum {
  RED,
  GREEN,
  BLUE
} Color;
int main() {
  Color c = RED;
  return 0;
}
--EXPECT--
typedef enum {
  RED,
  GREEN,
  BLUE,
} Color;
int main() {
  Color c = RED;
  return 0;
}
