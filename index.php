<?php
require_once('./db_config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="./profile/profile.css">

	<title>Profile</title>
</head>

<body>
	<!-- Navigation -->
	<header class='main-header'>
		<div>
			<a class="main-header-logo" href="./index.php">Borrow Books</a>
		</div>

		<nav class="main-nav">
			<ul class="main-nav__items">
				<li class="main-nav__item"><a href="./review/">Review</a></li>
				<li class="main-nav__item"><a href="./payment/">Credit</a></li>
				<li class="main-nav__item"><a href="./profile/">Profile</a></li>
				<li class="main-nav__item nav-logout"><a href="#">logout</a></li>
			</ul>
		</nav>
	</header>

	<!-- Main -->
	<main>
		<div class="row g-2 mt-3 ">
			<div class="col-md-4 mx-5">
				<div class="container my-5">
					<h1 class="title home-title">Home?</h1>
					<p class="homeless">Not everthing is fortunate enough to get a home.</p>
					<p class="homeless">Perhaps, we'll can build one before the final presentaion.</p>
					<p class="homeless mx-5">- 👷👷 </p>
				</div>
			</div>
			<div class="col-md-6 justify-center">
				<img src="./huc.svg" alt="" width="800px">
			</div>
		</div>
	</main>

	<!-- Footer -->
	<footer>
	</footer>

</body>

</html>