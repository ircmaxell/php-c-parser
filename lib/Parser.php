<?php

namespace PHPCParser;

use PHPCParser\Node\Stmt\ValueStmt\Expr;


/* This is an automatically GENERATED file, which should not be manually edited.
 */
class Parser extends ParserAbstract
{
    protected int $tokenToSymbolMapSize = 332;
    protected int $actionTableSize      = 558;
    protected int $gotoTableSize        = 363;

    protected int $invalidSymbol       = 101;
    protected int $errorSymbol         = 1;
    protected int $defaultAction       = -32766;
    protected int $unexpectedTokenRule = 32767;

    protected int $YY2TBLSTATE = 184;
    protected int $numNonLeafStates  = 301;

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
        "ATTRIBUTE",
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
            0,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,   91,  101,  101,  101,   93,   86,  101,
           77,   78,   87,   88,   79,   89,   83,   92,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,   80,  100,
           94,   99,   95,   98,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,   81,  101,   82,   96,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,   84,   97,   85,   90,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,  101,  101,  101,  101,
          101,  101,  101,  101,  101,  101,    1,    2,    3,    4,
            5,    6,    7,    8,    9,   10,   11,   12,   13,   14,
           15,   16,   17,   18,   19,   20,   21,   22,   23,   24,
           25,   26,   27,   28,   29,   30,   31,   32,   33,   34,
           35,   36,   37,   38,   39,   40,   41,   42,   43,   44,
           45,   46,   47,   48,   49,   50,   51,   52,   53,   54,
           55,   56,   57,   58,   59,   60,   61,   62,   63,   64,
           65,   66,   67,   68,   69,   70,   71,   72,   73,   74,
           75,   76
    );

    protected array $action = array(
          225,  307,  308,  311,  312,  115,  300,    0,  116,  117,
          215,  378,  379,  380,  381,  382,  383,  384,  385,  386,
          387,  217,  465,  466,  467,  196,  465,  466,  467,  309,
          255,  103,  104,   86,  485,  256,   56,  543,  216,  225,
          307,  308,  311,  312,  115,  300,  293,  116,  117,   86,
          201,  256,   56,  327,   88,  468,   82,  226,  227,  468,
          228,  229,   11,  230,  231,  232,  233,   67,  309,  203,
          119,  204,  101,  102,  441,    4,   86,   86,  256,  256,
           56,  297,    1,  565,  337,  338,  339,  340,  341,  342,
          377,   96,   51,  607,  549,   82,  226,  227,  571,  228,
          229,   11,  230,  231,  232,  233,   67,  310,  203,  131,
          204,  105,  106,  126,    4,    1,    9,  507,  608,  119,
           35,    1,  566,  337,  338,  339,  340,  341,  342,  195,
           65,  323,  184,  514,  442,-32766,  431,  571,  410,  411,
          412,  414,  415,  469,  196,  465,  466,  467,  425,  417,
          418,  419,  420,  423,  424,  421,  422,  416,  426,  427,
          437,  438,  146,  302,  307,  308,  311,  312,  115,    8,
           74,  116,  117,   35,-32766,  322,  197,  540,  198,-32766,
          470,  199,  413,-32766,-32766,-32766,-32766,-32766,-32766,  553,
          130,  515,  309,-32766,-32766,-32766,-32766,-32766,-32766,  302,
          307,  308,  311,  312,  115,  252,-32766,  116,  117,  497,
          275,  392,  112,   49,   50,  257,  485,  113,  114,  542,
          326,-32766,  221,  324,  325,-32766,-32766,-32766,  309,  107,
          108,-32766,  203,  142,  204,-32766,-32766,-32766,    4,  455,
           24,   26,    8,  281,   34,   36,   35,  337,  338,  339,
          340,  341,  342,  302,  307,  308,  311,  312,  115,  143,
          287,  116,  117,  239,  194,  457,  498,  258,  203,  225,
          204,  321,   89,   90,    4,  300,  294,  196,  465,  466,
          467,  600,  309,  337,  338,  339,  340,  341,  342,-32766,
           66,    8,  538,  599,   73,   35,  222,  571,  313,   55,
          214,  119,   97,  109,  110,-32766,-32766,-32766,-32766,-32766,
        -32766,  468,-32766,-32766,-32766,-32766,-32766,-32766,   20,  196,
        -32766,  528,  203,  271,  204,   82,  226,  227,    4,  228,
          229,   11,  230,  231,  232,  233,   67,  337,  338,  339,
          340,  341,  342,-32766,   15,    3,    7,-32766,   16,-32766,
        -32766,    1,   58,   27,-32766,   59,-32766,   17,  188,-32766,
        -32766,-32766,-32766,-32766,-32766,  189,   75,  571,   76,   54,
           77,-32766,-32766,-32766,-32766,-32766,-32766,   78,-32766,-32766,
        -32766,-32766,-32766,-32766,   79,   40,   80,   81,  140,  196,
          465,  466,  467,-32766,  200,    9,  538,-32766,  234,   35,
          291,-32766,  296,-32766,   21,  119,    5,    6,   12,-32766,
           22,   72,  190,-32766,-32766,-32766,-32766,  223,  263,  264,
        -32766,   41,-32766,  468,  292,  196,  465,  466,  467,  299,
           42,  270,  285,  487,  196,  465,  466,  467,  237,   87,
          290,  471,  472,  196,  465,  466,  467,   92,  464,  486,
          476,  196,  465,  466,  467,  305,  496,  475,  336,  468,
          539,  521,  481,  480,  541,   52,  596,  595,  468,  522,
          218,   18,   19,  320,  250,   53,   84,  468,  530,   14,
           91,   93,   94,  268,  187,  468,  191,  494,  192,  193,
           95,   88,  260,  100,  488,  536,  495,  523,  529,  490,
          491,  493,  525,  527,  531,  537,  552,  489,  492,  524,
          526,  533,  534,  532,  535,  319,    0,    0,   57,  185,
            1,   56,    0,  456,  458,    0,    0,  119,-32766,    0,
            0,    0,    0,    0,    0,    0,    0,    0,   99,    0,
           98,    0,    0,   65,   83, -173,    0,  583,  584,  582,
          554,  610,  577,  572,  586,  391,  571,  585
    );

    protected array $actionCheck = array(
            2,    3,    4,    5,    6,    7,    8,    0,   10,   11,
            2,   20,   21,   22,   23,   24,   25,   26,   27,   28,
           29,    2,   39,   40,   41,   38,   39,   40,   41,   31,
            2,   14,   15,   81,    2,   83,   84,   85,   30,    2,
            3,    4,    5,    6,    7,    8,    2,   10,   11,   81,
            2,   83,   84,   85,   80,   72,   58,   59,   60,   72,
           62,   63,   64,   65,   66,   67,   68,   69,   31,   71,
           87,   73,   16,   17,  100,   77,   81,   81,   83,   83,
           84,    2,   84,   85,   86,   87,   88,   89,   90,   91,
           99,   19,   84,   41,   99,   58,   59,   60,  100,   62,
           63,   64,   65,   66,   67,   68,   69,    2,   71,   77,
           73,   94,   95,   79,   77,   84,   77,   57,   66,   87,
           81,   84,   85,   86,   87,   88,   89,   90,   91,   77,
           99,    2,   84,    2,  100,   75,   30,  100,   32,   33,
           34,   35,   36,   37,   38,   39,   40,   41,   42,   43,
           44,   45,   46,   47,   48,   49,   50,   51,   52,   53,
           54,   55,   56,    2,    3,    4,    5,    6,    7,   77,
           98,   10,   11,   81,   75,    2,   70,   78,   72,   87,
           74,   75,   76,   32,   33,   34,   35,   36,   37,    2,
           79,    2,   31,   32,   33,   34,   35,   36,   37,    2,
            3,    4,    5,    6,    7,    5,   75,   10,   11,   78,
           59,  100,   87,   79,   79,    5,    2,   92,   93,   85,
           85,   70,    9,   10,   11,   74,   75,   76,   31,   12,
           13,   70,   71,   79,   73,   74,   75,   76,   77,   85,
           77,   77,   77,    5,   81,   81,   81,   86,   87,   88,
           89,   90,   91,    2,    3,    4,    5,    6,    7,   79,
            5,   10,   11,   78,   79,   85,   78,   79,   71,    2,
           73,   78,   79,   34,   77,    8,    5,   38,   39,   40,
           41,    5,   31,   86,   87,   88,   89,   90,   91,   75,
           77,   77,   78,    5,   81,   81,   83,  100,   78,   79,
            8,   87,   18,   88,   89,   32,   33,   34,   35,   36,
           37,   72,   32,   33,   34,   35,   36,   37,   61,   38,
           75,   82,   71,   63,   73,   58,   59,   60,   77,   62,
           63,   64,   65,   66,   67,   68,   69,   86,   87,   88,
           89,   90,   91,   70,   78,   77,   77,   74,   78,   76,
           70,   84,   77,   79,   74,   77,   76,   78,   85,   32,
           33,   34,   35,   36,   37,   85,   77,  100,   77,   79,
           77,   32,   33,   34,   35,   36,   37,   77,   32,   33,
           34,   35,   36,   37,   77,   34,   77,   77,   77,   38,
           39,   40,   41,   75,   77,   77,   78,   70,   77,   81,
           77,   74,   77,   76,   78,   87,   77,   77,   80,   70,
           78,   78,   85,   74,   75,   76,   70,   79,   78,   78,
           74,   34,   76,   72,   79,   38,   39,   40,   41,   79,
           34,   78,   78,   82,   38,   39,   40,   41,   87,   34,
           78,   78,   78,   38,   39,   40,   41,   34,   78,   78,
           78,   38,   39,   40,   41,   78,   78,   78,   78,   72,
           78,   78,   78,   78,   78,   84,   78,   78,   72,   82,
           78,   78,   78,   78,   87,   84,   79,   72,   82,   80,
           80,   80,   80,   87,   80,   72,   80,   82,   80,   80,
           80,   80,   87,   86,   82,   82,   82,   82,   82,   82,
           82,   82,   82,   82,   82,   82,   82,   82,   82,   82,
           82,   82,   82,   82,   82,   82,   -1,   -1,   84,   84,
           84,   84,   -1,   85,   85,   -1,   -1,   87,   87,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   96,   -1,
           97,   -1,   -1,   99,   99,   99,   -1,  100,  100,  100,
          100,  100,  100,  100,  100,  100,  100,  100
    );

    protected array $actionBase = array(
          106,   -2,   37,  197,  161,  161,  161,  161,  214,  318,
           31,  267,  267,  267,  267,  267,  267,  267,  267,  267,
          267,  267,  267,    7,  131,  436,   99,   60,  245,  245,
          245,  245,  245,  245,  351,  387,  396,  405,  239,  413,
          -13,  -13,  -13,  -13,  -13,  -13,  273,  280,  327,  -48,
          -32,  346,  346,  346,  151,  151,   -4,   -4,  339,  339,
          339,  339,  339,  456,  456,  437,  395,  457,  437,  393,
          394,  437,  434,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  329,  330,  330,   -9,  -17,
          -17,  213,  -26,  455,  455,  165,  411,   17,   17,   17,
           32,   32,  440,   92,   -5,    8,  125,  125,  125,   52,
          392,  446,  438,  439,  441,   39,   48,  111,  163,  154,
          215,  217,   56,   72,  163,  185,  180,  377,  164,  453,
          188,  193,  433,  215,  215,  217,  217,  217,  217,   56,
          410,  164,  454,  134,   34,  385,  266,  270,  279,  220,
          135,  362,  326,  332,  105,  105,  281,  281,  281,  281,
          281,  255,  255,  276,   19,  238,  317,  269,  275,  309,
          311,  435,  292,  278,  310,  363,  407,  442,  443,  284,
          364,  370,  338,  371,  321,  381,  391,  289,  372,  445,
          333,  129,  173,  200,  444,  404,  328,  291,  293,  300,
          268,   28,  447,  448,  210,  378,  274,  412,  414,  379,
          340,  341,  380,  290,  407,  442,  443,  284,  382,  383,
          415,  416,  353,  399,  260,  449,  187,  384,  189,  417,
          418,  419,  400,  434,  434,  420,  421,  386,  422,  423,
          450,  307,  424,  425,  426,  401,  402,  427,  428,  429,
          430,  406,  354,  431,  432,  451,  257,  323,  345,  408,
          452,   44,  271,  388,  325,  409,   79,  389,  350,  288,
            0,    0,  106,  106,  106,  106,  106,  106,  106,  106,
          106,  106,  251,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  106,  106,  106,  106,  106,  106,
          106,  106,  106,  106,  106,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  251,  251,  106,  106,  106,
          251,  251,  106,  106,  106,  106,  106,  251,  251,  106,
          106,  106,  106,  106,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,  251,  251,  251,    0,
          281,  281,    0,   32,   32,   32,   32,   32,    0,    0,
            0,    0,    0,   39,   32,    0,    0,    0,    0,    0,
            0,   19,  281,  105,  105,   32,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,  397,    0,
          397,    0,    0,  397,    0,    0,    0,    0,    0,    0,
            0,  397,    0,  397,    0,    0,  397,  397,  397,  397,
            0,    0,  397,  397,  397
    );

    protected array $actionDefault = array(
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
          108,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,   94,   96,
           98,  100,  102,  104,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
          144,  146,  148,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,   42,  201,
          199,   29,32767,32767,32767,  212,32767,   59,   60,   61,
        32767,32767,  216,  218,32767,32767,   48,   49,   50,32767,
        32767,  162,32767,32767,32767,  218,32767,32767,  183,32767,
           51,   54,   62,   72,  182,32767,32767,32767,  219,32767,
        32767,32767,32767,   52,   53,   57,   58,   55,   56,   63,
        32767,  217,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,  173,  173,  173,  173,
          173,  297,  297,  301,32767,32767,32767,32767,  167,32767,
        32767,  158,  181,32767,32767,32767,   64,   66,   68,   70,
        32767,32767,32767,32767,32767,  133,  135,  178,32767,32767,
        32767,32767,32767,32767,  108,    1,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,  207,   37,32767,32767,
        32767,32767,32767,32767,   65,   67,   69,   71,32767,32767,
           37,32767,32767,32767,32767,32767,32767,32767,32767,32767,
           37,32767,  153,   34,32767,32767,32767,32767,   37,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,  302,32767,32767,32767,32767,  273,32767,  296,  303,
        32767,32767,32767,32767,32767,  304,32767,32767,  300,32767,
          308
    );

    protected array $goto = array(
           62,   62,   62,   62,  254,  564,  562,  563,  286,  575,
          576,  580,  578,  573,  581,  579,  220,  240,  241,  205,
          135,   13,  432,  433,  435,   60,   60,   60,   60,  568,
          505,  505,  505,  506,  506,  506,  505,  505,  505,  506,
          506,  506,   62,   62,   62,  512,  588,   62,   62,   62,
           62,   62,  516,  510,   62,   62,   62,   62,   62,  343,
          439,  439,  439,   61,   61,   61,   61,   60,   60,   60,
          211,  242,   60,   60,   60,   60,   60,  154,  247,   60,
           60,   60,   60,   60,  315,  443,  443,  443,  154,  213,
          443,  443,  443,  503,  503,  503,  504,  504,  504,  503,
          503,  503,  504,  504,  504,   61,   61,   61,  592,  245,
           61,   61,   61,   61,   61,  505,  506,   61,   61,   61,
           61,   61,  180,  591,  343,  212,  551,  253,  462,  246,
          171,  272,  343,  452,  343,  343,  453,  473,  343,  244,
          343,  390,  171,  343,  235,  451,  267,  343,  343,  343,
          343,  343,  343,  343,  343,  343,  343,  343,  343,  343,
          343,  343,  343,  343,  343,  343,  343,  334,  331,  332,
          165,  166,  167,  168,  169,  133,  145,  407,  503,  504,
           47,   48,  473,  473,  473,  473,  473,  238,  251,  269,
          261,  266,  280,  259,  265,  279,  273,  277,  283,  157,
          157,  157,  544,  544,   10,  224,  511,   68,   68,  544,
          544,  224,  213,  156,  390,    0,  390,  390,  544,  328,
          390,  544,  390,  295,  544,  390,    0,  123,  478,  374,
          128,  129,  163,  164,  243,  125,  125,  389,  376,    0,
          274,    0,  329,  278,    0,  284,  317,  316,   64,    0,
          123,  125,    0,  125,  125,  394,  396,  398,  400,  402,
          404,  344,  172,    0,  182,  183,  137,  138,  162,  170,
          175,  176,  177,  178,  181,  122,  122,  122,   38,   39,
          122,  122,  122,   43,   44,   45,  501,  499,    0,  444,
          446,  448,  133,    0,  590,  460,  460,   63,    0,  145,
          333,  346,  347,  348,  593,    0,  546,  546,   69,   70,
            0,    0,    0,    0,    0,  408,    0,  590,  545,  594,
            0,  547,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,  120
    );

    protected array $gotoCheck = array(
           40,   40,   40,   40,   71,   71,   71,   71,   71,   71,
           71,   71,   71,   71,   71,   71,   11,   11,   11,   11,
           48,   48,   48,   48,   48,   36,   36,   36,   36,   80,
           40,   40,   40,   40,   40,   40,   40,   40,   40,   40,
           40,   40,   40,   40,   40,   66,   81,   40,   40,   40,
           40,   40,   66,   65,   40,   40,   40,   40,   40,   15,
           50,   50,   50,   37,   37,   37,   37,   36,   36,   36,
           11,   11,   36,   36,   36,   36,   36,   60,   26,   36,
           36,   36,   36,   36,   10,   34,   34,   34,   60,   42,
           34,   34,   34,   37,   37,   37,   37,   37,   37,   37,
           37,   37,   37,   37,   37,   37,   37,   37,   73,   24,
           37,   37,   37,   37,   37,   40,   40,   37,   37,   37,
           37,   37,   14,   73,   15,   30,   70,   30,   30,   25,
           67,   30,   15,   30,   15,   15,   30,   40,   15,   23,
           15,   28,   67,   15,   62,   53,   62,   15,   15,   15,
           15,   15,   15,   15,   15,   15,   15,   15,   15,   15,
           15,   15,   15,   15,   15,   15,   15,   15,   15,   15,
           20,   20,   20,   20,   22,   59,   59,   41,   37,   37,
           49,   49,   40,   40,   40,   40,   40,    8,    8,    8,
            8,    8,    8,    8,    8,    8,    8,    8,    8,    5,
            5,    5,    8,    8,   42,   42,   42,   68,   68,    8,
            8,   42,   42,   54,   28,   -1,   28,   28,    8,    8,
           28,    8,   28,   85,    8,   28,   -1,   32,   57,   28,
           21,   21,   19,   19,    8,   32,   32,    8,    8,   -1,
            8,   -1,    8,    8,   -1,    8,    8,    8,   74,   -1,
           32,   32,   -1,   32,   32,   32,   32,   32,   32,   32,
           32,   17,    5,   -1,    5,    5,   18,   18,    5,    5,
            5,    5,    5,    5,    5,   51,   51,   51,   61,   61,
           51,   51,   51,   61,   61,   61,   59,   59,   -1,   51,
           51,   51,   59,   -1,   31,   55,   55,   31,   -1,   59,
           17,   17,   17,   17,   31,   -1,   43,   43,   74,   74,
           -1,   -1,   -1,   -1,   -1,   43,   -1,   31,   43,   31,
           -1,   43,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   61
    );

    protected array $gotoBase = array(
            0,    0,    0,    0,    0,  195,    0,    0,  153,    0,
           29,   12,    0,    0,   65,   52,    0,  189,  157,  125,
           67,  129,   74,   40,   11,   32,  -18,    0,  134,    0,
           45,  294,  227,    0,   39,    0,   21,   59,    0,    0,
           -4,   47,   81,  250,    0,    0,    0,    0, -166,  128,
            9,  229,    0,   19,   28,  111,    0,   34,    0,  167,
          -56,  243,  120,    0,    0,   26,  -80,   -3,  151,    0,
           -8,   -7,    0,   98,  245,    0,    0,    0,    0,    0,
           27,   23,    0,    0,    0,   31,    0,    0,    0,    0
    );

    protected array $gotoDefault = array(
        -32768,   23,  318,  303,  304,  159,  306,  141,  388,  179,
          314,  276,  121,  161,  173,  118,  111,  345,  136,  150,
          151,  127,  152,  206,  207,  208,  209,  153,  375,   85,
          210,  569,  124,  147,  393,   28,   29,   30,   31,   32,
           33,  406,  262,  548,  428,  429,  430,  186,  219,   46,
          440,  132,  174,  450,  149,  461,  155,  477,  202,  144,
          148,   37,  248,  160,  236,  509,  249,  158,   71,  134,
          550,  570,  555,  556,  557,  558,  559,  560,  561,    2,
          567,  587,  589,   25,  288,  289,  298,  606,  282,  139
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
           32,   32,   32,   32,   32,   33,   33,   41,   41,   35,
           35,   35,   35,   35,   35,   36,   36,   36,   36,   36,
           36,   36,   36,   36,   36,   36,   36,   36,   36,   36,
           36,   45,   45,   45,   45,   45,   47,   47,   49,   49,
           50,   50,   50,   51,   51,   51,   51,   51,   51,   52,
           52,   53,   53,   53,   46,   46,   46,   46,   46,   54,
           54,   55,   55,   44,   37,   37,   37,   37,   38,   38,
           39,   39,   48,   48,   40,   40,   56,   56,   57,   57,
           42,   42,   58,   58,   60,   60,   60,   60,   60,   60,
           60,   60,   60,   60,   60,   60,   60,   60,   59,   59,
           59,   59,   61,   61,   61,   61,   62,   62,   64,   64,
           65,   65,   65,   63,   63,   11,   11,   66,   66,   66,
           67,   67,   67,   67,   67,   67,   67,   67,   67,   67,
           67,   67,   67,   67,   67,   67,   67,   67,   67,   67,
           67,   43,   43,   43,   14,   14,   14,   14,   68,   69,
           69,   70,   70,   34,   71,   71,   71,   71,   71,   71,
           71,   72,   72,   72,   73,   73,   79,   79,   80,   80,
           74,   74,   75,   75,   75,   76,   76,   76,   76,   76,
           76,   77,   77,   77,   77,   77,    1,    1,   81,   81,
           82,   82,   83,   83,   84,   84,   85,   85,   86,   86,
           87,   87,   88,   88,   88,   88,   89,   89,   89,   78
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
            1,    2,    1,    2,    1,    1,    3,    3,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    6,    7,    3,    7,    3,    1,    1,    1,    2,
            2,    3,    1,    2,    1,    2,    1,    2,    1,    1,
            3,    2,    3,    1,    4,    5,    5,    6,    2,    1,
            3,    4,    1,    4,    1,    1,    1,    1,    1,    1,
            4,    4,    1,    0,    6,    5,    1,    3,    1,    4,
            5,    1,    2,    1,    1,    3,    3,    4,    6,    5,
            5,    6,    5,    4,    4,    4,    3,    4,    3,    2,
            2,    1,    1,    2,    1,    2,    3,    1,    1,    3,
            2,    2,    1,    1,    3,    2,    1,    2,    1,    1,
            3,    2,    3,    5,    4,    5,    4,    3,    3,    3,
            4,    6,    5,    5,    6,    4,    4,    2,    3,    3,
            4,    3,    4,    1,    2,    1,    4,    3,    2,    1,
            2,    3,    2,    7,    1,    1,    1,    1,    1,    1,
            1,    4,    4,    3,    2,    3,    1,    2,    1,    1,
            1,    2,    7,    5,    5,    5,    7,    6,    7,    6,
            7,    3,    2,    2,    2,    3,    1,    2,    1,    1,
            4,    3,    1,    2,    6,    4,    1,    0,    3,    1,
            1,    0,    1,    3,    5,    7,    2,    2,    0,    6
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
                 $this->semValue = new Expr\DimFetchExpr($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            19 => function ($stackPos) {
                 $this->semValue = new Expr\CallExpr($this->semStack[$stackPos-(3-1)], [], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            20 => function ($stackPos) {
                 $this->semValue = new Expr\CallExpr($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            21 => function ($stackPos) {
                 $this->semValue = new Expr\StructRefExpr($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            22 => function ($stackPos) {
                 $this->semValue = new Expr\StructDerefExpr($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
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
                 $this->semValue = new IR\Declaration($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-1)][2], [], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            91 => function ($stackPos) {
                 $this->semValue = new IR\Declaration($this->semStack[$stackPos-(3-1)][0], $this->semStack[$stackPos-(3-1)][1], $this->semStack[$stackPos-(3-1)][2], $this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            92 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            93 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            94 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], [], []]; 
            },
            95 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; array_unshift($this->semValue[2], $this->semStack[$stackPos-(2-1)]); 
            },
            96 => function ($stackPos) {
                 $this->semValue = [0, [], [$this->semStack[$stackPos-(1-1)]]]; 
            },
            97 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            98 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], [], []]; 
            },
            99 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            100 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], [], []]; 
            },
            101 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            102 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], [], []]; 
            },
            103 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[1][] = $this->semStack[$stackPos-(2-1)]; 
            },
            104 => function ($stackPos) {
                 $this->semValue = [0, [$this->semStack[$stackPos-(1-1)]], []]; 
            },
            105 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            106 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            107 => function ($stackPos) {
                 $this->semValue = new IR\InitDeclarator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            108 => function ($stackPos) {
                 $this->semValue = new IR\InitDeclarator($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            109 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_TYPEDEF; 
            },
            110 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_EXTERN; 
            },
            111 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_STATIC; 
            },
            112 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_THREAD_LOCAL; 
            },
            113 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_AUTO; 
            },
            114 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_REGISTER; 
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
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            126 => function ($stackPos) {
                 $this->semValue = new Node\Type\BuiltinType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            127 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            128 => function ($stackPos) {
                 $this->semValue = new Node\Type\TagType\RecordType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            129 => function ($stackPos) {
                 $this->semValue = new Node\Type\TagType\EnumType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            130 => function ($stackPos) {
                 $this->semValue = new Node\Type\TypedefType($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            131 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(6-1)], null, $this->semStack[$stackPos-(6-4)], $this->semStack[$stackPos-(6-2)] ?? $this->semStack[$stackPos-(6-6)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            132 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(7-1)], $this->semStack[$stackPos-(7-3)], $this->semStack[$stackPos-(7-5)], $this->semStack[$stackPos-(7-2)] ?? $this->semStack[$stackPos-(7-7)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            133 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], null, $this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            134 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(7-1)], $this->semStack[$stackPos-(7-3)], $this->semStack[$stackPos-(7-5)], $this->semStack[$stackPos-(7-2)] ?? $this->semStack[$stackPos-(7-7)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            135 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], null, $this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            136 => function ($stackPos) {
                 $this->semValue = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_STRUCT; 
            },
            137 => function ($stackPos) {
                 $this->semValue = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_UNION; 
            },
            138 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            139 => function ($stackPos) {
                 $this->semValue = array_merge($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)]); 
            },
            140 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileStructField($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-1)][2], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            141 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileStructField($this->semStack[$stackPos-(3-1)][0], $this->semStack[$stackPos-(3-1)][1], $this->semStack[$stackPos-(3-1)][2], $this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            142 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            143 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; array_unshift($this->semValue[2], $this->semStack[$stackPos-(2-1)]); 
            },
            144 => function ($stackPos) {
                 $this->semValue = [0, [], [$this->semStack[$stackPos-(1-1)]]]; 
            },
            145 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[0] |= $this->semStack[$stackPos-(2-1)]; 
            },
            146 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], [], []]; 
            },
            147 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[1][] = $this->semStack[$stackPos-(2-1)]; 
            },
            148 => function ($stackPos) {
                 $this->semValue = [0, [$this->semStack[$stackPos-(1-1)]], []]; 
            },
            149 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            150 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            151 => function ($stackPos) {
                 $this->semValue = new IR\FieldDeclaration(null, $this->semStack[$stackPos-(2-1)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            152 => function ($stackPos) {
                 $this->semValue = new IR\FieldDeclaration($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            153 => function ($stackPos) {
                 $this->semValue = new IR\FieldDeclaration($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            154 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl(null, $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            155 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl(null, $this->semStack[$stackPos-(5-3)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            156 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl($this->semStack[$stackPos-(5-2)], $this->semStack[$stackPos-(5-4)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            157 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl($this->semStack[$stackPos-(6-2)], $this->semStack[$stackPos-(6-4)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            158 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl($this->semStack[$stackPos-(2-2)], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            159 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            160 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            161 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\ValueDecl\EnumConstantDecl($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-4)], null, $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); $this->scope->enumdef($this->semStack[$stackPos-(4-1)], $this->semValue); 
            },
            162 => function ($stackPos) {
                 $this->semValue = new Node\Decl\NamedDecl\ValueDecl\EnumConstantDecl($this->semStack[$stackPos-(1-1)], null, null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); $this->scope->enumdef($this->semStack[$stackPos-(1-1)], $this->semValue); 
            },
            163 => function ($stackPos) {
                 throw new Error('atomic type_name not implemented'); 
            },
            164 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_CONST; 
            },
            165 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_RESTRICT; 
            },
            166 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_VOLATILE; 
            },
            167 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_ATOMIC; 
            },
            168 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_INLINE; 
            },
            169 => function ($stackPos) {
                 $this->semValue = Node\Decl::KIND_NORETURN; 
            },
            170 => function ($stackPos) {
                 throw new Error('alignas type_name not implemented'); 
            },
            171 => function ($stackPos) {
                 throw new Error('alignas constant_expression not implemented'); 
            },
            172 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            173 => function ($stackPos) {
                 $this->semValue = null; 
            },
            174 => function ($stackPos) {
                 $this->semValue = new Node\Decl\Specifiers\AttributeList($this->semStack[$stackPos-(6-4)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            175 => function ($stackPos) {
                 $this->semValue = new Node\Decl\Specifiers\AttributeList($this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            176 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)]]; 
            },
            177 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(3-1)]; $this->semValue[] = $this->semStack[$stackPos-(3-3)]; 
            },
            178 => function ($stackPos) {
                 $this->semValue = new Node\Decl\Specifiers\Attribute($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            179 => function ($stackPos) {
                 $this->semValue = new Node\Decl\Specifiers\Attribute($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            180 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(5-1)]; $this->semValue->declarator->declaratorAsm = $this->semStack[$stackPos-(5-4)]; 
            },
            181 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            182 => function ($stackPos) {
                 $this->semValue = new IR\Declarator($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            183 => function ($stackPos) {
                 $this->semValue = new IR\Declarator(null, $this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            184 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Identifier($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            185 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Declarator($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            186 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\IncompleteArray($this->semStack[$stackPos-(3-1)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            187 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\IncompleteArray($this->semStack[$stackPos-(4-1)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            188 => function ($stackPos) {
                 throw new Error('direct_declarator bracket static type_qualifier_list assignment_expression not implemented'); 
            },
            189 => function ($stackPos) {
                 throw new Error('direct_declarator bracket static assignment_expression not implemented'); 
            },
            190 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list star not implemented'); 
            },
            191 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list static assignment_expression not implemented'); 
            },
            192 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list assignment_expression not implemented'); 
            },
            193 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list not implemented'); 
            },
            194 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\CompleteArray($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            195 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Function_($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)][0], $this->semStack[$stackPos-(4-3)][1], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            196 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Function_($this->semStack[$stackPos-(3-1)], [], false, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            197 => function ($stackPos) {
                 throw new Error('direct_declarator params identifier list not implemented'); 
            },
            198 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer($this->semStack[$stackPos-(3-2)][0], $this->semStack[$stackPos-(3-2)][1], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            199 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer($this->semStack[$stackPos-(2-2)][0], $this->semStack[$stackPos-(2-2)][1], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            200 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer(0, [], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            201 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer(0, [], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            202 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], []]; 
            },
            203 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(2-1)][0] | $this->semStack[$stackPos-(2-2)], $this->semStack[$stackPos-(2-1)][1]]; 
            },
            204 => function ($stackPos) {
                 $this->semValue = [0, [$this->semStack[$stackPos-(1-1)]]]; 
            },
            205 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[1][] = $this->semStack[$stackPos-(2-1)]; 
            },
            206 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(3-1)], true]; 
            },
            207 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], false]; 
            },
            208 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            209 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            210 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileParamVarDeclaration($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-1)][2], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            211 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileParamAbstractDeclaration($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-1)][2], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            212 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileParamAbstractDeclaration($this->semStack[$stackPos-(1-1)][0], $this->semStack[$stackPos-(1-1)][1], $this->semStack[$stackPos-(1-1)][2], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            213 => function ($stackPos) {
                 throw new Error('identifier_list identifier not implemented'); 
            },
            214 => function ($stackPos) {
                 throw new Error('identifier_list identifier_list identifier not implemented'); 
            },
            215 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileTypeReference($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-1)][2], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            216 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileTypeReference($this->semStack[$stackPos-(1-1)][0], $this->semStack[$stackPos-(1-1)][1], $this->semStack[$stackPos-(1-1)][2], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            217 => function ($stackPos) {
                 $this->semValue = new IR\AbstractDeclarator($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            218 => function ($stackPos) {
                 $this->semValue = new IR\AbstractDeclarator($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            219 => function ($stackPos) {
                 $this->semValue = new IR\AbstractDeclarator(null, $this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            220 => function ($stackPos) {
                 $this->semValue = new IR\DirectAbstractDeclarator\AbstractDeclarator($this->semStack[$stackPos-(3-1)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            221 => function ($stackPos) {
                 $this->semValue = new IR\DirectAbstractDeclarator\IncompleteArray($this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            222 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket star not implemented'); 
            },
            223 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket static type qualifier list assignment not implemented'); 
            },
            224 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket static assignment not implemented'); 
            },
            225 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket type qualifier list static assignment not implemented'); 
            },
            226 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket type qualifier list assignment not implemented'); 
            },
            227 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket type qualifier list not implemented'); 
            },
            228 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket assignment_expr not implemented'); 
            },
            229 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket not implemented'); 
            },
            230 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket star not implemented'); 
            },
            231 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket static type qualifier list assignment not implemented'); 
            },
            232 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket static assignment not implemented'); 
            },
            233 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket type qualifier list assignment not implemented'); 
            },
            234 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket type qualifier list static asssignment not implemented'); 
            },
            235 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket type qualifier list not implemented'); 
            },
            236 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket assignment_expr not implemented'); 
            },
            237 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator empty parameter list not implemented'); 
            },
            238 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator parameter list not implemented'); 
            },
            239 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with empty parameter list not implemented'); 
            },
            240 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with parameter list not implemented'); 
            },
            241 => function ($stackPos) {
                 throw new Error('initializer brackend no trailing not implemented'); 
            },
            242 => function ($stackPos) {
                 throw new Error('initializer brackeded trailing not implemented'); 
            },
            243 => function ($stackPos) {
                 throw new Error('initializer assignment_expression not implemented'); 
            },
            244 => function ($stackPos) {
                 throw new Error('initializer_list designator initializer not implemented'); 
            },
            245 => function ($stackPos) {
                 throw new Error('initializer_list initializer not implemented'); 
            },
            246 => function ($stackPos) {
                 throw new Error('initializer_list initializer_list designator initializer not implemented'); 
            },
            247 => function ($stackPos) {
                 throw new Error('initializer_list initializer_list initializer not implemented'); 
            },
            248 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            249 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            250 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            251 => function ($stackPos) {
                 throw new Error('[] designator not implemented'); 
            },
            252 => function ($stackPos) {
                 throw new Error('. designator not implemented'); 
            },
            253 => function ($stackPos) {
                 throw new Error('static assert declaration not implemented'); 
            },
            254 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            255 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            256 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            257 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            258 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            259 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            260 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            261 => function ($stackPos) {
                 throw new Error('labeled_statement identifier not implemented'); 
            },
            262 => function ($stackPos) {
                 throw new Error('labeled_statement case not implemented'); 
            },
            263 => function ($stackPos) {
                 throw new Error('labeled_statement default not implemented'); 
            },
            264 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\CompoundStmt([], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            265 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\CompoundStmt($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            266 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            267 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            268 => function ($stackPos) {
                 throw new Error('block_item declaration not implemented'); 
            },
            269 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            270 => function ($stackPos) {
                 $this->semValue = null; 
            },
            271 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            272 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\IfStmt($this->semStack[$stackPos-(7-3)], $this->semStack[$stackPos-(7-5)], $this->semStack[$stackPos-(7-7)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            273 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\IfStmt($this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], null, $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            274 => function ($stackPos) {
                 throw new Error('switch not implemented'); 
            },
            275 => function ($stackPos) {
                 throw new Error('iteration 0 not implemented'); 
            },
            276 => function ($stackPos) {
                 throw new Error('iteration 1 not implemented'); 
            },
            277 => function ($stackPos) {
                 throw new Error('iteration 2 not implemented'); 
            },
            278 => function ($stackPos) {
                 throw new Error('iteration 3 not implemented'); 
            },
            279 => function ($stackPos) {
                 throw new Error('iteration 4 not implemented'); 
            },
            280 => function ($stackPos) {
                 throw new Error('iteration 5 not implemented'); 
            },
            281 => function ($stackPos) {
                 throw new Error('goto identifier not implemented'); 
            },
            282 => function ($stackPos) {
                 throw new Error('continue not implemented'); 
            },
            283 => function ($stackPos) {
                 throw new Error('break not implemented'); 
            },
            284 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ReturnStmt(null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            285 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ReturnStmt($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            286 => function ($stackPos) {
                 $this->semValue = new Node\TranslationUnitDecl($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            287 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)]; $this->semValue->addDecl(...$this->semStack[$stackPos-(2-2)]); 
            },
            288 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            289 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileExternalDeclaration($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            290 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileFunction($this->semStack[$stackPos-(4-1)][0], $this->semStack[$stackPos-(4-1)][1], $this->semStack[$stackPos-(4-1)][2], $this->semStack[$stackPos-(4-2)], $this->semStack[$stackPos-(4-3)], $this->semStack[$stackPos-(4-4)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            291 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileFunction($this->semStack[$stackPos-(3-1)][0], $this->semStack[$stackPos-(3-1)][1], $this->semStack[$stackPos-(3-1)][2], $this->semStack[$stackPos-(3-2)], [], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            292 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            293 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            294 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(6-1)]; $this->semValue->operands[] = new Node\Asm\Operand($this->semStack[$stackPos-(6-3)], $this->semStack[$stackPos-(6-5)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            295 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Operands($this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); $this->semValue->operands[] = new Node\Asm\Operand($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            296 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            297 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Operands; 
            },
            298 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(3-1)]; $this->semValue->registers[] = $this->semStack[$stackPos-(3-3)]; 
            },
            299 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Registers($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); $this->semValue->registers[] = $this->semStack[$stackPos-(1-1)]; 
            },
            300 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            301 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Registers; 
            },
            302 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(1-1)], new Node\Asm\Operands, new Node\Asm\Operands, new Node\Asm\Registers, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            303 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], new Node\Asm\Operands, new Node\Asm\Registers, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            304 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(5-1)], $this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], new Node\Asm\Registers, $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            305 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(7-1)], $this->semStack[$stackPos-(7-3)], $this->semStack[$stackPos-(7-5)], $this->semStack[$stackPos-(7-7)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            306 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)] | Node\Stmt\AsmStmt::VOLATILE; 
            },
            307 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)] | Node\Stmt\AsmStmt::GOTO; 
            },
            308 => function ($stackPos) {
                 $this->semValue = 0; 
            },
            309 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(6-4)]; $this->semValue->modifiers = $this->semStack[$stackPos-(6-2)]; 
            },
        ];
    }
}
