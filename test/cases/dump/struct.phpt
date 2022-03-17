--TEST--
Test basic parsing of structs
--FILE--
struct foo {
    int x, y;
    float z;
};

typedef int foo;

typedef struct foo bar;
--EXPECT--
TranslationUnitDecl
  declarations: [
    Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl
      kind: 1
      name: "foo"
      fields: [
        Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
          name: "x"
          type: Type_BuiltinType
              name: "int"
          initializer: null
        Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
          name: "y"
          type: Type_BuiltinType
              name: "int"
          initializer: null
        Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
          name: "z"
          type: Type_BuiltinType
              name: "float"
          initializer: null
      ]
      attributeList: null
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "foo"
      type: Type_BuiltinType
          name: "int"
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "bar"
      type: Type_TagType_RecordType
          decl: Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl
              kind: 1
              name: "foo"
              fields: null
              attributeList: null
  ]