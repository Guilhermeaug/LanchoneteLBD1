<?php

include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $cnpj = $_POST['cnpj'];
  $contact = $_POST['contato'];

  $sql = "INSERT INTO fornecedor (cnpj, nome_fornecedor, contato) VALUES ('$cnpj','$name', '$contact')";
  $stid = oci_parse($conn, $sql);
  $status = oci_execute($stid);

  if (!$status) {
    $e = oci_error($stid);
    echo 'Falhou!';
  } else {
    echo 'Usuário inserido com sucesso';
  }
}
