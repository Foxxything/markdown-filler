<?php

namespace Foxxything\MarkdownFiller;

/**
 * Interface for loading file content.
 */
interface FileLoaderInterface
{
    /**
     * Loads content from a file.
     *
     * @param string $filePath The path to the file.
     * @return string The file content.
     * @throws \RuntimeException If the file cannot be read.
     */
    public function load(string $filePath): string;
}
