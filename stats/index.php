<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Estatísticas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body class='container'>
  <h2 class='display-4'>Relação de funcionários e suas notas fiscais</h2>
  <?php
  include(__DIR__ . '/helper.php');

  $employees = employeesAndInvoices();
  foreach ($employees as $employee) {
    echo "<h3 class='display-5'>{$employee['name']}</h3>";
    echo "<table class='table table-striped table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>Número da nota fiscal</th>";
    echo "<th scope='col'>Data da nota fiscal</th>";
    echo "<th scope='col'>Valor da nota fiscal</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($employee['invoices'] as $invoice) {
      echo "<tr>";
      echo "<td>{$invoice['id']}</td>";
      echo "<td>{$invoice['date']}</td>";
      echo "<td>R$ {$invoice['total']}</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }
  ?>
  <hr><br>
  <h2 class='display-4'>Funcionário com mais notas emitidas</h2>
  <?php
  $employee = getEmployeeWithMostInvoices();
  echo "<h3 class='display-5'>{$employee['name']}: {$employee['number_invoices']} notas emitidas</h3>";
  ?>
  <hr><br>
  <h2 class='display-4'>Produtos acima da média de preço</h2>
  <?php
  $products = getProductsAbovePriceAverage();
  echo "<table class='table table-striped table-hover'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th scope='col'>ID do produto</th>";
  echo "<th scope='col'>Nome do produto</th>";
  echo "<th scope='col'>Preço</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($products as $product) {
    echo "<tr>";
    echo "<td>{$product['id']}</td>";
    echo "<td>{$product['name']}</td>";
    echo "<td>{$product['price']}</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  ?>

</body>

</html>