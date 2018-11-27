<?php
require_once('../controllers/connect.php');
include '../partials/header.php';

?>

<div class="container">
	<div class="row">
		<div class="col-lg-3">
			<h1>Categories</h1>
			<div class="list-group">
				<?php

				$mysql = mysqli_query($conn, "SELECT * FROM categories");

				while ($category = mysqli_fetch_assoc($mysql)) { ?>
				<a href="./catalog.php?id=<?php echo $category['id']; ?>" class="list-group-item list-group-item-action"><?php echo $category['name']; ?></a>

				<?php } ?>
			</div>
		</div>

		<div class="col-lg-9">
			<div class="w-100">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="../assets/img/tent1.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="../assets/img/tent1.jpg" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="../assets/img/tent1.jpg" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>				
			</div>

			<div class="card-deck">
				<?php

				if (isset($_GET['id'])) {
					$id = $_GET['id'];

					$sql = "SELECT * FROM items WHERE category_id='$id'";

					$items = mysqli_query($conn, $sql);

				} else {
					$sql = "SELECT * FROM items";

					$items = mysqli_query($conn, $sql);
				} 


				// check if items exist
				if (mysqli_num_rows($items) > 0) {

					while ($row = mysqli_fetch_assoc($items)) { ?>
						<!-- Display column (title) using $row['key'] -->

						<div class="col-md-4">
							<div class="card my-3">
								<img class="card-img-top" src="<?php echo $row['image']; ?>" alt="Card image cap">
								<div class="card-body">
									<a href="item.php?id=<?php echo $row['id']; ?>"><h5 class="card-title"><?php echo $row['item_name']; ?></h5></a>
									<h5 class="card-title">PHP <?php echo $row['item_price'];?></h5>
									<p class="card-text itemDescription"><?php echo $row['item_description'];?></p>
								</div>
								<div class="card-footer view-item-btn">
									<a href="#" class="btn btn-primary" onclick="addCart(<?php echo $row['id'] ?>)">Add To Cart</a>
								</div>
							</div>
						</div>

					<?php }

				} else {
					echo 'Items do not exist yet.';
				}


				?>
			</div>


		</div>
	</div>
</div>

<?php
include '../partials/footer.php';
mysqli_close($conn);
?>