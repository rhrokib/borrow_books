<?php
$username = $_GET['username'];
session_start();
$_SESSION['username'] = $username;
?>

<script>
  location.assign("./index.php")
</script>