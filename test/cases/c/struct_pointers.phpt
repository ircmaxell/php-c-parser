--TEST--
Test basic parsing of struct pointers
--FILE--
struct A;
struct B {
    struct A *a;
    struct A *b;
};

--EXPECT--
struct A;
struct B {
  struct A *a;
  struct A *b;
};