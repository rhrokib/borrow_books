<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
?>
  <script>
    location.assign("./../login/login.php");
  </script>
<?php
}

?>


<?php
class ReviewPost
{
  private $pdo;
  public function __construct()
  {
    $this->pdo = new PDO('mysql:host=localhost;port=3406;dbname=demo', 'dbms', 'dbms');
  }
  public function getData()
  {
    try {
      $username = $_SESSION['user'];
      $retObj = $this->pdo->query("SELECT * FROM post ORDER BY time DESC");
      $posts = $retObj->fetchAll();
      return $posts;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function getSearchResults($key)
  {
    try {
      $search = "%" . $key . "%";
      $retObj = $this->pdo->query("SELECT * FROM post WHERE title LIKE '$search' OR
                                  description_text LIKE '$search' ORDER BY time DESC");
      $posts = $retObj->fetchAll();
      return $posts;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
