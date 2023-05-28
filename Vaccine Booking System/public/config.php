<?php

$localhost = "localhost";
$root = "root";
$password = "";
$db = "vaccinationsystem";
$conn = mysqli_connect($localhost, $root, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


?>


