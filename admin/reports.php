<?php
require_once('./../db_config.php');
session_start();


if (!isset($_SESSION['admin']) &&  empty($_SESSION['admin'])) {
?>
  <script>
    location.assign("./login.php");
  </script>
<?php
} else {

  $username = $_SESSION['admin'];
  $retObj = $pdo->query("SELECT * FROM report ORDER BY time DESC");
  $posts = $retObj->fetchAll();
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./../profile/profile.css">
    <link rel="shortcut icon" href="./../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./admin.css">

    <title>Admin Panel | Reports</title>
  </head>

  <body>
    <header class='main-header'>
      <div>
        <a class="main-header-logo" href="#">Borrow Books</a>
      </div>
      <nav class="main-nav ">
        <ul class="main-nav__items">
          <li class="main-nav__item text-black-50 ">Admin: <?php echo $username; ?></li>
          <li class="main-nav__item nav-logout"><a href="./logout.php">logout</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <div class="row">
        <div class="col-2 my-sidebar">
          <div class="container-fluid d-grid mt-3">
            <a href="./user.php" class="btn btn-light btn-block">Users</a>
            <a href="./books.php" class="btn btn-light btn-block mt-3">Books</a>
            <a href="./request.php" class="btn btn-light btn-block mt-3">Requests</a>
            <a href="./review.php" class="btn btn-light btn-block mt-3">Reviews</a>
            <a href="./reports.php" class="btn btn-primary btn-block mt-3">Reports</a>
            <a href="./payment.php" class="btn btn-light btn-block mt-3">Payments</a>
            <a href="./delivery.php" class="btn btn-light btn-block mt-3">Delivery</a>
          </div>
        </div>
        <div class="col-10">
          <?php
          if (isset($_GET['alert']) && !empty($_GET['alert'])) {
            if ($_GET['alert'] == 'danger') {
              $msg = 'Something went wrong! Please try again.';
            } else {
              $msg = 'Responded Succesfully';
            }
          ?>
            <div class="alert mt-2 text-center alert-<?php echo $_GET['alert'] ?>" role="alert">
              <?php echo $msg ?>
            </div>
          <?php
          }
          ?>
          <div class="container px-5 mt-3">
            <h1>Review Reports</h1>
            <table class="table  text-center">
              <thead class='table-dark'>
                <tr>
                  <th scope="col">Time</th>
                  <th scope="col">Review Title</th>
                  <th scope="col">Book</th>
                  <th scope="col">Report Text</th>
                  <th scope="col-2">Action</th>
                </tr>
              </thead>
              <?php foreach ($posts as $post) {
                try {
                  $report_id = $post['id'];
                  $post_id = $post['post_id'];
                  $retReports = $pdo->query("SELECT * FROM post where `id` = '$post_id';");
                  $report = $retReports->fetch(PDO::FETCH_ASSOC);
                  $name = $report['title'];
                  $book = $report['book_name'];
                  $text = $post['text'];
                  $time = $post['time'];
                } catch (PDOException $e) {
                  echo $e->getMessage();
                  // redirect("./request.php", "?alert=danger");
                } ?>

                <tbody class="align-middle">
                  <tr>
                    <th scope="row"><?php echo $time; ?></th>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $book; ?></td>
                    <td><?php echo $text; ?></td>
                    <td class="text-center">
                      <form action="./reports.php" method="post">
                        <input type="hidden" name="reviewId" value="<?php echo $post['post_id']; ?>">
                        <input type="hidden" name="reportId" value="<?php echo $post['id']; ?>">
                        <button type="submit" class="btn btn-danger">Ignore</button>
                      </form>
                    </td>
                  </tr>
                </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </main>
    <footer>
    </footer>
  </body>

  </html>

  <?php
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $reviewId = $_POST['reviewId'];
  $reportId = $_POST['reportId'];

  try {
    $query = "DELETE FROM report WHERE id = '$reportId';";
    $pdo->exec($query);
    redirect("./reports.php", "?alert=success");
  } catch (PDOException $e) {
  ?>
<?php
    redirect("./reports.php", "?alert=danger");
  }
}

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