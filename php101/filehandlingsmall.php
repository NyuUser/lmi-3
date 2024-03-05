<?php

// Source file to read from
$sourceFile = 'source.txt';

// Destination file to write to
$destinationFile = 'destination.txt';

// Check if source file exists
if (!file_exists($sourceFile)) {
    die("Source file does not exist.");
}

// Read from source and write to destination using readfile()
$content = file_get_contents($sourceFile);

// Write content to the destination file
file_put_contents($destinationFile, $content);

echo "File copied successfully.";
?>
