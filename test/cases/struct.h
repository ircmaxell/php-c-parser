
struct foo {
    int x, y;
    float z;
};

typedef struct foo bar;

struct z {
    struct foo b;
} something;

typedef something something_else;

struct nested {
    union {
        int a;
        float b;
    } x1;
};

//------------

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
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "bar"
      type: Type_TagType_RecordType
          decl: Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl
              kind: 1
              name: "foo"
              fields: null
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "something"
      type: Type_TagType_RecordType
          decl: Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl
              kind: 1
              name: "z"
              fields: [
                Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
                  name: "b"
                  type: Type_TagType_RecordType
                      decl: Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl
                          kind: 1
                          name: "foo"
                          fields: null
                  initializer: null
              ]
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "something_else"
      type: Type_TypedefType
          name: "something"
    Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl
      kind: 1
      name: "nested"
      fields: [
        Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
          name: "x1"
          type: Type_TagType_RecordType
              decl: Decl_NamedDecl_TypeDecl_TagDecl_RecordDecl
                  kind: 2
                  name: null
                  fields: [
                    Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
                      name: "a"
                      type: Type_BuiltinType
                          name: "int"
                      initializer: null
                    Decl_NamedDecl_ValueDecl_DeclaratorDecl_FieldDecl
                      name: "b"
                      type: Type_BuiltinType
                          name: "float"
                      initializer: null
                  ]
          initializer: null
      ]
  ]