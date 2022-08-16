--TEST--
Test unary operator on empty define
--FILE--

#if L'\0' - 1 <= 0
int success;
#endif

--EXPECT--
int success;
