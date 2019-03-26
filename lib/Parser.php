<?php

namespace PHPCParser;

use PHPCParser\Node\Stmt\ValueStmt\Expr;


/* This is an automatically GENERATED file, which should not be manually edited.
 */
class Parser extends ParserAbstract
{
    protected int $tokenToSymbolMapSize = 330;
    protected int $actionTableSize      = 508;
    protected int $gotoTableSize        = 275;

    protected int $invalidSymbol       = 99;
    protected int $errorSymbol         = 1;
    protected int $defaultAction       = -32766;
    protected int $unexpectedTokenRule = 32767;

    protected int $YY2TBLSTATE = 176;
    protected int $numNonLeafStates  = 258;

    protected array $symbolToName = array(
        "EOF",
        "error",
        "IDENTIFIER",
        "I_CONSTANT",
        "F_CONSTANT",
        "STRING_LITERAL",
        "FUNC_NAME",
        "SIZEOF",
        "PTR_OP",
        "INC_OP",
        "DEC_OP",
        "LEFT_OP",
        "RIGHT_OP",
        "LE_OP",
        "GE_OP",
        "EQ_OP",
        "NE_OP",
        "AND_OP",
        "OR_OP",
        "MUL_ASSIGN",
        "DIV_ASSIGN",
        "MOD_ASSIGN",
        "ADD_ASSIGN",
        "SUB_ASSIGN",
        "LEFT_ASSIGN",
        "RIGHT_ASSIGN",
        "AND_ASSIGN",
        "XOR_ASSIGN",
        "OR_ASSIGN",
        "TYPEDEF_NAME",
        "ENUMERATION_CONSTANT",
        "TYPEDEF",
        "EXTERN",
        "STATIC",
        "AUTO",
        "REGISTER",
        "INLINE",
        "CONST",
        "RESTRICT",
        "VOLATILE",
        "BOOL",
        "CHAR",
        "SHORT",
        "INT",
        "LONG",
        "SIGNED",
        "UNSIGNED",
        "FLOAT",
        "DOUBLE",
        "VOID",
        "COMPLEX",
        "IMAGINARY",
        "STRUCT",
        "UNION",
        "ENUM",
        "ELLIPSIS",
        "CASE",
        "DEFAULT",
        "IF",
        "ELSE",
        "SWITCH",
        "WHILE",
        "DO",
        "FOR",
        "GOTO",
        "CONTINUE",
        "BREAK",
        "RETURN",
        "ALIGNAS",
        "ALIGNOF",
        "ATOMIC",
        "GENERIC",
        "NORETURN",
        "STATIC_ASSERT",
        "THREAD_LOCAL",
        "'('",
        "')'",
        "','",
        "':'",
        "'['",
        "']'",
        "'.'",
        "'{'",
        "'}'",
        "'&'",
        "'*'",
        "'+'",
        "'-'",
        "'~'",
        "'!'",
        "'/'",
        "'%'",
        "'<'",
        "'>'",
        "'^'",
        "'|'",
        "'?'",
        "'='",
        "';'"
    );

    protected array $tokenToSymbol = array(
            0,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   89,   99,   99,   99,   91,   84,   99,
           75,   76,   85,   86,   77,   87,   81,   90,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   78,   98,
           92,   97,   93,   96,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   79,   99,   80,   94,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   82,   95,   83,   88,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,    1,    2,    3,    4,
            5,    6,    7,    8,    9,   10,   11,   12,   13,   14,
           15,   16,   17,   18,   19,   20,   21,   22,   23,   24,
           25,   26,   27,   28,   29,   30,   31,   32,   33,   34,
           35,   36,   37,   38,   39,   40,   41,   42,   43,   44,
           45,   46,   47,   48,   49,   50,   51,   52,   53,   54,
           55,   56,   57,   58,   59,   60,   61,   62,   63,   64,
           65,   66,   67,   68,   69,   70,   71,   72,   73,   74
    );

    protected array $action = array(
          201,  264,  265,  268,  269,  112,   81,  113,  114,    0,
          335,  336,  337,  338,  339,  340,  341,  342,  343,  344,
          455,    9,  197,  281,  282,   34,  396,   84,  266,  231,
           50,  484,  123,-32766,-32766,-32766,-32766,-32766,-32766,  100,
          101,  182,   93,  201,  264,  265,  268,  269,  112,  428,
          113,  114,  230,  397,   80,  202,  203,  267,  204,  205,
           11,  206,  207,  208,  209,   65,  280,  185,  183,  186,
        -32766,  266,  109,    4,-32766,-32766,-32766,  110,  111,  279,
            1,  505,  294,  295,  296,  297,  298,  299,  334,   64,
          494,-32766,  456,   71,  440,  198,  511,   80,  202,  203,
           94,  204,  205,   11,  206,  207,  208,  209,   65,  181,
          185,   84,  186,  231,   50,  284,    4,  448,  102,  103,
           72,   52,  128,    1,  506,  294,  295,  296,  297,  298,
          299,   84,  118,  231,   50,-32766,  227,  428,  386,  511,
          365,  366,  367,  369,  370,  422,  418,  419,  420,  380,
          372,  373,  374,  375,  378,  379,  376,  377,  371,  381,
          382,  392,  393,  140,  259,  264,  265,  268,  269,  112,
            8,  113,  114,   84,   34,  231,   20,  178,-32766,  179,
        -32766,  423,  180,  368,  418,  419,  420,  244,  127,  176,
            1,  490,  266,-32766,-32766,-32766,-32766,-32766,-32766,  259,
          264,  265,  268,  269,  112,   63,  113,  114,-32766,  349,
            8,  479,   24,   39,   34,-32766,   33,  421,  481,  483,
          118,-32766,-32766,-32766,-32766,-32766,-32766,  266,  104,  105,
        -32766,  185,  118,  186,-32766,-32766,-32766,    4,  418,  419,
          420,   26,   98,   99,  201,   35,  294,  295,  296,  297,
          298,  299,  259,  264,  265,  268,  269,  112,-32766,  113,
          114,   40,-32766,  136,-32766,   15,  185,  283,  186,  408,
          137,  421,    4,  387,    8,    3,  410,    7,   34,   57,
          266,  294,  295,  296,  297,  298,  299,  441,  232,-32766,
        -32766,-32766,-32766,-32766,-32766,  511,  278,   87,   80,  202,
          203,   58,  204,  205,   11,  206,  207,  208,  209,   65,
        -32766,   73,    9,  479,   74,  248,   34,  270,   56,  185,
           75,  186,  118,   76,    1,    4,-32766,   77,   79,    5,
        -32766,-32766,-32766,   16,  294,  295,  296,  297,  298,  299,
          511,-32766,-32766,-32766,-32766,-32766,-32766,    6,-32766,-32766,
        -32766,-32766,-32766,-32766,   17,-32766,-32766,-32766,-32766,-32766,
        -32766,   21,   41,  106,  107,   42,  418,  419,  420,  418,
          419,  420,   22,   70,  236,  237,  243,  257,-32766,  424,
          425,  417,-32766,  429,-32766,-32766,   27,  262,  439,-32766,
          293,-32766,-32766,  388,  480,  462,-32766,  482,-32766,  421,
          390,   43,  421,   18,   19,  418,  419,  420,   55,  430,
          277,   12,  463,  199,  212,   85,   82,  225,   88,  418,
          419,  420,  418,  419,  420,   13,   89,   14,   86,   90,
          418,  419,  420,   91,   92,   81,   51,   97,  421,  431,
          438,  464,  470,  433,  434,  436,  466,  468,  471,  472,
          478,  493,  421,  241,  432,  421,  435,  465,  467,  474,
          475,  473,  437,  421,  476,  469,  276,  234,  118,   53,
           54,  177,    1,  477,   50,    0,-32766,  409,  411,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
           96,    0,   95,    0,    0,   63,   78,    0,  523,  524,
          522,  495,  517,  512,  526,  348,  511,  525
    );

