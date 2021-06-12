<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
  redirect("./../login/login.php", NULL);
} else {
  $username = $_SESSION['user'];
  $alert = "?alert=danger";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['review-title'];
    $description = htmlspecialchars($_POST['review-text'], ENT_QUOTES);
    $rating = $_POST['review-rating'];
    $book_name = $_POST['review-book'];
    $book_author = $_POST['review-author'];

    $sql_query = "INSERT INTO post(username, title, description_text, loved, book_name, book_author, time) 
                  VALUES
                  ('$username', '$title', '$description', $rating, '$book_name', '$book_author', NOW());";
    try {
      $pdo->exec($sql_query);
      $alert = "?alert=success";
      redirect("./index.php", $alert);
    } catch (PDOException $e) {
      $alert = $e->getMessage();
      redirect("./create.php", $alert);
    }
  }
}
?>
//custom redirect function
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