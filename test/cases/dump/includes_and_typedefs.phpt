--TEST--
Test basic includes and typedefs
--FILE--
#include "includes_and_typedefs.h"

#ifdef TEST_FLAG
typedef int A;
#else
typedef int B;
#endif

#ifdef TEST_FLAG2
typedef int C;
#else
typedef int D;
#endif

--EXPECT--
TranslationUnitDecl
  declarations: [
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "TEST"
      type: Type_BuiltinType
          name: "int"
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "A"
      type: Type_BuiltinType
          name: "int"
    Decl_NamedDecl_TypeDecl_TypedefNameDecl_TypedefDecl
      name: "D"
      type: Type_BuiltinType
          name: "int"
  ]