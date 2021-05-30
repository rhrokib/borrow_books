<?php
require_once('./../db_config.php');
session_start();
if (!isset($_SESSION['username']) &&  empty($_SESSION['userename'])) {
  redirect("./../index.php", NULL);
} else {
  $username = $_SESSION['username'];
  $alert = "?alert=danger";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['id'];
    try {
      $retObj = $pdo->query("SELECT * FROM post WHERE id = '$post_id'");

      if ($retObj->rowCount() == 0) {
        redirect("./index.php", $alert);
      }

      $post = $retObj->fetch(PDO::FETCH_ASSOC);
      $post_title = $post['title'];
      $post_description = $post['description_text'];
      
      $post_loved = $post['loved'];
      $post_isbn = $post['isbn'];

      $username = $_SESSION['username'];
      try {
        $retObj = $pdo->query("SELECT name, author FROM book WHERE isbn = '$post_isbn'");

        if ($retObj->rowCount() == 0) {
          redirect("./index.php", $alert);
        }

        $book = $retObj->fetch(PDO::FETCH_ASSOC);
        $book_name = $book['name'];
        $book_author = $book['author'];
      } catch (PDOException $e) {
        redirect("./create.php", $alert);
      }
    } catch (PDOException $e) {
      redirect("./create.php", $alert);
    }
  }
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

      <title>Update Review</title>
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

          <h1 class="text-center title m-2">Update Review</h1>
          <form action="./../review/update_process.php" method="post">
            <div class="row g-2 mt-3 ">
              <div class="col-md-4">
                <div class="card p-3 mt-3">
                  <div class="form-group px-2">
                    <div class="form-group mb-3">
                      <label for="review-book mb-2">Book Name</label>
                      <input type="text" class="form-control mt-2" id="review-book" name="review-book" rows="1" value="<?php echo $book_name; ?>"></input>
                    </div>
                    <div class="form-group mb-3">
                      <label for="review-title mb-2">Author</label>
                      <input type="text" class="form-control mt-2" id="review-author" name="review-author" rows="1" value="<?php echo $book_author; ?>"></input>
                    </div>
                    <div class="form-group mb-3">
                      <label for="review-title mb-2">ISBN</label>
                      <input type="text" class="form-control mt-2" id="review-isbn" name="review-isbn" rows="1" value="<?php echo $post_isbn; ?>" required></input>
                    </div>
                    <!-- Rating -->
                    <label for="book-rating mb-3">My Rating</label>
                    <!-- Rating -->
                    <div class="input-group mb-3">
                      <label class="input-group-text mt-2" for="review-rating">Options</label>
                      <select class="form-select mt-2" id="review-rating" name="review-rating" value="<?php echo $post_loved; ?>" >
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
                      <input type="text" class="form-control mt-2" id="review-title" name="review-title" rows="1" value="<?php echo $post_title; ?>" required></input>
                    </div>
                    <label for="review-text">Review Description</label>
                    <textarea class="form-control mt-2" id="review-text" name="review-text" rows="10" required><?php echo $post_description; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 text-center">
              <input type="hidden" name="id" value="<?php echo $post_id; ?>"></input>
              <button type="submit" class="btn btn-primary text-center">Update Review</button>
              
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

//custom redirect function
<?php
function redirect($to, $alert)
{
?>
  <script>
    location.assign("<?php echo $to . $alert ?>");
  </script>
<?php
}
?>