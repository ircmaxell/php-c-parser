%pure_parser
%expect 2


%token  IDENTIFIER I_CONSTANT F_CONSTANT STRING_LITERAL FUNC_NAME SIZEOF ASM
%token  PTR_OP INC_OP DEC_OP LEFT_OP RIGHT_OP LE_OP GE_OP EQ_OP NE_OP
%token  AND_OP OR_OP MUL_ASSIGN DIV_ASSIGN MOD_ASSIGN ADD_ASSIGN
%token  SUB_ASSIGN LEFT_ASSIGN RIGHT_ASSIGN AND_ASSIGN
%token  XOR_ASSIGN OR_ASSIGN
%token  TYPEDEF_NAME ENUMERATION_CONSTANT

%token  TYPEDEF EXTERN STATIC AUTO REGISTER INLINE ATTRIBUTE
%token  CONST RESTRICT VOLATILE
%token  BOOL CHAR SHORT INT LONG SIGNED UNSIGNED FLOAT DOUBLE VOID
%token  COMPLEX IMAGINARY 
%token  STRUCT UNION ENUM ELLIPSIS

%token  CASE DEFAULT IF ELSE SWITCH WHILE DO FOR GOTO CONTINUE BREAK RETURN

%token  ALIGNAS ALIGNOF ATOMIC GENERIC NORETURN STATIC_ASSERT THREAD_LOCAL

%start translation_unit
%%

primary_expression
    : IDENTIFIER            { $$ = Expr\DeclRefExpr[$1, null]; }
    | constant              { $$ = $1; }
    | string                { $$ = $1; }
    | '(' expression ')'    { $$ = $2; }
    | generic_selection     { $$ = $1; }
    ;

constant
    : I_CONSTANT            { $$ = Node\Stmt\ValueStmt\Expr\IntegerLiteral[$1]; } /* includes character_constant */
    | F_CONSTANT            { $$ = Node\Stmt\ValueStmt\Expr\FloatLiteral[$1]; }
    | ENUMERATION_CONSTANT  { $$ = Node\Stmt\ValueStmt\Expr\DeclRefExpr[$1, $this->scope->enum($1)]; }  /* after it has been defined as such */
    ;

enumeration_constant        /* before it has been defined as such */
    : IDENTIFIER            { $$ = $1; }
    ;

string
    : STRING_LITERAL        { $$ = Node\Stmt\ValueStmt\Expr\StringLiteral[$1]; }
    | FUNC_NAME             { throw new Error('func name not implemented'); }
    ;

generic_selection
    : GENERIC '(' assignment_expression ',' generic_assoc_list ')'  { throw new Error('generic not implemented'); }
    ;

generic_assoc_list
    : generic_association                           { init($1); }
    | generic_assoc_list ',' generic_association    { push($1, $3); }
    ;

generic_association
    : type_name ':' assignment_expression           { throw new Error('generic association typename not implemented'); }
    | DEFAULT ':' assignment_expression             { throw new Error('generic association default not implemented'); }
    ;

postfix_expression
    : primary_expression                                   { $$ = $1; }
    | postfix_expression '[' expression ']'                { $$ = Expr\DimFetchExpr[$1, $3]; }
    | postfix_expression '(' ')'                           { $$ = Expr\CallExpr[$1, []]; }
    | postfix_expression '(' argument_expression_list ')'  { $$ = Expr\CallExpr[$1, $3]; }
    | postfix_expression '.' IDENTIFIER                    { $$ = Expr\StructRefExpr[$1, $3]; }
    | postfix_expression PTR_OP IDENTIFIER                 { $$ = Expr\StructDerefExpr[$1, $3]; }
    | postfix_expression INC_OP                            { $$ = Expr\UnaryOperator[$2, Expr\UnaryOperator::KIND_POSTINC]; }
    | postfix_expression DEC_OP                            { $$ = Expr\UnaryOperator[$2, Expr\UnaryOperator::KIND_POSTDEC]; }
    | '(' type_name ')' '{' initializer_list '}'           { throw new Error('initializer list no trailing not implemented'); }
    | '(' type_name ')' '{' initializer_list ',' '}'       { throw new Error('initializer list trailing not implemented'); }
    ;

argument_expression_list
    : assignment_expression                                { init($1); }
    | argument_expression_list ',' assignment_expression   { push($1, $3); }
    ;

