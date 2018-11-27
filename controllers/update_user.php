<?php 

session_start();
require_once('connect.php');

$id = $_POST['user'];
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['emailAddress'];
$password = $_POST['password'];

$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE id=$id";
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);

$_SESSION['user'] = mysqli_fetch_assoc($result);


header('location: ../views/profile.php');




?>