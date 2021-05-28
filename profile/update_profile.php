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
  <link rel="stylesheet" href="profile.css">

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
        <li class="main-nav__item"><a href="./../payment/">Credit</a></li>
        <li class="main-nav__item"><a href="./">Profile</a></li>
        <li class="main-nav__item nav-logout"><a href="#">logout</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="container">
      <h1 class="text-center title mt-3">Update Profile</h1>
      <div class="container-sm">
        <!-- Input divs -->
        <form class="row g-3 mt-3" action="update_profile.php">

          <!-- username -->
          <div class="col-md-12">
            <label for="username" class="form-label">@Username</label>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="username" readonly>
          </div>
          <!-- First & Last name -->
          <div class="col-md-6">
            <label for="fName" class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="First name" aria-label="First name" id="fName" name="fName">
          </div>
          <div class="col-md-6">
            <label for="lName" class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="lName" name="lName">
          </div>

          <!-- Email -->
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <!-- phone -->
          <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="phone" class="form-control" id="phone" name="phone">
          </div>

          <!-- Adress and City -->
          <div class="col-6">
            <label for="addr" class="form-label">Address</label>
            <input type="text" class="form-control" id="addr" name="addr" placeholder="House, Road, Street, Area">
          </div>

          <div class="col-md-6">
            <label for="city" name="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Upozilla, District">
          </div>

          <!-- all 3 pass -->
          <div class="col-md-6">
            <label for="newPass" class="form-label">New Password</label>
            <input type="password" class="form-control" id="newPass" name="newPass">
          </div>
          <div class="col-md-6">
            <label for="newPass1" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="newPass1" name="newPass1">
          </div>
          <div class="col-md-12">
            <label for="curPass" class="form-label">Currnet Password*</label>
            <input type="password" class="form-control" id="curPass" name="curPass" required>
          </div>

          <!-- New DP -->
          <div class="col-md-12">
            <label class="form-label" for="pp">New Picture</label>
            <input type="file" class="form-control" id="pp" name="pp">
          </div>

          <div class="col-12 text-center mt-5">
            <button class="btn btn-secondary px-5 py-2"><a href="./../profile/">Cancel</a></button>
            <button type="submit" class="btn btn-primary px-5 py-2">Confirm</button>
          </div>
        </form>
      </div>
  </main>

  <footer>
    <div class="container mt-5">
      <h5 class="text-center footer">© Borrow Books</h5>
    </div>
  </footer>

</body>

</html>