    protected array $actionCheck = array(
            2,    3,    4,    5,    6,    7,   78,    9,   10,    0,
           19,   20,   21,   22,   23,   24,   25,   26,   27,   28,
            2,   75,    8,    9,   10,   79,   98,   79,   30,   81,
           82,   83,   77,   31,   32,   33,   34,   35,   36,   13,
           14,    2,   18,    2,    3,    4,    5,    6,    7,    2,
            9,   10,    2,   98,   56,   57,   58,    2,   60,   61,
           62,   63,   64,   65,   66,   67,    2,   69,   29,   71,
           68,   30,   85,   75,   72,   73,   74,   90,   91,    2,
           82,   83,   84,   85,   86,   87,   88,   89,   97,   75,
            2,   73,    2,   79,   76,   81,   98,   56,   57,   58,
           17,   60,   61,   62,   63,   64,   65,   66,   67,    2,
           69,   79,   71,   81,   82,   83,   75,   55,   92,   93,
           96,   82,   75,   82,   83,   84,   85,   86,   87,   88,
           89,   79,   85,   81,   82,   73,    5,    2,   29,   98,
           31,   32,   33,   34,   35,   36,   37,   38,   39,   40,
           41,   42,   43,   44,   45,   46,   47,   48,   49,   50,
           51,   52,   53,   54,    2,    3,    4,    5,    6,    7,
           75,    9,   10,   79,   79,   81,   59,   68,   73,   70,
           85,   72,   73,   74,   37,   38,   39,   61,   77,   82,
           82,   97,   30,   31,   32,   33,   34,   35,   36,    2,
            3,    4,    5,    6,    7,   97,    9,   10,   73,   98,
           75,   76,   75,   77,   79,   73,   79,   70,   76,   83,
           85,   31,   32,   33,   34,   35,   36,   30,   11,   12,
           68,   69,   85,   71,   72,   73,   74,   75,   37,   38,
           39,   75,   15,   16,    2,   79,   84,   85,   86,   87,
           88,   89,    2,    3,    4,    5,    6,    7,   68,    9,
           10,   77,   72,   77,   74,   76,   69,   83,   71,   83,
           77,   70,   75,   83,   75,   75,   83,   75,   79,   75,
           30,   84,   85,   86,   87,   88,   89,   76,   77,   31,
           32,   33,   34,   35,   36,   98,   76,   77,   56,   57,
           58,   75,   60,   61,   62,   63,   64,   65,   66,   67,
           73,   75,   75,   76,   75,   57,   79,   76,   77,   69,
           75,   71,   85,   75,   82,   75,   68,   75,   75,   75,
           72,   73,   74,   76,   84,   85,   86,   87,   88,   89,
           98,   31,   32,   33,   34,   35,   36,   75,   31,   32,
           33,   34,   35,   36,   76,   31,   32,   33,   34,   35,
           36,   76,   33,   86,   87,   33,   37,   38,   39,   37,
           38,   39,   76,   76,   76,   76,   76,   76,   68,   76,
           76,   76,   72,   76,   74,   68,   77,   76,   76,   72,
           76,   74,   68,   83,   76,   76,   72,   76,   74,   70,
           83,   33,   70,   76,   76,   37,   38,   39,   77,   80,
           76,   78,   80,   77,   85,   33,   77,   85,   33,   37,
           38,   39,   37,   38,   39,   78,   33,   78,   78,   78,
           37,   38,   39,   78,   78,   78,   82,   84,   70,   80,
           80,   80,   80,   80,   80,   80,   80,   80,   80,   80,
           80,   80,   70,   85,   80,   70,   80,   80,   80,   80,
           80,   80,   80,   70,   80,   80,   80,   85,   85,   82,
           82,   82,   82,   80,   82,   -1,   85,   83,   83,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           94,   -1,   95,   -1,   -1,   97,   97,   -1,   98,   98,
           98,   98,   98,   98,   98,   98,   98,   98
    );

    protected array $actionBase = array(
          109,   -2,   41,  197,  162,  162,  162,  162,  135,  237,
          108,  242,  242,  242,  242,  242,  242,  242,  242,  242,
          242,  242,  242,    9,   18,  390,  142,   62,  105,  105,
          105,  105,  105,  329,  332,  368,  382,  385,  393,  -52,
           32,  201,  201,  201,  201,  201,  201,  190,  310,  317,
           52,   52,  324,  324,  324,  258,  258,    2,    2,    2,
            2,  408,  408,  392,  334,  409,  392,  327,  328,  392,
          354,  250,  250,  250,  250,  250,  250,  250,  250,  250,
          250,  250,  250,  250,  250,  250,  250,  250,  250,  250,
          250,  250,  250,  250,  250,  250,  250,  250,  250,  250,
          250,  250,  250,  250,  250,  250,  250,  250,  250,  250,
          250,  250,  254,  272,  272,   -9,   14,  -72,  147,  147,
          407,  407,  199,  357,   26,   26,   26,   47,   47,  383,
           95,   94,   39,  -13,  -13,  -13,  394,  395,  391,  -54,
          107,  111,  137,  186,  277,  217,  227,   24,  137,  193,
          311,  166,  405,  211,  -45,  220,  386,  277,  277,  217,
          217,  217,  217,  227,  356,  166,  406,  136,  189,  257,
          278,  241,  184,  301,  285,  296,   55,   55,  202,  204,
          252,  389,  387,  388,  399,  226,  253,  303,  353,  396,
          397,   83,  304,  305,  336,  307,  297,   64,   77,  131,
          398,  333,  347,  236,  239,  245,  200,   50,  400,  401,
          312,  309,  359,  360,  350,  298,  299,  314,  331,  353,
          396,  397,   83,  318,  319,  361,  362,  300,  349,  126,
          402,   88,   90,  363,  364,  365,  354,  354,  366,  367,
          321,  369,  370,  403,  248,  371,  374,  376,  351,  355,
          377,  378,  379,  380,  381,  384,  117,  404,    0,  109,
          109,  109,  109,  109,  109,  109,  109,  109,  109,  250,
          250,  250,  250,  250,  250,  250,  250,  250,  250,  250,
          250,  109,  109,  109,  109,  109,  109,  109,  109,  109,
          109,  250,  250,  250,  250,  250,  250,  250,  250,  250,
          250,  250,  250,  250,  250,  109,  109,  109,  250,  250,
          109,  109,  109,  109,  109,  109,  109,  109,  109,  250,
          250,  250,  250,  250,  250,  250,  250,  250,  250,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
          250,  250,  250,    0,    0,   47,    0,    0,   47,   47,
           47,   47,    0,    0,    0,    0,    0,  -54,   47,    0,
            0,    0,    0,    0,   55,   55,   47,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,  339,    0,
          339,    0,    0,    0,  339,    0,    0,    0,    0,    0,
            0,    0,  339,    0,  339,    0,  339,  339,  339,    0,
            0,  339,  339,  339
    );

