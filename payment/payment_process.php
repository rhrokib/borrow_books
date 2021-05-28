<?php
require_once('./../db_config.php');
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
        <li class="main-nav__item"><a href="./../review/">Review</a></li>
        <li class="main-nav__item"><a href="./">Credit</a></li>
        <li class="main-nav__item"><a href="./../profile/">Profile</a></li>
        <li class="main-nav__item nav-logout"><a href="#">logout</a></li>
      </ul>
    </nav>
  </header>

  <!-- Main -->
  <div class="container mt-3">
    <h1 class="title text-center mb-3">Complete Payment</h1>
    <form action="./payment_process.php" class="row gt-2">
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
        <input type="text" aria-label="Acc No" class="form-control">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text">Amount</span>
        <input type="text" aria-label="Acc No" class="form-control" disabled>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text">Pin No</span>
        <input type="password" aria-label="Acc No" class="form-control">
      </div>
      <div class="col-12 text-center">
        <button class="btn btn-secondary px-5 py-2"><a href="./../payment/">Cancel</a></button>
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