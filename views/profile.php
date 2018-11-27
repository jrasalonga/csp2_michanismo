<?php 
require_once('../controllers/connect.php');
include '../partials/header.php';

?>

<div class="row">
	<div class="col-lg-12">	
		<!-- <img src="../assets/img/ODUD5I0.jpg" class="img-fluid" alt="Responsive image"> -->
		<img src="../assets/img/ODUD5I0.jpg" class="img-fluid" alt="Responsive image">
		
	</div>
</div>
<div class="container">	
	<div class="row">
		<div class="col-lg-5 leftColumn">
			<?php

			$user = $_SESSION['user'];

			?>
			<form method="POST" action="../controllers/update_user.php">
				<!-- <label for="address" class="text-center">Profile Information</label> -->
				<h3 class="text-center">Profile Information</h3>
				<input type="hidden" name="user" value="<?php echo $user['id']; ?>">
				<h6>
					<div>Username</div>
				</h6>
				<input type="text" class="form-control" id="address" value="<?php echo $user['username']; ?>">
				<!-- <div>Old Password</div>
				<input type="text" name="oldPassword" class="form-control" id="" value="">
				<div>New Password</div>
				<input type="text" name="newPassword" class="form-control" id="" value="">
				<div>Confirm Password</div>
				<input type="text" name="confirmPassword" class="form-control" id="" value="">
				<button type="button" class="btn btn-danger">Cancel</button> -->

				<!-- <label for="address">Profile</label> -->
				<h6>
					<div>First Name</div>
				</h6>
				
				<input type="text" name="firstName" class="form-control" id="" value="<?php echo $_SESSION['user']['first_name'] ?>">
				<h6>
					<div>Last Name</div>
				</h6>
				<input type="text" name="lastName" class="form-control" id="" value="<?php echo $_SESSION['user']['last_name'] ?>">
				<h6>
					<div>Email</div>
				</h6>
				<input type="text" name="emailAddress" class="form-control" id="" value="<?php echo $_SESSION['user']['email'] ?>">	
				<button type="submit" class="btn btn-primary my-3">Update</button>
			</form>
		</div>

		<div class="col-lg-7 rightColumn">
			<h3 class="text-center">Address Information</h3>
			<a class="btn btn-primary" href="./address_form.php" data-id>Add Address</a>
			<div>
				<table class="table mt-4">
					<thead>
						<tr>
							<th scope="col">House Address</th>
							<th scope="col">Barangay</th>
							<th scope="col">City/Municipality</th>
							<th scope="col">Province</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$user_id = $_SESSION['user']['id'];

						/*$sql = "SELECT * FROM addresses WHERE user_id=$user_id";*/

						$sql = "SELECT a.id, a.house_num_others, b.barangay, cm.city_municipality, rp.region_province, at.type FROM addresses a JOIN region_provinces rp ON (a.region_province_code = rp.province_code) JOIN barangays b ON (a.barangay_id = b.id) JOIN cities_municipalities cm ON (a.city_municipality_code = cm.city_municipality_code) JOIN address_types at ON (a.address_type_id = at.id) WHERE user_id = ". $user['id'];
						

						$addresses = mysqli_query($conn, $sql);
						foreach ($addresses as $address) { ?>
							<tr>
								<td><?php echo $address['house_num_others'] ?></td>
								<td><?php echo $address['barangay'] ?></td>
								<td><?php echo $address['city_municipality'] ?></td>
								<td><?php echo $address['region_province'] ?></td>
								<td><?php echo $address['type'] ?></td>
								<td>
									<!-- <button class="btn-primary" type="button" data-id>Edit</button>
									<button class="btn-danger" type="button" data-id>Remove</button> -->
									<?php
									echo "<a href='./update_address.php?id=$address[id]' class='btn btn-warning'>Update</a>"; 
									echo "<a href='../controllers/delete_address.php?id=$address[id]' class='btn btn-danger'>Remove</a>";
									 ?>
								</td>
							</tr>	
						<?php }	?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<?php
include '../partials/footer.php';
mysqli_close($conn);
?>