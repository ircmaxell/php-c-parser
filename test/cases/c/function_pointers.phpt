--TEST--
Test basic parsing of function pointers
--FILE--
typedef void *(*test_func)(int arg1_name, char *arg2_name);

typedef void A(void * b);
typedef void *(*with_void)(void);
--EXPECT--
typedef void *(*test_func)(int arg1_name, char *arg2_name);
typedef void A(void *b);
typedef void *(*with_void)(void);