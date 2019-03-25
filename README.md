# PHPCParser

This is a library to parse C code into an AST. Using PHP.

Yes, this is an extraordinarily bad idea...


## Example

```php
$parser = new PHPCParser\CParser;

$ast = $parser->parse('path/to/file');
```

Note that pre-processor directives are all correctly resolved.

If you need to set a pre-processor define, you can use a context;

```php
$parser = new PHPCParser\CParser;

$context = new PHPCParser\PreProcessor\Context;
// #define A 42
$context->defineInt('A', 42);
// #define B "testing"
$context->defineString('B', "testing");
// #define C testing
$context->defineIdentifier('C', 'testing');
// etc... 

$ast = $parser->parse('path/to/file', $context);
```

And that's all there is to it (until it is workting that is...)...

## Generating AST from clang

```console
$ clang -cc1 -ast-dump test.c
```