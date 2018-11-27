<?php
require_once('controllers/connect.php');
include 'partials/header.php';


?>

<img src="">

<div class="container">
	<div class="row">
		<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" background="./assets/img/index.jpg">
			<div class="jumbotron">
				<a href=""></a>
				<h1 class="display-4">Hello, world!</h1>
				<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
				<hr class="my-4">
				<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
				<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="card-deck">
			<?php

			$sql = "SELECT * FROM items LIMIT 4";

			$items = mysqli_query($conn, $sql);

			while ($row = mysqli_fetch_assoc($items)) {
				// Display column (title) using $row['key']

				echo '
				<div class="card">
				<img class="card-img-top" src="' . $row['image'] . '" alt="Card image cap">
				<div class="card-body">
				<h5 class="card-title">'. $row['item_name'] .'</h5>
				<p class="card-text">'. $row['item_description'] .'</p>
				</div>
				<div class="card-footer view-item-btn">
				<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
				</div>
				';
			}

			?>	
		</div>
	</div>
</div>


<?php
include 'partials/footer.php';
mysqli_close($conn);
?>