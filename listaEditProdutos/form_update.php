<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body class="h-100 d-flex align-items-center justify-content-center">
  <section class="container">
    <h1 class="text-center">Edição de Produtos</h1>
    <div class="row align-items-center justify-content-center mt-4">
      <div class="col d-none d-lg-block">
        <img class="img-fluid" src="../public/pizza.png" alt="Imagem de um hamburguer" />
      </div>
      <div class="col">
        <form action="update.php" method="POST">
          <?php
          //pdo mysql
          $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');

          $id = $_GET['idproduto'];
          $sql = "SELECT * FROM PRODUTO WHERE id_produto=".$id."";
        
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $product = $stmt->fetch(PDO::FETCH_ASSOC);

          $nome = $product['nome_produto'];
          $preco = $product['preco'];
          $estoque = $product['quant_estoque'];
          $imagem = '';
          $descricao = '';
          /*
          $imagem = $product['imagem'];
          $descricao = $product['descricao'] ;
          */

          echo '
          <div class="row mb-3">
          </div>
          <input type="hidden" name="id" value="'.$id.'"/>
          <div class="row mb-3">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nome" value="'.$nome.'" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="preco" class="col-sm-2 col-form-label">Preço</label>
            <div class="col-sm-10">
              <input type="" class="form-control" name="preco" value="'.$preco.'" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="qtd" class="col-sm-2 col-form-label">Quantidade em Estoque</label>
            <div class="col-sm-10">
              <input type="number" min=0 step="0.01" class="form-control" name="estoque" value="'.$estoque.'" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="descricao" value="'.$descricao.'" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="imagem" class="col-sm-2 col-form-label">Imagem</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="imagem" value="'.$imagem.'" required>
            </div>
          </div>
          
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Editar produto</button>
          </div>
          ';
          ?>
        </form>
      </div>
    </div>
  </section>
</body>
</html>