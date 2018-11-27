<?php

session_start();
require_once('connect.php'); 

$house_num_others = $_POST['house_num_others'];
$province = $_POST['province'];
$city = $_POST['city'];
$barangay = $_POST['barangay'];
$type = $_POST['type'];
$user_id = $_SESSION['user']['id'];

$sql = "

INSERT INTO addresses (house_num_others, region_province_code, city_municipality_code, barangay_id, address_type_id, default_flag, user_id) VALUES ('$house_num_others','$province','$city','$barangay','$type', 1,'$user_id')

";

$result = mysqli_query($conn, $sql);

if ($result) {
	header('location: ../index.php')
} 

?>