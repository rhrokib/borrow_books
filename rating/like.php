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
     
    //  if(isset($_POST['like'])){
    //     $like_or_dislike = $_POST['like_or_dislike'];
    //     if($like_or_dislike == 'Like'){
            $SQL = "SELECT total_like FROM book WHERE isbn = '$isbn'";
            $res = mysqli_query($con, $SQL);
            $row = $res->fetch_assoc();
            $c = $row['total_like'];
            $value = $c + 1;
            #echo $value;
            $sql = "UPDATE book SET total_like = '$value' WHERE isbn = '$isbn'";
            if ($con->query($sql) === TRUE) {
                echo "Record updated successfully";
                header('location: ..\book\book.php');
            } 
        // }
    //     else{
    //         $SQL = "SELECT total_dislike FROM book WHERE isbn = '$isbn'";
    //         $res = mysqli_query($con, $SQL);
    //         $row = $res->fetch_assoc();
    //         $c = $row['total_dislike'];
    //         $value = $c + 1;
    //         #echo $value;
    //         $sql = "UPDATE book SET total_dislike = '$value' WHERE isbn = '$isbn'";
    //         if ($con->query($sql) === TRUE) {
    //             echo "Record updated successfully";
    //             header('location: ..\book\book.php');
    //         } 
    //     }
    // }
?>