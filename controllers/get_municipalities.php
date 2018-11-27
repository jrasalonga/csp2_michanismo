<?php

require ('connect.php');

$province_code = $_POST['province_code'];

$sql = "SELECT * FROM cities_municipalities WHERE province_code = '$province_code'";
$municipality_list = mysqli_query($conn, $sql);
$municipality_array = mysqli_fetch_all($municipality_list);

echo json_encode($municipality_array);