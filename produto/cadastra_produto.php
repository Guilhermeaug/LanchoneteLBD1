<?php

include(__DIR__ . '/../config.php');

function createProduto($conn)
{
  $name = $_POST['nome'];
  $price = $_POST['preco'];
  $stock = $_POST['estoque'];
  $description = $_POST['descricao'];
  $image = $_POST['imagem'];

  $sql = "INSERT INTO produto (nome_produto, preco, quant_estoque, descricao, image) VALUES ($name', '$price', '$stock', '$description', '$image')";
  $stid = oci_parse($conn, $sql);
  oci_execute($stid, OCI_NO_AUTO_COMMIT);
}

function getProdutoId($conn) {
  $name = $_POST['nome'];

  $sql = "SELECT id_produto FROM produto WHERE nome_produto = '$name'";
  $stid = oci_parse($conn, $sql);
  oci_execute($stid);
  $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
  $id = $row['ID_PRODUTO'];
  return $id;
}

function createFornecimento($conn)
{
  $date = $_POST['data'];
  $cnpj = $_POST['cnpj'];
  $id = getProdutoId($conn);
  
  $sql = "INSERT INTO fornecimento (data_fornecimento, fornecedor_cnpj, produto_id_produto) VALUES 
  (TO_DATE('$date', 'YYYY-MM-DD'), '$cnpj', '$id')";

  $stid = oci_parse($conn, $sql);
  oci_execute($stid, OCI_NO_AUTO_COMMIT);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  createProduto($conn);
  createFornecimento($conn);
  oci_commit($conn);
  oci_close($conn);
  // header('Location: index.php');
}
