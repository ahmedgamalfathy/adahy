<?php
$dir = 'resources/views';
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
$fixed = [];

foreach ($files as $file) {
    if ($file->getExtension() !== 'php') continue;
    $path = $file->getPathname();
    $lines = file($path);
    $in_script = false;
    $changed = false;
    $out = [];

    foreach ($lines as $i => $line) {
        if (preg_match('/<script/i', $line)) $in_script = true;
        if (preg_match('/<\/script>/i', $line)) $in_script = false;

        if ($in_script && preg_match('/^(\s*)@else(\s*)$/', $line, $m)) {
            $line = $m[1] . '} else {' . $m[2];
            $changed = true;
        }

        $out[] = $line;
    }

    if ($changed) {
        file_put_contents($path, implode('', $out));
        $fixed[] = $path;
    }
}

echo count($fixed) . " file(s) fixed:\n";
foreach ($fixed as $f) echo "  $f\n";
