<?php 
require_once('./connect.php');

// array(4) { ["item_name"]=> string(6) "Tent 3" ["item_price"]=> string(5) "12345" ["item_description"]=> string(10) "dgagsfgsfg" ["item_image"]=> string(5) "6.jpg" }

var_dump($_FILES['item_image']);

$target_dir = "../assets/img/";
$target_file = $target_dir . basename($_FILES['item_image']['name']);

$sql = "
	INSERT INTO items (item_name,
					   item_price,
					   item_description,
					   image,
					   category_id)
				VALUES ('{$_POST['item_name']}',
						'{$_POST['item_price']}',
						'{$_POST['item_description']}',
						'{$target_file}',
						'{$_POST['category_id']}')
";


$isItemInserted = mysqli_query($conn, $sql);


if($isItemInserted) {
	move_uploaded_file($_FILES['item_image']['tmp_name'], $target_file);


	$view_sql = "
		SELECT * FROM items WHERE item_name = '{$_POST['item_name']}'
	";

	$data = mysqli_query($conn, $view_sql);

	$new_item = mysqli_fetch_assoc($data);

	header('Location: ../views/item.php?id=' . $new_item['id']);
} else {
	echo "failed";
}