<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['username']) &&  empty($_SESSION['username'])) {
  redirect("./../index.php", "");
} else {
  $username = $_SESSION['username'];
  $alert = "?alert=danger";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST['review-isbn'];
    $title = $_POST['review-title'];
    $description = $_POST['review-text'];
    $rating = $_POST['review-rating'];

    try {
      $retObj = $pdo->query("SELECT name, author FROM book WHERE isbn = '$isbn'");

      if ($retObj->rowCount() == 0) {
      }

      $book = $retObj->fetch(PDO::FETCH_ASSOC);
      $book_name = $book['name'];
      $book_author = $book['author'];

      $sql_query = "INSERT INTO post VALUES (NULL,'$title', '$description', '$rating', '$isbn', '$username');";

      try {
        $pdo->exec($sql_query);
        $alert = "?alert=success";
        redirect("./index.php", $alert);
      } catch (PDOException $e) {
        $alert = '?alert=danger';
        redirect("./create.php", $alert);
      }
    } catch (PDOException $e) {
      redirect("./create.php", $alert);
    }
  } else {
    redirect("./create.php", $alert);
  }
}

?>

<?php
function redirect($to, $alert)
{
?>
  <script>
    location.assign("<?php $to . $alert ?>");
  </script>
<?php
}
?>