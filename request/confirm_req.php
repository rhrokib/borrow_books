<?php
	session_start();
	if(!isset($_SESSION['user'])){
        header('location: ..\login\login.php');
    }
	$servername = "localhost";
	$username = "dbms";
	$password = "dbms";

	// Create connection
	$con = new mysqli($servername, $username, $password);

	mysqli_select_db($con, 'demo');

	$id = $_GET['id'];
	#echo $isbn;

	$requester_name = $_SESSION['user'];
	#echo $requester_name;
	
	$SQL = "SELECT username, author FROM book WHERE id = '$id'";
	$res = mysqli_query($con, $SQL);
	$row = $res->fetch_assoc();
	#echo $row['username'];
	
	$uname = $row['username'];
	#echo $row['name'];
	#$name = $row['name'];
	#echo $row['author'];
	$author = $row['author'];
	
	$q = "INSERT INTO request(requester_name, time, username, book_id ) VALUES ('$requester_name', NOW(), '$uname', '$id')";
	$query = mysqli_query($con, $q);
	#echo $q;

	if ($query) {
		echo "New record created successfully";
		header('location: ..\book\book.php');
	  } else {
		echo "Error: ";
		
	  }

	$con->close();
?>