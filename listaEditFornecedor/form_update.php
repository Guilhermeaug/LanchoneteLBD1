<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <title>Edição de Fornecedor</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
  <section class="container">
    <h1 class="text-center">Cadastro de Fornecedores</h1>
    <div class="row align-items-center justify-content-center mt-4">
      <div class="col">
        <img class="img-fluid" src="../public/cachorro_quente.png" alt="Imagem de um hamburguer" />
      </div>
      <div class="col">
        <form action="update.php" method="post">
          <?php
          include(__DIR__ . '/../config.php');

          $cnpj = $_GET['cnpj'];

          $sql = "SELECT * FROM FORNECEDOR WHERE cnpj=" . $cnpj . "";
          $stid = oci_parse($conn, $sql);
          oci_execute($stid);
          $supplier = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

          $nome = $supplier['NOME_FORNECEDOR'];
          $contato = $supplier['CONTATO'];

          echo '
            <input type="hidden" name="cnpj" value=' . $cnpj . '/>
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input
                type="text"
                class="form-control"
                name="nome"
                required
                placeholder="Digite seu nome"
                value=' . $nome . '
              />
            </div>
            <div class="form-group mt-2">
              <label for="contato">Contato:</label>
              <input
                type="tel"
                class="form-control"
                name="contato"
                required
                placeholder="Digite seu contato"
                value=' . $contato . '
                
              />
            </div>
            <div class="d-grid gap-2 mt-4">
              <button class="btn btn-primary" type="submit">
                Editar fornecedor
              </button>
            </div>
            '
          ?>
        </form>
      </div>
    </div>
  </section>
</body>

</html>