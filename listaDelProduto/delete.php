<?php
    //pdo mysql
    $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $id = $_GET['deleteid'];
        
        $sql = "DELETE FROM `produto`
        WHERE id_produto='$id'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        

         header('Location: ../index.php');
      }

?>