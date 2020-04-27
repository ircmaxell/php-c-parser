--TEST--
Test basic parsing of functions
--FILE--

extern char** bar(char* bar);
void foobar(void *qux);

--EXPECT--

extern char **bar(char *bar);
void foobar(void *qux);