<?php
include(__DIR__ . '/../config.php');

function deleteNotaFiscal($id)
{
    global $conn;

    $sql = "DELETE FROM nota_fiscal
        WHERE funcionario_id_funcionario='$id'";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET['deleteid'];

    deleteNotaFiscal($id);

    $sql = "DELETE FROM funcionario
        WHERE id_funcionario='$id'";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    header('Location: ../index.php');
}
