<?php

// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "new_emp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SELECT query with WHERE, AND, OR, ORDER BY, LIMIT
$sql = "SELECT * FROM table_name WHERE column1 = 'value1' AND (column2 = 'value2' OR column3 = 'value3') ORDER BY column4 LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Column1: " . $row["column1"]. " - Column2: " . $row["column2"]. " - Column3: " . $row["column3"]. "<br>";
    }
} else {
    echo "0 results";
}

// INSERT query
$sql = "INSERT INTO table_name (column1, column2, column3) VALUES ('value1', 'value2', 'value3')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// UPDATE query
$sql = "UPDATE table_name SET column1='new_value' WHERE column2='value'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// DELETE query
$sql = "DELETE FROM table_name WHERE column1='value'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// LIKE query
$sql = "SELECT * FROM table_name WHERE column1 LIKE '%value%'";
$result = $conn->query($sql);

// GROUP BY query
$sql = "SELECT column1, SUM(column2) AS total FROM table_name GROUP BY column1";
$result = $conn->query($sql);

// LEFT JOIN query
$sql = "SELECT t1.column1, t2.column2 FROM table1 t1 LEFT JOIN table2 t2 ON t1.id = t2.id";

$conn->close();

?>
