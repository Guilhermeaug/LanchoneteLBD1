<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <title>Edição de Clientes</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
  <section class="container">
    <h1 class="text-center">Edição de Clientes</h1>
    <div class="row align-items-center justify-content-center mt-4">
      <div class="col">
        <img class="img-fluid" src="../public/hamburguer.png" alt="Imagem de um hamburguer" />
      </div>
      <div class="col">
        <form action="update.php" method="post">
          <?php
          include(__DIR__ . '/../config.php');

          $cpf = $_GET['cpf'];

          $sql = "SELECT * FROM CLIENTE WHERE cpf=" . $cpf . "";
          $stid = oci_parse($conn, $sql);
          oci_execute($stid);

          $costumer = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

          $nome = $costumer['NOME_CLIENTE'];
          $telefone = $costumer['TELEFONE_CLIENTE'];
          echo '
         <input type="hidden" name="cpf" value="' . $cpf . '"/>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" 
            class="form-control" 
            name="nome" value="' . $nome . '"
            required placeholder="Digite seu nome" />
          </div>
          <div class="form-group mt-2">
            <label for="tel">Telefone</label>
            <input type="tel" 
            class="form-control" 
            name="tel" value="' . $telefone . '" 
            required placeholder="Digite seu telefone" />
          </div>
          <div class="d-grid gap-2 mt-4">
            <button class="btn btn-primary" type="submit">
              Editar cliente
            </button>
          </div>
          ';
          ?>
        </form>
      </div>
    </div>
  </section>
</body>

</html>