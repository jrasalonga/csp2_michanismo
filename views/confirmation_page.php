<?php
require_once('../controllers/connect.php');
include '../partials/header.php';
?>

<form method="POST" action="../controllers/placeorder.php" class="needs-validation" novalidate>
	<div class="container">
		<div class="row">
			<div class="col-md-12 order-md-2 mb-4 my-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="mx-auto text-center" style="width: 200px;">Confirmation Page</h4>
							<hr class="Underline">
							<table class="table table-bordered table-dark">

								<thead>
									<tr>
										<th scope="col" class="text-center">Image</th>
										<th scope="col" class="text-center">Item Name</th>
										<th scope="col" class="text-center">Price</th>
										<th scope="col" class="text-center">Quantity</th>
										<th scope="col" class="text-center">Subtotal</th>
									</tr>
								</thead>
								<tbody>

									<?php

									foreach ($_SESSION['cart'] as $item_id => $quantity) {

										$sql = "SELECT * FROM items WHERE id = '$item_id'";

										$results = mysqli_query($conn, $sql);

										foreach ($results as $item) { ?>

											<tr class='text-center' id="itemRow<?php echo $item['id'];?>">
												<td>
													<img src="<?php echo $item['image']; ?>" class="img-fluid">
												</td> 
												<td><?php echo $item['item_name']; ?></td>
												<td id="itemPrice<?php echo $item['id']; ?>">PHP <span id="price<?php echo $item['id']; ?>"><?php echo $item['item_price']; ?></span>
												</td>
												<td>
													<?php echo $quantity; ?>
												</td>
												<td>PHP <span class="totalSubTotal" id="subTotal<?php echo $item['id']; ?>"><?php echo $quantity * (int)$item['item_price']; ?></span>
												</td>
											</tr>

										<?php }
									}
									?>

									<tr class="text-center">
										<td>

										</td>
										<td>

										</td>
										<td>

										</td>
										<td>
											Total
										</td>
										<td id="totalOfSubTotal">
											0
										</td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


<?php
include '../partials/footer.php';
mysqli_close($conn);
?>