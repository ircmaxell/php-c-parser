<?php

namespace PHPCParser;

use PHPCParser\Node\Stmt\ValueStmt\Expr;


/* This is an automatically GENERATED file, which should not be manually edited.
 */
class Parser extends ParserAbstract
{
    protected int $tokenToSymbolMapSize = 331;
    protected int $actionTableSize      = 537;
    protected int $gotoTableSize        = 279;

    protected int $invalidSymbol       = 100;
    protected int $errorSymbol         = 1;
    protected int $defaultAction       = -32766;
    protected int $unexpectedTokenRule = 32767;

    protected int $YY2TBLSTATE = 177;
    protected int $numNonLeafStates  = 279;

    protected array $symbolToName = array(
        "EOF",
        "error",
        "IDENTIFIER",
        "I_CONSTANT",
        "F_CONSTANT",
        "STRING_LITERAL",
        "FUNC_NAME",
        "SIZEOF",
        "ASM",
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
            0,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,   90,  100,  100,  100,   92,   85,  100,
           76,   77,   86,   87,   78,   88,   82,   91,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,   79,   99,
           93,   98,   94,   97,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,   80,  100,   81,   95,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,   83,   96,   84,   89,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100,  100,  100,  100,  100,    1,    2,    3,    4,
            5,    6,    7,    8,    9,   10,   11,   12,   13,   14,
           15,   16,   17,   18,   19,   20,   21,   22,   23,   24,
           25,   26,   27,   28,   29,   30,   31,   32,   33,   34,
           35,   36,   37,   38,   39,   40,   41,   42,   43,   44,
           45,   46,   47,   48,   49,   50,   51,   52,   53,   54,
           55,   56,   57,   58,   59,   60,   61,   62,   63,   64,
           65,   66,   67,   68,   69,   70,   71,   72,   73,   74,
           75
    );

    protected array $action = array(
          206,  285,  286,  289,  290,  112,  278,    1,  113,  114,
            0,  356,  357,  358,  359,  360,  361,  362,  363,  364,
          365,  109,   63,  202,  302,  303,  110,  111,   84,  287,
          236,   50,  505,  569,-32766,-32766,-32766,-32766,-32766,-32766,
          100,  101,  186,  206,  285,  286,  289,  290,  112,  278,
          235,  113,  114,   81,  232,   80,  207,  208,  570,  209,
          210,   10,  211,  212,  213,  214,   65,  271,  190,  182,
          191,-32766,  287,  417,    4,-32766,-32766,-32766,  104,  105,
          275,    1,  527,  315,  316,  317,  318,  319,  320,  355,
           64,    8,   98,   99,   71,   34,  203,  533,   80,  207,
          208,-32766,  209,  210,   10,  211,  212,  213,  214,   65,
          187,  190,   84,  191,  236,   50,  305,    4,  469,  102,
          103,  462,  237,  177,    1,  528,  315,  316,  317,  318,
          319,  320,   84,  449,  236,   50,-32766,   93,  188,  407,
          533,  386,  387,  388,  390,  391,  443,  439,  440,  441,
          401,  393,  394,  395,  396,  399,  400,  397,  398,  392,
          402,  403,  413,  414,  141,  280,  285,  286,  289,  290,
          112,   41,  476,  113,  114,  439,  440,  441,  183,  288,
          184,  301,  444,  185,  389,-32766,-32766,-32766,-32766,-32766,
        -32766,   52,  299,   87,  287,-32766,-32766,-32766,-32766,-32766,
        -32766,  280,  285,  286,  289,  290,  112,  128,  442,  113,
          114,  253,  439,  440,  441,   72,    9,  118,  451,  449,
           34,  300,-32766,  217,  515,  123,-32766,-32766,-32766,  477,
          287,-32766,-32766,  190,  502,  191,-32766,-32766,-32766,    4,
          439,  440,  441,  259,-32766,  442,  418,  461,  315,  316,
          317,  318,  319,  320,  280,  285,  286,  289,  290,  112,
          118,   39,  113,  114,   84,  265,  236,  504,  272,  190,
          206,  191,   40,  442,  127,    4,  278,   24,  304,  106,
          107,   33,  511,  287,  315,  316,  317,  318,  319,  320,
          137,-32766,  562,    8,  500,  370,  429,   34,  533,  138,
           26,  561,   94,  118,   35,  431,-32766,-32766,-32766,-32766,
        -32766,-32766,  249,-32766,-32766,-32766,-32766,-32766,-32766,    8,
        -32766,   19,  190,   34,  191,   80,  207,  208,    4,  209,
          210,   10,  211,  212,  213,  214,   65,  315,  316,  317,
          318,  319,  320,-32766,  291,   56,    3,-32766,    7,-32766,
        -32766,    1,   57,   58,-32766,   73,-32766,   14,  408,-32766,
        -32766,-32766,-32766,-32766,-32766,  409,   74,  533,   75,-32766,
        -32766,-32766,-32766,-32766,-32766,   76,   42,   77,   79,   43,
          439,  440,  441,  439,  440,  441,  269,   85,  274,    5,
            6,  439,  440,  441,   15,-32766,-32766,    9,  500,   88,
        -32766,   34,-32766,  439,  440,  441,-32766,  118,   16,   20,
        -32766,  411,-32766,  442,   89,   21,  442,   70,  439,  440,
          441,  241,   11,  484,  442,  242,  492,  248,  230,  263,
           12,  246,  268,  445,  458,  446,  442,  438,  450,  239,
          283,  460,   51,  314,  501,  483,  490,  503,  558,  557,
           17,  442,   18,  298,   97,   27,   55,  204,  430,  270,
          277,  498,   82,    0,   13,   86,   90,   91,  179,  180,
          181,   92,   81,    0,    0,  452,  459,  485,  491,  454,
          455,  457,  487,  489,  493,  499,  514,  453,  456,  486,
          488,  495,  496,  494,  497,  297,    0,    0,   53,   54,
          178,    1,   50,    0,  432,    0,    0,  118,-32766,    0,
            0,    0,    0,    0,    0,    0,    0,    0,   96,    0,
           95,    0,    0,   63,   78,    0,  545,  546,  544,  516,
          572,  539,  534,  548,  369,  533,  547
    );

