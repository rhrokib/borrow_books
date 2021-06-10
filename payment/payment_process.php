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
  $amount = 0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eco']) && !empty($_POST['eco'])) {
      $amount = $_POST['eco'];
    } else if (isset($_POST['power']) && !empty($_POST['power'])) {
      $amount = $_POST['power'];
    } else if (isset($_POST['regular']) && !empty($_POST['regular'])) {
      $amount = $_POST['regular'];
    } else {
  ?>
      <script>
        location.assign("./../payment");
      </script>
  <?php
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
    <link rel="stylesheet" href="./../profile/profile.css">
    <link rel="stylesheet" href="./payment.css">
    <link rel="shortcut icon" href="./../favicon.ico" type="image/x-icon">

    <title>Payment Service</title>
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
          <li class="main-nav__item"><a href="./">Credit</a></li>
          <li class="main-nav__item"><a href="./../profile/">Profile</a></li>
          <li class="main-nav__item nav-logout"><a href="./../demo_logout.php">logout</a></li>
        </ul>
      </nav>
    </header>

    <!-- Main -->
    <div class="container mt-3">
      <h1 class="title text-center mb-3">Complete Payment</h1>
      <form action="./payment_done.php" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <label class="input-group-text" for="payment-method">Select Method</label>
          <select class="form-select" id="payment-method" , name="payment-method">
            <option selected>bKash</option>
            <option value="1">Rockect</option>
            <option value="2">Nagod</option>
            <option value="3">UCash</option>
          </select>
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Account No.</span>
          <input type="text" aria-label="Acc No" class="form-control" autocomplete="off">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Amount</span>
          <input type="text" aria-label="Acc No" class="form-control" value="<?php echo $amount; ?>" name="amount">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Pin No</span>
          <input type="password" aria-label="Acc No" class="form-control">
        </div>
        <div class="col-12 text-center">
          <p class="btn btn-secondary px-5 py-2 mt-3"><a href="./../payment/">Cancel</a></p>
          <button type="submit" class="btn btn-primary px-5 py-2">Confirm</button>
        </div>

      </form>
    </div>

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