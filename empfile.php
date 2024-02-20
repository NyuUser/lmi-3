<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employeedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS employeefile (
    recid INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    birthdate VARCHAR(255) NOT NULL,
    age VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL,
    civilstat VARCHAR(255) NOT NULL,
    contactnum VARCHAR(255) NOT NULL,
    salary VARCHAR(255) NOT NULL,
    isactive VARCHAR(255) NOT NULL
)";
$conn->query($sql);

$sql = "SELECT * FROM employeefile";
$result = $conn->query($sql);