<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['username']) &&  empty($_SESSION['userename'])) {
?>
  <script>
    location.assign("./../index.php");
  </script> // currently redirecting to Home.
<?php
} else {

  $username = $_SESSION['username'];
  $retObj = $pdo->query("SELECT * FROM post");
  $posts = $retObj->fetchAll();

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="review.css">
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
          <li class="main-nav__item"><a href="./../review/index.php">Review</a></li>
          <li class="main-nav__item"><a href="./../payment/">Credit</a></li>
          <li class="main-nav__item"><a href="./../profile/">Profile</a></li>
          <li class="main-nav__item nav-logout"><a href="./../demo_logout.php">logout</a></li>
        </ul>
      </nav>
    </header>

    <!-- Main -->
    <main>
      <div class="container">
        <h1 class="text-center title m-2">Book Review</h1>
        <div class="row g-3">
          <div class="col-md-2 p-2">
            <a href="./../review/create.php"><button class="btn btn-primary">Review a Book</button></a>
          </div>
          <div class="col-md-5"></div>
          <div class="col-md-5 p-2">
            <div class="input-group">
              <input type="search" class="form-control" placeholder="Seach Review" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">Seach</button>
              </div>
            </div>
          </div>

          <!-- Post view -->
          <?php
          if ($retObj->rowCount() == 0) {
          ?>
            <h4 class="text-center">Such a quiet Place!</h4>
            <?php
          } else {
            foreach ($posts as $post) {
            ?>
              <div class="col-md-12">
                <div class="card card-primary review-card my-3 p-3">
                  <div class="row g-2">
                    <div class="col-md-1 text-center">
                      <img class="img-responsive review-dp pl-4" src="./../profile/DP.jpg" alt="">
                      <p><small class="review-username">@<?php echo $post['username']; ?></small></p>
                    </div>
                    <div class="col-md-10">
                      <h1 class="review-title"><?php echo $post['title']; ?></h1>
                      <?php
                      $isbn = $post['isbn'];
                      $retObj = $pdo->query("SELECT name, author, time FROM book where isbn = $isbn");
                      $row = $retObj->fetch();
                      $name = $row['name'];
                      $author = $row['author'];
                      $time = $row['time'];
                      ?>
                      <small class="text-muted pr-3">Book: <?php echo $name; ?> | </small>
                      <small class="text-muted pr-3">Author: <?php echo $author; ?></small>
                      <br>
                      <small class="text-muted pr-3">Rating: <?php echo $post['loved']; ?></small>
                    </div>
                    <div class="col-md-1 review-date">
                      <small class="text-muted">Date: TBA</small>
                    </div>
                    <p class="review-article"><?php echo $post['description']; ?></p>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
        </div>
      </div>

    </main>

    <!-- Footer -->

  </body>

  </html>
<?php
          }
        }
?>