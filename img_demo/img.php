<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <p>	isbn</p>
	<input type = "text" name = "isbn" placeholder = "Enter isbn">
						
	<p>Name/p>
	<input type = "name" name = "name"placeholder="Enter Name">
						
	<p>Author</p>
	<input type = "text" name = "author"placeholder="Enter Author">
						
	<p>Rating</p>
	<input type = "text" name = "rating"placeholder="Enter Rating">
						
	<p>Borrowed To</p>
	<input type = "text" name = "borrowedTo"placeholder="Enter Borrowed To>
						
	<p>Image</p>
  <input type="file" name="photo" id="fileToUpload"placeholder="Enter Image">
						
	<p>Description</p>
	<input type = "text" name = "description"placeholder="Enter Description">
						
	<p>Time</p>
	<input type = "time" name = "time"placeholder="Time">
						
	<p>User name</p>
	<input type = "text" name = "user" placeholder = "Enter User name">

  <p>Cost</p>
	<input type = "text" name = "cost" placeholder = "Enter Cost">

	<p>IsDonated</p>
  <input type="radio" id="yes" name="yes" value="yes">
  <label for="yes">Yes</label><br>
  <input type="radio" id="no" name="no" value="no">
  <label for="no">No</label><br>
  
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>




Section donate:

<?php 
    session_start();
    $servername = "localhost";
    $username = "dbms";
    $password = "dbms";
    // Create connection
    $con = new mysqli($servername, $username, $password);

    mysqli_select_db($con, 'demo');

    if(isset($_POST['submit'])){
        $isbn = $_POST['isbn'];
        $name = $_POST['name'];
        $author = $_POST['author'];
        $rating = $_POST['rating'];
        $borrowedTo = $_POST['borrowedTo'];
        $description = $_POST['description'];
        $time = $_POST['time'];
        $username = $_POST['username'];
        $cost = $_POST['cost'];
        #$isDonald = $_POST['isDonald'];
        $file = $_FILES['photo'];
        #print_r($file);
        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];

        if($fileerror == 0){
            $desfile = 'uploads/'.$filename;
            //echo $desfile;
            move_uploaded_file($filepath, $desfile);
            $sql = "insert into book(isbn, name, author, rating, borrowedTo, image, description, time, username, cost, isDonated) values('$isbn', '$name','$author', '$rating','$borrowedTo', '$$filepath','$description', '$time','$username', '$cost','$isDonated')";
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