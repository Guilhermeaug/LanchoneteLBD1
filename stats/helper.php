<?php

include(__DIR__ . '/../config.php');

function employeesAndInvoices()
{
  global $conn;
  $sql = "
  SELECT
      F.ID_FUNCIONARIO,
      F.NOME_FUNCIONARIO,
      NF.ID_NOTA_FISCAL,
      NF.DATA_EMISSAO
  FROM
      FUNCIONARIO F
      LEFT JOIN NOTA_FISCAL NF
      ON F.ID_FUNCIONARIO = NF.FUNCIONARIO_ID_FUNCIONARIO
  ";

  $stid = oci_parse($conn, $sql);
  oci_execute($stid);

  $employees = [];
  while (($row = oci_fetch_assoc($stid)) != false) {
    $id = $row['ID_FUNCIONARIO'];
    $name = $row['NOME_FUNCIONARIO'];
    $invoiceId = $row['ID_NOTA_FISCAL'];
    $invoiceDate = $row['DATA_EMISSAO'];

    if (!isset($employees[$id])) {
      $employees[$id] = [
        'id' => $id,
        'name' => $name,
        'invoices' => []
      ];
    }

    if ($invoiceId) {
      $sql = "
      SELECT SUM(PRECO * QUANTIDADE) AS TOTAL
        FROM
          NOTA_FISCAL_PRODUTO NFP
          JOIN PRODUTO P
          ON NFP.PRODUTO_ID_PRODUTO = P.ID_PRODUTO
        WHERE
          NFP.NOTA_FISCAL_ID_NOTA_FISCAL = $invoiceId
      ";
      $stdid2 = oci_parse($conn, $sql);
      oci_execute($stdid2);

      $total = oci_fetch_assoc($stdid2)['TOTAL'];
      if (!$total) {
        $total = 0;
      }

      $employees[$id]['invoices'][] = [
        'id' => $invoiceId,
        'date' => $invoiceDate,
        'total' => $total
      ];
    }
  }

  return $employees;
}

function getEmployeeWithMostInvoices() {
  global $conn;

  $sql = "
  SELECT
    F.NOME_FUNCIONARIO,
    COUNT(NF.ID_NOTA_FISCAL) AS NOTAS_EMITIDAS
FROM
    FUNCIONARIO F
    LEFT JOIN NOTA_FISCAL NF
    ON F.ID_FUNCIONARIO = NF.FUNCIONARIO_ID_FUNCIONARIO
GROUP BY
    F.NOME_FUNCIONARIO
HAVING
    COUNT(NF.ID_NOTA_FISCAL) > 0
  ";

  $stid = oci_parse($conn, $sql);
  oci_execute($stid);

  $row = oci_fetch_assoc($stid);
  $employee = [
    'name' => $row['NOME_FUNCIONARIO'],
    'number_invoices' => $row['NOTAS_EMITIDAS']
  ];

  return $employee;
}


function getProductsAbovePriceAverage() {
  global $conn;

  $sql = "
  SELECT
    ID_PRODUTO, NOME_PRODUTO, PRECO
FROM
    PRODUTO
WHERE
    PRECO > (
        SELECT
            AVG(PRECO)
        FROM
            PRODUTO
    )
  ";

  $stid = oci_parse($conn, $sql);
  oci_execute($stid);

  $products = [];
  while (($row = oci_fetch_assoc($stid)) != false) {
    $products[] = [
      'id' => $row['ID_PRODUTO'],
      'name' => $row['NOME_PRODUTO'],
      'price' => $row['PRECO']
    ];
  }

  return $products;
}