    protected array $actionDefault = array(
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
          106,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,   94,   96,
           98,  100,  102,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,  142,
          144,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,   42,   29,32767,  187,  185,
        32767,32767,  196,32767,   59,   60,   61,32767,32767,  200,
          202,32767,32767,   48,   49,   50,32767,32767,32767,  202,
        32767,32767,  169,32767,   51,   54,   62,   72,  168,32767,
        32767,  203,32767,32767,32767,32767,32767,   52,   53,   57,
           58,   55,   56,   63,32767,  201,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,  163,
        32767,  154,  131,  133,  158,32767,32767,32767,   64,   66,
           68,   70,32767,32767,32767,32767,32767,32767,32767,32767,
          106,    1,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,  191,   37,32767,  149,32767,32767,32767,32767,   65,
           67,   69,   71,32767,32767,   37,32767,32767,32767,32767,
        32767,32767,32767,32767,   37,32767,   34,32767,32767,32767,
        32767,   37,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,  256,32767
    );

    protected array $goto = array(
          300,   60,   60,   60,   60,  229,  502,  504,  503,  256,
          515,  516,  520,  518,  513,  521,  519,  159,  160,  161,
          162,  532,  196,  215,  216,  187,  394,  394,  394,  148,
          446,  446,  446,  447,  447,  447,  531,  148,  446,  446,
          446,  447,  447,  447,   60,   60,   60,  130,  139,   60,
           60,   60,   60,   60,   60,   60,   60,   60,   66,   66,
           37,   38,  210,  300,  240,  487,  487,   44,   45,   46,
          300,  300,  301,  300,  300,  193,  217,  300,  363,  300,
          508,  486,   48,   49,  488,  300,  300,  300,  300,  300,
          300,  300,  300,  300,  300,  300,  300,  300,  300,  300,
          300,  300,  300,  300,  300,  291,  288,  289,  125,  126,
          290,  303,  304,  305,  528,  446,  447,  213,  226,  242,
          235,  239,  253,  485,  485,  233,  238,  252,  246,  250,
          254,  157,  158,  451,  485,  485,   59,   59,   59,   59,
          150,  150,  150,  195,  119,  453,  172,  485,  285,  272,
          485,  221,  457,  485,  222,   62,  219,  444,  442,  220,
          347,  130,  163,  218,  134,  135,  346,  333,  139,  247,
          404,  286,  251,  255,  274,  273,  362,  413,  413,   59,
           59,   59,  492,  149,   59,   59,   59,   59,   59,   59,
           59,   59,   59,  398,  398,  398,    0,  120,  398,  398,
          398,  166,    0,  174,  175,  122,  122,  156,  164,  168,
          169,  170,  173,   67,   68,    0,    0,    0,    0,    0,
          120,  122,    0,  122,  122,  351,  353,  355,  357,  359,
          347,  347,    0,  347,  347,  165,    0,  347,    0,  347,
            0,  117,  117,  117,  165,  331,  117,  117,  117,  530,
            0,    0,   61,  399,  401,   10,  200,  452,    0,  533,
            0,    0,  200,  195,  194,  415,    0,  228,  405,    0,
            0,  245,  530,  406,  534
    );

    protected array $gotoCheck = array(
           15,   37,   37,   37,   37,   66,   66,   66,   66,   66,
           66,   66,   66,   66,   66,   66,   66,   20,   20,   20,
           20,   68,   11,   11,   11,   11,   48,   48,   48,   55,
           37,   37,   37,   37,   37,   37,   68,   55,   37,   37,
           37,   37,   37,   37,   37,   37,   37,   54,   54,   37,
           37,   37,   37,   37,   37,   37,   37,   37,   63,   63,
           56,   56,   57,   15,   57,   42,   42,   56,   56,   56,
           15,   15,   17,   15,   15,   11,   11,   15,   42,   15,
           74,   42,   47,   47,   42,   15,   15,   15,   15,   15,
           15,   15,   15,   15,   15,   15,   15,   15,   15,   15,
           15,   15,   15,   15,   15,   15,   15,   15,   21,   21,
           17,   17,   17,   17,   75,   37,   37,    8,    8,    8,
            8,    8,    8,    8,    8,    8,    8,    8,    8,    8,
            8,   19,   19,   60,    8,    8,   36,   36,   36,   36,
            5,    5,    5,   41,   56,   61,   14,    8,    8,   10,
            8,   25,   61,    8,   26,   69,   23,   54,   54,   24,
           28,   54,   22,    8,   18,   18,    8,    8,   54,    8,
           51,    8,    8,    8,    8,    8,   40,   53,   53,   36,
           36,   36,   65,   52,   36,   36,   36,   36,   36,   36,
           36,   36,   36,   34,   34,   34,   -1,   32,   34,   34,
           34,    5,   -1,    5,    5,   32,   32,    5,    5,    5,
            5,    5,    5,   69,   69,   -1,   -1,   -1,   -1,   -1,
           32,   32,   -1,   32,   32,   32,   32,   32,   32,   32,
           28,   28,   -1,   28,   28,   62,   -1,   28,   -1,   28,
           -1,   49,   49,   49,   62,   28,   49,   49,   49,   31,
           -1,   -1,   31,   49,   49,   41,   41,   41,   -1,   31,
           -1,   -1,   41,   41,   30,   30,   -1,   30,   30,   -1,
           -1,   30,   31,   30,   31
    );

    protected array $gotoBase = array(
            0,    0,    0,    0,    0,  136,    0,    0,   84,    0,
           93,   18,    0,    0,   95,   -7,    0,    2,   58,   27,
          -83,   10,   65,   60,   64,   57,   61,    0,  153,    0,
          187,  249,  197,    0,  146,    0,  132,   -3,    0,    0,
           49,  135,   15,    0,    0,    0,    0,   29,  -26,  194,
            0,   47,    6,    1,   39, -101,   26,   38,    0,    0,
          106,   23,  105,    8,    0,   51,   -6,    0,   11,  152,
            0,    0,    0,    0,   78,   91,    0,    0
    );

    protected array $gotoDefault = array(
        -32768,   23,  275,  260,  261,  152,  263,  184,  345,  171,
          271,  249,  116,  155,  167,  115,  108,  302,  133,  144,
          145,  124,  146,  188,  189,  190,  191,  147,  332,   83,
          192,  509,  121,  141,  350,   28,   29,   30,   31,   32,
          361,  214,  489,  383,  384,  385,  132,   47,  395,  129,
          154,  403,  143,  414,  138,  142,   36,  223,  153,  211,
          450,  224,  151,   69,  131,  491,  510,  496,  497,  498,
          499,  500,  501,    2,  507,  527,  529,   25
    );

