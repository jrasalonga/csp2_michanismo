<?php
require_once('../controllers/connect.php');
include '../partials/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 registration-form">
			<form class="card border-info my-3 w-50 p-3 formCenter" action="../controllers/authenticate.php" method="POST">
				<div class="form-group">
					<label for="inputUsername3" class="col-sm-3 col-form-label">Username</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputUsername3" placeholder="Username" name="userUsername">
					</div>
				</div>
				<!-- <div class="form-group">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="userEmail">
					</div>
				</div> -->
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="userPassword">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Log in</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
include '../partials/footer.php';
mysqli_close($conn);
?>