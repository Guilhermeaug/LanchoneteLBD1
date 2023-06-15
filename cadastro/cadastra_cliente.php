<?php

include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $cpf = $_POST['cpf'];
  $tel = $_POST['tel'];

  $sql = "INSERT INTO cliente (cpf, nome_cliente, telefone_cliente) VALUES ('$cpf','$name', '$tel')";
  $stid = oci_parse($conn, $sql);
  $status = oci_execute($stid);

  if (!$status) {
    $e = oci_error($stid);
    echo 'Falhou!';
  } else {
    echo 'Usuário inserido com sucesso';
  }
}
