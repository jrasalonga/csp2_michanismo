<?php 
require_once('../controllers/connect.php');
include '../partials/header.php';


?>


<div class="container-fluid main-cpmtainer">
	<form method="POST" action="../controllers/update_address.php">
		<label for="house_num_others">House/Blk/Lot/Bldg/Street</label>
		<input type="text" name="house_num_others" class="form-control">

		<label for="province">Province</label>
		<select name="province" id="province" class="form-control">
			<option value=""></option>
			<?php 

			$sql = "SELECT region_province, province_code FROM region_provinces";
			$provinces = mysqli_query($conn, $sql);

			foreach ($provinces as $province) { ?>
				<option value="<?php echo $province['province_code'] ?>"><?php echo $province['region_province'] ?></option>


			<?php }
			?>

		</select>

		<label for="city">City/Municipality</label>
		<select name="city" id="city" class="form-control">
		</select>

		<label for="barangay">Barangay</label>
		<select name="barangay" id="barangay" class="form-control">
		</select>

		<label for="type">Address Type</label>
		<select name="type" class="form-control">
			<option value=""></option>

			<?php 

			$sql = "SELECT type, id FROM address_types";
			$a_type = mysqli_query($conn, $sql);

			foreach ($a_type as $type) { ?>
				<option value="<?php echo $type['id'] ?>"><?php echo $type['type'] ?></option>
			<?php }
			?>
		</select>

		<button class="btn btn-success my-3" type="submit"> Add Address </button>
	</form>

</div>


<?php
include '../partials/footer.php';
mysqli_close($conn);
?>