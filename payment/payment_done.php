<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['username']) &&  empty($_SESSION['userename'])) {
?>
  <script>
    location.assign("./../index.php");
  </script> // currently redirecting to Home.
  <?php
} else {
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['amount']) && !empty($_GET['amount'])) {
      $amount_ = $_GET['amount'];
      $username = $_SESSION['username'];

      $retObj = $pdo->query("SELECT totalCredit FROM user where username = '$username'");
      $profile = $retObj->fetch(PDO::FETCH_ASSOC);
      $totalCredit = $profile['totalCredit'];
      $totalCredit += $amount_;
      echo $totalCredit;

      try {
        $pdo->exec("UPDATE user SET totalCredit = $totalCredit WHERE username = '$username'");
        $alert = "success";
        echo "omg";
  ?>
        <script>
          location.assign("./?alert=<?php echo $alert ?>");
        </script>
      <?php

      } catch (PDOException $e) {
        $alert = 'danger';
        echo "danger"
      ?>
        <script>
          location.assign("./?alert=<?php echo $alert ?>");
        </script>
<?php
      }
    }
  }
}
