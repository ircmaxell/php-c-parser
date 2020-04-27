--TEST--
Test basic parsing of vars
--FILE--

extern int foo;
int bar;
int baz[][];
char** qux;
int* quux, corge;

--EXPECT--

extern int foo;
int bar;
int baz[][];
char **qux;
int *quux;
int corge;