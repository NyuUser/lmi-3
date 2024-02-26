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

$username = $_POST['username'];
$uemail = $_POST['uemail'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username' AND email='$uemail' AND password='$password'";
// $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    echo "Login successful. Redirecting...";
    // Redirect to menu page after successful login
    echo "<script>window.location.href='index.php';</script>";
} else {
    echo "Invalid username or password";
}

mysqli_close($conn);
?>
