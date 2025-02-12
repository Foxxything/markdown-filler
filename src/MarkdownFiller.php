<?php
namespace Foxxything\MarkdownFiller;

class MarkdownFiller implements MarkdownFillerInterface
{
    private string $fileContent;

    public function __construct(
        private string $filePath,
        private FileLoaderInterface $fileLoader
    ) {
        $this->fileLoader = $fileLoader ?? new FileLoader();
        $this->fileContent = $this->fileLoader->load($this->filePath);
    }

    public function replaceVars(array $variables): string
    {
        foreach ($variables as $varName => $varValue) {
            $pattern = '/\[' . preg_quote($varName, '/') . '\]/';
            $this->fileContent = preg_replace($pattern, $varValue, $this->fileContent) ?? $this->fileContent;
        }
        return $this->fileContent;
    }

    public function getContent(): string
    {
        return $this->fileContent;
    }
}
