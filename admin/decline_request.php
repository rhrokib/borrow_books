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
  try {
    $id = $_GET['id'];
    $username = $_SESSION['user'];
    $pdo->exec("UPDATE request SET accepted = 'Declined' WHERE reqId = '$id';");
    redirect("./request.php", "?alert=success");
  } catch (PDOException $e) {
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