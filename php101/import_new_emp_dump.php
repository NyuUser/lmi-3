<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_emp";

// MySQL dump file path
$dumpFilePath = "C:/xampp/htdocs/lmi-3/php101/new_emp.sql";
// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the SQL dump file content
$sql = file_get_contents($dumpFilePath);

// Execute the SQL commands
if ($conn->multi_query($sql)) {
    echo "Import successful.";
} else {
    echo "Error importing dump file: " . $conn->error;
}

// Close the connection
$conn->close();