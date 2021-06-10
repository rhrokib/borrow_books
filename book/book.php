<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('location: ..\login\login.php');
}
$servername = "localhost";
$username = "dbms";
$password = "dbms";
// Create connection
$con = new mysqli($servername, $username, $password);

mysqli_select_db($con, 'demo');
?>

<!DOCTYPE html>
<html>

<head>
	<title>Home Page </title>
</head>

<body>
	<div class="container">
		<h1>This is book page of <?php echo $_SESSION['user']; ?></h1>
	</div>
	<form action="..\search\search.php" method="POST">
		<input type="text" name="search" placeholder="Search By Name">
		<button style="border-radius: 5px; padding: 3px 5px;" type="submit">search</button>
		</from>
		<button class="btn"> <a class="rating" href="..\view_request\view_req.php">My Request</a> </button>
		<button class="btn"> <a class="rating" href="..\donate\donate.php">Donate</a> </button>
		<button class="btn"> <a class="rating" href="..\my_book\book_view.php">My Book</a> </button>
		<button class="btn"> <a class="rating" href="..\logout\logout.php">Log Out</a> </button>

		<button class="btn"> <a class="rating" href="#">Link_1</a> </button>
		<button class="btn"> <a class="rating" href="#">Link_2</a> </button>
		<button class="btn"> <a class="rating" href="#">Link_3</a> </button>
		<button class="btn"> <a class="rating" href="#">Link_4</a> </button>

		<style>
			.btn {
				background: #7868e6;
				padding: 3px 5px;
				border-radius: 5px;
			}

			.rating {
				text-decoration: none;
				color: white;
			}

			#ptable {
				width: 100%;
				border: 1px solid blue;
				border-collapse: collapse;
			}

			#ptable th,
			#ptable td {
				border: 1px solid blue;
				border-collapse: collapse;
				text-align: center;
			}

			#ptable tr:hover {
				background-color: bisque;
			}
		</style>

		<h5>Searched Book Details</h5>
		<table id="ptable">
			<thead>
				<tr>
					<th>Image</th>
					<th>isbn</th>
					<th>Name</th>
					<th>Author</th>
					<th>Description</th>
					<th>User Name</th>
					<th>Cost</th>
					<th>Is Donated</th>
					<th>Likes</th>
					<th>Dislikes</th>
					<th>Buttons</th>
					<th>Like or Dislike</th>

				</tr>
			</thead>
			<tbody>

				<?php
				$query = "SELECT * FROM book";
				$res = mysqli_query($con, $query);
				#$row = mysqli_fetch_array($res);

				#echo $row['isbn'];

				if (mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_array($res)) {
				?>

						<tr>
							<td> <img src="..\donate\uploads\<?php echo $row['image']; ?>" width="100" height="100"></td>
							<td><?php echo $row['isbn'] ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['author'] ?></td>
							<td><?php echo $row['description'] ?></td>
							<td><?php echo $row['username'] ?></td>
							<td><?php echo $row['cost'] ?></td>
							<td><?php echo $row['isDonated'] ?></td>
							<td><?php echo $row['Total_like'] ?></td>
							<td><?php echo $row['total_dislike'] ?></td>
							<td>

								<button style="border-radius: 5px; padding: 3px 5px;" type="button" onclick="requestfn('<?php echo $row['id']; ?>')">Request</button>
								<!-- <button class="btn"> <a class = "rating" href="..\rating\rating.php?isbn=<?php echo $row['isbn']; ?>">Rating</a> </button> -->
								<!-- <button class="btn"> <a class = "rating" href="..\delete\delete.php?isbn=<?php echo $row['isbn']; ?>">Delete</a> </button> -->
							</td>
							<td>
								<button class="btn"> <a class="rating" href="..\rating\like.php?isbn=<?php echo $row['isbn']; ?>">Like</a> </button>
								<button class="btn"> <a class="rating" href="..\rating\dislike.php?isbn=<?php echo $row['isbn']; ?>">Dislike</a> </button>
							</td>
						</tr>

				<?php
					}
				}

				?>
				<script>
					function requestfn(id) {
						location.assign(`../request/confirm_req.php?id=${id}`);
					}
				</script>
</body>

</html>