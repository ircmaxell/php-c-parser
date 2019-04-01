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

