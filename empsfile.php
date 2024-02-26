<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employeedb";

$dsn = "mysql:host=$servername;dbname=$dbname;charset=UTF8";

try {
	$pdo = new PDO($dsn, $username, $password);

	if ($pdo) {
		echo "Connected to the $dbname database successfully!";
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
        $pdo->query($sql);
        
        $sql = "SELECT * FROM employeefile";
        $result = $pdo->query($sql);

        echo "<br/>employeedb Table successfully created";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}