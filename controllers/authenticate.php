<?php

session_start();

require_once('../controllers/connect.php');

$user_username = $_POST['userUsername'];
/*$user_email = $_POST['userEmail'];*/
$user_password = $_POST['userPassword'];

$sql_query = "SELECT * FROM users WHERE username='$user_username'";
$user_info = mysqli_query($conn, $sql_query);

if ($user_info) {

	$_SESSION['user'] = mysqli_fetch_assoc($user_info);

	if (password_verify($user_password, $_SESSION['user']['password'])) {

		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = [];
		}

		header('location: ../views/catalog.php');

	}

} else {
	// $_SESSION['message'] = 'Login failed.';
	header('location: ../views/login.php');
}