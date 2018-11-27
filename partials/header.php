<?php

session_start(); 

// if (!isset($_SESSION['cart'])) {
// 	$_SESSION['cart'] = [[1 => 5], [4 => 7], [7 => 2]];
// }
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [	];
 }
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>michanismos</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Imports Custom Stylesheet -->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>

	<header>
		<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="../index.php">michanismós</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto navbarItems">

					<li>
						<a class="btn btn-primary btn btn-sm my-1" href="../views/item_add.php">Add New Item</a>
					</li>

					<?php 
					if (isset($_SESSION['user'])) {
						# code...
						echo '<li class="nav-item">
						<a class="nav-link" href="../views/profile.php">' . $_SESSION['user']['username'] . '</a>
						</li>';
					}
					?>

					<li class="nav-item">
						<a class="nav-link" href="../views/catalog.php">Catalog <span class="sr-only">(current)</span></a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="../views/cart.php">Cart (<span id="itemCount"><?php
							if (isset($_SESSION['cart'])) {
								echo array_sum($_SESSION['cart']);
							} else {
								echo 0;
							}
							?></span>)</a>
					</li>

					<?php 
					if (!isset($_SESSION['user'])) {
						# code...
						echo '<li class="nav-item">
						<a class="nav-link" href="../views/login.php">Login</a>
						</li>';
					}
					?>

					<?php 
					if (!isset($_SESSION['user'])) {
						# code...
						echo '<li class="nav-item">
						<a class="nav-link" href="../views/register.php">Register</a>
						</li>';
					}
					?>

					<li class="nav-item">
						<a class="nav-link" href="#">About Us</a>
					</li>

					<?php 
					if (isset($_SESSION['user'])) {
						# code...
						echo '<li class="nav-item">
						<a class="nav-link" href="../controllers/logout.php">Log out</a>
						</li>';
					}
					?>

				</ul>
			</div>
		</nav>
	</header>