--TEST--
Test parsing of bare function typedefs being resolved to function decls
--FILE--

typedef void *(func_def)(int *arg);
typedef func_def func_alias;
static func_alias foo;

--EXPECT--

TranslationUnitDecl
  declarations: [
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "func_def"
      type: Type_ParenType
          parent: Type_FunctionType_FunctionProtoType
              return: Type_PointerType
                  parent: Type_BuiltinType
                      name: "void"
              params: [
                Type_PointerType
                  parent: Type_BuiltinType
                      name: "int"
              ]
              paramNames: [
                arg
              ]
              isVariadic: false
              attributeList: [
              ]
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "func_alias"
      type: Type_TypedefType
          name: "func_def"
    Decl_NamedDecl_ValueDecl_DeclaratorDecl_FunctionDecl
      name: "foo"
      type: Type_ExplicitAttributedType
          parent: Type_TypedefType
              name: "func_alias"
          kind: 2
      stmts: null
      declaratorAsm: null
  ]
