<?php
require_once('../controllers/connect.php');
include '../partials/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col card border-primary mb-3 my-3">
			<form class="my-3 card-header" action="../controllers/create_user.php" method="POST">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputfirstName4">First Name</label>
						<input type="text" class="form-control" id="inputfirstName4" placeholder="Firstname" name="registerFirstname">
					</div>
					<div class="form-group col-md-6">
						<label for="inputlastName4">Last Name</label>
						<input type="text" class="form-control" id="inputlastName4" placeholder="Lastname" name="registerLastname">
					</div>
					<div class="form-group col-md-6">
						<label for="inputuserName4">Username</label>
						<input type="text" class="form-control" id="inputuserName4" placeholder="Username" name="registerUsername">
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Password</label>
						<input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="registerPassword">
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Email</label>
						<input type="text" class="form-control" id="inputPassword4" placeholder="Email" name="registerEmail">
					</div>
				</div>
				<div class="form-group">
					<label for="inputAddress">Address</label>
					<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="registerstreet">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputCity">City</label>
						<input type="text" class="form-control" id="inputCity" name="registerCity">
					</div>
					<div class="form-group col-md-2">
						<label for="inputZip">Zip</label>
						<input type="text" class="form-control" id="inputZip" name="registerZip">
					</div>
					<div class="form-group col-md-2">
						<label for="inputMobile">Mobile</label>
						<input type="text" class="form-control" id="inputMobile" name="registerMobile">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
			</form>
		</div>
	</div>
</div>




<?php
include '../partials/footer.php';
mysqli_close($conn);
?>