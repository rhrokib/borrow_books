<?php
require_once('./../db_config.php');
require_once('./review_data.php');


if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
?>
  <script>
    location.assign("./../login/login.php");
  </script>
<?php
} else {
  $username = $_SESSION['user'];

  $val = $_POST['val'];
  $reviews = new ReviewPost();
  $posts = $reviews->getSearchResults("$val");

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="review.css">
    <link rel="shortcut icon" href="./../favicon.ico" type="image/x-icon">

    <title>Book Review</title>
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
          <li class="main-nav__item"><a href="./../review/index.php">Review</a></li>
          <li class="main-nav__item"><a href="./../payment/">Credit</a></li>
          <li class="main-nav__item"><a href="./../profile/">Profile</a></li>
          <li class="main-nav__item nav-logout"><a href="./../logout/logout.php">logout</a></li>
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
          <div class="col-md-5 offset-5 p-2">
            <form action="./search.php" method="post">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Seach Review" aria-label="Recipient's username" aria-describedby="basic-addon2" id="review-search" name="val">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary" type="button">Seach</button>
                </div>
              </div>
            </form>
          </div>

          <!-- Post view -->
          <?php
          if (count($posts) == 0) {
          ?>
            <h4 class="text-center">Such a quiet Place!</h4>
            <?php
          } else {
            foreach ($posts as $post) {
              $p_uname = $post['username'];
              $retObj = $pdo->query("SELECT dp_path from user WHERE username = '$p_uname'");
              $profile = $retObj->fetch(PDO::FETCH_ASSOC);
            ?>
              <div class="col-md-12">
                <div class="card card-primary review-card my-3 p-3">
                  <div class="row g-2">
                    <div class="col-md-1 text-center">
                      <img class="img-responsive review-dp pl-4" src="<?php echo $profile['dp_path']; ?>" alt="user image">
                      <p><small class="review-username">@<?php echo $post['username']; ?></small></p>
                    </div>
                    <div class="col-md-10">
                      <h1 class="review-title"><?php echo $post['title']; ?></h1>
                      <?php
                      $book_name = $post['book_name'];
                      $book_author = $post['book_author'];
                      $time = strtotime($post['time']);

                      ?>
                      <small class="text-muted pr-3">Book: <?php echo $book_name; ?> | </small>
                      <small class="text-muted pr-3">Author: <?php echo $book_author; ?></small>
                      <br>
                      <small class="text-muted pr-3">Rating: <?php echo $post['loved']; ?></small>
                      <small class="text-muted mt-3"> | <?php echo date('jS F, Y', $time); ?></small>
                    </div>
                    <div class="col-md-1 review-date">
                      <?php
                      if ($username == $p_uname) {
                      ?>
                        <form action="./update.php" method="post">
                          <input type="hidden" name="id" , value="<?php echo $post['id']; ?>"></input>
                          <button type="submit" class="btn btn-primary px-3 py-2 mt-2">Update</button>
                        </form>
                      <?php
                      } else {
                      ?>
                        <a href="./report_review.php?id=<?php echo $post['id']; ?>" class="btn mx-5 mt-2"><i class="bi bi-exclamation-circle-fill" style="color:#FF5252"></i></a>
                      <?php
                      }
                      ?>
                    </div>
                    <p class="review-article px-3"><?php echo $post['description_text']; ?></p>
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
  <script src="./main.js"></script>

  </html>
<?php
          }
        }
?>