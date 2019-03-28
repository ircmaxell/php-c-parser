--TEST--
Test basic parsing of function pointers
--FILE--
typedef void *(*test_func)(int arg_name);

typedef void A(void * b);
--EXPECT--
typedef void *(*test_func)(int arg_name);
typedef void A(void *b);