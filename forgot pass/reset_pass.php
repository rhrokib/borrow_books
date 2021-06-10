<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Here</title>
</head>
<body>
	<div class = "loginbody"> 
				<div class = "loginbox">
					<h1>Rest Password Here</h1>
					<form action="Update.php" method="post"> 
						<p>User name<font color =red>*</font></p>
						<input type = "text" name = "user" placeholder = "Enter User name" required>
						<p>Password<font color =red>*</font></p>
						<input type = "Password" name = "password"placeholder="Enter Password" required>
						<p>Retype Password<font color =red>*</font></p>
						<input type = "Password" name = "re_password"placeholder="Re-type Password" required>
						<input type = "submit" name = "" value = "Save">

					</form>
				</div>
			</div>
</body>
</html>