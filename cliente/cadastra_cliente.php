<?php

include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $tel = $_POST['tel'];

  $sql = "INSERT INTO cliente (cpf, nome_cliente, telefone_cliente) VALUES ('$cpf','$name', '$tel')";
  $stid = oci_parse($conn, $sql);
  $status = oci_execute($stid);
  
  oci_free_statement($stid);
  oci_close($conn);

  header('Location: ../index.php');
}
