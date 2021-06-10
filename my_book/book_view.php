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

        $username = $_SESSION['user'];
        #echo $username;

    ?>
    <body>
			<button class="btn"> <a class = "rating" href="..\view_request\view_req.php">My Request</a> </button>
			<button class="btn"> <a class = "rating" href="..\donate\donate.php">Donate</a> </button>
			<button class="btn"> <a class = "rating" href="..\my_book\book_view.php">My Book</a> </button>
			<button class="btn"> <a class = "rating" href="..\logout\logout.php">Log Out</a> </button>
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
            #ptable{
				width: 100%;
				border: 1px solid blue;
				border-collapse: collapse;
			}
			
			#ptable th, #ptable td{
				border: 1px solid blue;
				border-collapse: collapse;
				text-align: center;
			}
			
			#ptable tr:hover{
				background-color: bisque;
			}
        </style>

            <h5>My Book Details</h5>
                    <table id="ptable">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>isbn</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Likes</th>
                                <th>Dislikes</th>
                                <th>Edit or Delete</th>
                            </tr>
                        </thead>
            <tbody>

	<?php
	$query = "SELECT * FROM book WHERE username = '$username'";
	$res = mysqli_query($con, $query);
	#$row = mysqli_fetch_array($res);

	#echo $row['isbn'];
	
	if(mysqli_num_rows($res) > 0){
		while($row = mysqli_fetch_array($res)){
			?>

				<tr>
					<td> <img src="..\donate\uploads\<?php echo $row['image']; ?>" width="100" height="100"></td>
					<td><?php echo $row['isbn'] ?></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['author'] ?></td>
					<td><?php echo $row['Total_like'] ?></td>
					<td><?php echo $row['total_dislike'] ?></td>
                    <td>
                        <button class="btn"> <a class = "rating" href="..\donate\form.php?isbn=<?php echo $row['isbn']?>">Edit</a> </button>
                        <button class="btn"> <a class = "rating" href="..\delete\delete.php?isbn=<?php echo $row['isbn']; ?>">Delete</a> </button>
                    </td>
				</tr>

			<?php
		}
	}
    ?>
    </body>
</html>