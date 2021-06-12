<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
  redirect("./../login/login.php",NULL);
} else {
  $username = $_SESSION['user'];
  $alert = "?alert=danger";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['review-title'];
    $description = htmlspecialchars($_POST['review-text'],ENT_QUOTES);
    $rating = $_POST['review-rating'];
    $id = $_POST['id'];
    $book_name = htmlspecialchars($_POST['review-book'],ENT_QUOTES);
    $book_author = htmlspecialchars($_POST['review-author'],ENT_QUOTES);

    try {
      $sql_query = "UPDATE post 
                    SET
                     title = '$title', 
                     description_text = '$description',
                     loved = $rating,
                     book_name = '$book_name',
                     book_author = '$book_author'
                     WHERE id = $id;";

      try {
        $pdo->query($sql_query);
        $alert = "?alert=success";
        redirect("./index.php", $alert);
      } catch (PDOException $e) {
        $alert = '?alert=danger';
        $alert = "?alert=".$e->getMessage();
        redirect("./../index.php", $alert);
      }
    } catch (PDOException $e) {
      redirect("./index.php", $alert);
    }
  } else {
    redirect("./index.php", $alert);
  }
  redirect("./index.php", $alert);
}
?>
<!-- custom redirect function -->
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