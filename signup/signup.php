<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<style>
		.loginbox{
			width: 320px;
			height: 420px;
			background-color: transparent;
			color: black;
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%, -50%);
			box-sizing: border-box;
			padding: 70px 30px;
		}
		.loginbox p{
			margin: 0;
			padding: 0;
			font-weight: bold;
		}

		.loginbox input{
			width: 100%;
			margin-bottom: 20px;

		}

		.loginbox input[type = "text"], input[type = "password"]{
			border: none;
			border-bottom: 1px solid #fff;
			background: transparent;
			color: red;
			outline: none;
			height: 40px;
			font-size: 16px;
		}

		.loginbox input[type = "submit"]{
			border: none;
			outline: none;
			height: 40px;
			background: white;
			color: black;
			font-size: 18px;
			border-radius: 20px;
		}

		.loginbox input[type = "submit"]:hover {
			cursor: pointer;
			background: green;
			color: white;
		}

	</style>
</head>
<body>
		<div class = "loginbody"> 
				<div class = "loginbox">
					<h1>Registrar Here</h1>
					<form action="..\resigter\Registration.php" method="post"> 
						<p>User name<font color =red>*</font></p>
						<input type = "text" name = "user" placeholder = "Enter User name" required>
						
						<p>Password<font color =red>*</font></p>
						<input type = "Password" name = "password" placeholder="Enter Password" required>
						
						<p>Email<font color =red>*</font></p>
						<input type = "text" name = "email"placeholder="Enter Email" required>
						
						<p>First Name<font color =red>*</font></p>
						<input type = "text" name = "firstname"placeholder="Enter First Name" required>
						
						<p>Last Name<font color =red>*</font></p>
						<input type = "text" name = "lastname"placeholder="Enter Last Name" required>
						
						<p>Phone Number</p>
						<input type = "text" name = "phone"placeholder="Enter Phone Number">
						
						<p>Location<font color =red>*</font></p>
						<input type = "text" name = "location"placeholder="Enter Location" required>
						
						<input type = "submit" name = "" value = "Sign Up">

					</form>
				</div>
			</div>

</body>
</html>