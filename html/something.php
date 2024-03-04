<?php
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

// SELECT query with WHERE, AND, OR, ORDER BY, LIMIT
// user password username email recid
$sql = "SELECT * FROM table_name WHERE condition1 AND (condition2 OR condition3) ORDER BY column_name LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // recid username email
        echo "Column1: " . $row["column1"]. " - Column2: " . $row["column2"]. "<br>";
    }
} else {
    echo "0 results";
}

// INSERT query
// user (username email) ('$username', '$email')
$sql = "INSERT INTO table_name (column1, column2) VALUES ('value1', 'value2')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// UPDATE query
// user username='edited' recid
$sql = "UPDATE table_name SET column1='new_value' WHERE condition";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// DELETE query
// user recid
$sql = "DELETE FROM table_name WHERE condition";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// LIKE query
// user username $search
$sql = "SELECT * FROM table_name WHERE column_name LIKE '%keyword%'";
$result = $conn->query($sql);

// GROUP BY query
// user user recid
$sql = "SELECT column_name, COUNT(*) FROM table_name GROUP BY column_name";
$result = $conn->query($sql);

// LEFT JOIN query
// user.recid, user.username user department user.username department.deptname
$sql = "SELECT table1.column1, table2.column2 FROM table1 LEFT JOIN table2 ON table1.id = table2.table1_id";
$result = $conn->query($sql);

// SUM query
// salary total employeedb 
$sql = "SELECT SUM(column_name) AS total FROM table_name";
$result = $conn->query($sql);

// COUNT query
// count employeedb
$sql = "SELECT COUNT(*) AS count FROM table_name";
$result = $conn->query($sql);

$conn->close();
?>
