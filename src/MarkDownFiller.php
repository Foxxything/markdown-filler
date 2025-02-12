<?php
namespace Foxxything\MarkdownFiller;

class MarkdownFiller {
    private string $fileContent;

    public function __construct(private string $filePath) {
        $this->loadFile();
    }

    private function loadFile(): void {
        if (!file_exists($this->filePath)) {
            throw new \InvalidArgumentException("File not found: {$this->filePath}");
        }
        
        $content = @file_get_contents($this->filePath);
        if ($content === false) {
            throw new \RuntimeException("Failed to read file: {$this->filePath}");
        }
        
        $this->fileContent = $content;
    }

    public function replaceVars(array $variables): string {
        foreach ($variables as $varName => $varValue) {
            $pattern = '/\[' . preg_quote($varName, '/') . '\]/';
            $this->fileContent = preg_replace($pattern, $varValue, $this->fileContent) ?? $this->fileContent;
        }
        return $this->fileContent;
    }

    public function getContent(): string {
        return $this->fileContent;
    }
}