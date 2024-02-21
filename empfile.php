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
    birthdate DATE NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(10) NOT NULL,
    civilstat VARCHAR(20) NOT NULL,
    contactnum VARCHAR(15) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    isactive INT NOT NULL
)";
$conn->query($sql);

$sql = "SELECT * FROM employeefile";
$result = $conn->query($sql);