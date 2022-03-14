--TEST--
Test for #elif chains
--FILE--

#if 0
#elif 1
#elif 0
#elif 0
#else
#error "ERROR"
#endif

int bar;

--EXPECT--
int bar;
