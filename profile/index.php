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
        <li class="main-nav__item"><a href="./index.php">Profile</a></li>
        <li class="main-nav__item nav-logout"><a href="#">logout</a></li>
      </ul>
    </nav>
  </header>

  <!-- Main -->
  <main>
    <div class="container">
      <div class="row g-2 mt-3 ">
        <div class="col-md-4 text-center">
          <img src="./DP.jpg" alt="" class="img-fluid img-thumbnail rounded border border-3" width="250px">
          <div class="profile-name">
            <h1 class="name">Roqibul Islam</h1>
          </div>
          <p class="username">@AsteroidX</p>
          <p>Total Credit: 592 MC</p>
          <a href="./update_profile.php"><button class="btn btn-primary">Update Profile</button></a>


        </div>
        <div class="col-md-6 mb-5">
          <div class="card mb-3 rounded border">
            <h1 class="text-center title">My Information</h1>
          </div>
          <div class="card p-3">
            <div class="row g-2">
              <div class="col-md-3 info-card px-3">
                <p class="info-name">Email :</p>
                <p class="info-name">Phone :</p>
                <p class="info-name">Address :</p>
                <p class="info-name">City :</p>
                <p class="info-name">Total Read :</p>
                <p class="info-name">Total Given :</p>
                <p class="info-name">Rating :</p>
              </div>
              <div class="col-md-9 info-detail px-5">
                <p class="info-detail">rokib.hridoy@gmail.com</p>
                <p class="info-detail">01521433870</p>
                <p class="info-detail">H35, R02, Know-where</p>
                <p class="info-detail">Not Dhaka, Pluto</p>
                <p class="info-detail">21</p>
                <p class="info-detail">8</p>
                <p class="info-detail">4.67</p>
              </div>
            </div>
          </div>
        </div>
      </div>
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