unary_expression
    : postfix_expression                { $$ = $1; }
    | INC_OP unary_expression           { $$ = Expr\UnaryOperator[$2, Expr\UnaryOperator::KIND_PREINC]; }
    | DEC_OP unary_expression           { $$ = Expr\UnaryOperator[$2, Expr\UnaryOperator::KIND_PREDEC]; }
    | unary_operator cast_expression    { $$ = Expr\UnaryOperator[$2, $1]; }
    | SIZEOF unary_expression           { $$ = Expr\UnaryOperator[$2, Expr\UnaryOperator::KIND_SIZEOF]; }
    | SIZEOF '(' type_name ')'          { $$ = Expr\UnaryOperator[$3, Expr\UnaryOperator::KIND_SIZEOF]; }
    | ALIGNOF '(' type_name ')'         { $$ = Expr\UnaryOperator[$3, Expr\UnaryOperator::KIND_ALIGNOF]; }
    ;

unary_operator
    : '&'       { $$ = Expr\UnaryOperator::KIND_ADDRESS_OF; }
    | '*'       { $$ = Expr\UnaryOperator::KIND_DEREF; }
    | '+'       { $$ = Expr\UnaryOperator::KIND_PLUS; }
    | '-'       { $$ = Expr\UnaryOperator::KIND_MINUS; }
    | '~'       { $$ = Expr\UnaryOperator::KIND_BITWISE_NOT; }
    | '!'       { $$ = Expr\UnaryOperator::KIND_LOGICAL_NOT; }
    ;

cast_expression
    : unary_expression                      { $$ = $1; }
    | '(' type_name ')' cast_expression     { $$ = Expr\CastExpr[$4, $2]; }
    ;

multiplicative_expression
    : cast_expression                                   { $$ = $1; }
    | multiplicative_expression '*' cast_expression     { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_MUL]; }
    | multiplicative_expression '/' cast_expression     { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_DIV]; }
    | multiplicative_expression '%' cast_expression     { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_REM]; }
    ;

additive_expression
    : multiplicative_expression                             { $$ = $1; }
    | additive_expression '+' multiplicative_expression     { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_ADD]; }
    | additive_expression '-' multiplicative_expression     { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_SUB]; }
    ;

shift_expression
    : additive_expression                               { $$ = $1; }
    | shift_expression LEFT_OP additive_expression      { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_SHL]; }
    | shift_expression RIGHT_OP additive_expression     { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_SHR]; }
    ;

relational_expression
    : shift_expression                                  { $$ = $1; }
    | relational_expression '<' shift_expression        { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_LT]; }
    | relational_expression '>' shift_expression        { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_GT]; }
    | relational_expression LE_OP shift_expression      { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_LE]; }
    | relational_expression GE_OP shift_expression      { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_GE]; }
    ;

equality_expression
    : relational_expression                             { $$ = $1; }
    | equality_expression EQ_OP relational_expression   { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_EQ]; }
    | equality_expression NE_OP relational_expression   { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_NE]; }
    ;

and_expression
    : equality_expression                       { $$ = $1; }
    | and_expression '&' equality_expression    { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_BITWISE_AND]; }
    ;

exclusive_or_expression
    : and_expression                                { $$ = $1; }
    | exclusive_or_expression '^' and_expression    { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_BITWISE_XOR]; }
    ;

inclusive_or_expression
    : exclusive_or_expression                               { $$ = $1; }
    | inclusive_or_expression '|' exclusive_or_expression   { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_BITWISE_OR]; }
    ;

logical_and_expression
    : inclusive_or_expression                                   { $$ = $1; }
    | logical_and_expression AND_OP inclusive_or_expression     { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_LOGICAL_AND]; }
    ;

logical_or_expression
    : logical_and_expression                                { $$ = $1; }
    | logical_or_expression OR_OP logical_and_expression    { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_LOGICAL_OR]; }
    ;

conditional_expression
    : logical_or_expression                                             { $$ = $1; }
    | logical_or_expression '?' expression ':' conditional_expression   { $$ = Expr\AbstractConditionalOperator\ConditionalOperator[$1, $3, $5]; }
    ;

assignment_expression
    : conditional_expression                                        { $$ = $1; }
    | unary_expression assignment_operator assignment_expression    { $$ = Expr\BinaryOperator[$1, $3, $2]; }
    ;

