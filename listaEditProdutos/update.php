<?php
    //pdo mysql
    $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $estoque = $_POST['estoque'];
        $imagem = $_POST['imagem'];
        $descricao = $_POST['descricao'];

        $sql = "UPDATE `produto` SET
        nome_produto='$nome',preco='$preco',quant_estoque='$estoque'
        WHERE id_produto='$id'";

        echo $sql;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        

         header('Location: ../index.php');
      }

?>