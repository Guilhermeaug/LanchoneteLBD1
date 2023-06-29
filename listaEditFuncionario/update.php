<?php
    //pdo mysql
    $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['tel'];
        $salario = $_POST['salario'];
        $dataNascimento = $_POST['data_nascimento'];

        $sql = "UPDATE `funcionario` SET
        nome_funcionario='$nome',cpf='$cpf',telefone_funcionario='$telefone',
        salario='$salario',data_nascimento='$dataNascimento'
        WHERE id_funcionario='$id'";

        echo $sql;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        

         header('Location: ../index.php');
      }

?>