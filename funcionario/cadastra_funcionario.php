<?php

include(__DIR__ . '/../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $name = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $tel = $_POST['tel'];
  $data_nascimento = $_POST['data_nascimento'];
  $salario =$_POST['salario'];

  $sql = "INSERT INTO funcionario (id,cpf,nome_funcionario, telefone_funcionario,salario,data_nascimento) VALUES ('$id',$cpf','$name', '$tel','$salario','$data_nascimento')";
  $stid = oci_parse($conn, $sql);
  $status = oci_execute($stid);
  
  oci_free_statement($stid);
  oci_close($conn);

  header('Location: ../index.php');
}
