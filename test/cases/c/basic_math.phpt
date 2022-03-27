--TEST--
Test basic math operations
--FILE--

static long add2(long a, long b) {
	return a + b;
}

static long add_and_sub(long a, long b) {
	return (a + b) + 2 - 1 - b;
}

static long mul_sub(long a, long b) {
	return a * b - 3;
}

--EXPECT--

static long add2(long a, long b) {
  return (a + b);
}

static long add_and_sub(long a, long b) {
  return ((((a + b) + 2) - 1) - b);
}

static long mul_sub(long a, long b) {
  return ((a * b) - 3);
}