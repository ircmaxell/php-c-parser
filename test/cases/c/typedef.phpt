--TEST--
Test basic parsing of vars
--FILE--
typedef void* foo;
typedef unsigned char bar[23];
typedef long baz[][];
--EXPECT--
typedef void *foo;
typedef unsigned char bar[23];
typedef long baz[][];