<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edição de funcionários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
  <section class="container">
    <h1 class="text-center">Edição de Produtos</h1>
    <div class="row align-items-center justify-content-center mt-4">
      <div class="col d-none d-lg-block">
        <img class="img-fluid" src="../public/pizza.png" alt="Imagem de um hamburguer" />
      </div>
      <div class="col">
        <form action="update.php" method="POST">
          <?php
          include(__DIR__ . '/../config.php');

          $id = $_GET['idfuncionario'];
          $sql = "SELECT * FROM FUNCIONARIO WHERE id_funcionario=" . $id . "";

          $stid = oci_parse($conn, $sql);
          oci_execute($stid);

          $employee = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);

          $nome = $employee['NOME_FUNCIONARIO'];
          $cpf = $employee['CPF'];
          $telefone = $employee['TELEFONE_FUNCIONARIO'];
          $nascimento = $employee['DATA_NASCIMENTO'];
          $salario = $employee['SALARIO'];

          echo '
          <div class="row mb-3">
          </div>
          <input type="hidden" name="id" value="' . $id . '"/>
          
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" 
            class="form-control" 
            name="nome" 
            value="' . $nome . '" 
            required placeholder="Digite seu nome" />
          </div>
          <div class="form-group mt-2">
            <label for="cpf">CPF</label>
            <input type="text" 
            class="form-control" 
            name="cpf" 
            value="' . $cpf . '" 
            required placeholder="Digite seu CPF" />
          </div>
          <div class="form-group mt-2">
            <label for="tel">Telefone</label>
            <input type="tel" 
            class="form-control" 
            name="tel" 
            value="' . $telefone . '" 
            required placeholder="Digite seu telefone" />
          </div>
          <div class="form-group mt-2">
            <label for="salario">Salario</label>
            <input type="number" 
            class="form-control" 
            name="salario" 
            value="' . $salario . '" 
            required placeholder="Digite seu salario" />
          </div>
          <div class="form-group mt-2">
            <label for="data_nacimento">Data de Nascimento</label>
            <input type="date" 
            class="form-control" 
            name="data_nascimento" 
            value="' . $nascimento . '" 
            required placeholder="Digite seu telefone" />
          </div>
          <div class="d-grid gap-2 mt-4">
            <button class="btn btn-primary" type="submit">
              Editar funcionario
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