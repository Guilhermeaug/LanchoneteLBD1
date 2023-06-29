<?php
    //pdo mysql
    $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $cpf = $_GET['deletecpf'];
        
        $sql = "DELETE FROM `cliente`
        WHERE cpf='$cpf'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        

         header('Location: ../index.php');
      }

?>