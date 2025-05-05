<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
if(!$conn){
    die("Connection failed : ".mysqli_connect_error());
}
$sql = "CREATE DATABASE if not exists student_db";
$res = mysqli_query($conn, $sql);
if (!$res) {
    echo mysqli_error($conn);
}
