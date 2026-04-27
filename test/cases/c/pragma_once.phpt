--TEST--
#pragma once and #pragma message directives
--FILE--

#pragma once
#pragma message("Building main module")

int main() {
  int x = 42;
  return 0;
}
--EXPECT--
int main() {
  int x = 42;
  return 0;
}
