<?php
try{
$pdo = new PDO('mysql:host=localhost;port=3406;dbname=borrow_books','root', ''); //for my env as I've changed configs
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    try{
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=borrow_books','root', ''); // for others with default config
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $ex1){
        echo '<h1>DB Connection Error</h1></br><hr>';
    }
}
?>