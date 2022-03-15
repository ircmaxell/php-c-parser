--TEST--
Test for #elif chains
--FILE--

#include "pragma_once.h"
#include "pragma_once.h"

int TEST;

--EXPECT--
int bar;