    protected array $ruleToNonTerminal = array(
            0,    2,    2,    2,    2,    2,    3,    3,    3,    7,
            4,    4,    6,    9,    9,   10,   10,   12,   12,   12,
           12,   12,   12,   12,   12,   12,   12,   13,   13,   15,
           15,   15,   15,   15,   15,   15,   16,   16,   16,   16,
           16,   16,   17,   17,   18,   18,   18,   18,   19,   19,
           19,   20,   20,   20,   21,   21,   21,   21,   21,   22,
           22,   22,   23,   23,   24,   24,   25,   25,   26,   26,
           27,   27,   28,   28,    8,    8,   29,   29,   29,   29,
           29,   29,   29,   29,   29,   29,   29,    5,    5,   30,
           31,   31,   31,   32,   32,   32,   32,   32,   32,   32,
           32,   32,   32,   33,   33,   40,   40,   35,   35,   35,
           35,   35,   35,   36,   36,   36,   36,   36,   36,   36,
           36,   36,   36,   36,   36,   36,   36,   36,   36,   44,
           44,   44,   44,   44,   46,   46,   47,   47,   48,   48,
           48,   49,   49,   49,   49,   50,   50,   51,   51,   51,
           45,   45,   45,   45,   45,   52,   52,   53,   53,   43,
           37,   37,   37,   37,   38,   38,   39,   39,   41,   41,
           55,   55,   55,   55,   55,   55,   55,   55,   55,   55,
           55,   55,   55,   55,   54,   54,   54,   54,   56,   56,
           57,   57,   59,   59,   60,   60,   60,   58,   58,   11,
           11,   61,   61,   61,   62,   62,   62,   62,   62,   62,
           62,   62,   62,   62,   62,   62,   62,   62,   62,   62,
           62,   62,   62,   62,   62,   42,   42,   42,   14,   14,
           14,   14,   63,   64,   64,   65,   65,   34,   66,   66,
           66,   66,   66,   66,   67,   67,   67,   68,   68,   73,
           73,   74,   74,   69,   69,   70,   70,   70,   71,   71,
           71,   71,   71,   71,   72,   72,   72,   72,   72,    1,
            1,   75,   75,   76,   76,   77,   77
    );

    protected array $ruleToLength = array(
            1,    1,    1,    1,    3,    1,    1,    1,    1,    1,
            1,    1,    6,    1,    3,    3,    3,    1,    4,    3,
            4,    3,    3,    2,    2,    6,    7,    1,    3,    1,
            2,    2,    2,    2,    4,    4,    1,    1,    1,    1,
            1,    1,    1,    4,    1,    3,    3,    3,    1,    3,
            3,    1,    3,    3,    1,    3,    3,    3,    3,    1,
            3,    3,    1,    3,    1,    3,    1,    3,    1,    3,
            1,    3,    1,    5,    1,    3,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    3,    1,
            2,    3,    1,    2,    1,    2,    1,    2,    1,    2,
            1,    2,    1,    1,    3,    3,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    4,
            5,    2,    5,    2,    1,    1,    1,    2,    2,    3,
            1,    2,    1,    2,    1,    1,    3,    2,    3,    1,
            4,    5,    5,    6,    2,    1,    3,    3,    1,    4,
            1,    1,    1,    1,    1,    1,    4,    4,    2,    1,
            1,    3,    3,    4,    6,    5,    5,    6,    5,    4,
            4,    4,    3,    4,    3,    2,    2,    1,    1,    2,
            3,    1,    1,    3,    2,    2,    1,    1,    3,    2,
            1,    2,    1,    1,    3,    2,    3,    5,    4,    5,
            4,    3,    3,    3,    4,    6,    5,    5,    6,    4,
            4,    2,    3,    3,    4,    3,    4,    1,    2,    1,
            4,    3,    2,    1,    2,    3,    2,    7,    1,    1,
            1,    1,    1,    1,    3,    4,    3,    2,    3,    1,
            2,    1,    1,    1,    2,    7,    5,    5,    5,    7,
            6,    7,    6,    7,    3,    2,    2,    2,    3,    1,
            2,    1,    1,    4,    3,    1,    2
    );

