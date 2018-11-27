<?php
require_once('../controllers/connect.php');
include '../partials/header.php';
?>

<div class="container">
	<div class="row bg-light">
		<div class="col-6">
			
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
		</div>
	</div>
</div>


<?php
include '../partials/footer.php';
mysqli_close($conn);
?>