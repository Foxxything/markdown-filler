<?php

namespace Foxxything\MarkdownFiller;

class FileLoader implements FileLoaderInterface
{
    public function load(string $filePath): string
    {
        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException("File not found: {$filePath}");
        }

        $content = @file_get_contents($filePath);
        if ($content === false) {
            throw new \RuntimeException("Failed to read file: {$filePath}");
        }

        return $content;
    }
}

