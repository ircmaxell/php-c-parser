--TEST--
Test for issue #2
--FILE--

#ifndef TEST
#define TEST 1
#endif

#if TEST
int bar;
#endif

--EXPECT--
int bar;
