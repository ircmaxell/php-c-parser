--TEST--
Test basic parsing of functions
--FILE--

extern char** bar(char* arg1, int* arg2);
static void foobar(void);

--EXPECT--

extern char **bar(char *arg1, int *arg2);
static void foobar(void);