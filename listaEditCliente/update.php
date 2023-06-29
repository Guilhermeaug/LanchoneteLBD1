<?php
include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $telefone = $_POST['tel'];

    $sql = "UPDATE cliente SET nome_cliente='$nome', telefone_cliente='$telefone' WHERE cpf='$cpf'";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    header('Location: ../index.php');
}
