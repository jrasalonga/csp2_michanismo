<?php
require_once('../controllers/connect.php');
include '../partials/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="mx-auto text-center" style="width: 200px;">Cart</h1>
			
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
					// E-Commerce -> Cart -> $_SESSION 


					// foreach ($_SESSION['cart'] as $value) {
						
						foreach ($_SESSION['cart'] as $item_id => $quantity) {
							
							$sql = "SELECT * FROM items WHERE id = '$item_id'";

							$results = mysqli_query($conn, $sql);

							foreach ($results as $item) { ?>

							<tr class='text-center' id="itemRow<?php echo $item['id'];?>">
								<td>
									<img src="<?php echo $item['image']; ?>">
								</td> 
								<td><?php echo $item['item_name']; ?></td>
								<td id="itemPrice<?php echo $item['id']; ?>">PHP <span id="price<?php echo $item['id']; ?>"><?php echo $item['item_price']; ?></span>
								</td>
								<td>
									<input id="itemQuantity<?php echo $item['id']; ?>" oninput="amount(<?php echo $item['id']; ?>)" type="number" value=<?php echo $quantity; ?>>
								</td>
								<td>PHP <span class="totalSubTotal" id="subTotal<?php echo $item['id']; ?>"><?php echo $quantity * (int)$item['item_price']; ?></span>
								</td>
								<td>
									<button class="btn btn-danger" onclick="removeItem(<?php echo $item['id']; ?>)">Delete</button>
								</td>

							</tr>

							<?php }
						}
					// }
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
						<td>
							<form action="checkout.php" method="GET"><button type="submit" class="btn btn-success">Check out</button></form>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>


<?php
include '../partials/footer.php';
mysqli_close($conn);
?>

<script type="text/javascript">
	(function () {
		getTotal();
	})();
</script>





