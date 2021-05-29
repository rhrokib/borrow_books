<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="./update_profile_process.php" method="post" enctype="multipart/form">
    <div>
      <div>
        <input type="text" name="fName">

      </div>

    </div>
    <input type="text" name="lName">
    <button type="submit">X</button>
  </form>
</body>

</html>

<?php
echo $_POST['fName'];
?>