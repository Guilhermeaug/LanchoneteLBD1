<?php
include(__DIR__ . '/config.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: index.php');
  exit();
}

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

$payloadContent = trim(file_get_contents("php://input"));
$payload = json_decode($payloadContent, true);


if (empty($payload)) {
  echo json_encode(['success' => false]);
  exit();
}

$cart = $payload['cart'];
$client = $payload['client'];
$seller = $payload['seller'];

$sql = "";
if ($seller === 'none') {
  $sql = "
  INSERT INTO NOTA_FISCAL(CLIENTE_CPF, DATA_EMISSAO)
  VALUES ('$client', SYSDATE)
  RETURNING ID_NOTA_FISCAL INTO :id_nota_fiscal
  ";
} else {
  $sql = "
  INSERT INTO NOTA_FISCAL(CLIENTE_CPF, DATA_EMISSAO, FUNCIONARIO_ID_FUNCIONARIO)
  VALUES ('$client', SYSDATE, '$seller')
  RETURNING ID_NOTA_FISCAL INTO :id_nota_fiscal
  ";
}

$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ':id_nota_fiscal', $id_nota_fiscal, 32);
oci_execute($stid);

foreach ($cart as $item) {
  $id_produto = $item['id'];
  $quantidade = $item['quantity'];
  $price = $item['price'];
  $sql = "
    INSERT INTO NOTA_FISCAL_PRODUTO(NOTA_FISCAL_ID_NOTA_FISCAL, PRODUTO_ID_PRODUTO, QUANTIDADE, PRECO_VENDIDO)
    VALUES ('$id_nota_fiscal', '$id_produto', '$quantidade', '$price')
  ";
  $stid = oci_parse($conn, $sql);
  oci_execute($stid);
}

echo json_encode(['success' => true]);
