<?php
include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    

    $sql = "UPDATE fornecedor SET
        nome_fornecedor='$nome',contato='$contato'
        WHERE cnpj='$cnpj'";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    header('Location: ../index.php');
}
