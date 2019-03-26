--TEST--
Test basic parsing of structs
--FILE--
struct foo {
    int x, y;
    float z;
};

typedef int foo;

typedef struct foo bar;
--EXPECT--
struct foo {
  int x;
  int y;
  float z;
};
typedef int foo;
typedef struct foo bar;