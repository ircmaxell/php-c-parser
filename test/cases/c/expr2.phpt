--TEST--
Test unary operator on empty define
--FILE--

#define _POSIX_SOURCE 1
#define _XOPEN_SOURCE

#if ((!defined __STRICT_ANSI__                                  \
      || (defined _XOPEN_SOURCE && (_XOPEN_SOURCE - 0) >= 500)) \
     && !defined _POSIX_SOURCE && !defined _POSIX_C_SOURCE)
#else
int success;
#endif

--EXPECT--
int success;
