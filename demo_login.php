/*
These are demo_login and demo_logout because I'm not working on
the actuall login, registration and logout tasks. I've implemented
these just for demonstration purposes and to make my future integration
easier. 
*/


<?php
$username = $_GET['username'];
session_start();
$_SESSION['user'] = $username;
?>

<script>
  location.assign("./index.php")
</script>