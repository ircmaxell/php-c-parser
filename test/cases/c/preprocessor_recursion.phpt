--TEST--
Test self-referential macros
--FILE--

#define int int success

int;

--EXPECT--
int success;
