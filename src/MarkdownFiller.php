<?php

namespace Foxxything\MarkdownFiller;

/**
 * Class to load a Markdown file and replace variables within the content.
 */
class MarkdownFiller implements MarkdownFillerInterface
{
    /**
     * The content of the file after variable replacement.
     * 
     * @var string
     */
    private string $fileContent;

    /**
     * Constructor to initialize file path and file loader.
     * 
     * @param string $filePath The path to the Markdown file.
     * @param FileLoaderInterface|null $fileLoader The file loader used to load the content. If not provided, a default FileLoader will be used.
     */
    public function __construct(
        private string $filePath,
        private ?FileLoaderInterface $fileLoader = null
    ) {
        $this->fileLoader = $fileLoader ?? new FileLoader();
        $this->fileContent = $this->fileLoader->load($this->filePath);
    }

    /**
     * Replace placeholders in the file content with values from the provided array.
     *
     * The method will search for placeholders in the form of [variableName] and replace
     * them with their corresponding values from the $variables array.
     *
     * @param array $variables An associative array where the key is the variable name and the value is the replacement value.
     * 
     * @return string The modified content with replaced variables.
     */
    public function replaceVars(array $variables): string
    {
        foreach ($variables as $varName => $varValue) {
            $pattern = '/\[' . preg_quote($varName, '/') . '\]/';
            $this->fileContent = preg_replace($pattern, $varValue, $this->fileContent) ?? $this->fileContent;
        }
        return $this->fileContent;
    }

    /**
     * Get the current content of the file after variable replacement.
     *
     * @return string The content of the file.
     */
    public function getContent(): string
    {
        return $this->fileContent;
    }
}
