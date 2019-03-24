<?php
$meta #
#semval($) $this->semValue
#semval($,%t) $this->semValue
#semval(%n) $stackPos-(%l-%n)
#semval(%n,%t) $stackPos-(%l-%n)

namespace PHPCParser;

#include;

/* This is an automatically GENERATED file, which should not be manually edited.
 */
class Parser extends ParserAbstract
{
    protected int $tokenToSymbolMapSize = #(YYMAXLEX);
    protected int $actionTableSize      = #(YYLAST);
    protected int $gotoTableSize        = #(YYGLAST);

    protected int $invalidSymbol       = #(YYBADCH);
    protected int $errorSymbol         = #(YYINTERRTOK);
    protected int $defaultAction       = #(YYDEFAULT);
    protected int $unexpectedTokenRule = #(YYUNEXPECTED);

    protected int $YY2TBLSTATE = #(YY2TBLSTATE);
    protected int $numNonLeafStates  = #(YYNLSTATES);

    protected array $symbolToName = array(
        #listvar terminals
    );

    protected array $tokenToSymbol = array(
        #listvar yytranslate
    );

    protected array $action = array(
        #listvar yyaction
    );

    protected array $actionCheck = array(
        #listvar yycheck
    );

    protected array $actionBase = array(
        #listvar yybase
    );

    protected array $actionDefault = array(
        #listvar yydefault
    );

    protected array $goto = array(
        #listvar yygoto
    );

    protected array $gotoCheck = array(
        #listvar yygcheck
    );

    protected array $gotoBase = array(
        #listvar yygbase
    );

    protected array $gotoDefault = array(
        #listvar yygdefault
    );

    protected array $ruleToNonTerminal = array(
        #listvar yylhs
    );

    protected array $ruleToLength = array(
        #listvar yylen
    );
#if -t

    protected array $productions = array(
        #production-strings;
    );
#endif

    protected function initReduceCallbacks() {
        $this->reduceCallbacks = [
#reduce
            %n => function ($stackPos) {
                %b
            },
#noact
            %n => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
#endreduce
        ];
    }
}
#tailcode;