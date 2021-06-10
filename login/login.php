<?php
	session_start();
?>
<html>
	<head>
		<title> Login From Desing </title>	
			<link rel = "stylesheet" type = "text/css" href="login_style.css">
		<body>
			<div class = "loginbody"> 
				<div class = "loginbox">
					<img src= "download.jpg" class = "avatar">
					<h1>Login Here</h1>
					<form action="..\validation\validation.php" method="post"> 
						<p>User name<font color =blue>*</font></p>
						<input type = "text" name = "user" placeholder = "Enter User name" required>
						<p>Password<font color =blue>*</font></p>
						<input type = "Password" name = "password"placeholder="Enter Password" required>
						<input type = "submit" name = "" value = "Login">

						<a href="..\forgot pass\reset_pass.php"> Forgot Password? </a><br>
						<a href="..\signup\signup.php"> Sign up </a>
					</form>
				</div>
			</div>
		
		</body>
	</head>
</html>	