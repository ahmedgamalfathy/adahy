<?php

$directory = __DIR__ . '/resources/views';
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($directory)
);

$fixedCount = 0;
$fileCount = 0;

foreach ($files as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $filePath = $file->getPathname();
        $content = file_get_contents($filePath);
        $originalContent = $content;
        
        // Convert <? to @php (but not <?php or <?=)
        $content = preg_replace('/<\?(?!php|=)/', '@php', $content);
        
        // Convert ?> to @endphp
        $content = str_replace('?>', '@endphp', $content);
        
        if ($content !== $originalContent) {
            file_put_contents($filePath, $content);
            $fixedCount++;
            $relativePath = str_replace(__DIR__ . DIRECTORY_SEPARATOR, '', $filePath);
            echo "Fixed: $relativePath\n";
        }
        
        $fileCount++;
    }
}

echo "\nTotal files scanned: $fileCount\n";
echo "Files fixed: $fixedCount\n";
echo "\nDone! Run 'php artisan view:clear' to clear the view cache.\n";
