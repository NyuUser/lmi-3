<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_emp";

$dsn = "mysql:host=$servername;dbname=$dbname;charset=UTF8";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data from the user table
    $stmt = $pdo->query("SELECT * FROM user");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generate HTML for the table
    $html = '<table border="1">';
    $html .= '<tr><th><b>ID</b></th><th><b>Name</b></th><th><b>Email</b></th><th><b>Password</b></th></tr>';
    foreach ($users as $user) {
        $html .= "<tr>";
        $html .= "<td><p>{$user['recid']}.</p></td>";
        $html .= "<td><font color='blue'><b><span>{$user['username']}</span></b></font></td>";
        $html .= "<td><a href='#'>{$user['email']}</a></td>";
        $html .= "<td><img src='OIP.jpg' alt='Password Image' class='icon'></td>"; // Example image tag
        $html .= "</tr>";
    }
    $html .= "</table>";

    echo $html;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
