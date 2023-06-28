<?php
    //pdo mysql
    $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $cnpj = $_POST['cnpj'];
        $nome = $_POST['name'];
        $contato = $_POST['contato'];

        $sql = "UPDATE `fornecedor` SET
        nome_fornecedor='$nome',contato='$contato'
        WHERE cnpj='$cnpj'";

        echo $sql;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        

         header('Location: ../index.php');
      }

?>