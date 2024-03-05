<?php

// Source file to read from
$sourceFile = 'source.txt';

// Destination file to write to
$destinationFile = 'destination.txt';

// Open the source file for reading
$sourceHandle = fopen($sourceFile, 'r');

// Open the destination file for writing
$destinationHandle = fopen($destinationFile, 'w');

// Check if file handles are valid
if ($sourceHandle === false || $destinationHandle === false) {
    die("Error opening files.");
}

// Read from source and write to destination using fread() and fwrite()
while (!feof($sourceHandle)) {
    $content = fread($sourceHandle, 1024); // Read 1KB at a time
    fwrite($destinationHandle, $content); // Write to destination
}

fwrite($destinationHandle, "\nTHE END");

// Close the file handles
fclose($sourceHandle);
fclose($destinationHandle);

echo "File copied successfully.";
?>
