<?php

namespace Foxxything\MarkdownFiller;

/**
 * Class to load a file's content from the specified file path.
 */
class FileLoader implements FileLoaderInterface
{
    /**
     * Load the content of a file.
     *
     * This method reads the contents of the file at the given file path. If the file does
     * not exist or cannot be read, an exception will be thrown.
     *
     * @param string $filePath The path to the file to be loaded.
     * 
     * @return string The content of the file.
     * 
     * @throws \InvalidArgumentException If the file does not exist.
     * @throws \RuntimeException If the file cannot be read.
     */
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