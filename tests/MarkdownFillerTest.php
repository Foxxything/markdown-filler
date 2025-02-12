<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Foxxything\MarkdownFiller\MarkdownFiller;

class MarkdownFillerTest extends TestCase
{
    private string $testFile;

    protected function setUp(): void
    {
        $this->testFile = __DIR__ . '/test.md';
        file_put_contents($this->testFile, "Hello, [name]!");
    }

    protected function tearDown(): void
    {
        unlink($this->testFile);
    }

    public function testFileNotFound(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new MarkdownFiller('nonexistent.md');
    }

    public function testReplaceVars(): void
    {
        $filler = new MarkdownFiller($this->testFile);
        $result = $filler->replaceVars(['name' => 'World']);
        $this->assertEquals("Hello, World!", $result);
    }
}
