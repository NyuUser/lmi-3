<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$charName = $_POST['thisName'];

$sql = "SELECT * FROM user WHERE username = '$charName'";

$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    echo "<tr>
        <th>Results</th>
    </tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row["username"]}</td>
            <td>{$row["email"]}</td>
          </tr>";
}
} else {
    echo "Error executing the query: $charName" . $conn->error;
}

// Close connection
$conn->close();