assignment_operator
    : '='           { $$ = Expr\BinaryOperator::KIND_ASSIGN; }
    | MUL_ASSIGN    { $$ = Expr\BinaryOperator::KIND_MUL_ASSIGN; }
    | DIV_ASSIGN    { $$ = Expr\BinaryOperator::KIND_DIV_ASSIGN; }
    | MOD_ASSIGN    { $$ = Expr\BinaryOperator::KIND_REM_ASSIGN; }
    | ADD_ASSIGN    { $$ = Expr\BinaryOperator::KIND_ADD_ASSIGN; }
    | SUB_ASSIGN    { $$ = Expr\BinaryOperator::KIND_SUB_ASSIGN; }
    | LEFT_ASSIGN   { $$ = Expr\BinaryOperator::KIND_SHL_ASSIGN; }
    | RIGHT_ASSIGN  { $$ = Expr\BinaryOperator::KIND_SHR_ASSIGN; }
    | AND_ASSIGN    { $$ = Expr\BinaryOperator::KIND_AND_ASSIGN; }
    | XOR_ASSIGN    { $$ = Expr\BinaryOperator::KIND_XOR_ASSIGN; }
    | OR_ASSIGN     { $$ = Expr\BinaryOperator::KIND_OR_ASSIGN; }
    ;

expression
    : assignment_expression                     { $$ = $1; }
    | expression ',' assignment_expression      { $$ = Expr\BinaryOperator[$1, $3, Expr\BinaryOperator::KIND_COMMA]; }  
    ;

constant_expression
    : conditional_expression    { $$ = $1; }  /* with constraints */
    ;

declaration
    : declaration_specifiers ';'                        { $$ = IR\Declaration[$1[0], $1[1], $1[2], []]; }
    | declaration_specifiers init_declarator_list ';'   { $$ = IR\Declaration[$1[0], $1[1], $1[2], $2]; }
    | static_assert_declaration                         
    ;

declaration_specifiers
    : storage_class_specifier declaration_specifiers    { $$ = $2; $$[0] |= $1; }
    | storage_class_specifier                           { $$ = [$1, [], []]; }
    | type_specifier declaration_specifiers             { $$ = $2; array_unshift($$[2], $1); }
    | type_specifier                                    { $$ = [0, [], [$1]]; }
    | type_qualifier declaration_specifiers             { $$ = $2; $$[0] |= $1; }
    | type_qualifier                                    { $$ = [$1, [], []]; }
    | function_specifier declaration_specifiers         { $$ = $2; $$[0] |= $1; }
    | function_specifier                                { $$ = [$1, [], []]; }
    | alignment_specifier declaration_specifiers        { $$ = $2; $$[0] |= $1; }
    | alignment_specifier                               { $$ = [$1, [], []]; }
    | attribute_specifier declaration_specifiers        { $$ = $2; $$[1][] = $1; }
    | attribute_specifier                               { $$ = [0, [$1], []]; }
    ;

init_declarator_list
    : init_declarator                               { init($1); }
    | init_declarator_list ',' init_declarator      { push($1, $3); }
    ;

init_declarator
    : declarator '=' initializer                    { $$ = IR\InitDeclarator[$1, $3]; }
    | declarator                                    { $$ = IR\InitDeclarator[$1, null]; }
    ; 

storage_class_specifier
    : TYPEDEF               { $$ = Node\Decl::KIND_TYPEDEF; } /* identifiers must be flagged as TYPEDEF_NAME */
    | EXTERN                { $$ = Node\Decl::KIND_EXTERN; }
    | STATIC                { $$ = Node\Decl::KIND_STATIC; }
    | THREAD_LOCAL          { $$ = Node\Decl::KIND_THREAD_LOCAL; }
    | AUTO                  { $$ = Node\Decl::KIND_AUTO; }
    | REGISTER              { $$ = Node\Decl::KIND_REGISTER; }
    ;

type_specifier
    : VOID                          { $$ = Node\Type\BuiltinType[$1]; }
    | CHAR                          { $$ = Node\Type\BuiltinType[$1]; }
    | SHORT                         { $$ = Node\Type\BuiltinType[$1]; }
    | INT                           { $$ = Node\Type\BuiltinType[$1]; }
    | LONG                          { $$ = Node\Type\BuiltinType[$1]; }
    | FLOAT                         { $$ = Node\Type\BuiltinType[$1]; }
    | DOUBLE                        { $$ = Node\Type\BuiltinType[$1]; }
    | SIGNED                        { $$ = Node\Type\BuiltinType[$1]; }
    | UNSIGNED                      { $$ = Node\Type\BuiltinType[$1]; }
    | BOOL                          { $$ = Node\Type\BuiltinType[$1]; }
    | COMPLEX                       { $$ = Node\Type\BuiltinType[$1]; }
    | IMAGINARY                     { $$ = Node\Type\BuiltinType[$1]; } /* non-mandated extension */
    | atomic_type_specifier         { $$ = $1; }
    | struct_or_union_specifier     { $$ = Node\Type\TagType\RecordType[$1]; }
    | enum_specifier                { $$ = Node\Type\TagType\EnumType[$1]; }
    | TYPEDEF_NAME                  { $$ = Node\Type\TypedefType[$1]; } /* after it has been defined as such */
    ;