    protected array $productions = array(
        "\$start : translation_unit",
        "primary_expression : IDENTIFIER",
        "primary_expression : constant",
        "primary_expression : string",
        "primary_expression : '(' expression ')'",
        "primary_expression : generic_selection",
        "constant : I_CONSTANT",
        "constant : F_CONSTANT",
        "constant : ENUMERATION_CONSTANT",
        "enumeration_constant : IDENTIFIER",
        "string : STRING_LITERAL",
        "string : FUNC_NAME",
        "generic_selection : GENERIC '(' assignment_expression ',' generic_assoc_list ')'",
        "generic_assoc_list : generic_association",
        "generic_assoc_list : generic_assoc_list ',' generic_association",
        "generic_association : type_name ':' assignment_expression",
        "generic_association : DEFAULT ':' assignment_expression",
        "postfix_expression : primary_expression",
        "postfix_expression : postfix_expression '[' expression ']'",
        "postfix_expression : postfix_expression '(' ')'",
        "postfix_expression : postfix_expression '(' argument_expression_list ')'",
        "postfix_expression : postfix_expression '.' IDENTIFIER",
        "postfix_expression : postfix_expression PTR_OP IDENTIFIER",
        "postfix_expression : postfix_expression INC_OP",
        "postfix_expression : postfix_expression DEC_OP",
        "postfix_expression : '(' type_name ')' '{' initializer_list '}'",
        "postfix_expression : '(' type_name ')' '{' initializer_list ',' '}'",
        "argument_expression_list : assignment_expression",
        "argument_expression_list : argument_expression_list ',' assignment_expression",
        "unary_expression : postfix_expression",
        "unary_expression : INC_OP unary_expression",
        "unary_expression : DEC_OP unary_expression",
        "unary_expression : unary_operator cast_expression",
        "unary_expression : SIZEOF unary_expression",
        "unary_expression : SIZEOF '(' type_name ')'",
        "unary_expression : ALIGNOF '(' type_name ')'",
        "unary_operator : '&'",
        "unary_operator : '*'",
        "unary_operator : '+'",
        "unary_operator : '-'",
        "unary_operator : '~'",
        "unary_operator : '!'",
        "cast_expression : unary_expression",
        "cast_expression : '(' type_name ')' cast_expression",
        "multiplicative_expression : cast_expression",
        "multiplicative_expression : multiplicative_expression '*' cast_expression",
        "multiplicative_expression : multiplicative_expression '/' cast_expression",
        "multiplicative_expression : multiplicative_expression '%' cast_expression",
        "additive_expression : multiplicative_expression",
        "additive_expression : additive_expression '+' multiplicative_expression",
        "additive_expression : additive_expression '-' multiplicative_expression",
        "shift_expression : additive_expression",
        "shift_expression : shift_expression LEFT_OP additive_expression",
        "shift_expression : shift_expression RIGHT_OP additive_expression",
        "relational_expression : shift_expression",
        "relational_expression : relational_expression '<' shift_expression",
        "relational_expression : relational_expression '>' shift_expression",
        "relational_expression : relational_expression LE_OP shift_expression",
        "relational_expression : relational_expression GE_OP shift_expression",
        "equality_expression : relational_expression",
        "equality_expression : equality_expression EQ_OP relational_expression",
        "equality_expression : equality_expression NE_OP relational_expression",
        "and_expression : equality_expression",
        "and_expression : and_expression '&' equality_expression",
        "exclusive_or_expression : and_expression",
        "exclusive_or_expression : exclusive_or_expression '^' and_expression",
        "inclusive_or_expression : exclusive_or_expression",
        "inclusive_or_expression : inclusive_or_expression '|' exclusive_or_expression",
        "logical_and_expression : inclusive_or_expression",
        "logical_and_expression : logical_and_expression AND_OP inclusive_or_expression",
        "logical_or_expression : logical_and_expression",
        "logical_or_expression : logical_or_expression OR_OP logical_and_expression",
        "conditional_expression : logical_or_expression",
        "conditional_expression : logical_or_expression '?' expression ':' conditional_expression",
        "assignment_expression : conditional_expression",
        "assignment_expression : unary_expression assignment_operator assignment_expression",
        "assignment_operator : '='",
        "assignment_operator : MUL_ASSIGN",
        "assignment_operator : DIV_ASSIGN",
        "assignment_operator : MOD_ASSIGN",
        "assignment_operator : ADD_ASSIGN",
        "assignment_operator : SUB_ASSIGN",
        "assignment_operator : LEFT_ASSIGN",
        "assignment_operator : RIGHT_ASSIGN",
        "assignment_operator : AND_ASSIGN",
        "assignment_operator : XOR_ASSIGN",
        "assignment_operator : OR_ASSIGN",
        "expression : assignment_expression",
        "expression : expression ',' assignment_expression",
        "constant_expression : conditional_expression",
        "declaration : declaration_specifiers ';'",
        "declaration : declaration_specifiers init_declarator_list ';'",
        "declaration : static_assert_declaration",
        "declaration_specifiers : storage_class_specifier declaration_specifiers",
        "declaration_specifiers : storage_class_specifier",
        "declaration_specifiers : type_specifier declaration_specifiers",
        "declaration_specifiers : type_specifier",
        "declaration_specifiers : type_qualifier declaration_specifiers",
        "declaration_specifiers : type_qualifier",
        "declaration_specifiers : function_specifier declaration_specifiers",
        "declaration_specifiers : function_specifier",
        "declaration_specifiers : alignment_specifier declaration_specifiers",
        "declaration_specifiers : alignment_specifier",
        "init_declarator_list : init_declarator",
        "init_declarator_list : init_declarator_list ',' init_declarator",
        "init_declarator : declarator '=' initializer",
        "init_declarator : declarator",
        "storage_class_specifier : TYPEDEF",
        "storage_class_specifier : EXTERN",
        "storage_class_specifier : STATIC",
        "storage_class_specifier : THREAD_LOCAL",
        "storage_class_specifier : AUTO",
        "storage_class_specifier : REGISTER",
        "type_specifier : VOID",
        "type_specifier : CHAR",
        "type_specifier : SHORT",
        "type_specifier : INT",
        "type_specifier : LONG",
        "type_specifier : FLOAT",
        "type_specifier : DOUBLE",
        "type_specifier : SIGNED",
        "type_specifier : UNSIGNED",
        "type_specifier : BOOL",
        "type_specifier : COMPLEX",
        "type_specifier : IMAGINARY",
        "type_specifier : atomic_type_specifier",
        "type_specifier : struct_or_union_specifier",
        "type_specifier : enum_specifier",
        "type_specifier : TYPEDEF_NAME",
        "struct_or_union_specifier : struct_or_union '{' struct_declaration_list '}'",
        "struct_or_union_specifier : struct_or_union IDENTIFIER '{' struct_declaration_list '}'",
        "struct_or_union_specifier : struct_or_union IDENTIFIER",
        "struct_or_union_specifier : struct_or_union TYPEDEF_NAME '{' struct_declaration_list '}'",
        "struct_or_union_specifier : struct_or_union TYPEDEF_NAME",
        "struct_or_union : STRUCT",
        "struct_or_union : UNION",
        "struct_declaration_list : struct_declaration",
        "struct_declaration_list : struct_declaration_list struct_declaration",
        "struct_declaration : specifier_qualifier_list ';'",
        "struct_declaration : specifier_qualifier_list struct_declarator_list ';'",
        "struct_declaration : static_assert_declaration",
        "specifier_qualifier_list : type_specifier specifier_qualifier_list",
        "specifier_qualifier_list : type_specifier",
        "specifier_qualifier_list : type_qualifier specifier_qualifier_list",
        "specifier_qualifier_list : type_qualifier",
        "struct_declarator_list : struct_declarator",
        "struct_declarator_list : struct_declarator_list ',' struct_declarator",
        "struct_declarator : ':' constant_expression",
        "struct_declarator : declarator ':' constant_expression",
        "struct_declarator : declarator",
        "enum_specifier : ENUM '{' enumerator_list '}'",
        "enum_specifier : ENUM '{' enumerator_list ',' '}'",
        "enum_specifier : ENUM IDENTIFIER '{' enumerator_list '}'",
        "enum_specifier : ENUM IDENTIFIER '{' enumerator_list ',' '}'",
        "enum_specifier : ENUM IDENTIFIER",
        "enumerator_list : enumerator",
        "enumerator_list : enumerator_list ',' enumerator",
        "enumerator : enumeration_constant '=' constant_expression",
        "enumerator : enumeration_constant",
        "atomic_type_specifier : ATOMIC '(' type_name ')'",
        "type_qualifier : CONST",
        "type_qualifier : RESTRICT",
        "type_qualifier : VOLATILE",
        "type_qualifier : ATOMIC",
        "function_specifier : INLINE",
        "function_specifier : NORETURN",
        "alignment_specifier : ALIGNAS '(' type_name ')'",
        "alignment_specifier : ALIGNAS '(' constant_expression ')'",
        "declarator : pointer direct_declarator",
        "declarator : direct_declarator",
        "direct_declarator : IDENTIFIER",
        "direct_declarator : '(' declarator ')'",
        "direct_declarator : direct_declarator '[' ']'",
        "direct_declarator : direct_declarator '[' '*' ']'",
        "direct_declarator : direct_declarator '[' STATIC type_qualifier_list assignment_expression ']'",
        "direct_declarator : direct_declarator '[' STATIC assignment_expression ']'",
        "direct_declarator : direct_declarator '[' type_qualifier_list '*' ']'",
        "direct_declarator : direct_declarator '[' type_qualifier_list STATIC assignment_expression ']'",
        "direct_declarator : direct_declarator '[' type_qualifier_list assignment_expression ']'",
        "direct_declarator : direct_declarator '[' type_qualifier_list ']'",
        "direct_declarator : direct_declarator '[' assignment_expression ']'",
        "direct_declarator : direct_declarator '(' parameter_type_list ')'",
        "direct_declarator : direct_declarator '(' ')'",
        "direct_declarator : direct_declarator '(' identifier_list ')'",
        "pointer : '*' type_qualifier_list pointer",
        "pointer : '*' type_qualifier_list",
        "pointer : '*' pointer",
        "pointer : '*'",
        "type_qualifier_list : type_qualifier",
        "type_qualifier_list : type_qualifier_list type_qualifier",
        "parameter_type_list : parameter_list ',' ELLIPSIS",
        "parameter_type_list : parameter_list",
        "parameter_list : parameter_declaration",
        "parameter_list : parameter_list ',' parameter_declaration",
        "parameter_declaration : declaration_specifiers declarator",
        "parameter_declaration : declaration_specifiers abstract_declarator",
        "parameter_declaration : declaration_specifiers",
        "identifier_list : IDENTIFIER",
        "identifier_list : identifier_list ',' IDENTIFIER",
        "type_name : specifier_qualifier_list abstract_declarator",
        "type_name : specifier_qualifier_list",
        "abstract_declarator : pointer direct_abstract_declarator",
        "abstract_declarator : pointer",
        "abstract_declarator : direct_abstract_declarator",
        "direct_abstract_declarator : '(' abstract_declarator ')'",
        "direct_abstract_declarator : '[' ']'",
        "direct_abstract_declarator : '[' '*' ']'",
        "direct_abstract_declarator : '[' STATIC type_qualifier_list assignment_expression ']'",
        "direct_abstract_declarator : '[' STATIC assignment_expression ']'",
        "direct_abstract_declarator : '[' type_qualifier_list STATIC assignment_expression ']'",
        "direct_abstract_declarator : '[' type_qualifier_list assignment_expression ']'",
        "direct_abstract_declarator : '[' type_qualifier_list ']'",
        "direct_abstract_declarator : '[' assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' '*' ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' STATIC type_qualifier_list assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' STATIC assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' type_qualifier_list assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' type_qualifier_list STATIC assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' type_qualifier_list ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' assignment_expression ']'",
        "direct_abstract_declarator : '(' ')'",
        "direct_abstract_declarator : '(' parameter_type_list ')'",
        "direct_abstract_declarator : direct_abstract_declarator '(' ')'",
        "direct_abstract_declarator : direct_abstract_declarator '(' parameter_type_list ')'",
        "initializer : '{' initializer_list '}'",
        "initializer : '{' initializer_list ',' '}'",
        "initializer : assignment_expression",
        "initializer_list : designation initializer",
        "initializer_list : initializer",
        "initializer_list : initializer_list ',' designation initializer",
        "initializer_list : initializer_list ',' initializer",
        "designation : designator_list '='",
        "designator_list : designator",
        "designator_list : designator_list designator",
        "designator : '[' constant_expression ']'",
        "designator : '.' IDENTIFIER",
        "static_assert_declaration : STATIC_ASSERT '(' constant_expression ',' STRING_LITERAL ')' ';'",
        "statement : labeled_statement",
        "statement : compound_statement",
        "statement : expression_statement",
        "statement : selection_statement",
        "statement : iteration_statement",
        "statement : jump_statement",
        "labeled_statement : IDENTIFIER ':' statement",
        "labeled_statement : CASE constant_expression ':' statement",
        "labeled_statement : DEFAULT ':' statement",
        "compound_statement : '{' '}'",
        "compound_statement : '{' block_item_list '}'",
        "block_item_list : block_item",
        "block_item_list : block_item_list block_item",
        "block_item : declaration",
        "block_item : statement",
        "expression_statement : ';'",
        "expression_statement : expression ';'",
        "selection_statement : IF '(' expression ')' statement ELSE statement",
        "selection_statement : IF '(' expression ')' statement",
        "selection_statement : SWITCH '(' expression ')' statement",
        "iteration_statement : WHILE '(' expression ')' statement",
        "iteration_statement : DO statement WHILE '(' expression ')' ';'",
        "iteration_statement : FOR '(' expression_statement expression_statement ')' statement",
        "iteration_statement : FOR '(' expression_statement expression_statement expression ')' statement",
        "iteration_statement : FOR '(' declaration expression_statement ')' statement",
        "iteration_statement : FOR '(' declaration expression_statement expression ')' statement",
        "jump_statement : GOTO IDENTIFIER ';'",
        "jump_statement : CONTINUE ';'",
        "jump_statement : BREAK ';'",
        "jump_statement : RETURN ';'",
        "jump_statement : RETURN expression ';'",
        "translation_unit : external_declaration",
        "translation_unit : translation_unit external_declaration",
        "external_declaration : function_definition",
        "external_declaration : declaration",
        "function_definition : declaration_specifiers declarator declaration_list compound_statement",
        "function_definition : declaration_specifiers declarator compound_statement",
        "declaration_list : declaration",
        "declaration_list : declaration_list declaration"
    );

