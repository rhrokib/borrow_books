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

    if(isset($_POST['submit'])){
        $isbn = $_POST['isbn'];
        $name = $_POST['name'];
        $author = htmlspecialchars($_POST['author'], ENT_QUOTES);
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
        #$time = date("h:i:sa");
        $username = $_SESSION['user'];
        $isDonated = $_POST['IsDonated'];
        $file = $_FILES['photo'];
        #print_r($file);
        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];
        #print_r($file);
        if($fileerror == 0){
            $desfile = 'uploads/'.$filename;
            #echo "$desfile";
            move_uploaded_file($filepath, $desfile);
            $sql = "INSERT into book(isbn, name, author, image, description, time, username, isDonated) values('$isbn', '$name','$author', '$filename','$description', NOW(),'$username', '$isDonated')";
            #echo $sql;
            $query = mysqli_query($con, $sql);
            
            if($query){
                header('location: ..\book\book.php');
            }
            else{
                echo "Not Inserted!";
            }
        }
    }
    else{
        echo " NO Button has been clicked! ";
    }
?>