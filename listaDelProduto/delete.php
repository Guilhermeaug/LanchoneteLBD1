<?php
include(__DIR__ . '/../config.php');


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET['deleteid'];

    $sql = "DELETE FROM produto
        WHERE id_produto='$id'";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    header('Location: ../index.php');
}
