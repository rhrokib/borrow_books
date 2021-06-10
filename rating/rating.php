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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating</title>
    <h1>Have to select rating type before press submit</h1>
</head>
<body>   

    <form method="POST" action="save.php? isbn=<?php echo $isbn;?>">
        <p>Rating<font color =red>*</font></p>
        <input type="radio" id="like" name="like or dislike" value="Like" required>
        <label for="like">Like</label><br>
                    
        <input type="radio" id="dislike" name="like or dislike" value="Dislike" required>
        <label for="dislike">Dislike</label><br>

        <input type="submit" value="Submit" name="submit">
    </from>  
</body>
</html>