struct_or_union_specifier
    : struct_or_union optional_attribute_specifier_list '{' struct_declaration_list '}' optional_attribute_specifier_list                { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl[$1, null, $4, $2 ?? $6]; }
    | struct_or_union optional_attribute_specifier_list IDENTIFIER '{' struct_declaration_list '}' optional_attribute_specifier_list     { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl[$1, $3, $5, $2 ?? $7]; }
    | struct_or_union optional_attribute_specifier_list IDENTIFIER                                                                       { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl[$1, $3, null, $2]; }
    | struct_or_union optional_attribute_specifier_list TYPEDEF_NAME '{' struct_declaration_list '}' optional_attribute_specifier_list   { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl[$1, $3, $5, $2 ?? $7]; }
    | struct_or_union optional_attribute_specifier_list TYPEDEF_NAME                                                                     { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl[$1, $3, null, $2]; }
    ;

struct_or_union
    : STRUCT        { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_STRUCT; }
    | UNION         { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_UNION; }
    ;

struct_declaration_list
    : struct_declaration                            { $$ = $1; }
    | struct_declaration_list struct_declaration    { $$ = array_merge($1, $2); }
    ;

struct_declaration
    : specifier_qualifier_list ';'                          { compileStructField[$1[0], $1[1], $1[2], null]; } /* for anonymous struct/union */
    | specifier_qualifier_list struct_declarator_list ';'   { compileStructField[$1[0], $1[1], $1[2], $2]; }
    | static_assert_declaration                             
    ;

specifier_qualifier_list                        
    : type_specifier specifier_qualifier_list           { $$ = $2; array_unshift($$[2], $1); }
    | type_specifier                                    { $$ = [0, [], [$1]]; }
    | type_qualifier specifier_qualifier_list           { $$ = $2; $$[0] |= $1; }
    | type_qualifier                                    { $$ = [$1, [], []]; }
    | attribute_specifier specifier_qualifier_list      { $$ = $2; $$[1][] = $1; }
    | attribute_specifier                               { $$ = [0, [$1], []]; }
    ;

struct_declarator_list
    : struct_declarator                                 { init($1); }
    | struct_declarator_list ',' struct_declarator      { push($1, $3); }
    ;

struct_declarator
    : ':' constant_expression               { $$ = IR\FieldDeclaration[null, $2]; }
    | declarator ':' constant_expression    { $$ = IR\FieldDeclaration[$1, $3]; }
    | declarator                            { $$ = IR\FieldDeclaration[$1, null]; }
    ;

enum_specifier
    : ENUM '{' enumerator_list '}'                  { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl[null, $3]; }
    | ENUM '{' enumerator_list ',' '}'              { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl[null, $3]; }
    | ENUM IDENTIFIER '{' enumerator_list '}'       { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl[$2, $4]; }
    | ENUM IDENTIFIER '{' enumerator_list ',' '}'   { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl[$2, $4]; }
    | ENUM IDENTIFIER                               { $$ = Node\Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl[$2, null]; }
    ;

enumerator_list
    : enumerator                        { init($1); }
    | enumerator_list ',' enumerator    { push($1, $3); }
    ;

enumerator  /* identifiers must be flagged as ENUMERATION_CONSTANT */
    : enumeration_constant optional_attribute_specifier_list '=' constant_expression      { $$ = Node\Decl\NamedDecl\ValueDecl\EnumConstantDecl[$1, $4, null]; $this->scope->enumdef($1, $$); }
    | enumeration_constant                                                                { $$ = Node\Decl\NamedDecl\ValueDecl\EnumConstantDecl[$1, null, null]; $this->scope->enumdef($1, $$); }
    ;

atomic_type_specifier
    : ATOMIC '(' type_name ')'          { throw new Error('atomic type_name not implemented'); }
    ;

