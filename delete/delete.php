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
    $isbn = $_GET['isbn'];
    #echo $isbn;
    $sql = "DELETE FROM book WHERE isbn = '$isbn'";
    echo $sql;
    $query = mysqli_query($con, $sql);
    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('location: ..\my_book\book_view.php');
    } 
?>