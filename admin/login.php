<?php
require_once('./../db_config.php');
session_start();

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

  <title>Admin Panel | Payments</title>
</head>

<body>
  <header class='main-header'>
    <div>
      <a class="main-header-logo" href="./index.php">Borrow Books</a>
    </div>
    <nav class="main-nav ">
      <ul class="main-nav__items">
        <li class="main-nav__item text-black-50 ">Admin Panel</li>
        <li class="main-nav__item nav-logout"><a href="#">:-)</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="row mt-3 text-center">
      <div class="col-md-4 col-sm-6 offset-md-4 offset-sm-3">
        <form action="./login.php" method="post">
          <img class="" src="./../media/bb_logo.png" alt="" width="200" height="200">
          <h1 class="text-muted">Admin Login</h1>
          <div class="input-group flex-nowrap mt-3">
            <span class="input-group-text" id="addon-wrapping">Username</span>
            <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap mt-3">
            <span class="input-group-text" id="addon-wrapping">Password</span>
            <input type="password" class="form-control" placeholder="Password" name="password" aria-label="password" aria-describedby="addon-wrapping">
          </div>
          <button class="btn btn-primary px-5 py-2 my-3" type="submit">Sign In</button>

        </form>

        <?php
        if (isset($_GET['alert']) && !empty($_GET['alert'])) {
          if ($_GET['alert'] == 'danger') {
            $msg = 'Something went wrong! Please try again.';
          } else {
            $msg = 'SUCCESS';
          }
        ?>
          <div class="alert mt-2 text-center alert-<?php echo $_GET['alert'] ?>" role="alert">
            <?php echo $msg ?>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </main>
  <footer>
    <p class="mt-5 mb-3 text-muted text-center">&copy; Borrow Books</p>
  </footer>
</body>

</html>

<?php


if (
  isset($_POST['username']) && !empty($_POST['username']) &&
  isset($_POST['password']) && !empty($_POST['password'])
) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password';";
    $response = $pdo->query($query);
    $admin = $response->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
      $_SESSION['admin'] = $admin['username'];
      redirect("./user.php", NULL);
    } else {
      redirect("./login.php", "?alert=danger");
    }
  } catch (PDOException $e) {
?>
<?php
    redirect("./login.php", "?alert=danger");
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