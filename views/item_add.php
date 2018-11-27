<?php
require_once('../controllers/connect.php');
include '../partials/header.php';
?>

<form method="POST" action="../controllers/create_item.php" enctype="multipart/form-data">
	<div class="container">
		<div class="row bg-light">
			<div class="col-lg-6">
				<div class="m-5 p-3">

					<div class="mb-4">

						<label>Item Category</label>
						<select name="category_id" class="form-control">
							<option value="0">Select Category</option>
							<?php 

							$sql = "SELECT * FROM categories ORDER BY name ASC";

							$data = mysqli_query($conn, $sql);

							// var_dump($data);
							while ($item = mysqli_fetch_assoc($data)) {
								echo "<option value='{$item['id']}'>
										{$item['name']}
									 </option>";
							}
							?>
						</select>
					</div>

					<div class="mb-4">
						<label>Item Name</label>
						<input type="text" class="form-control" name="item_name" placeholder="Enter Item Name">
					</div>

					<div class="mb-4">
						<label>Price</label>
						<input type="text" class="form-control" name="item_price" placeholder="Enter Item Price">
					</div>

					<div class="mb-4">
						<label>Description</label>
						<input type="text" class="form-control" name="item_description" placeholder="Enter Item Description">
					</div>

				</div>
			</div>

			<div class="col-lg-6">
				<div class="m-5 p-3">
					<div class="mb-4">
						<label>Upload Image</label>
						<input id="imgPreview" onchange="previewImg()" type="file" class="form-control" name="item_image" >
					</div>

					<div id="itemImageBox" class="mb-4">
						<img id="itemImage" src="" alt="Preview">
					</div>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="mb-4 text-center">
					<input type="submit" class="btn btn-primary w-50" value="Add" >
				</div>
			</div>
		<!-- <div class="col-6">
			
			<?php

			if (isset($_GET['id'])) {
				$id = $_GET['id'];

				$sql = "SELECT * FROM items WHERE id='$id'";

				$items = mysqli_query($conn, $sql);
				$item = mysqli_fetch_assoc($items);
				// var_dump($item);
			}

			?>
			

			<div class="album py-5 bg-light">


				<div class="card mb-4 shadow-sm">
					<img class="card-img-top w-100" src="<?php echo $item['image']; ?>" alt="Card image cap">
					<div class="card-body">
						<p class="card-text">This is where the item's summary is seen</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
								<button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-6">
			<div class="album py-5 bg-light">
				<h1><?php echo $item['item_name'];?></h1>
				<p class="card-text"><?php echo $item['item_description'];?></p>
				<h5 class="card-title">PHP <?php echo $item['item_price'];?></h5>
			</div>
		</div> -->
	</div>
</div>
</form>

<?php
include '../partials/footer.php';


mysqli_close($conn);
?>
<script type="text/javascript" src="../assets/js/script.js"></script>