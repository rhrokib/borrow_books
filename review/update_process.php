<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['username']) &&  empty($_SESSION['username'])) {
  redirect("./../index.php",NULL);
} else {
  $username = $_SESSION['username'];
  $alert = "?alert=danger";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST['review-isbn'];
    $title = $_POST['review-title'];
    $description = $_POST['review-text'];
    $rating = $_POST['review-rating'];
    $id = $_POST['id'];

    try {
      $retObj = $pdo->query("SELECT name, author FROM book WHERE isbn = '$isbn'");

      if ($retObj->rowCount() == 0) {
        redirect("./index.php", $alert);
      }

      $book = $retObj->fetch(PDO::FETCH_ASSOC);
      $book_name = $book['name'];
      $book_author = $book['author'];

      $sql_query = "UPDATE post 
                    SET
                     title = '$title', 
                     description = '$description',
                     loved = $rating,
                     isbn = '$isbn'
                     WHERE id = $id;";

      try {
        $pdo->query($sql_query);
        $alert = "?alert=success";
        redirect("./index.php", $alert);
      } catch (PDOException $e) {
        $alert = '?alert=danger';
        redirect("./index1.php", $alert.$id);
      }
    } catch (PDOException $e) {
      redirect("./index2.php", $alert);
    }
  } else {
    redirect("./index3.php", $alert);
  }
}
?>

//custom redirect function
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