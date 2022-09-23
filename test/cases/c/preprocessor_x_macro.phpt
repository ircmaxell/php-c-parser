--TEST--
Test for nested expansion with macros
--FILE--

enum AST {
	ZEND_AST_BINARY_OP
};

#define ZEND_EXPAND_VA(code) code
#define ZEND_AST_SPEC_CALL_EX(name, ...) \
	ZEND_EXPAND_VA(ZEND_AST_SPEC_CALL_EX_(name, __VA_ARGS__, _5, _4, _3, _2, _1, _0)(__VA_ARGS__))
#define ZEND_AST_SPEC_CALL_EX_(name, _, _6, _5, _4, _3, _2, _1, suffix, ...) \
	name ## suffix

#define zend_ast_create_ex(...) \
	ZEND_AST_SPEC_CALL_EX(zend_ast_create_ex, __VA_ARGS__)

static int *zend_ast_create_binary_op(int opcode, int *op0, int *op1) {
	return zend_ast_create_ex(ZEND_AST_BINARY_OP, opcode, op0, op1);
}
--EXPECT--
enum AST {
  ZEND_AST_BINARY_OP,
};
static int *zend_ast_create_binary_op(int opcode, int *op0, int *op1) {
  return zend_ast_create_ex_2(ZEND_AST_BINARY_OP, opcode, op0, op1);
}
