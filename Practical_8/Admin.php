<?php
include('./conn.php');
mysqli_select_db($conn, "student_db");
$sql = "CREATE TABLE if not exists admin (id INT PRIMARY KEY
AUTO_INCREMENT,username VARCHAR(50),password VARCHAR(255));";
$res = mysqli_query($conn, $sql);
if (!$res) {
    echo mysqli_error($conn);
}
echo "table created successfully";