    protected array $actionCheck = array(
            2,    3,    4,    5,    6,    7,    8,   83,   10,   11,
            0,   20,   21,   22,   23,   24,   25,   26,   27,   28,
           29,   86,   98,    9,   10,   11,   91,   92,   80,   31,
           82,   83,   84,   40,   32,   33,   34,   35,   36,   37,
           14,   15,    2,    2,    3,    4,    5,    6,    7,    8,
            2,   10,   11,   79,    5,   57,   58,   59,   65,   61,
           62,   63,   64,   65,   66,   67,   68,    2,   70,   76,
           72,   69,   31,   99,   76,   73,   74,   75,   12,   13,
            2,   83,   84,   85,   86,   87,   88,   89,   90,   98,
           76,   76,   16,   17,   80,   80,   82,   99,   57,   58,
           59,   86,   61,   62,   63,   64,   65,   66,   67,   68,
            2,   70,   80,   72,   82,   83,   84,   76,   56,   93,
           94,   77,   78,   83,   83,   84,   85,   86,   87,   88,
           89,   90,   80,    2,   82,   83,   74,   19,   30,   30,
           99,   32,   33,   34,   35,   36,   37,   38,   39,   40,
           41,   42,   43,   44,   45,   46,   47,   48,   49,   50,
           51,   52,   53,   54,   55,    2,    3,    4,    5,    6,
            7,   34,    2,   10,   11,   38,   39,   40,   69,    2,
           71,    2,   73,   74,   75,   32,   33,   34,   35,   36,
           37,   83,   77,   78,   31,   32,   33,   34,   35,   36,
           37,    2,    3,    4,    5,    6,    7,   76,   71,   10,
           11,   58,   38,   39,   40,   97,   76,   86,   81,    2,
           80,    2,   69,   86,    2,   78,   73,   74,   75,    2,
           31,   74,   69,   70,   77,   72,   73,   74,   75,   76,
           38,   39,   40,    5,   74,   71,   99,   77,   85,   86,
           87,   88,   89,   90,    2,    3,    4,    5,    6,    7,
           86,   78,   10,   11,   80,    5,   82,   84,    5,   70,
            2,   72,   78,   71,   78,   76,    8,   76,   84,   87,
           88,   80,   98,   31,   85,   86,   87,   88,   89,   90,
           78,   74,    5,   76,   77,   99,   84,   80,   99,   78,
           76,    5,   18,   86,   80,   84,   32,   33,   34,   35,
           36,   37,   62,   32,   33,   34,   35,   36,   37,   76,
           74,   60,   70,   80,   72,   57,   58,   59,   76,   61,
           62,   63,   64,   65,   66,   67,   68,   85,   86,   87,
           88,   89,   90,   69,   77,   78,   76,   73,   76,   75,
           69,   83,   76,   76,   73,   76,   75,   77,   84,   32,
           33,   34,   35,   36,   37,   84,   76,   99,   76,   32,
           33,   34,   35,   36,   37,   76,   34,   76,   76,   34,
           38,   39,   40,   38,   39,   40,   76,   34,   76,   76,
           76,   38,   39,   40,   77,   74,   69,   76,   77,   34,
           73,   80,   75,   38,   39,   40,   69,   86,   77,   77,
           73,   84,   75,   71,   34,   77,   71,   77,   38,   39,
           40,   77,   79,   81,   71,   77,   81,   77,   86,   77,
           79,   86,   77,   77,   81,   77,   71,   77,   77,   86,
           77,   77,   83,   77,   77,   77,   81,   77,   77,   77,
           77,   71,   77,   77,   85,   78,   78,   78,   84,   78,
           78,   81,   78,   -1,   79,   79,   79,   79,   79,   79,
           79,   79,   79,   -1,   -1,   81,   81,   81,   81,   81,
           81,   81,   81,   81,   81,   81,   81,   81,   81,   81,
           81,   81,   81,   81,   81,   81,   -1,   -1,   83,   83,
           83,   83,   83,   -1,   84,   -1,   -1,   86,   86,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   95,   -1,
           96,   -1,   -1,   98,   98,   -1,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99
    );

