<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_emp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$forLimit = $_POST['limit'];
$recID = $_POST['recID'];

$sql = "SELECT * FROM user
WHERE recid >= '$recID'
ORDER BY recid
LIMIT $forLimit;";

$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    echo '<table border="1">';
    echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
    </tr>";
    // Display result data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row["recid"]}</td>
            <td>{$row["username"]}</td>
            <td>{$row["email"]}</td>
            <td><img src='OIP.jpg' alt='Password Image' class='icon'></td>
          </tr>";
    }
} else {
    echo "Error executing the query: " . $conn->error;
}

// Close connection
$conn->close();