<?php

include(__DIR__ . '/../config.php');

function createProduto($conn)
{
  $id = $_POST['id'];
  $name = $_POST['nome'];
  $price = $_POST['preco'];
  $stock = $_POST['estoque'];
  $description = $_POST['descricao'];
  $image = $_POST['imagem'];

  $sql = "INSERT INTO produto (id_produto, nome_produto, preco, quant_estoque, descricao, image) VALUES ('$id', '$name', '$price', '$stock', '$description', '$image')";
  $stid = oci_parse($conn, $sql);
  oci_execute($stid, OCI_NO_AUTO_COMMIT);
}

function createFornecimento($conn)
{
  $date = $_POST['data'];
  $cnpj = $_POST['cnpj'];
  $id = $_POST['id'];
  
  $sql = "INSERT INTO fornecimento (data_fornecimento, fornecedor_cnpj, produto_id_produto) VALUES 
  (TO_DATE('$date', 'YYYY-MM-DD'), '$cnpj', '$id')";

  $stid = oci_parse($conn, $sql);
  oci_execute($stid, OCI_NO_AUTO_COMMIT);
}

function createHistoricoPreco($conn)
{
  $date = $_POST['data'];
  $price = $_POST['preco'];
  $id = $_POST['id'];

  $sql = "INSERT INTO historico_preco (data_modificacao, preco_antigo, produto_id_produto) VALUES (TO_DATE('$date', 'YYYY-MM-DD'), '$price', '$id')";
  $stid = oci_parse($conn, $sql);
  oci_execute($stid, OCI_NO_AUTO_COMMIT);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  createProduto($conn);
  createFornecimento($conn);
  createHistoricoPreco($conn);
  oci_commit($conn);
  oci_close($conn);
  // header('Location: index.php');
}
