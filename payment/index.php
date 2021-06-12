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
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./../profile/profile.css">
    <link rel="stylesheet" href="./payment.css">
    <link rel="shortcut icon" href="./../favicon.ico" type="image/x-icon">

    <title>Choose Plan</title>
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
          <li class="main-nav__item"><a href="./">Credit</a></li>
          <li class="main-nav__item"><a href="./../profile/">Profile</a></li>
          <li class="main-nav__item nav-logout"><a href="./../demo_logout.php">logout</a></li>
        </ul>
      </nav>
    </header>

    <!-- Main -->
    <main>
      <?php
      if (isset($_GET['alert']) && !empty($_GET['alert'])) {
        if ($_GET['alert'] == 'danger') {
          $msg = 'Something went wrong! Please try again. Make sure you enter valid inputs.';
        } else {
          $msg = 'Payment Successful';
        }
      ?>
        <div class="alert mt-2 text-center alert-<?php echo $_GET['alert'] ?>" role="alert">
          <?php echo $msg ?>
        </div>
      <?php
      }
      ?>
      <section>
        <form action="./payment_process.php" method="post">
          <div class="container pb-5">
            <div>
              <h1 class="title text-center m-3">Book Coin</h1>
            </div>

            <article class='plan justify-content-center'>
              <h1>Eco</h1>
              <h2>৳ 100</h2>
              <h3>For Students and Starter</h3>
              <ul class='plan__features'>
                <li>105 Book Coin</li>
                <li>5+ Books</li>
                <li>You save 5%</li>
              </ul>
              <div>
                <a href="./payment_process.php"><button type="submit" class='btn btn-success' name="eco" value="100">CHOOSE PLAN</button></a>
              </div>
            </article>

            <article class='plan plan__highlighted'>
              <h1 class='plan__annotation'>RECOMMENDED</h1>
              <h1>Power Plus</h1>
              <h2>৳ 1000</h2>
              <h3>For daily reader.</h3>
              <ul class='plan__features'>
                <li>1200 Book Coin</li>
                <li>60 Books</li>
                <li>You save 20%</li>
              </ul>
              <div>
                <a href="./payment_process.php"><button type="submit" class='btn btn-primary' name="power" value="1000">CHOOSE PLAN</button></a>
              </div>
            </article class='plan'>

            <article class='plan'>
              <h1>Regular</h1>
              <h2>৳ 500</h2>
              <h3>For regular reader</h3>
              <ul class='plan__features'>
                <li>650 Book Coin</li>
                <li>11 Books</li>
                <li>You save 10%</li>
              </ul>
              <div>
                <a href="./payment_process.php"><button type="submit" class='btn btn-success' name="regular" value="500">CHOOSE PLAN</button></a>
              </div>
            </article>
          </div>
        </form>
      </section>
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