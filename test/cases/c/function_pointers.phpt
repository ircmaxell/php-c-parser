--TEST--
Test basic parsing of function pointers
--FILE--
typedef void *(*test_func)(int arg_name);
--EXPECT--
typedef void*(*test_func)(int);