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
    $reqId = $_GET['reqId'];
    // echo $reqId;
    $sql = "DELETE FROM request WHERE reqId = '$reqId'";
    // echo $sql;
    $query = mysqli_query($con, $sql);
    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('location: ..\view_request\view_req.php');
    }
    else{
        echo "Error!";
    } 
?>