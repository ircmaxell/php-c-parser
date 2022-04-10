struct foo {
    int x, y:2, :6;
    float z;
};

typedef int foo;

typedef struct foo bar;
