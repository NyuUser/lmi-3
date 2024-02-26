<?php
// Include database connection logic (copy the relevant part from your main file)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
/*
$sql1 = "DELETE FROM prob5
WHERE recid NOT IN (
    SELECT MIN(recid)
    FROM prob5
    GROUP BY field1, field2, field3
)";
$result1 = $conn->query($sql1);
*/
$sql1 = "DELETE FROM user
WHERE recid NOT IN (
    SELECT MIN(recid)
    FROM user
    GROUP BY username, email
)";
$result1 = $conn->query($sql1);

echo "<tr class=\"ui-widget-header\">
    <th>Record ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Action</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        // Password to be encoded
        $password = $row["password"];
        
        // Hash the password using bcrypt
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        echo "<tr>
        <td>{$row["recid"]}</td>
        <td>{$row["username"]}</td>
        <td>{$row["email"]}</td>
        <td>
        <button onclick=\"editUser({$row['recid']}, '{$row['username']}', '{$row['email']}')\">Edit</button>
        <button onclick=\"deleteUser({$row['recid']})\">Delete</button>
        </td>
        </tr>";
    }
    
    // Close the database connection
    $conn->close();
    