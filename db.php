<?php
$serverName = "localhost";
$userName = "root";
$password = "root";
$dbName = "online_school";

$conn = new mysqli($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection Error: " . mysqli_connect_error());
}

//echo phpinfo();
