<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $fieldName = $_POST['thisField']

$sql = "SELECT * FROM user";
$nameAuto = []; // Initialize an empty array to store names

$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch associative array
    while ($row = $result->fetch_assoc()) {
        // Append the name to the $nameAuto array
        $nameAuto[] = $row['username'];
    }
    echo json_encode($nameAuto);
} else {
    echo "Error executing the query: " . $conn->error;
}

// Close connection
$conn->close();
?>