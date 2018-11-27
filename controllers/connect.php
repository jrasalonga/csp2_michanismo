<?php

// Credentials
$host = 'localhost'; // 127.0.0.1
$username = 'root';
$password = '';
$db_name = 'michanismos_db'; // Database that we will be using

// connection
$conn = mysqli_connect($host, $username, $password, $db_name);

// Check if connection is successful or failed
if (!$conn) {
	die('Connection Failed: ' .mysqli_error($conn));
} else {
	/*echo "Connection Successful";*/
}

/*$username = 'id7403154_michanismos';
$password = 'Today123';
$db_name = 'id7403154_michanismos';*/