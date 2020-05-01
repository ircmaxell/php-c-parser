--TEST--
Test basic parsing of vars
--FILE--
typedef void* foo;
typedef unsigned char bar[23];
typedef long baz[][];
typedef enum qux {
   QUUX,
   CORGE,
} grault;
typedef char *(*(waldos))[5];
typedef char *(*(**hairy[][8])())[];
--EXPECT--
typedef void *foo;
typedef unsigned char bar[23];
typedef long baz[][];
typedef enum qux {
  QUUX,
  CORGE,
} grault;
typedef char *(*(waldos))[5];
typedef char *(*(**hairy[][8])())[];