    protected array $actionBase = array(
          109,   -2,   41,  199,  163,  163,  163,  163,  217,  321,
          268,  268,  268,  268,  268,  268,  268,  268,  268,  268,
          268,  268,  -76,   10,  170,  418,  157,   62,  246,  246,
          246,  246,  246,  137,  342,  345,  353,  365,  380,  -52,
           32,  202,  202,  202,  202,  202,  202,  274,  281,  327,
           52,   52,  337,  337,  337,  153,  153,    2,    2,    2,
            2,  436,  436,  419,  376,  437,  419,  373,  375,  419,
          359,  252,  252,  252,  252,  252,  252,  252,  252,  252,
          252,  252,  252,  252,  252,  252,  252,  252,  252,  252,
          252,  252,  252,  252,  252,  252,  252,  252,  252,  252,
          252,  252,  252,  252,  252,  252,  252,  252,  252,  252,
          252,  252,  313,  314,  314,   -9,   14,  -26,  174,  174,
          435,  435,  243,  393,   26,   26,   26,  131,  131,  421,
           15,  184,  108,  -65,  -65,  -65,   -7,  374,  420,  422,
          140,   40,  196,  201,  212,  192,   66,   76,  118,  201,
          221,  363,  224,  433,   44,  147,  115,  414,  192,  192,
           66,   66,   66,   66,   76,  392,  224,  434,  183,  280,
          317,  331,  267,  194,  355,  332,  338,  177,  177,  260,
          260,  287,  238,  272,  276,  301,  417,  415,  416,  426,
          277,  302,  356,  369,  423,  424,  284,  358,  360,  379,
          361,  340,  179,  219,   49,  425,  343,  351,  279,  290,
          292,  270,   48,  427,  428,  364,  377,  394,  395,  386,
          344,  348,  366,  378,  369,  423,  424,  284,  367,  368,
          396,  397,  350,  385,  250,  429,  222,  227,  398,  399,
          400,  359,  359,  401,  402,  370,  403,  404,  430,  299,
          405,  406,  407,  387,  388,  408,  409,  410,  411,  389,
          352,  412,  413,  431,  261,  310,  381,  390,  432,   65,
          263,  371,  312,  391,   78,  372,  382,  296,    0,    0,
          109,  109,  109,  109,  109,  109,  109,  109,  109,  252,
          252,  252,  252,  252,  252,  252,  252,  252,  252,  252,
          252,  109,  109,  109,  109,  109,  109,  109,  109,  109,
          109,  109,  252,  252,  252,  252,  252,  252,  252,  252,
          252,  252,  252,  252,  252,  252,  109,  109,  109,  252,
          252,  109,  109,  109,  109,  109,  109,  109,  109,  109,
          252,  252,  252,  252,  252,  252,  252,  252,  252,  252,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,  252,  252,  252,    0,    0,  131,    0,    0,  131,
          131,  131,  131,    0,    0,    0,    0,    0,  140,  131,
            0,    0,    0,    0,    0,    0,  177,  177,  131,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
          384,    0,  384,    0,    0,    0,  384,    0,    0,    0,
            0,    0,    0,    0,  384,    0,  384,    0,  384,  384,
          384,    0,    0,  384,  384,  384
    );

