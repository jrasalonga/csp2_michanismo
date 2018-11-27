<?php
// db connection
session_start();

$item_id = $_POST['item_id'];

unset($_SESSION['cart'][$item_id]);

?>