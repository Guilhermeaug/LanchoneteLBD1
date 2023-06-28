<?php
    //pdo mysql
    $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $cnpj = $_GET['deletecnpj'];
        
        $sql = "DELETE FROM `fornecedor`
        WHERE cnpj='$cnpj'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        

         header('Location: ../index.php');
      }

?>