    protected array $actionDefault = array(
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,  106,32767,32767,32767,32767,32767,   94,   96,
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
          202,32767,32767,   48,   49,   50,32767,32767,32767,32767,
          202,32767,32767,  169,32767,   51,   54,   62,   72,  168,
        32767,32767,  203,32767,32767,32767,32767,32767,   52,   53,
           57,   58,   55,   56,   63,32767,  201,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,  281,
          281,  285,32767,32767,  163,32767,  154,  131,  133,  158,
        32767,32767,32767,   64,   66,   68,   70,32767,32767,32767,
        32767,32767,32767,32767,32767,  106,    1,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,  191,   37,32767,  149,
        32767,32767,32767,32767,   65,   67,   69,   71,32767,32767,
           37,32767,32767,32767,32767,32767,32767,32767,32767,   37,
        32767,   34,32767,32767,32767,32767,   37,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,  286,
        32767,32767,32767,32767,  257,32767,  280,  287,32767,32767,
        32767,32767,32767,  288,32767,32767,  284,32767,  292
    );

    protected array $goto = array(
          321,   60,   60,   60,   60,  234,  524,  526,  525,  264,
          537,  538,  542,  540,  535,  543,  541,  160,  161,  162,
          163,  530,  201,  220,  221,  192,  415,  415,  415,  474,
          467,  467,  467,  468,  468,  468,  478,  550,  467,  467,
          467,  468,  468,  468,   60,   60,   60,  130,  140,   60,
           60,   60,   60,   60,   60,   60,   60,   60,  472,  552,
           37,   38,   61,  321,  215,  293,  245,   44,   45,   46,
          321,  321,  322,  321,  321,  198,  222,  321,  173,  321,
          554,  555,  552,  553,  556,  321,  321,  321,  321,  321,
          321,  321,  321,  321,  321,  321,  321,  321,  321,  321,
          321,  321,  321,  321,  321,  312,  309,  310,   48,   49,
          311,  324,  325,  326,  227,  467,  468,  218,  231,  247,
          240,  244,  258,  506,  506,  238,  243,  257,  251,  255,
          261,   66,   66,  225,  506,  506,   59,   59,   59,   59,
          151,  151,  151,  200,  119,  149,  166,  506,  306,  164,
          506,  125,  126,  506,  149,   62,  166,  465,  463,  226,
          368,  130,  224,  223,  158,  159,  367,  354,  140,  252,
          425,  307,  256,  262,  295,  294,  134,  135,  383,   59,
           59,   59,  434,  434,   59,   59,   59,   59,   59,   59,
           59,   59,   59,  419,  419,  419,    0,  120,  419,  419,
          419,  167,  513,  175,  176,  122,  122,  157,  165,  169,
          170,  171,  174,   67,   68,  150,  273,    0,    0,    0,
          120,  122,    0,  122,  122,  372,  374,  376,  378,  380,
          368,  368,    0,  368,  368,    0,    0,  368,    0,  368,
            0,  117,  117,  117,    0,  352,  117,  117,  117,    0,
            0,    0,    0,  420,  422,   22,  205,  473,    0,  508,
          508,    0,  205,  200,  199,  436,    0,  233,  426,    0,
            0,  250,  384,  427,    0,  507,    0,    0,  509
    );

