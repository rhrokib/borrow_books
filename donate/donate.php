<?php
	session_start();
	if(!isset($_SESSION['user'])){
        header('location: ..\login\login.php');
    }
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
        <button class="btn"> <a class = "rating" href="..\logout\logout.php">Log Out</a> </button>
        
        <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <p>isbn<font color =red>*</font></p>
                <input type = "text" name = "isbn" placeholder = "Enter isbn" required>
                                    
                <p>Name<font color =red>*</font></p>
                <input type = "name" name = "name"placeholder="Enter Name" required>
                                    
                <p>Author<font color =red>*</font></p>
                <input type = "text" name = "author"placeholder="Enter Author" required>
                                        
                                
                <p>Description<font color =red>*</font></p>
                <textarea name="description" rows="4" cols="50" required></textarea>
                                    

                <p>IsDonated<font color =red>*</font></p>
                <input type="radio" id="yes" name="IsDonated" value="Yes" required>
                <label for="yes">Yes</label><br>
                
                <input type="radio" id="no" name="IsDonated" value="No" required>
                <label for="no">No</label><br>

                <p>Image<font color =red>*</font></p>
                <input type="file" name="photo" placeholder="Enter Image" required>
            
                <input type="submit" value="Upload Image" name="submit">
        </form>

    </body>
</html>