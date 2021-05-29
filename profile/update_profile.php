<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['username']) &&  empty($_SESSION['username'])) {
?>
  <script>
    location.assign("./../index.php");
  </script> // currently redirecting to Home.
<?php
} else {

  $username = $_SESSION['username'];

  $retObj = $pdo->query("SELECT * FROM user where username = '$username'");
  $profile = $retObj->fetch(PDO::FETCH_ASSOC);

  $email = $profile['email'];
  $firstname = $profile['firstname'];
  $lastname = $profile['lastname'];
  $phone = $profile['phone'];
  $location = $profile['location'];
  $city = $profile['city'];

  $totalCredit = $profile['totalCredit'];
  $totalRead = $profile['totalRead'];
  $totalGiven = $profile['totalGiven'];
  $rating = $profile['rating'];


?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <link rel="shortcut icon" href="./../favicon.ico" type="image/x-icon">

    <title>Profile Update</title>
  </head>

  <body>
    <!-- Navigation -->
    <header class='main-header'>
      <div>
        <a class="main-header-logo" href="./../index.php">Borrow Books</a>
      </div>

      <nav class="main-nav">
        <ul class="main-nav__items">
          <li class="main-nav__item"><a href="./../review/">Review</a></li>
          <li class="main-nav__item"><a href="./../payment/">Credit</a></li>
          <li class="main-nav__item"><a href="./">Profile</a></li>
          <li class="main-nav__item nav-logout"><a href="./../demo_logout.php">logout</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="container">
      <?php
        if(isset($_GET['alert']) && !empty($_GET['alert'])){
          if($_GET['alert'] == 'danger'){
            $msg = 'Something went wrong! Please try again. Make sure you enter valid inputs.';
          } else{
            $msg = 'Your profile has been updated';
          }
          ?>
          <div class="alert mt-2 text-center alert-<?php echo $_GET['alert']?>" role="alert">
            <?php echo $msg ?>
          </div>
          <?php
        }
      ?>
        <h1 class="text-center title mt-3">Update Profile</h1>
        <div class="container-sm">
          <!-- Input divs -->
          <form action="./update_profile.php" method="post" enctype="multipart/form-data">
            <div class="row g-3 mt-3">
              <!-- username -->
              <div class="col-md-12">
                <label for="username" class="form-label">@Username</label>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="username" value="<?php echo $username ?>" readonly>
              </div>
              <!-- First & Last name -->
              <div class="col-md-6">
                <label for="fName" class="form-label">First Name</label>
                <input type="text" class="form-control" placeholder="First name" aria-label="First name" id="fName" name="fName" value="<?php echo $firstname ?>">
              </div>
              <div class="col-md-6">
                <label for="lName" class="form-label">Last Name</label>
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="lName" name="lName" value="<?php echo $lastname ?>">
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
              </div>
              <!-- phone -->
              <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>">
              </div>

              <!-- Adress and City -->
              <div class="col-6">
                <label for="addr" class="form-label">Address</label>
                <input type="text" class="form-control" id="addr" name="addr" placeholder="House, Road, Street, Area" value="<?php echo $location ?>">
              </div>

              <div class="col-md-6">
                <label for="city" name="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Upozilla, District" value="<?php echo $city ?>">
              </div>

              <!-- all 3 pass -->
              <div class="col-md-6">
                <label for="newPass" class="form-label">New Password</label>
                <input type="password" class="form-control" autocomplete="off" id="newPass" name="newPass">
              </div>
              <div class="col-md-6">
                <label for="newPass1" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" autocomplete="off" id="newPass1" name="newPass1">
              </div>
              <div class="col-md-12">
                <label for="curPass" class="form-label">Currnet Password*</label>
                <input type="password" class="form-control" autocomplete="off" id="curPass" name="curPass" required>
              </div>

              <!-- New DP -->
              <div class="col-md-12">
                <label class="form-label" for="pp">New Picture</label>
                <input type="file" class="form-control" id="pp" name="pp">
              </div>

              <div class="col-12 text-center mt-5">
                <p class="btn btn-secondary px-5 py-2 mt-3"><a href="./../profile/">Cancel</a></p>
                <button type="submit" class="btn btn-primary px-5 py-2">Confirm</button>
              </div>
            </div>
          </form>
        </div>
    </main>

    <footer>
      <div class="container mt-5">
        <h5 class="text-center footer">© Borrow Books</h5>
      </div>
    </footer>

  </body>

  </html>
  <!-- All the validation and processing -->


  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_fName = $_POST['fName'];
    $u_lName = $_POST['lName'];
    $u_email = $_POST['email'];
    $u_phone = $_POST['phone'];
    $u_addr = $_POST['addr'];
    $u_city = $_POST['city'];
    $curPass = $_POST['curPass'];

    $alert = "danger";

    if (isset($_FILES['pp']) && !empty($_FILES['pp'])) { //if new file id uploaded
      $image = $_FILES['pp'];
      $image_name = $image['name'];
      $tmp_path = $image['tmp_name'];
      $to_upload = "./../media/profile_picture/$image_name";
      move_uploaded_file($tmp_path,$to_upload);

    } else {
      $to_upload = $profile['pp']; // otherwise same as before
    }

    if (
      isset($_POST['newPass']) && isset($_POST['newPass']) &&
      !empty($_POST['newPass1']) && !empty($_POST['newPass1'])
    ) {
      $newPass = $_POST['newPass'];
      $newPass1 = $_POST['newPass1'];
      if ($newPass == $newPass1) {
        $flag = true;
      }
    }

    if (
      isset($u_email) && isset($curPass) &&
      !empty($u_email) && !empty($curPass) // other fields can be NULL
    ) {
      if ($profile['password'] == $curPass) {
        // all operations here
        $sql_query =
          "UPDATE user
          SET
            firstname = '$u_fName',
            lastname = '$u_lName',
            email = '$u_email',
            phone = '$u_phone',
            `location` = '$u_addr',
            city = '$u_city',
            dp_path = '$to_upload'
          WHERE username = '$username';";

        if ($flag) {
          try {
            $pdo->exec("UPDATE user SET password = '$newPass' WHERE username = '$username'");
          } catch (PDOException $e) {
  ?>
            <script>
              location.assign("./update_profile.php?alert=<?php echo $alert ?>");
            </script>
          <?php
          }
        }

        try {
          $pdo->exec($sql_query);
          $alert = "success";

          ?>
          <script>
            location.assign("./update_profile.php?alert=<?php echo $alert ?>");
          </script>
          <?php

        } catch (PDOException $e) {
          ?>
          <script>
            location.assign("./update_profile.php?alert=<?php echo $alert ?>");
          </script>
        <?php
        }
      } else {
        ?>
        <script>
          location.assign("./update_profile.php?alert=<?php echo $alert ?>");
        </script>
        <?php
      }
    } else {
      ?>
      <script>
        location.assign("./update_profile.php?alert=<?php echo $alert ?>");
      </script>
      <?php
    }
  }
}
?>