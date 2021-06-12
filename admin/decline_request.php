<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['admin']) &&  empty($_SESSION['admin'])) {
?>
  <script>
    location.assign("./login.php");
  </script>
<?php
} else {
  try {
    $id = $_GET['id'];
    $username = $_SESSION['admin'];
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