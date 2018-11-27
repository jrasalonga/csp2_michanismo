<?php
// db connection
require_once('../controllers/connect.php');

// get login details
$register_firstname = $_POST['registerFirstname'];
$register_lastname = $_POST['registerLastname'];
$register_username = $_POST['registerUsername'];
$register_password = password_hash($_POST['registerPassword'], PASSWORD_BCRYPT);
$register_email = $_POST['registerEmail'];
$register_address = $_POST['registerstreet'] . ' ' . $_POST['registerCity'] . ' ' . $_POST['registerZip'];
$register_mobile = $_POST['registerMobile'];
$role=2;


// check if email does exist
$sql_query = "INSERT INTO users(username, password, first_name, last_name, email, mobile_number, address, role_id) VALUES ('$register_username', '$register_password', '$register_firstname', '$register_lastname', '$register_email', '$register_mobile', '$register_address', '$role')";
	/*var_dump($sql_query);*/

$result = mysqli_query($conn, $sql_query);
/*var_dump($result);*/

if ($result) {
	header('location: ../views/login.php');
} else {
	echo "failed registration";
}

?>