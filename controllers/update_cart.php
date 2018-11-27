<?php 
session_start();

$item_id = $_POST['item_id'];
$item_quantity = $_POST['item_quantity'];

$_SESSION['cart'][$item_id] = $item_quantity;

echo array_sum($_SESSION['cart']);

// // Updates the quantity of the item
// if(count($_SESSION['cart']) != 0) {
// 	foreach ($_SESSION ['cart'] as $index => $item) { // index = 2 | item =  [4 => 7]
// 		// $id = array_keys($item)[0]; 
// 		foreach($item as $id => $qty){ // id = 4 | qty = 7
// 			if ($id == $item_id) {
// 				$_SESSION['cart'][$index][$id] = $item_quantity;
// 				die();
// 			}
// 		}
// 	}
// }

// array_push($_SESSION['cart'], [$item_id => $item_quantity]);
