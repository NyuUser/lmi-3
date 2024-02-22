<?php
// Include database connection logic (copy the relevant part from your main file)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employeedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM employeefile";
$result = $conn->query($sql);

// Generate HTML for the sales list
echo "<tr>
<th>Record ID</td>
<th>FullName</th>
<th>Address</th>
<th>Birth Date</th>
<th>Age</th>
<th>Gender</th>
<th>Civil Status</th>
<th>Contact Number</th>
<th>Salary</th>
<th>Active</th>
<th>Action</th>
</tr>";
while ($row = $result->fetch_assoc()) {
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
    echo "<tr>
    <td>{$row["recid"]}</td>
    <td>{$row["fullname"]}</td>
    <td>{$row["address"]}</td>
    <td>{$readableDate}</td>
    <td>{$row["age"]}</td>
    <td>{$row["gender"]}</td>
    <td>{$row["civilstat"]}</td>
    <td>{$row["contactnum"]}</td>
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

// Close the database connection
$conn->close();
