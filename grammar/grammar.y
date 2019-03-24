%pure_parser
%expect 2


%token  IDENTIFIER I_CONSTANT F_CONSTANT STRING_LITERAL FUNC_NAME SIZEOF
%token  PTR_OP INC_OP DEC_OP LEFT_OP RIGHT_OP LE_OP GE_OP EQ_OP NE_OP
%token  AND_OP OR_OP MUL_ASSIGN DIV_ASSIGN MOD_ASSIGN ADD_ASSIGN
%token  SUB_ASSIGN LEFT_ASSIGN RIGHT_ASSIGN AND_ASSIGN
%token  XOR_ASSIGN OR_ASSIGN
%token  TYPEDEF_NAME ENUMERATION_CONSTANT

%token  TYPEDEF EXTERN STATIC AUTO REGISTER INLINE
%token  CONST RESTRICT VOLATILE
%token  BOOL CHAR SHORT INT LONG SIGNED UNSIGNED FLOAT DOUBLE VOID
%token  COMPLEX IMAGINARY 
%token  STRUCT UNION ENUM ELLIPSIS

%token  CASE DEFAULT IF ELSE SWITCH WHILE DO FOR GOTO CONTINUE BREAK RETURN

%token  ALIGNAS ALIGNOF ATOMIC GENERIC NORETURN STATIC_ASSERT THREAD_LOCAL

%start translation_unit
%%

primary_expression
    : IDENTIFIER            
    | constant              { $$ = $1; }
    | string                { $$ = $1; }
    | '(' expression ')'    { $$ = $2; }
    | generic_selection     { $$ = $1; }
    ;

constant
    : I_CONSTANT             /* includes character_constant */
    | F_CONSTANT            
    | ENUMERATION_CONSTANT    /* after it has been defined as such */
    ;

enumeration_constant        /* before it has been defined as such */
    : IDENTIFIER            
    ;

string
    : STRING_LITERAL        
    | FUNC_NAME             
    ;

generic_selection
    : GENERIC '(' assignment_expression ',' generic_assoc_list ')'  
    ;

generic_assoc_list
    : generic_association                           { init($1); }
    | generic_assoc_list ',' generic_association    { push($1, $3); }
    ;

generic_association
    : type_name ':' assignment_expression           
    | DEFAULT ':' assignment_expression             
    ;

postfix_expression
    : primary_expression                                   { $$ = $1; }
    | postfix_expression '[' expression ']'                
    | postfix_expression '(' ')'                           
    | postfix_expression '(' argument_expression_list ')'  
    | postfix_expression '.' IDENTIFIER                    
    | postfix_expression PTR_OP IDENTIFIER                 
    | postfix_expression INC_OP                            { $$ = Node\Stmt\Expr\UnaryOperator[$2, Node\Stmt\Expr\UnaryOperator::KIND_POSTINC]; }
    | postfix_expression DEC_OP                            { $$ = Node\Stmt\Expr\UnaryOperator[$2, Node\Stmt\Expr\UnaryOperator::KIND_POSTDEC]; }
    | '(' type_name ')' '{' initializer_list '}'           
    | '(' type_name ')' '{' initializer_list ',' '}'       
    ;

argument_expression_list
    : assignment_expression                                { init($1); }
    | argument_expression_list ',' assignment_expression   { push($1, $3); }
    ;

unary_expression
    : postfix_expression                { $$ = $1; }
    | INC_OP unary_expression           { $$ = Node\Stmt\Expr\UnaryOperator[$2, Node\Stmt\Expr\UnaryOperator::KIND_PREINC]; }
    | DEC_OP unary_expression           { $$ = Node\Stmt\Expr\UnaryOperator[$2, Node\Stmt\Expr\UnaryOperator::KIND_PREDEC]; }
    | unary_operator cast_expression    { $$ = Node\Stmt\Expr\UnaryOperator[$2, $1]; }
    | SIZEOF unary_expression           
    | SIZEOF '(' type_name ')'          
    | ALIGNOF '(' type_name ')'         
    ;

unary_operator
    : '&'       { $$ = Node\Stmt\Expr\UnaryOperator::KIND_ADDRESS_OF; }
    | '*'       { $$ = Node\Stmt\Expr\UnaryOperator::KIND_DEREF; }
    | '+'       { $$ = Node\Stmt\Expr\UnaryOperator::KIND_PLUS; }
    | '-'       { $$ = Node\Stmt\Expr\UnaryOperator::KIND_MINUS; }
    | '~'       { $$ = Node\Stmt\Expr\UnaryOperator::KIND_BITWISE_NOT; }
    | '!'       { $$ = Node\Stmt\Expr\UnaryOperator::KIND_LOGICAL_NOT; }
    ;

