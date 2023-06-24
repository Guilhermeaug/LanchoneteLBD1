<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <title>Cadastro de novos produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>


<body class="container">
  <h1 class="display-1">Lanchonete Gosto do Gordo</h1>
  <hr/>
  <img src="public/restaurante.jpg" class="w-100 h-50">
  <hr/>
  <h2 class="display-2 mb-2">Produtos</h2>
  <?php
  include(__DIR__ . '/config.php');

  $sql = "SELECT
  PRODUTO.*,
  FORNECEDOR.NOME_FORNECEDOR
FROM
  PRODUTO
  JOIN FORNECIMENTO
  ON PRODUTO.ID_PRODUTO = FORNECIMENTO.PRODUTO_ID_PRODUTO JOIN FORNECEDOR
  ON FORNECIMENTO.FORNECEDOR_CNPJ = FORNECEDOR.CNPJ
ORDER BY
  FORNECEDOR.NOME_FORNECEDOR";

  $stid = oci_parse($conn, $sql);
  oci_execute($stid);

  $suppliers = [];
  while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
    $suppliers[$row['NOME_FORNECEDOR']][] = $row;
  }

  foreach ($suppliers as $supplier => $products) {
    echo "<h2 class='display-3'>$supplier</h2>";
    echo "<div class='row row-cols-1 row-cols-md-2 g-4'>";
    foreach ($products as $product) {
      echo "<div class='col'>
        <div class='card mb-3' style='max-width: 540px;'>
        <div class='row g-0'>
          <div class='col-md-4'>
            <img src='" . $product['IMAGE'] . "' class='img-fluid rounded-start' alt='...'>
          </div>
          <div class='col-md-8'>
            <div class='card-body'>
              <h5 class='card-title'>" . $product['NOME_PRODUTO'] . "</h5>
              <p class='card-text'>" . $product['DESCRICAO'] . "</p>
              <p class='card-text'><small class='text-muted'>R$ " . $product['PRECO'] . "</small></p>
            </div>
          </div>
        </div>
      </div>
      </div>";
    }
    echo "</div>";
    echo "<hr/>";
  }

  ?>

</html>