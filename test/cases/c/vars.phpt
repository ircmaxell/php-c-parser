--TEST--
Test basic parsing of vars
--FILE--

extern int foo;
int bar;
int baz[];

--EXPECT--

extern int foo;
int bar;
int baz[];