cast_expression
    : unary_expression                      { $$ = $1; }
    | '(' type_name ')' cast_expression     
    ;

multiplicative_expression
    : cast_expression                                   { $$ = $1; }
    | multiplicative_expression '*' cast_expression     { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_MUL]; }
    | multiplicative_expression '/' cast_expression     { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_DIV]; }
    | multiplicative_expression '%' cast_expression     { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_REM]; }
    ;

additive_expression
    : multiplicative_expression                             { $$ = $1; }
    | additive_expression '+' multiplicative_expression     { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_ADD]; }
    | additive_expression '-' multiplicative_expression     { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_SUB]; }
    ;

shift_expression
    : additive_expression                               { $$ = $1; }
    | shift_expression LEFT_OP additive_expression      { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_SHL]; }
    | shift_expression RIGHT_OP additive_expression     { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_SHR]; }
    ;

relational_expression
    : shift_expression                                  { $$ = $1; }
    | relational_expression '<' shift_expression        { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_LT]; }
    | relational_expression '>' shift_expression        { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_GT]; }
    | relational_expression LE_OP shift_expression      { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_LE]; }
    | relational_expression GE_OP shift_expression      { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_GE]; }
    ;

equality_expression
    : relational_expression                             { $$ = $1; }
    | equality_expression EQ_OP relational_expression   { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_EQ]; }
    | equality_expression NE_OP relational_expression   { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_NE]; }
    ;

and_expression
    : equality_expression                       { $$ = $1; }
    | and_expression '&' equality_expression    { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_BITWISE_AND]; }
    ;

exclusive_or_expression
    : and_expression                                { $$ = $1; }
    | exclusive_or_expression '^' and_expression    { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_BITWISE_XOR]; }
    ;

inclusive_or_expression
    : exclusive_or_expression                               { $$ = $1; }
    | inclusive_or_expression '|' exclusive_or_expression   { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_BITWISE_OR]; }
    ;

logical_and_expression
    : inclusive_or_expression                                   { $$ = $1; }
    | logical_and_expression AND_OP inclusive_or_expression     { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_LOGICAL_AND]; }
    ;

logical_or_expression
    : logical_and_expression                                { $$ = $1; }
    | logical_or_expression OR_OP logical_and_expression    { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, Node\Stmt\Expr\BinaryOperator::KIND_LOGICAL_OR]; }
    ;

conditional_expression
    : logical_or_expression                                             { $$ = $1; }
    | logical_or_expression '?' expression ':' conditional_expression   
    ;

assignment_expression
    : conditional_expression                                        { $$ = $1; }
    | unary_expression assignment_operator assignment_expression    { $$ = Node\Stmt\Expr\BinaryOperator[$1, $3, $2]; }
    ;

assignment_operator
    : '='           { $$ = Node\Stmt\Expr\BinaryOperator::KIND_ASSIGN; }
    | MUL_ASSIGN    { $$ = Node\Stmt\Expr\BinaryOperator::KIND_MUL_ASSIGN; }
    | DIV_ASSIGN    { $$ = Node\Stmt\Expr\BinaryOperator::KIND_DIV_ASSIGN; }
    | MOD_ASSIGN    { $$ = Node\Stmt\Expr\BinaryOperator::KIND_REM_ASSIGN; }
    | ADD_ASSIGN    { $$ = Node\Stmt\Expr\BinaryOperator::KIND_ADD_ASSIGN; }
    | SUB_ASSIGN    { $$ = Node\Stmt\Expr\BinaryOperator::KIND_SUB_ASSIGN; }
    | LEFT_ASSIGN   { $$ = Node\Stmt\Expr\BinaryOperator::KIND_SHL_ASSIGN; }
    | RIGHT_ASSIGN  { $$ = Node\Stmt\Expr\BinaryOperator::KIND_SHR_ASSIGN; }
    | AND_ASSIGN    { $$ = Node\Stmt\Expr\BinaryOperator::KIND_AND_ASSIGN; }
    | XOR_ASSIGN    { $$ = Node\Stmt\Expr\BinaryOperator::KIND_XOR_ASSIGN; }
    | OR_ASSIGN     { $$ = Node\Stmt\Expr\BinaryOperator::KIND_OR_ASSIGN; }
    ;

expression
    : assignment_expression                     
    | expression ',' assignment_expression      
    ;

constant_expression
    : conditional_expression                   /* with constraints */
    ;

declaration
    : declaration_specifiers ';'                        
    | declaration_specifiers init_declarator_list ';'   
    | static_assert_declaration                         
    ;

