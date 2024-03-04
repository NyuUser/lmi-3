<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $GLOBAL['conn'] = new PDO("mysql:host=$servername;dbname=new_emp", $username, $password);
  // set the PDO error mode to exception
  $GLOBAL['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>