<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_emp";

$dsn = "mysql:host=$servername;dbname=$dbname;charset=UTF8";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($pdo) {
        echo "Connected to the $dbname database successfully!";
        $sql = "CREATE TABLE IF NOT EXISTS user (
            recid INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";
        $pdo->exec($sql); // Using exec() instead of query() for non-select queries
        
        echo "<br/>User table successfully created";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = "INSERT INTO user (username, email, password) VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            
            echo "<br/>Data inserted successfully";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
