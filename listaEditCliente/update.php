<?php
    //pdo mysql
    $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $telefone = $_POST['tel'];

        $sql = "UPDATE `cliente` SET
        nome_cliente='$nome',telefone_cliente='$telefone'
        WHERE cpf='$cpf'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        

         header('Location: ../index.php');
      }

?>