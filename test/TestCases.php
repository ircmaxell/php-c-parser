<?php

namespace PHPCParser;

use PHPUnit\Framework\TestCase;

class TestCases extends TestCase {

    public static function provideTests(): \Generator {
        yield from self::provideTestsFromDir(__DIR__ . '/cases');
    }

    private static function provideTestsFromDir(string $dir): \Generator {
        foreach (new \DirectoryIterator($dir) as $path) {
            if (!$path->isDir() || $path->isDot()) {
                continue;
            }
            yield from self::provideTestsFromDir($path->getPathname());
        }
        foreach (new \GlobIterator($dir . '/*.h') as $test) {
            yield self::parseTest($test->getPathname(), $test->getBasename());
        }
        foreach (new \GlobIterator($dir . '/*.c') as $test) {
            yield self::parseTest($test->getPathname(), $test->getBasename());
        }
    }

    private static function parseTest(string $filename, string $basename): array {
        $parts = explode('//------------', file_get_contents($filename));
        assert(count($parts) === 2);
        return [$filename, $basename, $parts[0], trim($parts[1])];
    }

    /** 
     * @dataProvider provideTests
     */
    public function testCase($file, $name, $code, $expect): void {
        $tmpFile = file_put_contents($file . '.tmp', $code);
        try {
            $parser = new CParser;

            $translationUnit = $parser->parse($file . '.tmp');

            $printer = new Printer;

            $actual = $printer->print($translationUnit);

            $this->assertEquals($expect, trim($actual));
        } finally {
            unlink($file . '.tmp');
        }
    }

}