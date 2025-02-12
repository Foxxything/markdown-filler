<?php

namespace Foxxything\MarkdownFiller;

/**
 * Interface for handling file content with variable replacement.
 */
interface MarkdownFillerInterface
{
    /**
     * Replace placeholders in the file content with provided values.
     *
     * @param array<string, string> $variables Associative array of placeholders and their replacements.
     * @return string The processed file content.
     */
    public function replaceVars(array $variables): string;

    /**
     * Get the current file content after modifications.
     *
     * @return string The processed file content.
     */
    public function getContent(): string;
}
