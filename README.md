# Basic Usage:
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Foxxything\MarkdownFiller\MarkdownFiller;

file_put_contents('test.md', "# Hello [name]!"); // Init test.md

$md = new MarkdownFiller('test.md'); // Load test.md
echo $md->replaceVars([ // Replace [name] with 'John Doe'
    'name' => 'John Doe',
]);
```
