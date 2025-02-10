<?php

class MarkDownFiller {
    private string $fileContent;

    // Constructor accepts the file path and reads the content with error handling
    public function __construct(string $filePath) {
        // Check if the file exists before trying to read it
        if (!file_exists($filePath)) {
            throw new InvalidArgumentException("The file at '$filePath' does not exist.");
        }

        // Attempt to read the file, handle the possibility of failure
        $this->fileContent = @file_get_contents($filePath);
        
        if ($this->fileContent === false) {
            throw new RuntimeException("Failed to read the contents of '$filePath'.");
        }
    }

    // Method to replace variables in the file content
    public function replaceVarsInContent(array $variables): string {
        try {
            foreach ($variables as $varName => $varValue) {
                // Ensure the pattern is escaped properly
                $pattern = '/\[' . preg_quote($varName, '/') . '\]/';
                $this->fileContent = preg_replace($pattern, $varValue, $this->fileContent);
            }

            return $this->fileContent;
        } catch (Exception $e) {
            throw new RuntimeException('Error occurred during variable replacement: ' . $e->getMessage());
        }
    }
}
