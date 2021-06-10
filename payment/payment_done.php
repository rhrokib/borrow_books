<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
  redirect("./../index.php", NULL);
} else {
  $alert = "?alert=danger";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['amount']) && !empty($_POST['amount'])) {
      $amount_ = $_POST['amount'];
      $username = $_SESSION['user'];
      $method = $_POST['payment-method'];
    

      $retObj = $pdo->query("SELECT totalCredit FROM user where username = '$username'");
      $profile = $retObj->fetch(PDO::FETCH_ASSOC);
      $totalCredit = $profile['totalCredit'];
      $totalCredit += $amount_;

      try {
        $pdo->exec("INSERT INTO payment VALUES(NULL, $amount_, '$method', now(), 'Not Accepted','$username');");
        $pdo->exec("UPDATE user SET totalCredit = $totalCredit WHERE username = '$username'");
        $alert = "?alert=success";
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