type_qualifier
    : CONST         { $$ = Node\Decl::KIND_CONST; }
    | RESTRICT      { $$ = Node\Decl::KIND_RESTRICT; }
    | VOLATILE      { $$ = Node\Decl::KIND_VOLATILE; }
    | ATOMIC        { $$ = Node\Decl::KIND_ATOMIC; }
    ;

function_specifier
    : INLINE        { $$ = Node\Decl::KIND_INLINE; }
    | NORETURN      { $$ = Node\Decl::KIND_NORETURN; }
    ;

alignment_specifier
    : ALIGNAS '(' type_name ')'             { throw new Error('alignas type_name not implemented'); }
    | ALIGNAS '(' constant_expression ')'   { throw new Error('alignas constant_expression not implemented'); }
    ;

optional_attribute_specifier_list
    : attribute_specifier optional_attribute_specifier_list    { $$ = $2; $$[] = $1; }
    | /* empty */                                              { $$ = []; }
    ;

attribute_specifier
    : ATTRIBUTE '(' '(' attribute_list ')' ')'    { $$ = Node\Decl\Specifiers\AttributeList[$4]; }
    | ATTRIBUTE '(' '(' ')' ')'                   { $$ = Node\Decl\Specifiers\AttributeList[]; }
    ;

attribute_list
    : attribute                        { $$ = [$1]; }
    | attribute_list ',' attribute     { $$ = $1; $$[] = $3; }
    ;

attribute
    : IDENTIFIER                       { $$ = Node\Decl\Specifiers\Attribute[$1, null]; }
    | IDENTIFIER '(' expression ')'    { $$ = Node\Decl\Specifiers\Attribute[$1, $3]; }
    ;

declarator
    : unaliased_declarator optional_attribute_specifier_list ASM '(' STRING_LITERAL ')'     { $$ = $1; $$->declarator->attributeList = $2; $$->declarator->declaratorAsm = $5; }
    | unaliased_declarator optional_attribute_specifier_list                                { $$ = $1; $$->declarator->attributeList = $2; }
    ;

unaliased_declarator
    : pointer direct_declarator     { $$ = IR\Declarator[$1, $2]; }
    | direct_declarator             { $$ = IR\Declarator[null, $1]; }
    ;

direct_declarator
    : IDENTIFIER                                                                    { $$ = IR\DirectDeclarator\Identifier[$1]; }
    | TYPEDEF_NAME                                                                  { $$ = IR\DirectDeclarator\Identifier[$1]; }
    | '(' declarator ')'                                                            { $$ = IR\DirectDeclarator\Declarator[$2]; }
    | direct_declarator '[' ']'                                                     { $$ = IR\DirectDeclarator\IncompleteArray[$1, 0, []]; }
    | direct_declarator '[' '*' ']'                                                 { $$ = IR\DirectDeclarator\CompleteArray[$1, null, 0, []]; }
    | direct_declarator '[' STATIC type_qualifier_list assignment_expression ']'    { $$ = IR\DirectDeclarator\CompleteArray[$1, $5, $4[0] | Node\Decl::KIND_STATIC, $4[1]]; }
    | direct_declarator '[' STATIC assignment_expression ']'                        { $$ = IR\DirectDeclarator\CompleteArray[$1, $4, Node\Decl::KIND_STATIC, []]; }
    | direct_declarator '[' type_qualifier_list '*' ']'                             { $$ = IR\DirectDeclarator\CompleteArray[$1, null, $3[0], $3[1]]; }
    | direct_declarator '[' type_qualifier_list STATIC assignment_expression ']'    { $$ = IR\DirectDeclarator\CompleteArray[$1, $5, $3[0] | Node\Decl::KIND_STATIC, $3[1]]; }
    | direct_declarator '[' type_qualifier_list assignment_expression ']'           { $$ = IR\DirectDeclarator\CompleteArray[$1, $4, $3[0], $3[1]]; }
    | direct_declarator '[' type_qualifier_list ']'                                 { $$ = IR\DirectDeclarator\IncompleteArray[$1, $3[0], $3[1]]; }
    | direct_declarator '[' assignment_expression ']'                               { $$ = IR\DirectDeclarator\CompleteArray[$1, $3, 0, []]; }
    | direct_declarator '(' parameter_type_list ')'                                 { $$ = IR\DirectDeclarator\Function_[$1, $3[0], $3[1]]; }
    | direct_declarator '(' ')'                                                     { $$ = IR\DirectDeclarator\Function_[$1, [], false]; }
    | direct_declarator '(' identifier_list ')'                                     { throw new Error('direct_declarator params identifier list not implemented'); }
    ;

