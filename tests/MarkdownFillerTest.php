<?php

namespace Foxxything\MarkdownFiller\Tests;

use Foxxything\MarkdownFiller\MarkdownFiller;
use Foxxything\MarkdownFiller\FileLoaderInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class MarkdownFillerTest extends TestCase
{
    public function testReplaceVars()
    {
        /** @var FileLoaderInterface&MockObject $mockLoader */
        $mockLoader = $this->createMock(FileLoaderInterface::class);
        
        // Mock the load() method to return fake content
        $mockLoader->method('load')->willReturn('Hello [name]');

        // Inject the mock into MarkdownFiller
        $filler = new MarkdownFiller('fakepath.md', $mockLoader);

        // Test replacement
        $result = $filler->replaceVars(['name' => 'World']);
        $this->assertSame('Hello World', $result);
    }

    public function testNoFile()
    {
        /** @var FileLoaderInterface&MockObject $mockLoader */
        $mockLoader = $this->createMock(FileLoaderInterface::class);
        $mockLoader->method('load')
            ->willThrowException(new \InvalidArgumentException("File not found: fakepath.md"));

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('File not found: fakepath.md');

        new MarkdownFiller('fakepath.md', $mockLoader);
    }
}
