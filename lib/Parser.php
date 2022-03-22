<?php

namespace PHPCParser;

use PHPCParser\Node\Stmt\ValueStmt\Expr;


/* This is an automatically GENERATED file, which should not be manually edited.
 */
class Parser extends ParserAbstract
{
    protected int $tokenToSymbolMapSize = 332;
    protected int $actionTableSize      = 562;
    protected int $gotoTableSize        = 339;

    protected int $invalidSymbol       = 101;
    protected int $errorSymbol         = 1;
    protected int $defaultAction       = -32766;
    protected int $unexpectedTokenRule = 32767;

    protected int $YY2TBLSTATE = 184;
    protected int $numNonLeafStates  = 302;

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
          225,  308,  309,  312,  313,  115,  301,    0,  116,  117,
          215,  379,  380,  381,  382,  383,  384,  385,  386,  387,
          388,  217,  466,  467,  468,  196,  466,  467,  468,  310,
          255,  103,  104,   86,   88,  256,   56,  545,  216,  225,
          308,  309,  312,  313,  115,  301,  294,  116,  117,   86,
          201,  256,   56,  328,  442,  469,   82,  226,  227,  469,
          228,  229,   11,  230,  231,  232,  233,   67,  310,  203,
          120,  204,  107,  108,  252,    4,   86,   86,  256,  256,
           56,  298,    1,  567,  338,  339,  340,  341,  342,  343,
          378,   96,   51,  609,  551,   82,  226,  227,  573,  228,
          229,   11,  230,  231,  232,  233,   67,  311,  203,    8,
          204,  105,  106,   35,    4,    1,  509,-32766,  610,-32766,
          542,    1,  568,  338,  339,  340,  341,  342,  343,  195,
           65,    9,  184,  516,-32766,   35,  432,  573,  411,  412,
          413,  415,  416,  470,  196,  466,  467,  468,  426,  418,
          419,  420,  421,  424,  425,  422,  423,  417,  427,  428,
          438,  439,  146,  303,  308,  309,  312,  313,  115,  112,
           74,  116,  117,   49,  113,  114,  197,  324,  198,  544,
          471,  199,  414,-32766,-32766,-32766,-32766,-32766,-32766,  323,
          126,  486,  310,-32766,-32766,-32766,-32766,-32766,-32766,  303,
          308,  309,  312,  313,  115,  555,-32766,  116,  117,  499,
          276,  443,  127,   24,   50,  257,  486,   34,  517,  487,
          327,-32766,  221,  325,  326,-32766,-32766,-32766,  310,  109,
          110,-32766,  203,  393,  204,-32766,-32766,-32766,    4,  143,
          101,  102,   26,  282,  273,  456,   36,  338,  339,  340,
          341,  342,  343,  303,  308,  309,  312,  313,  115,  144,
            8,  116,  117,  288,   35,  458,  128,  295,  203,  225,
          204,  239,  194,   90,    4,  301,  120,  196,  466,  467,
          468,  602,  310,  338,  339,  340,  341,  342,  343,-32766,
           66,    8,  540,  601,   73,   35,  222,  573,  500,  258,
         -185,  120,  214,  322,   89,-32766,-32766,-32766,-32766,-32766,
        -32766,  469,-32766,-32766,-32766,-32766,-32766,-32766,  314,   55,
           97,  530,  203,  196,  204,   82,  226,  227,    4,  228,
          229,   11,  230,  231,  232,  233,   67,  338,  339,  340,
          341,  342,  343,-32766,   20,  271,-32766,-32766,   15,-32766,
        -32766,    1,    3,   27,-32766,    7,-32766,   16,  188,-32766,
        -32766,-32766,-32766,-32766,-32766,  189,   58,  573,   59,   54,
           75,-32766,-32766,-32766,-32766,-32766,-32766,   76,-32766,-32766,
        -32766,-32766,-32766,-32766,   77,   40,   78,   79,   80,  196,
          466,  467,  468,-32766,   81,    9,  540,-32766,  141,   35,
          200,-32766,  234,-32766,   17,  120,  292,  297,    5,-32766,
            6,  223,  190,-32766,-32766,-32766,-32766,  293,   21,   22,
        -32766,   41,-32766,  469,  300,  196,  466,  467,  468,   84,
           42,   72,  263,  489,  196,  466,  467,  468,  237,   87,
          264,  270,  286,  196,  466,  467,  468,   92,  291,  472,
          473,  196,  466,  467,  468,  465,  488,  477,  306,  469,
          498,  476,  337,  541,  523,   52,  482,  481,  469,  524,
          543,  598,  597,  218,  250,   18,   19,  469,  532,  321,
           12,  490,   14,  268,   91,  469,   93,  496,   94,  187,
          191,  192,  260,  100,  193,  538,   95,   88,    0,   53,
          497,  525,  531,  492,  493,  495,  527,  529,  533,  539,
          554,  491,  494,  526,  528,  535,  536,  534,  537,  320,
            0,    0,   57,  185,    1,   56,    0,  457,  459,    0,
            0,  120,-32766,    0,    0,    0,    0,    0,    0,    0,
            0,    0,   99,    0,   98,    0,    0,   65,   83, -173,
            0,  585,  586,  584,  556,  612,  579,  574,  588,  392,
          573,  587
    );

    protected array $actionCheck = array(
            2,    3,    4,    5,    6,    7,    8,    0,   10,   11,
            2,   20,   21,   22,   23,   24,   25,   26,   27,   28,
           29,    2,   39,   40,   41,   38,   39,   40,   41,   31,
            2,   14,   15,   81,   80,   83,   84,   85,   30,    2,
            3,    4,    5,    6,    7,    8,    2,   10,   11,   81,
            2,   83,   84,   85,  100,   72,   58,   59,   60,   72,
           62,   63,   64,   65,   66,   67,   68,   69,   31,   71,
           87,   73,   12,   13,    5,   77,   81,   81,   83,   83,
           84,    2,   84,   85,   86,   87,   88,   89,   90,   91,
           99,   19,   84,   41,   99,   58,   59,   60,  100,   62,
           63,   64,   65,   66,   67,   68,   69,    2,   71,   77,
           73,   94,   95,   81,   77,   84,   57,   75,   66,   87,
           78,   84,   85,   86,   87,   88,   89,   90,   91,   77,
           99,   77,   84,    2,   75,   81,   30,  100,   32,   33,
           34,   35,   36,   37,   38,   39,   40,   41,   42,   43,
           44,   45,   46,   47,   48,   49,   50,   51,   52,   53,
           54,   55,   56,    2,    3,    4,    5,    6,    7,   87,
           98,   10,   11,   79,   92,   93,   70,    2,   72,   85,
           74,   75,   76,   32,   33,   34,   35,   36,   37,    2,
           79,    2,   31,   32,   33,   34,   35,   36,   37,    2,
            3,    4,    5,    6,    7,    2,   75,   10,   11,   78,
           59,  100,   79,   77,   79,    5,    2,   81,    2,   30,
           85,   70,    9,   10,   11,   74,   75,   76,   31,   88,
           89,   70,   71,  100,   73,   74,   75,   76,   77,   79,
           16,   17,   77,    5,   30,   85,   81,   86,   87,   88,
           89,   90,   91,    2,    3,    4,    5,    6,    7,   79,
           77,   10,   11,    5,   81,   85,   77,    5,   71,    2,
           73,   78,   79,   34,   77,    8,   87,   38,   39,   40,
           41,    5,   31,   86,   87,   88,   89,   90,   91,   75,
           77,   77,   78,    5,   81,   81,   83,  100,   78,   79,
            8,   87,    8,   78,   79,   32,   33,   34,   35,   36,
           37,   72,   32,   33,   34,   35,   36,   37,   78,   79,
           18,   82,   71,   38,   73,   58,   59,   60,   77,   62,
           63,   64,   65,   66,   67,   68,   69,   86,   87,   88,
           89,   90,   91,   70,   61,   63,   75,   74,   78,   76,
           70,   84,   77,   79,   74,   77,   76,   78,   85,   32,
           33,   34,   35,   36,   37,   85,   77,  100,   77,   79,
           77,   32,   33,   34,   35,   36,   37,   77,   32,   33,
           34,   35,   36,   37,   77,   34,   77,   77,   77,   38,
           39,   40,   41,   75,   77,   77,   78,   70,   77,   81,
           77,   74,   77,   76,   78,   87,   77,   77,   77,   70,
           77,   79,   85,   74,   75,   76,   70,   79,   78,   78,
           74,   34,   76,   72,   79,   38,   39,   40,   41,   79,
           34,   78,   78,   82,   38,   39,   40,   41,   87,   34,
           78,   78,   78,   38,   39,   40,   41,   34,   78,   78,
           78,   38,   39,   40,   41,   78,   78,   78,   78,   72,
           78,   78,   78,   78,   78,   84,   78,   78,   72,   82,
           78,   78,   78,   78,   87,   78,   78,   72,   82,   78,
           80,   82,   80,   87,   80,   72,   80,   82,   80,   80,
           80,   80,   87,   86,   80,   82,   80,   80,   -1,   84,
           82,   82,   82,   82,   82,   82,   82,   82,   82,   82,
           82,   82,   82,   82,   82,   82,   82,   82,   82,   82,
           -1,   -1,   84,   84,   84,   84,   -1,   85,   85,   -1,
           -1,   87,   87,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   96,   -1,   97,   -1,   -1,   99,   99,   99,
           -1,  100,  100,  100,  100,  100,  100,  100,  100,  100,
          100,  100
    );

    protected array $actionBase = array(
          106,   -2,   37,  197,  161,  161,  161,  161,  214,  318,
           31,  267,  267,  267,  267,  267,  267,  267,  267,  267,
          267,  267,  267,    7,  131,  440,   42,   59,  271,  271,
          271,  271,  271,  271,  351,  387,  396,  405,  239,  413,
          -13,  -13,  -13,  -13,  -13,  -13,  273,  280,  327,  -48,
          -32,  346,  346,  346,  151,  151,   -4,   -4,  339,  339,
          339,  339,  339,  460,  460,  441,  401,  461,  441,  397,
          398,  441,  438,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  331,  333,  333,   -9,  -46,
          -17,  -17,  213,  459,  459,  183,  417,  189,  189,   32,
           17,   17,   17,  444,  445,   -5,    8,   82,   82,   82,
           52,  395,  450,  442,  443,   54,   48,  133,  136,  160,
          141,   60,  224,   72,  136,  193,  180,  380,  165,  457,
          220,  225,  437,  141,  141,   60,   60,   60,   60,  224,
          416,  165,  458,   94,  111,  389,  270,  279,  326,  240,
          135,  370,  340,  341,  105,  105,  285,  285,  285,  285,
          285,  258,  258,  276,   19,  238,  323,  278,  289,  311,
          321,  439,  294,  291,  317,  371,  407,  446,  447,  302,
          372,  377,  332,  378,  325,  381,  415,  293,  379,  449,
          353,  175,  187,   69,  448,  409,  400,  300,  307,  309,
          275,   28,  451,  452,  210,  382,  274,  399,  418,  383,
          354,  362,  384,  290,  407,  446,  447,  302,  385,  386,
          419,  420,  363,  402,  282,  453,  203,  388,  216,  421,
          422,  423,  404,  438,  438,  424,  425,  392,  426,  427,
          454,  310,  428,  292,  429,  430,  406,  408,  431,  432,
          433,  434,  410,  364,  435,  436,  455,  283,  329,  338,
          411,  456,   44,  262,  393,  330,  414,   79,  394,  345,
          288,    0,    0,  106,  106,  106,  106,  106,  106,  106,
          106,  106,  106,  251,  251,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  106,  106,  106,  106,  106,
          106,  106,  106,  106,  106,  106,  251,  251,  251,  251,
          251,  251,  251,  251,  251,  251,  251,  251,  106,  106,
          106,  251,  251,  106,  106,  106,  106,  106,  251,  251,
          106,  106,  106,  106,  106,  251,  251,  251,  251,  251,
          251,  251,  251,  251,  251,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,  251,  251,  251,
            0,  189,  285,  285,    0,  189,  189,  189,  189,    0,
            0,  189,    0,    0,    0,   54,  189,    0,    0,    0,
            0,    0,    0,   19,  285,  105,  105,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,  350,
            0,  350,    0,    0,  350,    0,    0,    0,    0,    0,
            0,    0,  350,    0,  350,    0,    0,  350,  350,  350,
          350,    0,    0,  350,  350,  350
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
        32767,32767,32767,32767,32767,32767,32767,32767,   42,32767,
          202,  200,   29,32767,32767,  213,32767,32767,32767,  219,
           59,   60,   61,  217,32767,32767,32767,   48,   49,   50,
        32767,32767,  162,32767,32767,  219,32767,32767,  183,32767,
           51,   54,   62,   72,  182,32767,32767,32767,  220,32767,
        32767,32767,32767,   52,   53,   57,   58,   55,   56,   63,
        32767,  218,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,  173,  173,  173,  173,
          173,  298,  298,  302,32767,32767,32767,32767,  167,32767,
        32767,  158,  181,32767,32767,32767,   64,   66,   68,   70,
        32767,32767,32767,32767,32767,  133,  135,  178,32767,32767,
        32767,32767,32767,32767,  108,    1,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,  208,   37,32767,32767,
        32767,32767,32767,32767,   65,   67,   69,   71,32767,32767,
           37,32767,32767,32767,32767,32767,32767,32767,32767,32767,
           37,32767,  153,   34,32767,32767,32767,32767,   37,32767,
        32767,32767,32767,  130,32767,32767,32767,32767,32767,32767,
        32767,32767,  303,32767,32767,32767,32767,  274,32767,  297,
          304,32767,32767,32767,32767,32767,  305,32767,32767,  301,
        32767,  309
    );

    protected array $goto = array(
           62,   62,   62,   62,  254,  566,  564,  565,  287,  577,
          578,  582,  580,  575,  583,  581,  514,  129,  145,  136,
           13,  433,  434,  436,  518,  570,   60,   60,   60,   60,
          507,  507,  507,  508,  508,  508,  507,  507,  507,  508,
          508,  508,   62,   62,   62,   68,   68,   62,   62,   62,
           62,   62,  131,  132,   62,   62,   62,   62,   62,  213,
          344,  440,  440,  440,   61,   61,   61,   61,   60,   60,
           60,  590,  171,   60,   60,   60,   60,   60,  594,  512,
           60,   60,   60,   60,   60,  444,  444,  444,  171,  316,
          444,  444,  444,  593,  505,  505,  505,  506,  506,  506,
          505,  505,  505,  506,  506,  506,   61,   61,   61,   47,
           48,   61,   61,   61,   61,   61,  507,  508,   61,   61,
           61,   61,   61,  154,  235,  344,  267,  180,  154,  503,
          501,  247,  391,  344,  129,  344,  344,  246,  474,  344,
          245,  344,  145,  244,  344,  163,  164,  169,  344,  344,
          344,  344,  344,  344,  344,  344,  344,  344,  344,  344,
          344,  344,  344,  344,  344,  344,  344,  344,  335,  332,
          333,  138,  139,  408,   10,  224,  513,  156,  224,  213,
          505,  506,  474,  474,  474,  474,  474,  238,  251,  269,
          261,  266,  281,  259,  265,  280,  274,  278,  284,  157,
          157,  157,  546,  546,  452,  391,  553,  391,  391,  546,
          546,  391,  296,  391,  461,  461,  391,    0,  546,  329,
          375,  546,  479,    0,  546,   38,   39,  123,    0,    0,
           43,   44,   45,    0,  243,  125,  125,  390,  377,    0,
          275,    0,  330,  279,    0,  285,  318,  317,    0,    0,
          123,  125,    0,  125,  125,  395,  397,  399,  401,  403,
          405,    0,  172,    0,  182,  183,  345,   64,  162,  170,
          175,  176,  177,  178,  181,  119,  119,  119,    0,    0,
          119,  119,  119,  220,  240,  241,  205,    0,    0,  445,
          447,  449,  212,    0,  253,  463,    0,    0,  272,  592,
          453,    0,   63,  454,    0,  334,  347,  348,  349,  595,
          121,  548,  548,  165,  166,  167,  168,    0,    0,    0,
          409,    0,  592,  547,  596,    0,  549,   69,   70,    0,
            0,    0,    0,    0,    0,    0,    0,  211,  242
    );

    protected array $gotoCheck = array(
           40,   40,   40,   40,   71,   71,   71,   71,   71,   71,
           71,   71,   71,   71,   71,   71,   66,   59,   59,   48,
           48,   48,   48,   48,   66,   80,   36,   36,   36,   36,
           40,   40,   40,   40,   40,   40,   40,   40,   40,   40,
           40,   40,   40,   40,   40,   68,   68,   40,   40,   40,
           40,   40,   21,   21,   40,   40,   40,   40,   40,   42,
           15,   50,   50,   50,   37,   37,   37,   37,   36,   36,
           36,   81,   67,   36,   36,   36,   36,   36,   73,   65,
           36,   36,   36,   36,   36,   34,   34,   34,   67,   10,
           34,   34,   34,   73,   37,   37,   37,   37,   37,   37,
           37,   37,   37,   37,   37,   37,   37,   37,   37,   49,
           49,   37,   37,   37,   37,   37,   40,   40,   37,   37,
           37,   37,   37,   60,   62,   15,   62,   14,   60,   59,
           59,   26,   28,   15,   59,   15,   15,   25,   40,   15,
           24,   15,   59,   23,   15,   19,   19,   22,   15,   15,
           15,   15,   15,   15,   15,   15,   15,   15,   15,   15,
           15,   15,   15,   15,   15,   15,   15,   15,   15,   15,
           15,   18,   18,   41,   42,   42,   42,   54,   42,   42,
           37,   37,   40,   40,   40,   40,   40,    8,    8,    8,
            8,    8,    8,    8,    8,    8,    8,    8,    8,    5,
            5,    5,    8,    8,   53,   28,   70,   28,   28,    8,
            8,   28,   85,   28,   55,   55,   28,   -1,    8,    8,
           28,    8,   57,   -1,    8,   61,   61,   32,   -1,   -1,
           61,   61,   61,   -1,    8,   32,   32,    8,    8,   -1,
            8,   -1,    8,    8,   -1,    8,    8,    8,   -1,   -1,
           32,   32,   -1,   32,   32,   32,   32,   32,   32,   32,
           32,   -1,    5,   -1,    5,    5,   17,   74,    5,    5,
            5,    5,    5,    5,    5,   51,   51,   51,   -1,   -1,
           51,   51,   51,   11,   11,   11,   11,   -1,   -1,   51,
           51,   51,   30,   -1,   30,   30,   -1,   -1,   30,   31,
           30,   -1,   31,   30,   -1,   17,   17,   17,   17,   31,
           61,   43,   43,   20,   20,   20,   20,   -1,   -1,   -1,
           43,   -1,   31,   43,   31,   -1,   43,   74,   74,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   11,   11
    );

    protected array $gotoBase = array(
            0,    0,    0,    0,    0,  195,    0,    0,  153,    0,
           34,  279,    0,    0,   70,   53,    0,  194,   62,   38,
          210,  -49,   47,   44,   42,   40,   35,    0,  125,    0,
          212,  299,  227,    0,   39,    0,   22,   60,    0,    0,
           -4,   46,   51,  255,    0,    0,    0,    0, -167,   57,
           10,  229,    0,   78,   -8,   30,    0,   28,    0,    9,
           -6,  190,  100,    0,    0,   52, -109,  -57,  -11,    0,
           71,   -7,    0,   68,  264,    0,    0,    0,    0,    0,
           23,   48,    0,    0,    0,   20,    0,    0,    0,    0
    );

    protected array $gotoDefault = array(
        -32768,   23,  319,  304,  305,  159,  307,  142,  389,  179,
          315,  277,  122,  161,  173,  118,  111,  346,  137,  150,
          151,  130,  152,  206,  207,  208,  209,  153,  376,   85,
          210,  571,  124,  147,  394,   28,   29,   30,   31,   32,
           33,  407,  262,  550,  429,  430,  431,  186,  219,   46,
          441,  133,  174,  451,  149,  462,  155,  478,  202,  134,
          148,   37,  248,  160,  236,  511,  249,  158,   71,  135,
          552,  572,  557,  558,  559,  560,  561,  562,  563,    2,
          569,  589,  591,   25,  289,  290,  299,  608,  283,  140
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
           60,   60,   60,   60,   60,   60,   60,   60,   60,   59,
           59,   59,   59,   61,   61,   61,   61,   62,   62,   64,
           64,   65,   65,   65,   63,   63,   11,   11,   66,   66,
           66,   67,   67,   67,   67,   67,   67,   67,   67,   67,
           67,   67,   67,   67,   67,   67,   67,   67,   67,   67,
           67,   67,   43,   43,   43,   14,   14,   14,   14,   68,
           69,   69,   70,   70,   34,   71,   71,   71,   71,   71,
           71,   71,   72,   72,   72,   73,   73,   79,   79,   80,
           80,   74,   74,   75,   75,   75,   76,   76,   76,   76,
           76,   76,   77,   77,   77,   77,   77,    1,    1,   81,
           81,   82,   82,   83,   83,   84,   84,   85,   85,   86,
           86,   87,   87,   88,   88,   88,   88,   89,   89,   89,
           78
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
            5,    1,    2,    1,    1,    1,    3,    3,    4,    6,
            5,    5,    6,    5,    4,    4,    4,    3,    4,    3,
            2,    2,    1,    1,    2,    1,    2,    3,    1,    1,
            3,    2,    2,    1,    1,    3,    2,    1,    2,    1,
            1,    3,    2,    3,    5,    4,    5,    4,    3,    3,
            3,    4,    6,    5,    5,    6,    4,    4,    2,    3,
            3,    4,    3,    4,    1,    2,    1,    4,    3,    2,
            1,    2,    3,    2,    7,    1,    1,    1,    1,    1,
            1,    1,    4,    4,    3,    2,    3,    1,    2,    1,
            1,    1,    2,    7,    5,    5,    5,    7,    6,    7,
            6,    7,    3,    2,    2,    2,    3,    1,    2,    1,
            1,    4,    3,    1,    2,    6,    4,    1,    0,    3,
            1,    1,    0,    1,    3,    5,    7,    2,    2,    0,
            6
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
                 $this->semValue = new IR\FieldDeclaration(null, $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
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
                 $this->semValue = new IR\DirectDeclarator\Identifier($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            186 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Declarator($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            187 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\IncompleteArray($this->semStack[$stackPos-(3-1)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            188 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\IncompleteArray($this->semStack[$stackPos-(4-1)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            189 => function ($stackPos) {
                 throw new Error('direct_declarator bracket static type_qualifier_list assignment_expression not implemented'); 
            },
            190 => function ($stackPos) {
                 throw new Error('direct_declarator bracket static assignment_expression not implemented'); 
            },
            191 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list star not implemented'); 
            },
            192 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list static assignment_expression not implemented'); 
            },
            193 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list assignment_expression not implemented'); 
            },
            194 => function ($stackPos) {
                 throw new Error('direct_declarator bracket type_qualifier_list not implemented'); 
            },
            195 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\CompleteArray($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            196 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Function_($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)][0], $this->semStack[$stackPos-(4-3)][1], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            197 => function ($stackPos) {
                 $this->semValue = new IR\DirectDeclarator\Function_($this->semStack[$stackPos-(3-1)], [], false, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            198 => function ($stackPos) {
                 throw new Error('direct_declarator params identifier list not implemented'); 
            },
            199 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer($this->semStack[$stackPos-(3-2)][0], $this->semStack[$stackPos-(3-2)][1], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            200 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer($this->semStack[$stackPos-(2-2)][0], $this->semStack[$stackPos-(2-2)][1], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            201 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer(0, [], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            202 => function ($stackPos) {
                 $this->semValue = new IR\QualifiedPointer(0, [], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            203 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], []]; 
            },
            204 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(2-1)][0] | $this->semStack[$stackPos-(2-2)], $this->semStack[$stackPos-(2-1)][1]]; 
            },
            205 => function ($stackPos) {
                 $this->semValue = [0, [$this->semStack[$stackPos-(1-1)]]]; 
            },
            206 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-2)]; $this->semValue[1][] = $this->semStack[$stackPos-(2-1)]; 
            },
            207 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(3-1)], true]; 
            },
            208 => function ($stackPos) {
                 $this->semValue = [$this->semStack[$stackPos-(1-1)], false]; 
            },
            209 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            210 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            211 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileParamVarDeclaration($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-1)][2], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            212 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileParamAbstractDeclaration($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-1)][2], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            213 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileParamAbstractDeclaration($this->semStack[$stackPos-(1-1)][0], $this->semStack[$stackPos-(1-1)][1], $this->semStack[$stackPos-(1-1)][2], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            214 => function ($stackPos) {
                 throw new Error('identifier_list identifier not implemented'); 
            },
            215 => function ($stackPos) {
                 throw new Error('identifier_list identifier_list identifier not implemented'); 
            },
            216 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileTypeReference($this->semStack[$stackPos-(2-1)][0], $this->semStack[$stackPos-(2-1)][1], $this->semStack[$stackPos-(2-1)][2], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            217 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileTypeReference($this->semStack[$stackPos-(1-1)][0], $this->semStack[$stackPos-(1-1)][1], $this->semStack[$stackPos-(1-1)][2], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            218 => function ($stackPos) {
                 $this->semValue = new IR\AbstractDeclarator($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            219 => function ($stackPos) {
                 $this->semValue = new IR\AbstractDeclarator($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            220 => function ($stackPos) {
                 $this->semValue = new IR\AbstractDeclarator(null, $this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            221 => function ($stackPos) {
                 $this->semValue = new IR\DirectAbstractDeclarator\AbstractDeclarator($this->semStack[$stackPos-(3-1)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            222 => function ($stackPos) {
                 $this->semValue = new IR\DirectAbstractDeclarator\IncompleteArray($this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            223 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket star not implemented'); 
            },
            224 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket static type qualifier list assignment not implemented'); 
            },
            225 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket static assignment not implemented'); 
            },
            226 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket type qualifier list static assignment not implemented'); 
            },
            227 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket type qualifier list assignment not implemented'); 
            },
            228 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket type qualifier list not implemented'); 
            },
            229 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator bracket assignment_expr not implemented'); 
            },
            230 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket not implemented'); 
            },
            231 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket star not implemented'); 
            },
            232 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket static type qualifier list assignment not implemented'); 
            },
            233 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket static assignment not implemented'); 
            },
            234 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket type qualifier list assignment not implemented'); 
            },
            235 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket type qualifier list static asssignment not implemented'); 
            },
            236 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket type qualifier list not implemented'); 
            },
            237 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with bracket assignment_expr not implemented'); 
            },
            238 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator empty parameter list not implemented'); 
            },
            239 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator parameter list not implemented'); 
            },
            240 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with empty parameter list not implemented'); 
            },
            241 => function ($stackPos) {
                 throw new Error('direct_abstract_declarator with parameter list not implemented'); 
            },
            242 => function ($stackPos) {
                 throw new Error('initializer brackend no trailing not implemented'); 
            },
            243 => function ($stackPos) {
                 throw new Error('initializer brackeded trailing not implemented'); 
            },
            244 => function ($stackPos) {
                 throw new Error('initializer assignment_expression not implemented'); 
            },
            245 => function ($stackPos) {
                 throw new Error('initializer_list designator initializer not implemented'); 
            },
            246 => function ($stackPos) {
                 throw new Error('initializer_list initializer not implemented'); 
            },
            247 => function ($stackPos) {
                 throw new Error('initializer_list initializer_list designator initializer not implemented'); 
            },
            248 => function ($stackPos) {
                 throw new Error('initializer_list initializer_list initializer not implemented'); 
            },
            249 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            250 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            251 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            252 => function ($stackPos) {
                 throw new Error('[] designator not implemented'); 
            },
            253 => function ($stackPos) {
                 throw new Error('. designator not implemented'); 
            },
            254 => function ($stackPos) {
                 throw new Error('static assert declaration not implemented'); 
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
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            262 => function ($stackPos) {
                 throw new Error('labeled_statement identifier not implemented'); 
            },
            263 => function ($stackPos) {
                 throw new Error('labeled_statement case not implemented'); 
            },
            264 => function ($stackPos) {
                 throw new Error('labeled_statement default not implemented'); 
            },
            265 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\CompoundStmt([], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            266 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\CompoundStmt($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            267 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            268 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            269 => function ($stackPos) {
                 throw new Error('block_item declaration not implemented'); 
            },
            270 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            271 => function ($stackPos) {
                 $this->semValue = null; 
            },
            272 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            273 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\IfStmt($this->semStack[$stackPos-(7-3)], $this->semStack[$stackPos-(7-5)], $this->semStack[$stackPos-(7-7)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            274 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\IfStmt($this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], null, $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            275 => function ($stackPos) {
                 throw new Error('switch not implemented'); 
            },
            276 => function ($stackPos) {
                 throw new Error('iteration 0 not implemented'); 
            },
            277 => function ($stackPos) {
                 throw new Error('iteration 1 not implemented'); 
            },
            278 => function ($stackPos) {
                 throw new Error('iteration 2 not implemented'); 
            },
            279 => function ($stackPos) {
                 throw new Error('iteration 3 not implemented'); 
            },
            280 => function ($stackPos) {
                 throw new Error('iteration 4 not implemented'); 
            },
            281 => function ($stackPos) {
                 throw new Error('iteration 5 not implemented'); 
            },
            282 => function ($stackPos) {
                 throw new Error('goto identifier not implemented'); 
            },
            283 => function ($stackPos) {
                 throw new Error('continue not implemented'); 
            },
            284 => function ($stackPos) {
                 throw new Error('break not implemented'); 
            },
            285 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ReturnStmt(null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            286 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ReturnStmt($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            287 => function ($stackPos) {
                 $this->semValue = new Node\TranslationUnitDecl($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            288 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)]; $this->semValue->addDecl(...$this->semStack[$stackPos-(2-2)]); 
            },
            289 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            290 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileExternalDeclaration($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            291 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileFunction($this->semStack[$stackPos-(4-1)][0], $this->semStack[$stackPos-(4-1)][1], $this->semStack[$stackPos-(4-1)][2], $this->semStack[$stackPos-(4-2)], $this->semStack[$stackPos-(4-3)], $this->semStack[$stackPos-(4-4)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            292 => function ($stackPos) {
                 $this->semValue = $this->compiler->compileFunction($this->semStack[$stackPos-(3-1)][0], $this->semStack[$stackPos-(3-1)][1], $this->semStack[$stackPos-(3-1)][2], $this->semStack[$stackPos-(3-2)], [], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            293 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            294 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            295 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(6-1)]; $this->semValue->operands[] = new Node\Asm\Operand($this->semStack[$stackPos-(6-3)], $this->semStack[$stackPos-(6-5)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            296 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Operands($this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); $this->semValue->operands[] = new Node\Asm\Operand($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            297 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            298 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Operands; 
            },
            299 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(3-1)]; $this->semValue->registers[] = $this->semStack[$stackPos-(3-3)]; 
            },
            300 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Registers($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); $this->semValue->registers[] = $this->semStack[$stackPos-(1-1)]; 
            },
            301 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            302 => function ($stackPos) {
                 $this->semValue = new Node\Asm\Registers; 
            },
            303 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(1-1)], new Node\Asm\Operands, new Node\Asm\Operands, new Node\Asm\Registers, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            304 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], new Node\Asm\Operands, new Node\Asm\Registers, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            305 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(5-1)], $this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], new Node\Asm\Registers, $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            306 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\AsmStmt($this->semStack[$stackPos-(7-1)], $this->semStack[$stackPos-(7-3)], $this->semStack[$stackPos-(7-5)], $this->semStack[$stackPos-(7-7)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            307 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)] | Node\Stmt\AsmStmt::VOLATILE; 
            },
            308 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)] | Node\Stmt\AsmStmt::GOTO; 
            },
            309 => function ($stackPos) {
                 $this->semValue = 0; 
            },
            310 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(6-4)]; $this->semValue->modifiers = $this->semStack[$stackPos-(6-2)]; 
            },
        ];
    }
}