pointer
    : '*' type_qualifier_list pointer       { $$ = IR\QualifiedPointer[$2[0], $2[1], $3]; }
    | '*' type_qualifier_list               { $$ = IR\QualifiedPointer[$2[0], $2[1], null]; }
    | '*' pointer                           { $$ = IR\QualifiedPointer[0, [], $2]; }
    | '*'                                   { $$ = IR\QualifiedPointer[0, [], null]; }
    ;

type_qualifier_list
    : type_qualifier                            { $$ = [$1, []]; }
    | type_qualifier_list type_qualifier        { $$ = [$1[0] | $2, $1[1]]; }
    | attribute_specifier                       { $$ = [0, [$1]]; }
    | type_qualifier_list attribute_specifier   { $$ = $2; $$[1][] = $1; }
    ;


parameter_type_list
    : parameter_list ',' ELLIPSIS           { $$ = [$1, true]; }
    | parameter_list                        { $$ = [$1, false]; }
    ;

parameter_list
    : parameter_declaration                         { init($1); }
    | parameter_list ',' parameter_declaration      { push($1, $3); }
    ;

parameter_declaration
    : declaration_specifiers declarator             { compileParamVarDeclaration[$1[0], $1[1], $1[2], $2]; }
    | declaration_specifiers abstract_declarator    { compileParamAbstractDeclaration[$1[0], $1[1], $1[2], $2]; }
    | declaration_specifiers                        { compileParamAbstractDeclaration[$1[0], $1[1], $1[2], null]; }
    ;

identifier_list
    : IDENTIFIER                        { throw new Error('identifier_list identifier not implemented'); }
    | identifier_list ',' IDENTIFIER    { throw new Error('identifier_list identifier_list identifier not implemented'); }
    ;

type_name
    : specifier_qualifier_list abstract_declarator  { compileTypeReference[$1[0], $1[1], $1[2], $2]; }
    | specifier_qualifier_list                      { compileTypeReference[$1[0], $1[1], $1[2], null]; }
    ;

abstract_declarator
    : pointer direct_abstract_declarator    { $$ = IR\AbstractDeclarator[$1, $2]; }
    | pointer                               { $$ = IR\AbstractDeclarator[$1, null]; }
    | direct_abstract_declarator            { $$ = IR\AbstractDeclarator[null, $1]; }
    ;

direct_abstract_declarator
    : '(' abstract_declarator ')'                                                                { $$ = IR\DirectAbstractDeclarator\AbstractDeclarator[$2]; }
    | '[' ']'                                                                                    { $$ = IR\DirectAbstractDeclarator\IncompleteArray[null, 0, []]; }
    | '[' '*' ']'                                                                                { $$ = IR\DirectAbstractDeclarator\CompleteArray[null, null, 0, []]; }
    | '[' STATIC type_qualifier_list assignment_expression ']'                                   { $$ = IR\DirectAbstractDeclarator\CompleteArray[null, $4, $3[0] | Node\Decl::KIND_STATIC, $3[1]]; }
    | '[' STATIC assignment_expression ']'                                                       { $$ = IR\DirectAbstractDeclarator\CompleteArray[null, $3, Node\Decl::KIND_STATIC, []]; }
    | '[' type_qualifier_list STATIC assignment_expression ']'                                   { $$ = IR\DirectAbstractDeclarator\CompleteArray[null, $4, $2[0] | Node\Decl::KIND_STATIC, $2[1]]; }
    | '[' type_qualifier_list assignment_expression ']'                                          { $$ = IR\DirectAbstractDeclarator\CompleteArray[null, $3, $2[0], $2[1]]; }
    | '[' type_qualifier_list ']'                                                                { $$ = IR\DirectAbstractDeclarator\IncompleteArray[null, $2[0], $2[1]]; }
    | '[' assignment_expression ']'                                                              { $$ = IR\DirectAbstractDeclarator\CompleteArray[null, $2, 0, []]; }
    | direct_abstract_declarator '[' ']'                                                         { $$ = IR\DirectAbstractDeclarator\IncompleteArray[$1, 0, []]; }
    | direct_abstract_declarator '[' '*' ']'                                                     { $$ = IR\DirectAbstractDeclarator\CompleteArray[$1, null, 0, []]; }
    | direct_abstract_declarator '[' STATIC type_qualifier_list assignment_expression ']'        { $$ = IR\DirectAbstractDeclarator\CompleteArray[$1, $5, $4[0] | Node\Decl::KIND_STATIC, $4[1]]; }
    | direct_abstract_declarator '[' STATIC assignment_expression ']'                            { $$ = IR\DirectAbstractDeclarator\CompleteArray[$1, $4, Node\Decl::KIND_STATIC, []]; }
    | direct_abstract_declarator '[' type_qualifier_list assignment_expression ']'               { $$ = IR\DirectAbstractDeclarator\CompleteArray[$1, $5, $3[0] | Node\Decl::KIND_STATIC, $3[1]]; }
    | direct_abstract_declarator '[' type_qualifier_list STATIC assignment_expression ']'        { $$ = IR\DirectAbstractDeclarator\CompleteArray[$1, $4, $3[0], $3[1]]; }
    | direct_abstract_declarator '[' type_qualifier_list ']'                                     { $$ = IR\DirectAbstractDeclarator\IncompleteArray[$1, $3[0], $3[1]]; }
    | direct_abstract_declarator '[' assignment_expression ']'                                   { $$ = IR\DirectAbstractDeclarator\CompleteArray[$1, $3, 0, []]; }
    | '(' ')' optional_attribute_specifier_list                                                  { $$ = IR\DirectAbstractDeclarator\Function_[null, [], false, $3]; }
    | '(' parameter_type_list ')' optional_attribute_specifier_list                              { $$ = IR\DirectAbstractDeclarator\Function_[null, $2[0], $2[1], $4]; }
    | direct_abstract_declarator '(' ')' optional_attribute_specifier_list                       { $$ = IR\DirectAbstractDeclarator\Function_[$1, [], false, $4]; }
    | direct_abstract_declarator '(' parameter_type_list ')' optional_attribute_specifier_list   { $$ = IR\DirectAbstractDeclarator\Function_[$1, $3[0], $3[1], $5]; }
    ;

