<?php
include('./connection.php');
$sql = "SELECT id, name from tbl_countries";
$result = mysqli_query($conn, $sql);
$countries = array();
while ($row = mysqli_fetch_assoc($result)) {
    $countries[] = $row;
}
echo json_encode($countries);
