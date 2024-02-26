<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$thisid = $_POST["editrecid"];
$uname = isset($_POST["editname"]) ? $_POST["editname"] : "";
$uemail = isset($_POST["editemail"]) ? $_POST["editemail"] : "";

$sql = "UPDATE user SET username='$uname', email='$uemail' WHERE recid='$thisid'";

if ($conn->query($sql) === TRUE) {
    echo "Update user";
} else {
    echo "'$uname', '$email', '$id'";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>
