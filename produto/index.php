<html>

<head>
  <meta charset="UTF-8" />
  <title>Cadastro de novos produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <style>
    html,
    body {
      height: 100%;
    }
  </style>
</head>

<body class="h-100 d-flex align-items-center justify-content-center">
  <section class="container">
    <h1 class="text-center">Cadastro de Produtos</h1>
    <div class="row align-items-center justify-content-center mt-2">
      <div class="col">
        <img class="img-fluid" src="../public/pizza.png" alt="Imagem de um hamburguer" />
      </div>
      <div class="col">
        <form>
          <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label">Identificador</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nome">
            </div>
          </div>
          <div class="row mb-3">
            <label for="preco" class="col-sm-2 col-form-label">Preço</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="preco">
            </div>
          </div>
          <div class="row mb-3">
            <label for="qtd" class="col-sm-2 col-form-label">Quantidade em Estoque</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="estoque">
            </div>
          </div>
          <div class="row mb-3">
            <label for="data" class="col-sm-2 col-form-label">Data do cadastro</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="data">
            </div>
          </div>
          <select class="form-select mb-3">
            <?php
            include(__DIR__ . '/../config.php');
            $sql = "SELECT * FROM fornecedor";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
              echo "<option value=" . $row['cnpj'] . ">" . $row['NOME_FORNECEDOR'] . "</option>";
            }
            ?>
          </select>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Cadastrar produto</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>