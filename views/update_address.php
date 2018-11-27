<?php 

$id =  $_GET["id"];

require_once('../controllers/connect.php');

$sql = "SELECT a.house_num_others FROM addresses a JOIN region_provinces rp ON (a.region_province_code = rp.province_code) JOIN barangays b ON (a.barangay_id = b.id) JOIN cities_municipalities cm ON (a.city_municipality_code = cm.city_municipality_code) JOIN address_types at ON (a.address_type_id = at.id) WHERE id = '$id'";

$address = mysqli_query($conn, $sql);

if ($address) {
	while ($row = mysqli_fetch_assoc($address)) {
		$house_address = $row["house_num_others"];
		$barangay = $row["barangay"];
		$city_municipality = $row["city_municipality"];
		$region_province = $row["region_province"];
		$type = $row["type"];
	}
}
	

 ?>
<?php  
 include '../partials/header.php';


?>

<form>
<div class="container-fluid main-cpmtainer">
	<input type="hidden" name="id" hidden value="<?php echo $id; ?> ">
	<label for="house_num_others">House/Blk/Lot/Bldg/Street</label>
	<input type="text" name="house_num_others" class="form-control" value="<?php echo $house_address; ?>">

	<label for="province">Province</label>
	<select name="region_province" id="province" class="form-control">
		<option value="<?php echo $region_province; ?>;"></option>

	</select>

	<label for="city">City/Municipality</label>
	<select name="city_municipality" id="city" class="form-control">
		<option value="<?php echo $city_municipality; ?>"></option>
	</select>

	<label for="barangay">Barangay</label>
	<select name="barangay" class="form-control">
		<option value="<?php echo $barangay; ?>"></option>
	</select>

	<label for="type">Address Type</label>
	<select name="type" class="form-control">
		<option value="<?php echo $type; ?>"></option>
	</select>
</div>
</form>

<?php
include '../partials/footer.php';
mysqli_close($conn);
?>