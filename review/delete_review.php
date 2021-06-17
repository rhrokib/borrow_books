<?php
require_once('./../db_config.php');
session_start();
if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
  redirect("./../login/login.php", NULL);
} else {
  $username = $_SESSION['user'];
  $alert = "?alert=danger";
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $post_id = $_GET['id'];
    try {
      $pdo->exec("DELETE FROM post WHERE id=$post_id;");
      $alert = "?alert=success";
      redirect("./", $alert);
    } catch (PDOException $e) {
      redirect("./create.php", $alert);
    }
  }
}


function redirect($to, $alert)
{
?>
  <script>
    location.assign("<?php echo $to . $alert ?>");
  </script>
<?php
}
?>