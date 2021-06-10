<?php
require_once('./../db_config.php');
session_start();
$_SESSION['user'] = "rhrokib";

if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
?>
  <script>
    location.assign("./login.php");
  </script>
<?php
} else {

  $username = $_SESSION['user'];
  $retObj = $pdo->query("SELECT * FROM request ORDER BY accepted DESC, time DESC");
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

    <title>Admin Panel | Requests</title>
  </head>

  <body>
    <header class='main-header'>
      <div>
        <a class="main-header-logo" href="./index.php">Borrow Books</a>
      </div>
      <nav class="main-nav ">
        <ul class="main-nav__items">
          <li class="main-nav__item text-black-50 ">Admin: <?php echo $username; ?></li>
          <li class="main-nav__item nav-logout"><a href="./demo_logout.php">logout</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <div class="row">
        <div class="col-2 my-sidebar">
          <div class="container-fluid d-grid mt-3">
            <a href="./user.php" class="btn btn-light btn-block">Users</a>
            <a href="./books.php" class="btn btn-light btn-block mt-3">Books</a>
            <a href="./request.php" class="btn btn-primary btn-block mt-3">Requests</a>
            <a href="./review.php" class="btn btn-light btn-block mt-3">Reviews</a>
            <a href="./reports.php" class="btn btn-light btn-block mt-3">Reports</a>
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
            <h1>Book Requests</h1>
            <table class="table  text-center">
              <thead class='table-dark'>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Book</th>
                  <th scope="col">Author</th>
                  <th scope="col">Book ID</th>
                  <th scope="col">Status</th>
                  <th scope="col-2">Action</th>
                </tr>
              </thead>
              <?php foreach ($posts as $post) {
                try {
                  $id = $post['book_id'];
                  $retBooks = $pdo->query("SELECT * FROM book where `id` = '$id';");
                  $book = $retBooks->fetch(PDO::FETCH_ASSOC);
                  $name = $book['name'];
                  $author = $book['author'];
                  $req_id = $post['reqId'];
                } catch (PDOException $e) {
                  redirect("./request.php", "?alert=danger");
                } ?>

                <tbody class="align-middle">
                  <tr>
                    <th scope="row"><?php echo $post['username']; ?></th>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $author; ?></td>
                    <td><?php echo $post['book_id']; ?></td>
                    <td><?php echo $post['accepted']; ?></td>
                    <td class="text-center">
                      <form action="./request.php" method="post">
                        <input type="hidden" name="book_id" value="<?php echo $post['book_id']; ?>">
                        <input type="hidden" name="$u_name" value="<?php echo $post['username']; ?>">
                        <input type="hidden" name="reqId" value="<?php echo $post['reqId']; ?>">
                        <?php
                        if ($post['accepted'] === 'Accepted (Processing Delivery)') {
                        ?>
                          <button type="submit" class="btn btn-outline-success" disabled>Accepted</button>
                          <button type="button" class="btn btn-danger" onclick="decline('<?php echo $req_id; ?>')">Decline</button>
                        <?php
                        } else if ($post['accepted'] === 'processing' || $post['accepted'] === 'Declined') {
                        ?>
                          <button type="submit" class="btn btn-success">Accept</button>
                          <button type="button" class="btn btn-danger" onclick="decline('<?php echo $req_id; ?>')" disabled>Decline</button>
                        <?php
                        } else {
                        ?>
                          <button type="submit" class="btn btn-outline-success" disabled>Delivered</button>
                        <?php
                        }
                        ?>
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

if (isset($_POST['book_id']) && !empty($_POST['book_id'])) {
  $req_id = $_POST['reqId'];
  $u_name = $_POST['u_name'];
  $isbn = $_POST['book_id'];

  try {
    $query = "UPDATE request SET accepted = 'Accepted (Processing Delivery)' WHERE reqId  = '$req_id';";
    $pdo->exec($query);
    redirect("./request.php", "?alert=success");
  } catch (PDOException $e) {
  ?>
<?php
    redirect("./request.php", "?alert=danger");
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

<script>
  function decline(id) {
    location.assign(`./decline_request.php?id=${id}`);
  }
</script>