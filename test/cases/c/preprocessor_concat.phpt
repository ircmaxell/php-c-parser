--TEST--
Test for preprocessor##concat
--FILE--

typedef char int8;

#define DEF(a, b, c, d) a##b ba ## c ## d
DEF(int, 8, 1, r;)

--EXPECT--
typedef char int8;
int8 ba1r;