initializer
    : '{' initializer_list '}'      { throw new Error('initializer brackend no trailing not implemented'); }
    | '{' initializer_list ',' '}'  { throw new Error('initializer brackeded trailing not implemented'); }
    | assignment_expression         { throw new Error('initializer assignment_expression not implemented'); }
    ;

initializer_list
    : designation initializer                           { throw new Error('initializer_list designator initializer not implemented'); }
    | initializer                                       { throw new Error('initializer_list initializer not implemented'); }
    | initializer_list ',' designation initializer      { throw new Error('initializer_list initializer_list designator initializer not implemented'); }
    | initializer_list ',' initializer                  { throw new Error('initializer_list initializer_list initializer not implemented'); }
    ;

designation
    : designator_list '='       
    ;

designator_list
    : designator                    { init($1); }
    | designator_list designator    { push($1, $2); }
    ;

designator
    : '[' constant_expression ']'   { throw new Error('[] designator not implemented'); }
    | '.' IDENTIFIER                { throw new Error('. designator not implemented'); }
    ;

static_assert_declaration
    : STATIC_ASSERT '(' constant_expression ',' STRING_LITERAL ')' ';'      { throw new Error('static assert declaration not implemented'); }
    ;

statement
    : labeled_statement     { $$ = $1; }
    | compound_statement    { $$ = $1; }
    | expression_statement  { $$ = $1; }
    | selection_statement   { $$ = $1; }
    | iteration_statement   { $$ = $1; }
    | jump_statement        { $$ = $1; } 
    | asm_statement        { $$ = $1; }
    ;

labeled_statement
    : IDENTIFIER ':' optional_attribute_specifier_list statement     { throw new Error('labeled_statement identifier not implemented'); }
    | CASE constant_expression ':' statement                         { throw new Error('labeled_statement case not implemented'); }
    | DEFAULT ':' statement                                          { throw new Error('labeled_statement default not implemented'); }
    ;

compound_statement
    : '{' '}'                   { $$ = Node\Stmt\CompoundStmt[[]]; }
    | '{'  block_item_list '}'  { $$ = Node\Stmt\CompoundStmt[$2]; }
    ;

block_item_list
    : block_item                    { init($1); }
    | block_item_list block_item    { push($1, $2); }
    ;

block_item
    : declaration           { throw new Error('block_item declaration not implemented'); }
    | statement             { $$ = $1; }
    ;

expression_statement
    : ';'                   { $$ = null; }
    | expression ';'        { $$ = $1; }
    ;

