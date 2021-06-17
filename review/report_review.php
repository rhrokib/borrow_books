<?php
require_once('./../db_config.php');
session_start();
if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
  redirect("./../login/login.php", NULL);
} else {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = htmlspecialchars($_POST['report-text'], ENT_QUOTES);
    $post_id = $_POST['reqId'];

    try {
      $pdo->exec("INSERT INTO report(post_id, time, text) VALUES('$post_id', NOW(), '$text');");
      redirect("./index.php", "?alert=success");
    } catch (PDOException $e) {
      redirect("./index.php", "?alert=danger");
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
          <li class="main-nav__item"><a href="./../book/book.php">Books</a></li>
          <li class="main-nav__item"><a href="./../review/">Review</a></li>
          <li class="main-nav__item"><a href="./../payment/">Credit</a></li>
          <li class="main-nav__item"><a href="./../profile/">Profile</a></li>
          <li class="main-nav__item nav-logout"><a href="./../logout/logout.php">logout</a></li>
        </ul>
      </nav>
    </header>

    <!-- Main -->
    <main>
      <div class="container">
        <h1 class="text-center title m-2">Report to admin</h1>
        <form action="./report_review.php" method="post">
          <div class="row d-flex justify-content-center">
            <input type="hidden" name="reqId" value="<?php echo $_GET['id']; ?>">
            <div class="col-md-6 mt-3">
              <label for="review-text">Say what's wrong (optional)</label>
              <textarea class="form-control mt-2" id="report-text" name="report-text" rows="8">  </textarea>
            </div>
          </div>

          <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary btn-block text-center">Report</button>
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

<?php



?>








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