    protected function initReduceCallbacks() {
        $this->reduceCallbacks = [
            0 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            1 => function ($stackPos) {
                 $this->semValue = new Expr\DeclRefExpr($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            2 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            3 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            4 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(3-2)]; 
            },
            5 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            6 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ValueStmt\Expr\IntegerLiteral($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            7 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ValueStmt\Expr\FloatLiteral($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            8 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ValueStmt\Expr\DeclRefExpr($this->semStack[$stackPos-(1-1)], $this->scope->enum($this->semStack[$stackPos-(1-1)]), $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            9 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            10 => function ($stackPos) {
                 throw new Error('string_literal not implemented'); 
            },
            11 => function ($stackPos) {
                 throw new Error('func name not implemented'); 
            },
            12 => function ($stackPos) {
                 throw new Error('generic not implemented'); 
            },
            13 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            14 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            15 => function ($stackPos) {
                 throw new Error('generic association typename not implemented'); 
            },
            16 => function ($stackPos) {
                 throw new Error('generic association default not implemented'); 
            },
            17 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            18 => function ($stackPos) {
                 throw new Error('dim fetch not implemented'); 
            },
            19 => function ($stackPos) {
                 throw new Error('call no args not implemented'); 
            },
            20 => function ($stackPos) {
                 throw new Error('call with args not implemented'); 
            },
            21 => function ($stackPos) {
                 throw new Error('.identifier not implemented'); 
            },
            22 => function ($stackPos) {
                 throw new Error('->identifier not implemented'); 
            },
            23 => function ($stackPos) {
                 $this->semValue = new Expr\UnaryOperator($this->semStack[$stackPos-(2-2)], Expr\UnaryOperator::KIND_POSTINC, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            24 => function ($stackPos) {
                 $this->semValue = new Expr\UnaryOperator($this->semStack[$stackPos-(2-2)], Expr\UnaryOperator::KIND_POSTDEC, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            25 => function ($stackPos) {
                 throw new Error('initializer list no trailing not implemented'); 
            },
            26 => function ($stackPos) {
                 throw new Error('initializer list trailing not implemented'); 
            },
            27 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            28 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            29 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            30 => function ($stackPos) {
                 $this->semValue = new Expr\UnaryOperator($this->semStack[$stackPos-(2-2)], Expr\UnaryOperator::KIND_PREINC, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            31 => function ($stackPos) {
                 $this->semValue = new Expr\UnaryOperator($this->semStack[$stackPos-(2-2)], Expr\UnaryOperator::KIND_PREDEC, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            32 => function ($stackPos) {
                 $this->semValue = new Expr\UnaryOperator($this->semStack[$stackPos-(2-2)], $this->semStack[$stackPos-(2-1)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            33 => function ($stackPos) {
                 $this->semValue = new Expr\UnaryOperator($this->semStack[$stackPos-(2-2)], Expr\UnaryOperator::KIND_SIZEOF, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            34 => function ($stackPos) {
                 $this->semValue = new Expr\UnaryOperator($this->semStack[$stackPos-(4-3)], Expr\UnaryOperator::KIND_SIZEOF, $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            35 => function ($stackPos) {
                 $this->semValue = new Expr\UnaryOperator($this->semStack[$stackPos-(4-3)], Expr\UnaryOperator::KIND_ALIGNOF, $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            36 => function ($stackPos) {
                 $this->semValue = Expr\UnaryOperator::KIND_ADDRESS_OF; 
            },
            37 => function ($stackPos) {
                 $this->semValue = Expr\UnaryOperator::KIND_DEREF; 
            },
            38 => function ($stackPos) {
                 $this->semValue = Expr\UnaryOperator::KIND_PLUS; 
            },
            39 => function ($stackPos) {
                 $this->semValue = Expr\UnaryOperator::KIND_MINUS; 
            },
            40 => function ($stackPos) {
                 $this->semValue = Expr\UnaryOperator::KIND_BITWISE_NOT; 
            },
            41 => function ($stackPos) {
                 $this->semValue = Expr\UnaryOperator::KIND_LOGICAL_NOT; 
            },
            42 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            43 => function ($stackPos) {
                 $this->semValue = new Expr\CastExpr($this->semStack[$stackPos-(4-4)], $this->semStack[$stackPos-(4-2)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            44 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            45 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_MUL, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            46 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_DIV, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            47 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_REM, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            48 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            49 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_ADD, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            50 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_SUB, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            51 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            52 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_SHL, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            53 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_SHR, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            54 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            55 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_LT, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            56 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_GT, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            57 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_LE, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            58 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_GE, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            59 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            60 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_EQ, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            61 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_NE, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            62 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            63 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_BITWISE_AND, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            64 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            65 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_BITWISE_XOR, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            66 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            67 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_BITWISE_OR, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            68 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            69 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_LOGICAL_AND, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            70 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            71 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_LOGICAL_OR, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            72 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            73 => function ($stackPos) {
                 throw new Error('ternary not implemented'); 
            },
            74 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            75 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            76 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_ASSIGN; 
            },
            77 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_MUL_ASSIGN; 
            },
            78 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_DIV_ASSIGN; 
            },
            79 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_REM_ASSIGN; 
            },
            80 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_ADD_ASSIGN; 
            },
            81 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_SUB_ASSIGN; 
            },
            82 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_SHL_ASSIGN; 
            },
            83 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_SHR_ASSIGN; 
            },
            84 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_AND_ASSIGN; 
            },
            85 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_XOR_ASSIGN; 
            },
            86 => function ($stackPos) {
                 $this->semValue = Expr\BinaryOperator::KIND_OR_ASSIGN; 
            },
            87 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            88 => function ($stackPos) {
                 $this->semValue = new Expr\BinaryOperator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], Expr\BinaryOperator::KIND_COMMA, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            89 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            90 => function ($stackPos) {
                 $this->semValue = new IR\Declaration($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], [], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            91 => function ($stackPos) {
                 $this->semValue = new IR\Declaration($this->semStack[$stackPos-(3-1)][0], $this->semStack[$stackPos-(3-1)][1], $this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            92 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            93 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            94 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], []]; 
            },
            95 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; array_unshift($this->semValue[1], $this->semStack[$stackPos-(2-1)]); 
            },
            96 => function ($stackPos) {
                 $this->semValue = [0, [$this->semStack[$stackPos-(1-1)]]]; 
            },
            97 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            98 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], []]; 
            },
            99 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            100 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], []]; 
            },
            101 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            102 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], []]; 
            },
            103 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            104 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            105 => function ($stackPos) {
                 $this->semValue = new IR\InitDeclarator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            106 => function ($stackPos) {
                 $this->semValue = new IR\InitDeclarator($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            107 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_TYPEDEF; 
            },
            108 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_EXTERN; 
            },
            109 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_STATIC; 
            },
            110 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_THREAD_LOCAL; 
            },
            111 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_AUTO; 
            },
            112 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_REGISTER; 
            },
            113 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            114 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            115 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            116 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            117 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            118 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            119 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            120 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            121 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            122 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            123 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            124 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            125 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            126 => function ($stackPos) {
                 $this->semValue = new Node\Type\TagType\RecordType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            127 => function ($stackPos) {
                 $this->semValue = new Node\Type\TagType\EnumType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            128 => function ($stackPos) {
                 $this->semValue = new Node\Type\TypedefType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            129 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(4-1)], null, $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            130 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(5-1)], $this->semStack[$stackPos-(5-2)], $this->semStack[$stackPos-(5-4)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            131 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            132 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(5-1)], $this->semStack[$stackPos-(5-2)], $this->semStack[$stackPos-(5-4)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            133 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            134 => function ($stackPos) {
                 $this->semValue = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_STRUCT; 
            },
            135 => function ($stackPos) {
                 $this->semValue = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_UNION; 
            },
            136 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            137 => function ($stackPos) {
                 $this->semValue = array_merge($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)]); 
            },
            138 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileStructField($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            139 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileStructField($this->semStack[$stackPos-(3-1)][0], $this->semStack[$stackPos-(3-1)][1], $this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            140 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            141 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; array_unshift($this->semValue[1], $this->semStack[$stackPos-(2-1)]); 
            },
            142 => function ($stackPos) {
                 $this->semValue = [0, [$this->semStack[$stackPos-(1-1)]]]; 
            },
            143 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            144 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], []]; 
            },
            145 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            146 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            147 => function ($stackPos) {
                 $this->semValue = new IR\FieldDeclaration(null, $this->semStack[$stackPos-(2-1)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            148 => function ($stackPos) {
                 $this->semValue = new IR\FieldDeclaration($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            149 => function ($stackPos) {
                 $this->semValue = new IR\FieldDeclaration($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            150 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl(null, $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            151 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl(null, $this->semStack[$stackPos-(5-3)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            152 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl($this->semStack[$stackPos-(5-2)], $this->semStack[$stackPos-(5-4)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            153 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl($this->semStack[$stackPos-(6-2)], $this->semStack[$stackPos-(6-4)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            154 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl($this->semStack[$stackPos-(2-2)], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            155 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            156 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            157 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\ValueDecl\EnumConstantDecl($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); $this->scope->enumdef($this->semStack[$stackPos-(3-1)], $this->semValue); 
            },
            158 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\ValueDecl\EnumConstantDecl($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); $this->scope->enumdef($this->semStack[$stackPos-(1-1)], $this->semValue); 
            },
            159 => function ($stackPos) {
                 throw new Error('atomic type_name not implemented'); 
            },
            160 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_CONST; 
            },
            161 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_RESTRICT; 
            },
            162 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_VOLATILE; 
            },
            163 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_ATOMIC; 
            },
            164 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_INLINE; 
            },
            165 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_NORETURN; 
            },
            166 => function ($stackPos) {
                 throw new Error('alignas type_name not implemented'); 
            },
            167 => function ($stackPos) {
                 throw new Error('alignas constant_expression not implemented'); 
            },
            168 => function ($stackPos) {
                 $this->semValue = new IR\Declarator($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            169 => function ($stackPos) {
                 $this->semValue = new IR\Declarator(null, $this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            170 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Identifier($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            171 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Declarator($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            172 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\IncompleteArray($this->semStack[$stackPos-(3-1)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            173 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\IncompleteArray($this->semStack[$stackPos-(4-1)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            174 => function ($stackPos) {
                 throw new Error('direct_declarator bracket static type_qualifier_list assignment_expression not implemented'); 
            },
            175 => function ($stackPos) {
                 throw new Error('direct_declarator bracket static assignment_expression not implemented'); 
            },
            176 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list star not implemented'); 
            },
            177 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list static assignment_expression not implemented'); 
            },
            178 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list assignment_expression not implemented'); 
            },
            179 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list not implemented'); 
            },
            180 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\CompleteArray($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            181 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Function_($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)][0], $this->semStack[$stackPos-(4-3)][1], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            182 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Function_($this->semStack[$stackPos-(3-1)], [], false, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            183 => function ($stackPos) {
                 throw new Error('direct_declarator params identifier list not implemented'); 
            },
            184 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer($this->semStack[$stackPos-(3-2)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            185 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer($this->semStack[$stackPos-(2-2)], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            186 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer(0, $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            187 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer(0, null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            188 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            189 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)] | $this->semStack[$stackPos-(2-2)]; 
            },
            190 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(3-1)], true]; 
            },
            191 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], false]; 
            },
            192 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            193 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            194 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileParamVarDeclaration($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            195 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileParamAbstractDeclaration($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            196 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileParamAbstractDeclaration($this->semStack[$stackPos-(1-1)][0], $this->semStack[$stackPos-(1-1)][1], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            197 => function ($stackPos) {
                 throw new Error('identifier_list identifier not implemented'); 
            },
            198 => function ($stackPos) {
                 throw new Error('identifier_list identifier_list identifier not implemented'); 
            },
            199 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileTypeReference($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            200 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileTypeReference($this->semStack[$stackPos-(1-1)][0], $this->semStack[$stackPos-(1-1)][1], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            201 => function ($stackPos) {
                 $this->semValue = new IR\AbstractDeclarator($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            202 => function ($stackPos) {
                 $this->semValue = new IR\AbstractDeclarator($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            203 => function ($stackPos) {
                 $this->semValue = new IR\AbstractDeclarator(null, $this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            204 => function ($stackPos) {
                 $this->semValue = new IR\DirectAbstractDeclarator\AbstractDeclarator($this->semStack[$stackPos-(3-1)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            205 => function ($stackPos) {
                 $this->semValue = new IR\DirectAbstractDeclarator\IncompleteArray($this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            206 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket star not implemented'); 
            },
            207 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket static type qualifier list assignment not implemented'); 
            },
            208 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket static assignment not implemented'); 
            },
            209 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket type qualifier list static assignment not implemented'); 
            },
            210 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket type qualifier list assignment not implemented'); 
            },
            211 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket type qualifier list not implemented'); 
            },
            212 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket assignment_expr not implemented'); 
            },
            213 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket not implemented'); 
            },
            214 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket star not implemented'); 
            },
            215 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket static type qualifier list assignment not implemented'); 
            },
            216 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket static assignment not implemented'); 
            },
            217 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket type qualifier list assignment not implemented'); 
            },
            218 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket type qualifier list static asssignment not implemented'); 
            },
            219 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket type qualifier list not implemented'); 
            },
            220 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket assignment_expr not implemented'); 
            },
            221 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator empty parameter list not implemented'); 
            },
            222 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator parameter list not implemented'); 
            },
            223 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with empty parameter list not implemented'); 
            },
            224 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with parameter list not implemented'); 
            },
            225 => function ($stackPos) {
                 throw new Error('initializer brackend no trailing not implemented'); 
            },
            226 => function ($stackPos) {
                 throw new Error('initializer brackeded trailing not implemented'); 
            },
            227 => function ($stackPos) {
                 throw new Error('initializer assignment_expression not implemented'); 
            },
            228 => function ($stackPos) {
                 throw new Error('initializer_list designator initializer not implemented'); 
            },
            229 => function ($stackPos) {
                 throw new Error('initializer_list initializer not implemented'); 
            },
            230 => function ($stackPos) {
                 throw new Error('initializer_list initializer_list designator initializer not implemented'); 
            },
            231 => function ($stackPos) {
                 throw new Error('initializer_list initializer_list initializer not implemented'); 
            },
            232 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            233 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            234 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            235 => function ($stackPos) {
                 throw new Error('[] designator not implemented'); 
            },
            236 => function ($stackPos) {
                 throw new Error('. designator not implemented'); 
            },
            237 => function ($stackPos) {
                 throw new Error('static assert declaration not implemented'); 
            },
            238 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            239 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            240 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            241 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            242 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            243 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            244 => function ($stackPos) {
                 throw new Error('labeled_statement identifier not implemented'); 
            },
            245 => function ($stackPos) {
                 throw new Error('labeled_statement case not implemented'); 
            },
            246 => function ($stackPos) {
                 throw new Error('labeled_statement default not implemented'); 
            },
            247 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\CompoundStmt([], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            248 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\CompoundStmt($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            249 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            250 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            251 => function ($stackPos) {
                 throw new Error('block_item declaration not implemented'); 
            },
            252 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            253 => function ($stackPos) {
                 throw new Error('empty expression statement not implemented'); 
            },
            254 => function ($stackPos) {
                 throw new Error('expression statement not implemented'); 
            },
            255 => function ($stackPos) {
                 throw new Error('if else not implemented'); 
            },
            256 => function ($stackPos) {
                 throw new Error('if not implemented'); 
            },
            257 => function ($stackPos) {
                 throw new Error('switch not implemented'); 
            },
            258 => function ($stackPos) {
                 throw new Error('iteration 0 not implemented'); 
            },
            259 => function ($stackPos) {
                 throw new Error('iteration 1 not implemented'); 
            },
            260 => function ($stackPos) {
                 throw new Error('iteration 2 not implemented'); 
            },
            261 => function ($stackPos) {
                 throw new Error('iteration 3 not implemented'); 
            },
            262 => function ($stackPos) {
                 throw new Error('iteration 4 not implemented'); 
            },
            263 => function ($stackPos) {
                 throw new Error('iteration 5 not implemented'); 
            },
            264 => function ($stackPos) {
                 throw new Error('goto identifier not implemented'); 
            },
            265 => function ($stackPos) {
                 throw new Error('continue not implemented'); 
            },
            266 => function ($stackPos) {
                 throw new Error('break not implemented'); 
            },
            267 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ReturnStmt(null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            268 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ReturnStmt($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            269 => function ($stackPos) {
                 $this->semValue = new Node\TranslationUnitDecl($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            270 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)]; $this->semValue->addDecl(...$this->semStack[$stackPos-(2-2)]); 
            },
            271 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            272 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileExternalDeclaration($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            273 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileFunction($this->semStack[$stackPos-(4-1)][0], $this->semStack[$stackPos-(4-1)][1], $this->semStack[$stackPos-(4-2)], $this->semStack[$stackPos-(4-3)], $this->semStack[$stackPos-(4-4)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            274 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileFunction($this->semStack[$stackPos-(3-1)][0], $this->semStack[$stackPos-(3-1)][1], $this->semStack[$stackPos-(3-2)], [], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            275 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            276 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
        ];
    }
}
