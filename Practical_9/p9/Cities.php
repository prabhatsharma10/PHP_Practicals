<?php
include('./connection.php');
$state_id = $_GET['state_id'];
$sql = "SELECT * FROM tbl_cities WHERE state_id = $state_id";
$result = mysqli_query($conn, $sql);
$cities = array();
while ($row = mysqli_fetch_assoc($result)) {
    $cities[] = $row;
}
echo json_encode($cities);
