<?php
$servername = "localhost";
$username = "root";
$password = "";

function accessLogin() {
  global $servername, $username, $password; // Define global variables inside the function
  try {
    $GLOBALS['login'] = new PDO("mysql:host=$servername;dbname=new_emp", $username, $password);
    // set the PDO error mode to exception
    $GLOBALS['login']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $GLOBALS['login'];
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

function accessEmployee() {
  global $servername, $username, $password; // Define global variables inside the function
  try {
    $GLOBALS['emp'] = new PDO("mysql:host=$servername;dbname=employeedb", $username, $password);
    // set the PDO error mode to exception
    $GLOBALS['emp']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $GLOBALS['emp'];
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
?>