<?php 
    session_start();
    $servername = "localhost";
    $username = "dbms";
    $password = "dbms";
    // Create connection
    $con = new mysqli($servername, $username, $password);

    mysqli_select_db($con, 'demo');

    if(isset($_POST['submit'])){
        $file = $_FILES['photo'];
        print_r($file);
        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];

        if($fileerror == 0){
            $desfile = 'uploads/'.$filename;
            //echo $desfile;
            move_uploaded_file($filepath, $desfile);
            $sql = "insert into images(	filename, filepath) values('$filename', '$desfile')";
            $query = mysqli_query($con, $sql);
            if($query){
                header('location: ..\home\home.php');
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