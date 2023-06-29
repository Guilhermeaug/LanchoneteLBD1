<?php
include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['tel'];
    $salario = $_POST['salario'];
    $dataNascimento = $_POST['data_nascimento'];

    $sql = "
    UPDATE funcionario SET 
        nome_funcionario='$nome', 
        cpf='$cpf',
        telefone_funcionario='$telefone',
        salario='$salario',
        data_nascimento=(TO_DATE('$dataNascimento', 'YYYY-MM-DD'))
    WHERE id_funcionario='$id'";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    header('Location: ../index.php');
}
