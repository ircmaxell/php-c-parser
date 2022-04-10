--TEST--
Test basic parsing of structs
--FILE--
struct foo {
    int x, y:2, :6;
    float z;
};

typedef int foo;

typedef struct foo bar;
--EXPECT--
struct foo {
  int x;
  int y :2;
  int :6;
  float z;
};
typedef int foo;
typedef struct foo bar;