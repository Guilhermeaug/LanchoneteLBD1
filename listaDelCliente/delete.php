<?php
include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $cpf = $_GET['deletecpf'];

    $sql = "DELETE FROM cliente
        WHERE cpf='$cpf'";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    header('Location: ../index.php');
}
