<html>

<head>
  <meta charset="UTF-8" />
  <title>Cadastro de Funcionario</title>
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
    <?php
    include'../partials/Header.php';
    ?>
    <h1 class="text-center">Cadastro de Funcionario</h1>
    <div class="row align-items-center justify-content-center mt-4">
      <div class="col">
        <img class="img-fluid" src="../public/hamburguer.png" alt="Imagem de um hamburguer" />
      </div>
      <div class="col">
        <form action="cadastra_funcionario.php" method="post">
            <div class="form-group">
            <label for="id">Identificador</label>
            <input type="number" class="form-control" name="id" required placeholder="Digite seu id" />
          </div>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" required placeholder="Digite seu nome" />
          </div>
          <div class="form-group mt-2">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" required placeholder="Digite seu CPF" />
          </div>
          <div class="form-group mt-2">
            <label for="tel">Telefone</label>
            <input type="tel" class="form-control" name="tel" required placeholder="Digite seu telefone" />
          </div>
          <div class="form-group mt-2">
            <label for="salario">Salario</label>
            <input type="number" class="form-control" name="salario" required placeholder="Digite seu salario" />
          </div>
          <div class="form-group mt-2">
            <label for="data_nacimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" required placeholder="Digite seu telefone" />
          </div>
          <div class="d-grid gap-2 mt-4">
            <button class="btn btn-primary" type="submit">
              Cadastrar funcionario
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>