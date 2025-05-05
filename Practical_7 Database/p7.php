<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db1";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully!";
?>
