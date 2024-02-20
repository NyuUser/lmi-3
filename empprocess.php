<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employeedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        // Handle adding
        $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
        $address = isset($_POST["address"]) ? $_POST["address"] : "";
        $birthdate = isset($_POST["birthdate"]) ? $_POST["birthdate"] : "";
        $age = isset($_POST["age"]) ? $_POST["age"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $civilstat = isset($_POST["civilstat"]) ? $_POST["civilstat"] : "";
        $contactnum = isset($_POST["contactnum"]) ? $_POST["contactnum"] : "";
        $salary = isset($_POST["salary"]) ? $_POST["salary"] : "";
        $isactive = isset($_POST["isactive"]) ? $_POST["isactive"] : "";

        $sql = "INSERT INTO employeefile (fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive) 
        VALUES ('$fullname', '$address', '$birthdate', '$age', '$gender', '$civilstat', '$contactnum', '$salary', '$isactive')";

        if ($conn->query($sql) === TRUE) {
            echo "Added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["update"])) {
        // Handle updating
        $recid = $_POST["recid"];
        $fullname = $_POST["fullname"];
        $address = $_POST["address"];
        $birthdate = $_POST["birthdate"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $civilstat = $_POST["civilstat"];
        $contactnum = $_POST["contactnum"];
        $salary = $_POST["salary"];
        $isactive = $_POST["isactive"];

        $sql = "UPDATE employeefile 
        SET fullname='$fullname', 
        address='$address',
        birthdate='$birthdate',
        age='$age',
        gender='$gender',
        civilstat='$civilstat',
        contactnum='$contactnum',
        salary='$salary', 
        isactive='$isactive' 
        WHERE recid='$recid'";
        if ($conn->query($sql) === TRUE) {
            echo "Info updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["delete"])) {
        // Handle deleting
        $recid = $_POST["recid"];
        $sql = "DELETE FROM employeefile WHERE recid='$recid'";
        if ($conn->query($sql) === TRUE) {
            echo "Character info deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
