<?php
require_once('../controllers/connect.php');
include '../partials/header.php';

if (!isset($_SESSION['user'])) {
	 header('location: ./login.php');
}

$shippingAddress = $_SESSION['user']['address'];
/*var_dump($shippingAddress);*/

?>
<form method="POST" action="../controllers/placeorder.php" class="needs-validation" novalidate>
	<div class="container">
		<div class="row">
			<div class="col-md-8 order-md-2 mb-4 my-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="mx-auto text-center" style="width: 200px;">Order Summary</h4>
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
											<td>
												<button class="btn btn-danger" onclick="removeItem(<?php echo $item['id']; ?>)">Delete</button>
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
			<div class="col-md-4 order-md-1 my-5">

				<h4 class="mb-3">Shipping address</h4>
				<hr class="Underline">
				<div class="mb-3">
					<?php

					$sql = "SELECT a.id, a.house_num_others, b.barangay, cm.city_municipality, rp.region_province FROM addresses a JOIN barangays b ON (a.barangay_id = b.id) JOIN cities_municipalities cm ON (a.city_municipality_code = cm.city_municipality_code) JOIN region_provinces rp ON (a.region_province_code = rp.province_code) WHERE default_flag = 1 AND address_type_id = 1 AND user_id = '".$_SESSION['user']['id']."'";
					$result = mysqli_query($conn, $sql);
					$shipping = mysqli_fetch_assoc($result);
					/*var_dump($shipping);*/

					?>

					<input type="hidden" name="shipping" value="<?php echo $shipping['id']; ?>">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address" value="<?php echo $shipping['house_num_others']; ?>" readonly>
					<input type="text" name="#" class="form-control mt-3" id="" value="<?php echo $shipping['barangay']; ?>" readonly>
					<input type="text" name="#" class="form-control mt-3" id="" value="<?php echo $shipping['city_municipality']; ?>" readonly>
					<input type="text" name="#" class="form-control mt-3" id="" value="<?php echo $shipping['region_province']; ?>" readonly>
				</div>

				<h4 class="my-3">Billing address</h4>
				<hr class="Underline">
				<div class="mb-3">
					<?php

					$sql = "SELECT a.id, a.house_num_others, b.barangay, cm.city_municipality, rp.region_province FROM addresses a JOIN barangays b ON (a.barangay_id = b.id) JOIN cities_municipalities cm ON (a.city_municipality_code = cm.city_municipality_code) JOIN region_provinces rp ON (a.region_province_code = rp.province_code) WHERE default_flag = 1 AND address_type_id = 2 AND user_id = '".$_SESSION['user']['id']."'";
					$result = mysqli_query($conn, $sql);
					$billing = mysqli_fetch_assoc($result);
					/*var_dump($billing);*/

					?>

					<input type="hidden" name="billing" value="<?php echo $billing['id']; ?>">
					<input type="text" class="form-control" id="address" value="<?php echo $billing['house_num_others']; ?>" readonly>
					<input type="text" name="#" class="form-control mt-3" id="" value="<?php echo $billing['barangay']; ?>" readonly>
					<input type="text" name="#" class="form-control mt-3" id="" value="<?php echo $billing['city_municipality']; ?>" readonly>
					<input type="text" name="#" class="form-control mt-3" id="" value="<?php echo $billing['region_province']; ?>" readonly>
				</div>
				<hr class="mb-4 Underline">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="same-address">
					<label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
				</div>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="save-info">
					<label class="custom-control-label" for="save-info">Save this information for next time</label>
				</div>
				<hr class="mb-4 Underline">

				<h4 class="mb-3">Payment Options</h4>

				<?php

				$sql = "SELECT * FROM payment_modes";
				$payment_modes = mysqli_query($conn, $sql);
				echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';

				
				foreach ($payment_modes as $payment_mode) { ?>
				<label class="btn btn-secondary active" checked>
					<input  value="<?php echo $payment_mode['id']?>" type="radio" name="paymentMethod"> <?php echo $payment_mode['name'] ?>
				</label>
				<?php } ?>
			</div>

			<hr class="mb-4 Underline">

			<?php 
			echo "<a href='./confirmation_page.php' class='btn btn-primary' type='submit'>Continue to Confirmation Page</a>";
			 ?>

		</div>
	</div>
</div>
</form>


<?php
include '../partials/footer.php';
mysqli_close($conn);
?>