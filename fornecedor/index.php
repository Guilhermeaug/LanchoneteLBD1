<DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <title>Cadastro de fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </head>

  <body>
    <section class='container p-8'>
      <div class="row">
        <img height=400 src='../public/cachorro_quente.jpg' alt='Imagem de um hamburguer'>
      </div>
      <div class='row'>
        <form action='cadastra_fornecedor.php' method="post">
          <div class="form-group">
            <label for='name'>Nome:</label>
            <input type='text' class="form-control" name='name' required placeholder='Digite seu nome'>
          </div>
          <div class="form-group mt-2">
            <label for='cnpj'>Cnpj:</label>
            <input type='text' class="form-control" name='cnpj' required placeholder='Digite seu Cnpj'>
          </div>
          <div class="form-group mt-2">
            <label for='contato'>Contato:</label>
            <input type='tel' class="form-control" name='contato' required placeholder='Digite seu contato'>
          </div>
          <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
      </div>
    </section>

  </body>

  </html>