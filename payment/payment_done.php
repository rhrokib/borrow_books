<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['username']) &&  empty($_SESSION['userename'])) {
  redirect("./../index.php", NULL);
} else {
  $alert = "?alert=danger";
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['amount']) && !empty($_GET['amount'])) {
      $amount_ = $_GET['amount'];
      $username = $_SESSION['username'];

      $retObj = $pdo->query("SELECT totalCredit FROM user where username = '$username'");
      $profile = $retObj->fetch(PDO::FETCH_ASSOC);
      $totalCredit = $profile['totalCredit'];
      $totalCredit += $amount_;

      try {
        $pdo->exec("UPDATE user SET totalCredit = $totalCredit WHERE username = '$username'");
        $alert = "?alert=success";
        echo "omg";
        redirect("./", $alert);

      } catch (PDOException $e) {
        $alert = "?alert=danger";
        echo "danger";
        redirect("./", $alert);
      }
    }
  }
}
?>

<?php
function redirect($to, $alert)
{
?>
  <script>
    location.assign("<?php echo $to.$alert ?>");
  </script>
<?php
}
?>
