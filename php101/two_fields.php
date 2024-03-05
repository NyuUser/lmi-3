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
        $sql = "CREATE TABLE IF NOT EXISTS two_fields (
            recid INT AUTO_INCREMENT PRIMARY KEY,
            fieldOne VARCHAR(255) NOT NULL,
            fieldTwo VARCHAR(255) NOT NULL
        )";
        $pdo->exec($sql); // Using exec() instead of query() for non-select queries
        
        echo "<br/>User table successfully created";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fOne = $_POST['fieldOne'];
            $fTwo = $_POST['fieldTwo'];
            
            $sql = "INSERT INTO two_fields (fieldOne, fieldTwo) VALUES (:fOne, :fTwo)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':fOne', $fOne);
            $stmt->bindParam(':fTwo', $fTwo);
            $stmt->execute();
            
            echo "<br/>Data inserted successfully";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
