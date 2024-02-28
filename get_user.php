<?php
// Establish connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employeedb"; // Change this to your actual database name
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users
$sql = "SELECT * FROM employeefile";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $boolVal = '';
        if ($row["isactive"] == 1) {
            $boolVal = 'Yes';
        } else {
            $boolVal = 'No';
        }
        
        $dateString = $row["birthdate"]; //date in YYYY-MM-DD format
        $readableDate = date('F j, Y', strtotime($dateString)); // Convert to readable format

        $salary = $row["salary"]; // Example salary

        // Format salary with comma as thousands separator and Philippine peso symbol
        $formattedSalary = '₱' . number_format($salary, 2);

        echo 
        "<tr>
        <td>".$row["recid"]."</td>
        <td>".$row["fullname"]."</td>
        <td>".$row["address"]."</td>
        <td>{$readableDate}</td>
        <td>".$row["age"]."</td>
        <td>".$row["gender"]."</td>
        <td>".$row["civilstat"]."</td>
        <td>".$row["contactnum"]."</td>
        <td>{$formattedSalary}</td>
        <td>{$boolVal}</td>
        <td class='action-buttons'>
            <button onclick=\"editCharacter(
                {$row['recid']}, 
                '{$row['fullname']}', 
                '{$row['address']}', 
                '{$row['birthdate']}',
                '{$row['age']}',
                '{$row['gender']}',
                '{$row['civilstat']}',
                '{$row['contactnum']}',
                '{$row['salary']}',
                '{$row['isactive']}',
            )\">Edit</button>
            <button onclick=\"deleteCharacter({$row['recid']})\">Delete</button>
        </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No users found</td></tr>";
}
$conn->close();
?>
