<?php

require ('connect.php');

$city_municipality_code = $_POST['city_municipality_code'];

$sql = "SELECT * FROM barangays WHERE city_municipality_code = '$city_municipality_code'";
$barangay_list = mysqli_query($conn, $sql);
$barangay_array = mysqli_fetch_all($barangay_list);

echo json_encode($barangay_array);