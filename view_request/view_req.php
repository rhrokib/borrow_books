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

        $requester_name = $_SESSION['user'];

    ?>
        <style>
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

            <h5>View Request Details</h5>
                    <table id="ptable">
                        <thead>
                            <tr>
                                <th>Request Id</th>
                                <th>Requester Name</th>
                                <th>Accepted</th>
                                <th>isbn</th>
                                <th>User Name</th>
                                <th>Delivery Man Id</th>
                                <th>Remove Request</th>
                            </tr>
                        </thead>
            
            <tbody>
                <?php
                    $sql = "SELECT reqId, requester_name, accepted, book_id, deliveryManid, username FROM request WHERE requester_name = '$requester_name'";
                    $res = mysqli_query($con, $sql);
                     if(mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_array($res)){
                        ?>
                            <tr>
                                <td><?php echo $row['reqId'] ?></td>
                                <td><?php echo $row['requester_name'] ?></td>
                                <td><?php echo $row['accepted'] ?></td>
                                <td><?php echo $row['book_id'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['deliveryManid'] ?></td>
                                <td><button class="btn"> <a class = "rating" href="remove_req.php?reqId=<?php echo $row['reqId']; ?>">Remove</a> </button></td>
                            </tr>

                        <?php
                        }
                    }
                    else{
                        echo "No Request has done yet!";
                    }
                ?>
            </tbody>
        
    <?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
        </style>
</body>
</html>