declaration_specifiers
    : storage_class_specifier declaration_specifiers    { $$ = $2; $2[0] |= $1; }
    | storage_class_specifier                           { $$ = [$1, []]; }
    | type_specifier declaration_specifiers             { $$ = $2; $2[1][] = $1; }
    | type_specifier                                    { $$ = [0, [$1]]; }
    | type_qualifier declaration_specifiers             { $$ = $2; $2[0] |= $1; }
    | type_qualifier                                    { $$ = [$1, []]; }
    | function_specifier declaration_specifiers         { $$ = $2; $2[0] |= $1; }
    | function_specifier                                { $$ = [$1, []]; }
    | alignment_specifier declaration_specifiers        { $$ = $2; $2[0] |= $1; }
    | alignment_specifier                               { $$ = [$1, []]; }
    ;

init_declarator_list
    : init_declarator                               
    | init_declarator_list ',' init_declarator     
    ;

init_declarator
    : declarator '=' initializer                    
    | declarator                                   
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
    | struct_or_union_specifier     { $$ = $1; }
    | enum_specifier                { $$ = $1; }
    | TYPEDEF_NAME                  { $$ = Node\Type\TypedefType[$1]; } /* after it has been defined as such */
    ;

struct_or_union_specifier
    : struct_or_union '{' struct_declaration_list '}'               
    | struct_or_union IDENTIFIER '{' struct_declaration_list '}'    
    | struct_or_union IDENTIFIER                                    
    ;

struct_or_union
    : STRUCT        
    | UNION         
    ;

struct_declaration_list
    : struct_declaration                            
    | struct_declaration_list struct_declaration    
    ;

struct_declaration
    : specifier_qualifier_list ';'                           /* for anonymous struct/union */
    | specifier_qualifier_list struct_declarator_list ';'   
    | static_assert_declaration                             
    ;

specifier_qualifier_list                        
    : type_specifier specifier_qualifier_list   
    | type_specifier                            
    | type_qualifier specifier_qualifier_list   
    | type_qualifier                            
    ;

struct_declarator_list
    : struct_declarator                             
    | struct_declarator_list ',' struct_declarator  
    ;

struct_declarator
    : ':' constant_expression               
    | declarator ':' constant_expression    
    | declarator                            
    ;

enum_specifier
    : ENUM '{' enumerator_list '}'                  
    | ENUM '{' enumerator_list ',' '}'              
    | ENUM IDENTIFIER '{' enumerator_list '}'       
    | ENUM IDENTIFIER '{' enumerator_list ',' '}'   
    | ENUM IDENTIFIER                               
    ;

enumerator_list
    : enumerator                        
    | enumerator_list ',' enumerator    
    ;

enumerator  /* identifiers must be flagged as ENUMERATION_CONSTANT */
    : enumeration_constant '=' constant_expression      
    | enumeration_constant                              
    ;

atomic_type_specifier
    : ATOMIC '(' type_name ')'          
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
    : ALIGNAS '(' type_name ')'             
    | ALIGNAS '(' constant_expression ')'   
    ;

declarator
    : pointer direct_declarator     
    | direct_declarator             
    ;

direct_declarator
    : IDENTIFIER                                                                    
    | '(' declarator ')'                                                            
    | direct_declarator '[' ']'                                                     
    | direct_declarator '[' '*' ']'                                                 
    | direct_declarator '[' STATIC type_qualifier_list assignment_expression ']'    
    | direct_declarator '[' STATIC assignment_expression ']'                        
    | direct_declarator '[' type_qualifier_list '*' ']'                             
    | direct_declarator '[' type_qualifier_list STATIC assignment_expression ']'    
    | direct_declarator '[' type_qualifier_list assignment_expression ']'           
    | direct_declarator '[' type_qualifier_list ']'                                 
    | direct_declarator '[' assignment_expression ']'                               
    | direct_declarator '(' parameter_type_list ')'                                 
    | direct_declarator '(' ')'                                                     
    | direct_declarator '(' identifier_list ')'                                     
    ;

pointer
    : '*' type_qualifier_list pointer       
    | '*' type_qualifier_list               
    | '*' pointer                           
    | '*'                                   
    ;

type_qualifier_list
    : type_qualifier                        { $$ = $1; }
    | type_qualifier_list type_qualifier    { $$ = $1 | $2; }
    ;


parameter_type_list
    : parameter_list ',' ELLIPSIS       
    | parameter_list                    
    ;

parameter_list
    : parameter_declaration                     
    | parameter_list ',' parameter_declaration  
    ;

