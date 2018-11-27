<?php
require_once('../controllers/connect.php');
include '../partials/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col">
			<h1>Items</h1>
			<?php 

			$sql = "SELECT * FROM items";

			$items = mysqli_query($conn, $sql);

			

			while ($item_details = mysqli_fetch_assoc($items) <= 10) {
				# code...
			}

			 ?>

			$target_dir = "../assets/img/new_items/";
$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
		</div>
	</div>
</div>



<?php
include '../partials/footer.php';
mysqli_close($conn);
?>