<?php
            session_start();
            $servername = "localhost";
            $username = "dbms";
            $password = "dbms";

            // Create connection
            $con = new mysqli($servername, $username, $password);

            mysqli_select_db($con, 'demo');
            $name = $_POST['book_name'];
	        $author = $_POST['book_author'];
            $post = $_POST['post'];
            
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            $sql = "INSERT INTO post (book_name, book_author, text)
            VALUES ('$name', '$author', '$post')";

            if ($con->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }

            $con->close();
?>