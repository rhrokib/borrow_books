<?php
	session_start();
	$servername = "localhost";
	$username = "dbms";
	$password = "dbms";
	// Create connection
	$flag = 0;
	$con = new mysqli($servername, $username, $password);

	mysqli_select_db($con, 'demo');


	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	$name = $_POST['user'];
	$pass = $_POST['password'];
	
	$enc_pass = md5($pass);

	$sql = "SELECT username, password FROM user";
	$result = $con->query($sql);
	echo "input: " . $name . " " . $pass . " " . "<br>";

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "name: " . $row["username"]. " - password: " . $row["password"]. " ". "<br>";
			if($row["username"] == $name && $row["password"] == $enc_pass){
				$_SESSION['user'] = $row["username"];
				$flag = 1;
			}

		}
	
	} 
	if($flag == 1){
		header('location: ..\book\book.php');
	}
	else{
		header('location: ..\login\login.php');
	}
	$con->close();
?>
