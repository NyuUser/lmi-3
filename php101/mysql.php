<?php
require_once('db_config.php');
/*
// Database connection
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
*/
// SELECT query with WHERE, AND, OR, ORDER BY, LIMIT, LIKE
// user password username email recid
$smth = accessLogin();

$sql = "SELECT * FROM user WHERE username = ? AND (password = ? OR email LIKE ?) ORDER BY recid LIMIT 10";
$stmt = $smth->prepare($sql);
$stmt->execute(['edited', '', '%com%']);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
    foreach ($result as $row) {
        // recid username email
        echo "<br>";
        echo "Record ID: " . $row["recid"] . "<br>";
        echo "Username: " . $row["username"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Password: " . $row["password"] . "<br>";
    }
} else {
    echo "<br>0 results";
}

// INSERT query
// user (username email) ('$username', '$email')
function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Generate a random string with length 5
$randomString = generateRandomString();

$sql = "INSERT INTO user (username, email, password) VALUES ('$randomString', '$randomString.com', '$randomString')";
$stmt = accessLogin()->prepare($sql);
$stmt1 = accessEmployee()->prepare($sql);
if ($stmt->execute() === TRUE) {
    echo "<br>New record created successfully";
} else {
    $errorInfo = $stmt->errorInfo();
    echo "Error: " . $errorInfo[2]; // The error message is the third element of the errorInfo array
}

$sql = "INSERT INTO two_fields (fieldOne, fieldTwo) VALUES ('$randomString', '$randomString')";
$stmt = accessLogin()->prepare($sql);
$stmt1 = accessEmployee()->prepare($sql);
if ($stmt->execute() === TRUE) {
    echo "<br>New record created successfully";
} else {
    $errorInfo = $stmt->errorInfo();
    echo "Error: " . $errorInfo[2]; // The error message is the third element of the errorInfo array
}

// UPDATE query
// user username='edited' recid
$sql = "UPDATE user SET username='edited' WHERE recid LIKE '%1%'";
$stmt = accessLogin()->prepare($sql);

if ($stmt->execute() === TRUE) {
    echo "<br>Record updated successfully";
} else {
    $errorInfo = $stmt->errorInfo();
    echo "Error updating record: " . $errorInfo[2]; // The error message is the third element of the errorInfo array
}

// DELETE query
// user recid
$sql = "DELETE FROM user WHERE recid = 2";
$stmt = accessLogin()->prepare($sql);

if ($stmt->execute() === TRUE) {
    echo "<br>Record deleted successfully";
} else {
    $errorInfo = $stmt->errorInfo();
    echo "Error deleting record: " . $errorInfo[2]; // The error message is the third element of the errorInfo array
}

// LEFT JOIN query
// user.recid, user.username user department user.username department.deptname
$sql = "SELECT user.*, two_fields.fieldOne AS fieldOne FROM user JOIN two_fields ON user.recid = two_fields.recid";
$stmt = accessLogin()->prepare($sql);
if ($stmt->execute() === TRUE) {
    // Fetch all rows as associative array
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Loop through the results and display them
    foreach ($rows as $row) {
        echo "<br>JOINS";
        echo "Recid: " . $row['recid'] . "<br>";
        echo "Username: " . $row['username'] . "<br>";
        echo "Field One: " . $row['fieldOne']. "<br>";
    }
} else {
    $errorInfo = $stmt->errorInfo();
    echo "Error executing query: " . $errorInfo[2]; // The error message is the third element of the errorInfo array
}

// SUM query
// salary total employeedb 
$sql = "SELECT SUM(salary) AS total FROM employeefile";
$stmt1 = accessEmployee()->prepare($sql);
if ($stmt1->execute() === TRUE) {
    // Fetch the result
    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    
    // Output the total sum
    echo "<br>Total Salary: " . $row['total'];
} else {
    $errorInfo = $stmt1->errorInfo();
    echo "Error executing query: " . $errorInfo[2]; // The error message is the third element of the errorInfo array
}

// COUNT query
// count employeedb
$sql = "SELECT COUNT(*) AS count FROM employeefile";
$stmt1 = accessEmployee()->prepare($sql);
if ($stmt1->execute() === TRUE) {
    // Fetch the result
    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    
    // Output the count
    echo "<br>Total number of rows: " . $row['count'];
} else {
    $errorInfo = $stmt1->errorInfo();
    echo "Error executing query: " . $errorInfo[2]; // The error message is the third element of the errorInfo array
}
?>