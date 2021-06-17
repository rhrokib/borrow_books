<?php
require_once('./../db_config.php');
session_start();
if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
?>
  <script>
    location.assign("./../login/login.php");
  </script>
<?php
} else {

  $username = $_SESSION['user'];
  $retObj = $pdo->query("SELECT * FROM user where username = '$username'");

  $profile = $retObj->fetch(PDO::FETCH_ASSOC);

  $email = $profile['email'];
  $firstname = $profile['firstname'];
  $lastname = $profile['lastname'];
  $phone = $profile['phone'];
  $location = $profile['location'];
  $city = $profile['city'];
  $dp = $profile['dp_path'];

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

    <title>Profile</title>
  </head>

  <body>
    <!-- Navigation -->
    <header class='main-header'>
      <div>
        <a class="main-header-logo" href="./../index.php">Borrow Books</a>
      </div>

      <nav class="main-nav">
        <ul class="main-nav__items">
          <li class="main-nav__item"><a href="./../book/book.php">Books</a></li>
          <li class="main-nav__item"><a href="./../review/">Review</a></li>
          <li class="main-nav__item"><a href="./../payment/">Credit</a></li>
          <li class="main-nav__item"><a href="./index.php">Profile</a></li>
          <li class="main-nav__item nav-logout"><a href="./../logout/logout.php">logout</a></li>
        </ul>
      </nav>
    </header>

    <!-- Main -->
    <main>
      <div class="container">
        <div class="row g-2 mt-3 ">
          <div class="col-md-4 text-center">
            <img src="<?php echo $dp ?>" alt="" class="img-fluid img-thumbnail rounded border border-3" width="250px">
            <div class="profile-name">
              <h1 class="name"><?php echo $firstname . " " . $lastname; ?></h1>
            </div>
            <p class="username">@<?php echo $username; ?> </p>
            <p>Total Credit: <?php echo $totalCredit; ?> BC</p>
            <a href="./update_profile.php"><button class="btn btn-primary">Update Profile</button></a>


          </div>
          <div class="col-md-6">
            <div class="card mb-3 rounded border">
              <h1 class="text-center title">My Information</h1>
            </div>
            <div class="card p-3">
              <div class="row g-2">
                <div class="col-md-3 info-card px-3">
                  <p class="info-name">Email :</p>
                  <p class="info-name">Phone :</p>
                  <p class="info-name">Address :</p>
                  <p class="info-name">City :</p>
                  <p class="info-name">Total Read :</p>
                  <p class="info-name">Total Given :</p>
                  <p class="info-name">Rating :</p>
                </div>
                <div class="col-md-9 info-detail px-5">
                  <p class="info-detail"><?php echo $email; ?></p>
                  <p class="info-detail"><?php echo $phone; ?></p>
                  <p class="info-detail"><?php echo $location; ?></p>
                  <p class="info-detail"><?php echo $city; ?></p>
                  <p class="info-detail"><?php echo $totalRead; ?></p>
                  <p class="info-detail"><?php echo $totalGiven; ?></p>
                  <p class="info-detail"><?php echo $rating; ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 text-center offset-4  mt-3">
            <a class="btn btn-outline-dark px-5" href="./../my_book/book_view.php">My Books</a>
            <a class="btn btn-outline-dark px-5" href="./../view_request/view_req.php">My Requests</a>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer>
    </footer>

  </body>

  </html>
<?php
}
?>