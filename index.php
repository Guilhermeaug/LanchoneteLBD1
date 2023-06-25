<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <title>Loja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body class="container">
  <h1 class="display-1">Lanchonete Gosto do Gordo</h1>
  <hr />
  <img src="public/restaurante.jpg" class="w-100 h-50">
  <hr />
  <h2 class="display-2 mb-2">Produtos</h2>
  <div id="cart-container" style="margin-bottom: 80px;"></div>
  <?php
  include(__DIR__ . '/config.php');

  $sql = "SELECT * FROM CLIENTE";
  $stid = oci_parse($conn, $sql);
  oci_execute($stid);
  $clients = [];
  while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
    $clients[] = $row;
  }
  echo "<div class='mb-3'>";
  echo "<select id='client' class='form-select' aria-label='Default select example'>";
  foreach ($clients as $client) {
    echo "<option value='" . $client['CPF'] . "'>" . $client['NOME_CLIENTE'] . "</option>";
  }
  echo "</select>";
  echo "</div>";

  $sql = "SELECT * FROM FUNCIONARIO";
  $sellers = [];
  $stid = oci_parse($conn, $sql);
  oci_execute($stid);
  while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
    $sellers[] = $row;
  }
  echo "<div class='mb-3'>";
  echo "<select id='seller' class='form-select' aria-label='Default select example'>";
  echo "<option value='none' selected>Nenhum</option>";
  foreach ($sellers as $seller) {
    echo "<option value='" . $seller['ID_FUNCIONARIO'] . "'>" . $seller['NOME_FUNCIONARIO'] . "</option>";
  }
  echo "</select>";
  echo "</div>";


  $sql = "
  SELECT
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
      echo "
      <div class='col'>
        <div class='card h-100'>
            <img src='" . $product['IMAGE'] . "' class='card-img-top rounded-start' alt='...'>
            <div class='card-body'>
              <h5 id='name" . $product['ID_PRODUTO'] . "' class='card-title'>" . $product['NOME_PRODUTO'] . "</h5>
              <p class='card-text'>" . $product['DESCRICAO'] . "</p>
              <p id='price" . $product['ID_PRODUTO'] . "' class='card-text'><small class='text-muted'>R$ " . $product['PRECO'] . "</small></p>
              <button type='button' class='btn btn-primary buy' onclick='openDialog(" . $product['ID_PRODUTO'] . ")'>Comprar</button>
            </div>
        </div>
      </div>";
    }
    echo "</div>";
    echo "<hr/>";
  }

  oci_free_statement($stid);
  oci_close($conn);
  ?>

  <dialog id="buyDialog">
    <form>
      <div class="mb-3">
        <label for="quantity" class="form-label">Quantidade</label>
        <input type="number" class="form-control" id="quantity" min="1" value="1">
      </div>
      <button id="submitDialog" type="button" class="btn btn-primary">Comprar</button>
      <button type="button" class="btn btn-secondary" onclick="document.getElementById('buyDialog').close()">Cancelar</button>
    </form>
  </dialog>

  <script>
    function openDialog(id) {
      document.getElementById('buyDialog').showModal();
      const quantityDialog = document.getElementById('quantity');
      const submitDialog = document.getElementById('submitDialog');
      quantityDialog.value = 1;
      submitDialog.onclick = () => {
        const quantity = quantityDialog.value;
        buy(id, quantity);
        document.getElementById('buyDialog').close();
      }
    }

    function buy(id, quantity) {
      const name = document.getElementById(`name${id}`).textContent;
      const price = document.getElementById(`price${id}`).textContent.replace('R$ ', '');
      const total = quantity * price;

      const data = {
        id,
        quantity,
        name,
        price,
        total
      };

      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      cart.push(data);
      localStorage.setItem('cart', JSON.stringify(cart));
      renderCart();
      alert('Produto adicionado ao carrinho!');
    }

    function clearCart() {
      localStorage.removeItem('cart');
      alert('Carrinho limpo!');
    }

    function checkout() {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      if (cart.length === 0) {
        alert('Carrinho vazio!');
        return;
      }

      const payload = {
        client: document.getElementById('client').value,
        seller: document.getElementById('seller').value,
        cart
      }

      console.log(JSON.stringify(payload))

      fetch('checkout.php', {
          method: 'POST',
          body: JSON.stringify(payload),
          mode: "same-origin",
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Compra realizada com sucesso!');
            console.log(data)
            localStorage.removeItem('cart');
          } else {
            alert('Erro ao realizar compra!');
          }
          renderCart();
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }

    function renderCart() {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      const cartContainer = document.getElementById('cart-container');
      cartContainer.innerHTML = '';

      if (cart.length === 0) {
        cartContainer.innerHTML = '<p class="lead">Carrinho vazio!</p>';
        return;
      }

      const total = cart.reduce((acc, item) => acc + item.total, 0);
      cartContainer.innerHTML = `
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Produto</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Preço</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            ${cart.map(item => `
              <tr>
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>R$ ${item.price}</td>
                <td>R$ ${item.total}</td>
              </tr>
            `).join('')}
            <tr>
              <td colspan="3" class="text-end">Total</td>
              <td>R$ ${total}</td>
            </tr>
          </tbody>
        </table>
        <button type="button" class="btn btn-primary float-end" onclick="checkout()">Finalizar compra</button>
        <button type="button" class="btn btn-danger float-end me-2" onclick="clearCart()">Limpar carrinho</button>
      `;
    }

    renderCart();
  </script>


</html>