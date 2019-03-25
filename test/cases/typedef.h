
typedef int a;

typedef a b;

typedef unsigned int c;

typedef int (*d)[];

//------------

TranslationUnitDecl
  declarations: [
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "a"
      type: Type_BuiltinType
          name: "int"
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "b"
      type: Type_TypedefType
          name: "a"
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "c"
      type: Type_BuiltinType
          name: "unsigned int"
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "d"
      type: Type_PointerType
          parent: Type_ParenType
              parent: Type_ArrayType_IncompleteArrayType
                  parent: Type_BuiltinType
                      name: "int"
  ]