--TEST--
Test escape sequence printing
--FILE--

char a[] = {
	'\0',
	'\n',
	'\"',
	'\\',
	'\"',
	'\x12',
	'\377',
};
const char *str = "a'b\n\"\\\"\x12\377\1";

--EXPECT--
char a[] = {0, 10, 34, 92, 34, 18, 255};
char *str = "a'b\x0a\"\\\"\x12\xff\x01";
