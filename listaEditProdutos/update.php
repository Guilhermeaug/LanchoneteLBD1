<?php
include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $imagem = $_POST['imagem'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE produto SET
        nome_produto='$nome',preco='$preco',quant_estoque='$estoque'
        WHERE id_produto='$id'";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

     header('Location: ../index.php');
}
