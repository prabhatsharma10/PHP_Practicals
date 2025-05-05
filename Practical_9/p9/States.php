<?php
include('./connection.php');
$country_id = $_GET['country_id'];
$sql = "SELECT * FROM tbl_states WHERE country_id = $country_id";
$result = mysqli_query($conn, $sql);
$states = array();
while ($row = mysqli_fetch_assoc($result)) {
    $states[] = $row;
}
echo json_encode($states);
