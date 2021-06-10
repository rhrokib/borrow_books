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
	$flag = 0;

	mysqli_select_db($con, 'demo');
	$username = $_POST['user'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$phone = $_POST['phone'];
	$lastname = $_POST['lastname'];
	$location = $_POST['location'];

	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	#echo $phone;

	$enc_pass = md5($password);

	if(!empty($phone)){
		$sql = "INSERT INTO user (username, password, email, firstname, lastname, phone, location)
		VALUES ('$username', '$enc_pass', '$email', '$firstname', '$lastname', '$phone', '$location')";
		$query = mysqli_query($con, $sql);
		$flag = 1;
	}
	else{
		$sql = "INSERT INTO user (username, password, email, firstname, lastname, location)
		VALUES ('$username', '$enc_pass', '$email', '$firstname', '$lastname', '$location')";
		$query = mysqli_query($con, $sql);
		$flag = 1;
	}

	if ($flag == 1) {
		
		echo "New record created successfully";
		header('location: ..\login\login.php');

	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}

	$con->close();
?>