selection_statement
    : IF '(' expression ')' statement ELSE statement    { $$ = Node\Stmt\IfStmt[$3, $5, $7]; }
    | IF '(' expression ')' statement                   { $$ = Node\Stmt\IfStmt[$3, $5, null]; }
    | SWITCH '(' expression ')' statement               { throw new Error('switch not implemented'); }
    ;

iteration_statement
    : WHILE '(' expression ')' statement                                            { throw new Error('iteration 0 not implemented'); }
    | DO statement WHILE '(' expression ')' ';'                                     { throw new Error('iteration 1 not implemented'); }
    | FOR '(' expression_statement expression_statement ')' statement               { throw new Error('iteration 2 not implemented'); }
    | FOR '(' expression_statement expression_statement expression ')' statement    { throw new Error('iteration 3 not implemented'); }
    | FOR '(' declaration expression_statement ')' statement                        { throw new Error('iteration 4 not implemented'); }
    | FOR '(' declaration expression_statement expression ')' statement             { throw new Error('iteration 5 not implemented'); }
    ;

jump_statement
    : GOTO IDENTIFIER ';'       { throw new Error('goto identifier not implemented'); }
    | CONTINUE ';'              { throw new Error('continue not implemented'); }
    | BREAK ';'                 { throw new Error('break not implemented'); }
    | RETURN ';'                { $$ = Node\Stmt\ReturnStmt[null]; }
    | RETURN expression ';'     { $$ = Node\Stmt\ReturnStmt[$2]; }
    ;

translation_unit
    : external_declaration                      { $$ = Node\TranslationUnitDecl[$1]; }
    | translation_unit external_declaration     { $$ = $1; $$->addDecl(...$2); }
    ;

external_declaration
    : function_definition   { $$ = $1; }
    | declaration           { compileExternalDeclaration[$1]; }
    ;

function_definition
    : declaration_specifiers declarator declaration_list compound_statement     { compileFunction[$1[0], $1[1], $1[2], $2, $3, $4]; }
    | declaration_specifiers declarator compound_statement                      { compileFunction[$1[0], $1[1], $1[2], $2, [], $3]; }
    ;

declaration_list
    : declaration                   { init($1); }
    | declaration_list declaration  { push($1, $2); }
    ;

asm_operand_list_non_empty
    : asm_operand_list_non_empty ',' STRING_LITERAL '(' IDENTIFIER ')'    { $$ = $1; $$->operands[] = Node\Asm\Operand[$3, $5]; }
    | STRING_LITERAL '(' IDENTIFIER ')'                                   { $$ = Node\Asm\Operands[]; $$->operands[] = Node\Asm\Operand[$1, $3]; }
    ;

asm_operand_list
    : asm_operand_list_non_empty    { $$ = $1; }
    | /* empty */                   { $$ = new Node\Asm\Operands; }
    ;

asm_register_list_non_empty
    : asm_register_list_non_empty ',' STRING_LITERAL    { $$ = $1; $$->registers[] = $3; }
    | STRING_LITERAL                                    { $$ = Node\Asm\Registers[]; $$->registers[] = $1; }
    ;

asm_register_list
    : asm_register_list_non_empty   { $$ = $1; }
    | /* empty */                   { $$ = new Node\Asm\Registers; }
    ;

asm_extended
    : STRING_LITERAL                                                                     { $$ = Node\Stmt\AsmStmt[$1, new Node\Asm\Operands, new Node\Asm\Operands, new Node\Asm\Registers]; }
    | STRING_LITERAL ':' asm_operand_list                                                { $$ = Node\Stmt\AsmStmt[$1, $3, new Node\Asm\Operands, new Node\Asm\Registers]; }
    | STRING_LITERAL ':' asm_operand_list ':' asm_operand_list                           { $$ = Node\Stmt\AsmStmt[$1, $3, $5, new Node\Asm\Registers]; }
    | STRING_LITERAL ':' asm_operand_list ':' asm_operand_list ':' asm_register_list     { $$ = Node\Stmt\AsmStmt[$1, $3, $5, $7]; }

asm_modifiers
    : asm_modifiers VOLATILE        { $$ = $1 | Node\Stmt\AsmStmt::VOLATILE; }
    | asm_modifiers GOTO            { $$ = $1 | Node\Stmt\AsmStmt::GOTO; }
    | /* empty */                   { $$ = 0; }
    ;

asm_statement
    : ASM asm_modifiers '(' asm_extended ')' ';'  { $$ = $4; $$->modifiers = $2; }
    ;

%%