parameter_declaration
    : declaration_specifiers declarator             
    | declaration_specifiers abstract_declarator    
    | declaration_specifiers                        
    ;

identifier_list
    : IDENTIFIER                        
    | identifier_list ',' IDENTIFIER    
    ;

type_name
    : specifier_qualifier_list abstract_declarator  
    | specifier_qualifier_list                      
    ;

abstract_declarator
    : pointer direct_abstract_declarator    
    | pointer                               
    | direct_abstract_declarator           
    ;

direct_abstract_declarator
    : '(' abstract_declarator ')'
    | '[' ']'
    | '[' '*' ']'
    | '[' STATIC type_qualifier_list assignment_expression ']'
    | '[' STATIC assignment_expression ']'
    | '[' type_qualifier_list STATIC assignment_expression ']'
    | '[' type_qualifier_list assignment_expression ']'
    | '[' type_qualifier_list ']'
    | '[' assignment_expression ']'
    | direct_abstract_declarator '[' ']'
    | direct_abstract_declarator '[' '*' ']'
    | direct_abstract_declarator '[' STATIC type_qualifier_list assignment_expression ']'
    | direct_abstract_declarator '[' STATIC assignment_expression ']'
    | direct_abstract_declarator '[' type_qualifier_list assignment_expression ']'
    | direct_abstract_declarator '[' type_qualifier_list STATIC assignment_expression ']'
    | direct_abstract_declarator '[' type_qualifier_list ']'
    | direct_abstract_declarator '[' assignment_expression ']'
    | '(' ')'
    | '(' parameter_type_list ')'
    | direct_abstract_declarator '(' ')'
    | direct_abstract_declarator '(' parameter_type_list ')'
    ;

initializer
    : '{' initializer_list '}'      
    | '{' initializer_list ',' '}'  
    | assignment_expression         
    ;

initializer_list
    : designation initializer                           
    | initializer                                       
    | initializer_list ',' designation initializer      
    | initializer_list ',' initializer                  
    ;

designation
    : designator_list '='       
    ;

designator_list
    : designator                    
    | designator_list designator    
    ;

designator
    : '[' constant_expression ']'   
    | '.' IDENTIFIER                
    ;

static_assert_declaration
    : STATIC_ASSERT '(' constant_expression ',' STRING_LITERAL ')' ';'      
    ;

statement
    : labeled_statement     { $$ = $1; }
    | compound_statement    { $$ = $1; }
    | expression_statement  { $$ = $1; }
    | selection_statement   { $$ = $1; }
    | iteration_statement   { $$ = $1; }
    | jump_statement        { $$ = $1; }
    ;

labeled_statement
    : IDENTIFIER ':' statement                  
    | CASE constant_expression ':' statement    
    | DEFAULT ':' statement                     
    ;

compound_statement
    : '{' '}'                   { $$ = []; }
    | '{'  block_item_list '}'  { $$ = $2; }
    ;

block_item_list
    : block_item                    
    | block_item_list block_item    
    ;

block_item
    : declaration           
    | statement            
    ;

expression_statement
    : ';'                   
    | expression ';'        
    ;

selection_statement
    : IF '(' expression ')' statement ELSE statement    
    | IF '(' expression ')' statement                   
    | SWITCH '(' expression ')' statement               
    ;

iteration_statement
    : WHILE '(' expression ')' statement                                            
    | DO statement WHILE '(' expression ')' ';'                                     
    | FOR '(' expression_statement expression_statement ')' statement               
    | FOR '(' expression_statement expression_statement expression ')' statement    
    | FOR '(' declaration expression_statement ')' statement                        
    | FOR '(' declaration expression_statement expression ')' statement             
    ;

jump_statement
    : GOTO IDENTIFIER ';'       
    | CONTINUE ';'              
    | BREAK ';'                 
    | RETURN ';'                
    | RETURN expression ';'     
    ;

translation_unit
    : external_declaration                      { $$ = Node\TranslationUnitDecl[$1]; }
    | translation_unit external_declaration     { $$ = $1; $$->addDecl($2); }
    ;

external_declaration
    : function_definition   { $$ = $1; }
    | declaration           { $$ = $1; }
    ;

function_definition
    : declaration_specifiers declarator declaration_list compound_statement     { $$ = $this->compileFunction($1, $2, $3, $4, attributes()); }
    | declaration_specifiers declarator compound_statement                      { $$ = $this->compileFunction($1, $2, [], $3, attributes()); }
    ;

declaration_list
    : declaration                   { init($1); }
    | declaration_list declaration  { push($1, $2); }
    ;

%%
