<?php
require_once('./db_config.php');
session_start();
$login = true;
if (isset($_SESSION['user'])) {
	$login = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="./profile/profile.css">
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">

	<title>Borrow Books</title>
</head>

<body>
	<!-- Navigation -->
	<header class='main-header'>
		<div>
			<a class="main-header-logo" href="./index.php">Borrow Books</a>
		</div>

		<nav class="main-nav">
			<ul class="main-nav__items">
				<li class="main-nav__item"><a href="./book/book.php">Books</a></li>
				<li class="main-nav__item"><a href="./review/">Review</a></li>
				<li class="main-nav__item"><a href="./payment/">Credit</a></li>
				<li class="main-nav__item"><a href="./profile/">Profile</a></li>
				<?php
				if ($login) {
				?>
					<li class="main-nav__item nav-logout"><a href="./login/login.php">login</a></li>
				<?php
				} else {
				?>
					<li class="main-nav__item nav-logout"><a href="./logout/logout.php">logout</a></li>
				<?php
				}
				?>

			</ul>
		</nav>
	</header>

	<!-- Main -->
	<main>
		<div class="container mb-3">
			<?php
			if (isset($_GET['alert']) && !empty($_GET['alert'])) {
				if ($_GET['alert'] == 'danger') {
					$msg = $_GET['alert'];
				} else {
					$msg = $_GET['alert'];
				}
			?>
				<div class="alert mt-2 text-center alert-<?php echo $_GET['alert'] ?>" role="alert">
					<?php echo $msg ?>
				</div>
			<?php
			}
			?>
		</div>
		<div class="row g-2 d-flex justify-center mt-3 ">
			<div class="col-md-4 mx-5">
				<div class="container my-5">
					<h1 class="title home-title">Home?</h1>
					<p class="homeless">Not everthing is fortunate enough to get a home.</p>
					<p class="homeless">Perhaps, we'll be able to build one in future.</p>
					<p class="homeless mx-3">- 👷👷 </p>
				</div>
			</div>
			<div class="col-md-6">
				<img src="./huc.svg" alt="" width="800px">
			</div>
		</div>
		<!-- Demo login -->
	</main>

	<!-- Footer -->
	<footer>
	</footer>

</body>

</html>

<script>
	function login(username) {
		location.assign(`./demo_login.php?username=${username}`)
	}
</script>