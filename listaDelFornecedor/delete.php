<?php
include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cnpj = $_GET['deletecnpj'];

    $sql = "DELETE FROM fornecedor
        WHERE cnpj='$cnpj'";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

     header('Location: ../index.php');
}