    protected array $gotoCheck = array(
           15,   37,   37,   37,   37,   66,   66,   66,   66,   66,
           66,   66,   66,   66,   66,   66,   66,   20,   20,   20,
           20,   75,   11,   11,   11,   11,   48,   48,   48,   61,
           37,   37,   37,   37,   37,   37,   61,   76,   37,   37,
           37,   37,   37,   37,   37,   37,   37,   54,   54,   37,
           37,   37,   37,   37,   37,   37,   37,   37,   60,   31,
           56,   56,   31,   15,   57,   10,   57,   56,   56,   56,
           15,   15,   17,   15,   15,   11,   11,   15,   14,   15,
           68,   31,   31,   68,   31,   15,   15,   15,   15,   15,
           15,   15,   15,   15,   15,   15,   15,   15,   15,   15,
           15,   15,   15,   15,   15,   15,   15,   15,   47,   47,
           17,   17,   17,   17,   26,   37,   37,    8,    8,    8,
            8,    8,    8,    8,    8,    8,    8,    8,    8,    8,
            8,   63,   63,   24,    8,    8,   36,   36,   36,   36,
            5,    5,    5,   41,   56,   55,   62,    8,    8,   22,
            8,   21,   21,    8,   55,   69,   62,   54,   54,   25,
           28,   54,   23,    8,   19,   19,    8,    8,   54,    8,
           51,    8,    8,    8,    8,    8,   18,   18,   40,   36,
           36,   36,   53,   53,   36,   36,   36,   36,   36,   36,
           36,   36,   36,   34,   34,   34,   -1,   32,   34,   34,
           34,    5,   65,    5,    5,   32,   32,    5,    5,    5,
            5,    5,    5,   69,   69,   52,   80,   -1,   -1,   -1,
           32,   32,   -1,   32,   32,   32,   32,   32,   32,   32,
           28,   28,   -1,   28,   28,   -1,   -1,   28,   -1,   28,
           -1,   49,   49,   49,   -1,   28,   49,   49,   49,   -1,
           -1,   -1,   -1,   49,   49,   41,   41,   41,   -1,   42,
           42,   -1,   41,   41,   30,   30,   -1,   30,   30,   -1,
           -1,   30,   42,   30,   -1,   42,   -1,   -1,   42
    );

    protected array $gotoBase = array(
            0,    0,    0,    0,    0,  136,    0,    0,   84,    0,
            9,   18,    0,    0,   27,   -7,    0,    2,   70,   60,
          -83,   53,   52,   66,   38,   65,   21,    0,  153,    0,
          187,   59,  197,    0,  146,    0,  132,   -3,    0,    0,
           51,  135,  209,    0,    0,    0,    0,   55,  -26,  194,
            0,   47,   37,    5,   39,   15,   26,   40,    0,    0,
           31,  -93,   16,   81,    0,   71,   -5,    0,   58,  152,
            0,    0,    0,    0,    0,   19,   14,    0,    0,    0,
           36,    0,    0,    0,    0
    );

