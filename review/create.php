<?php
require_once('./../db_config.php');
session_start();
if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
?>
  <script>
    location.assign("./../index.php");
  </script> // currently redirecting to Home.
<?php
} else {
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

    <title>New Review</title>
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
          <li class="main-nav__item"><a href="./../profile/">Profile</a></li>
          <li class="main-nav__item nav-logout"><a href="./../demo_logout.php">logout</a></li>
        </ul>
      </nav>
    </header>

    <!-- Main -->
    <main>
      <div class="container">

        <?php
        if (isset($_GET['alert']) && !empty($_GET['alert'])) {
          if ($_GET['alert'] == 'danger') {
            $msg = 'Something went wrong! Please try again.';
          } else {
            $msg = 'Posted Succesfully';
          }
        ?>
          <div class="alert mt-2 text-center alert-<?php echo $_GET['alert'] ?>" role="alert">
            <?php echo $msg ?>
          </div>
        <?php
        }
        ?>

        <h1 class="text-center title m-2">Book Review</h1>
        <form action="./../review/review_process.php" method="post">
          <div class="row g-2 mt-3 ">
            <div class="col-md-4">
              <div class="card p-3 mt-3">
                <div class="form-group px-2">
                  <div class="form-group mb-3">
                    <label for="review-book mb-2">Book Name</label>
                    <input type="text" class="form-control mt-2" id="review-book" name="review-book" rows="1"></input>
                  </div>
                  <div class="form-group mb-3">
                    <label for="review-title mb-2">Author</label>
                    <input type="text" class="form-control mt-2" id="review-author" name="review-author" rows="1"></input>
                  </div>
                  <!-- Rating -->
                  <label for="book-rating mb-3">My Rating</label>
                  <!-- Rating -->
                  <div class="input-group mb-3">
                    <label class="input-group-text mt-2" for="review-rating">Options</label>
                    <select class="form-select mt-2" id="review-rating" name="review-rating">
                      <option value="1">😡 Hated it</option>
                      <option value="2">😠 Not Bad</option>
                      <option value="3">😕 Confused</option>
                      <option value="4">👍 Liked it</option>
                      <option value="5" selected>❤️ Loved it</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8 mb-5">
              <div class="card p-3 mt-3 ">
                <div class="form-group px-2">
                  <div class="form-group mb-3">
                    <label for="review-title mb-2">Review Title</label>
                    <input type="text" class="form-control mt-2" id="review-title" name="review-title" rows="1" required></input>
                  </div>
                  <label for="review-text">Review Description</label>
                  <textarea class="form-control mt-2" id="review-text" name="review-text" rows="10" required></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary text-center">Post Review</button>
          </div>
        </form>
      </div>

    </main>

    <!-- Footer -->
    <footer>
      <div class="container mt-5">
        <h5 class="text-center footer">© Borrow Books</h5>
      </div>
    </footer>

  </body>

  </html>
<?php
}
?>