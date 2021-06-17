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

    $id = $_GET['id'];
    #echo $isbn;
	$query = "SELECT * FROM book WHERE id = '$id'";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_array($res);
    
    ?>
        <!DOCTYPE html>
            <html>
                <body>
                    <style>
                        .btn{
                            background: #7868e6;
                            padding: 3px 5px;
                            border-radius: 5px;			
                        }

                        .rating{
                            text-decoration: none;
                            color: white;
                        }
                    </style>
                    
                    <button class="btn"> <a class = "rating" href="..\view_request\view_req.php">My Request</a> </button>
                    <button class="btn"> <a class = "rating" href="..\donate\donate.php">Donate</a> </button>
                    <button class="btn"> <a class = "rating" href="..\my_book\book_view.php">My Book</a> </button>
                    <button class="btn"> <a class="rating" href="..\book\book.php">Book Page</a> </button>
                    <button class="btn"> <a class="rating" href="..\profile">Profile</a> </button>
                    <button class="btn"> <a class="rating" href="..\review">Review</a> </button>
                    <button class="btn"> <a class = "rating" href="..\logout\logout.php">Log Out</a> </button>
                    
                    <form action="update.php?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
                            Select image to upload:
                                    
                            <p>Name<font color=red>*</font></p>
                            <input type = "name" value="<?php echo $row['name']?>" name = "name"placeholder="Enter Name" required>
                                                
                            <p>Author<font color=red>*</font></p>
                            <input type = "text" name = "author" value="<?php echo $row['author']?>" placeholder="Enter Author" required>
                                                    
                                            
                            <p>Description<font color=red>*</font></p>
                            <textarea name="description" rows="4" cols="50" required><?php echo $row['description']?></textarea>
                                                

                            <p>IsDonated<font color=red>*</font></p>
                            <input type="radio" id="yes" name="IsDonated" <?php if($row['isDonated'] == "Yes") {echo "checked";}?> value="Yes" required>
                            <label for="yes">Yes</label><br>
                            
                            <input type="radio" id="no" name="IsDonated" <?php if($row['isDonated'] == "No") {echo "checked";}?> value="No" required>
                            <label for="no">No</label><br>

                            <p>Image</p>
                            <input type="file" <?php ($row['image'])?> name="photo" placeholder="Enter Image">
                        
                            <input type="submit" value="Upload Image" name="submit">
                    </form>

                </body>
            </html>     
    <?php
?>