    protected array $gotoDefault = array(
        -32768,   23,  296,  281,  282,  153,  284,  189,  366,  172,
          292,  254,  116,  156,  168,  115,  108,  323,  133,  145,
          146,  124,  147,  193,  194,  195,  196,  148,  353,   83,
          197,  531,  121,  142,  371,   28,   29,   30,   31,   32,
          382,  219,  510,  404,  405,  406,  132,   47,  416,  129,
          155,  424,  144,  435,  139,  143,   36,  228,  154,  216,
          471,  229,  152,   69,  131,  512,  532,  517,  518,  519,
          520,  521,  522,  523,    2,  529,  549,  551,   25,  266,
          267,  276,  568,  260,  136
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
           66,   66,   66,   66,   66,   67,   67,   67,   68,   68,
           74,   74,   75,   75,   69,   69,   70,   70,   70,   71,
           71,   71,   71,   71,   71,   72,   72,   72,   72,   72,
            1,    1,   76,   76,   77,   77,   78,   78,   79,   79,
           80,   80,   81,   81,   82,   82,   83,   83,   83,   83,
           84,   84,   84,   73
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
            1,    1,    1,    1,    1,    3,    4,    3,    2,    3,
            1,    2,    1,    1,    1,    2,    7,    5,    5,    5,
            7,    6,    7,    6,    7,    3,    2,    2,    2,    3,
            1,    2,    1,    1,    4,    3,    1,    2,    6,    4,
            1,    0,    3,    1,    1,    0,    1,    3,    5,    7,
            2,    2,    0,    6
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
                 $this->semValue = new Node\Stmt\ValueStmt\Expr\StringLiteral($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
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
                 $this->semValue = new Expr\CallExpr($this->semStack[$stackPos-(3-1)], [], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            20 => function ($stackPos) {
                 $this->semValue = new Expr\CallExpr($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
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
                 $this->semValue = new Expr\AbstractConditionalOperator\ConditionalOperator($this->semStack[$stackPos-(5-1)], $this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
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
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            245 => function ($stackPos) {
                 throw new Error('labeled_statement identifier not implemented'); 
            },
            246 => function ($stackPos) {
                 throw new Error('labeled_statement case not implemented'); 
            },
            247 => function ($stackPos) {
                 throw new Error('labeled_statement default not implemented'); 
            },
            248 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\CompoundStmt([], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            249 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\CompoundStmt($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            250 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            251 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            252 => function ($stackPos) {
                 throw new Error('block_item declaration not implemented'); 
            },
            253 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            254 => function ($stackPos) {
                 $this->semValue = null; 
            },
            255 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            256 => function ($stackPos) {
                 throw new Error('if else not implemented'); 
            },
            257 => function ($stackPos) {
                 throw new Error('if not implemented'); 
            },
            258 => function ($stackPos) {
                 throw new Error('switch not implemented'); 
            },
            259 => function ($stackPos) {
                 throw new Error('iteration 0 not implemented'); 
            },
            260 => function ($stackPos) {
                 throw new Error('iteration 1 not implemented'); 
            },
            261 => function ($stackPos) {
                 throw new Error('iteration 2 not implemented'); 
            },
            262 => function ($stackPos) {
                 throw new Error('iteration 3 not implemented'); 
            },
            263 => function ($stackPos) {
                 throw new Error('iteration 4 not implemented'); 
            },
            264 => function ($stackPos) {
                 throw new Error('iteration 5 not implemented'); 
            },
            265 => function ($stackPos) {
                 throw new Error('goto identifier not implemented'); 
            },
            266 => function ($stackPos) {
                 throw new Error('continue not implemented'); 
            },
            267 => function ($stackPos) {
                 throw new Error('break not implemented'); 
            },
            268 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ReturnStmt(null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            269 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ReturnStmt($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            270 => function ($stackPos) {
                 $this->semValue = new Node\TranslationUnitDecl($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            271 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)]; $this->semValue->addDecl(...$this->semStack[$stackPos-(2-2)]); 
            },
            272 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            273 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileExternalDeclaration($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            274 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileFunction($this->semStack[$stackPos-(4-1)][0], $this->semStack[$stackPos-(4-1)][1], $this->semStack[$stackPos-(4-2)], $this->semStack[$stackPos-(4-3)], $this->semStack[$stackPos-(4-4)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            275 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileFunction($this->semStack[$stackPos-(3-1)][0], $this->semStack[$stackPos-(3-1)][1], $this->semStack[$stackPos-(3-2)], [], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            276 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            277 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            278 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(6-1)]; $this->semValue->operands[] = new Node\Asm\Operand($this->semStack[$stackPos-(6-3)], $this->semStack[$stackPos-(6-5)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            279 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Operands($this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); $this->semValue->operands[] = new Node\Asm\Operand($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            280 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            281 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Operands; 
            },
            282 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(3-1)]; $this->semValue->registers[] = $this->semStack[$stackPos-(3-3)]; 
            },
            283 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Registers($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); $this->semValue->registers[] = $this->semStack[$stackPos-(1-1)]; 
            },
            284 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            285 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Registers; 
            },
            286 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(1-1)], new Node\Asm\Operands, new Node\Asm\Operands, new Node\Asm\Registers, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            287 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], new Node\Asm\Operands, new Node\Asm\Registers, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            288 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(5-1)], $this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], new Node\Asm\Registers, $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            289 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(7-1)], $this->semStack[$stackPos-(7-3)], $this->semStack[$stackPos-(7-5)], $this->semStack[$stackPos-(7-7)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            290 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)] | Node\Stmt\AsmStmt::VOLATILE; 
            },
            291 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)] | Node\Stmt\AsmStmt::GOTO; 
            },
            292 => function ($stackPos) {
                 $this->semValue = 0; 
            },
            293 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(6-4)]; $this->semValue->modifiers = $this->semStack[$stackPos-(6-2)]; 
            },
        ];
    }
}
