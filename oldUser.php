<?php
session_start();
$db_host = 'localhost'; // Database host
$db_user = 'root'; // Database username
$db_pass = ''; // Database password
$db_name = 'login'; // Database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['name'];
// $email = $_POST['email'];
$password = $_POST['password'];

// $sql = "SELECT * FROM user WHERE username='$username' AND email='$email' AND password='$password'";
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    echo "Success";
    // Redirect to menu page after successful login
} else {
    echo "$username $password Invalid username or password";
}

mysqli_close($conn);
?>
