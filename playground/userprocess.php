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

$uname = isset($_POST["name"]) ? $_POST["name"] : "";
$uemail = isset($_POST["email"]) ? $_POST["email"] : "";
$pword = isset($_POST["password"]) ? $_POST["password"] : "";

// INSERT INTO employeefile (fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive) 
// VALUES ('$fullname', '$address', '$birthdate', '$age', '$gender', '$civilstat', '$contactnum', '$salary', '$isactive')
// INSERT INTO employeefile (username, password) VALUES ('$username', '$password')

$sql = "INSERT INTO user (username, email, password) VALUES ('$uname', '$uemail', '$pword')";
// $result = mysqli_query($conn, $sql);

if ($conn->query($sql) === TRUE) {
    echo "Added user";
} else {
    echo "'$uname', '$email', '$pword'";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>
