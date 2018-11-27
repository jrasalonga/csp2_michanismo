<?php 

$id =  $_GET["id"];

require_once('../controllers/connect.php');

$sql = 	"DELETE FROM addresses WHERE id='$id'";

$address = mysqli_query($conn, $sql);

if ($address) {
	header('location: ../views/profile.php');
} else {
	echo "Delete failed";
}
	

 ?>