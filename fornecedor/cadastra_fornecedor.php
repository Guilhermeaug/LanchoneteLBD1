<?php

include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $cnpj = $_POST['cnpj'];
  $contact = $_POST['contato'];

  $sql = "INSERT INTO fornecedor (cnpj, nome_fornecedor, contato) VALUES ('$cnpj','$name', '$contact')";
  $stid = oci_parse($conn, $sql);
  $status = oci_execute($stid);

  oci_free_statement($stid);
  oci_close($conn);

  header('Location: ../index.php');
}
