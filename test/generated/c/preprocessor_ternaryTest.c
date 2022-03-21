
#define A 1
#define B 2
#define C 3

#if (A ? B : C) < 3
#else
#error "ERROR - 1"
#endif

#if !A ? B : C < 3
#error "ERROR - 2"
#endif

#if !A ? B > 1 : !defined C
#error "ERROR - 3"
#endif

#if A ? B > 1 ? C > 2 : A > 3 : defined C
#error "ERROR - 4"
#endif

int bar;

