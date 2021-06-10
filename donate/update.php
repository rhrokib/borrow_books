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
    echo $isbn;

    if(isset($_POST['submit'])){
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
            
            $sql = "UPDATE book SET name = '$name', author = '$author', image = '$filename', description = '$description', time = NOW(), isDonated = '$isDonated' WHERE isbn = '$isbn'";
            #echo $sql;
            $query = mysqli_query($con, $sql);
            
            if($query){
                header('location: ..\my_book\book_view.php');
            }
            else{
                echo "Not Inserted!";
            }
        }
        else{
            
            $sql = "UPDATE book SET name = '$name', author = '$author', description = '$description', time = NOW(), isDonated = '$isDonated' WHERE isbn = '$isbn'";
            #echo $sql;
            $query = mysqli_query($con, $sql);
            
            if($query){
                header('location: ..\my_book\book_view.php');
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