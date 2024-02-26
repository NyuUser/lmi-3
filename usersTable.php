<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$dsn = "mysql:host=$servername;dbname=$dbname;charset=UTF8";

try {
	$pdo = new PDO($dsn, $username, $password);

	if ($pdo) {
		echo "Connected to the $dbname database successfully!";
        $sql = "CREATE TABLE IF NOT EXISTS user (
            recid INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";
        $pdo->query($sql);
        
        $sql = "SELECT * FROM user";
        $result = $pdo->query($sql);

        echo "<br/>user Table successfully created";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}