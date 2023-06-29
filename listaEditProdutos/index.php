<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Lista de Produtos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php
        include '../partials/Header.php';
        ?>
        <h1>PRODUTOS</h1>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Quantidade em Estoque</th>
                <th>Preco</th>
                <th>Operacao</th>
                <th></th>
            </tr>

            <?php
            include(__DIR__ . '/../config.php');

            $sql = "SELECT * FROM PRODUTO";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);


            $products = array();
            while ($product = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                array_push($products, $product);
            }

            foreach ($products as $product => $prod) {
                echo "
                <tr>
                    <td>" . $prod['ID_PRODUTO'] . "</td>
                    <td>" . $prod['NOME_PRODUTO'] . "</td>
                    <td>" . $prod['QUANT_ESTOQUE'] . "</td>
                    <td>" . $prod['PRECO'] . "</td>
                    <td><a class='btn btn-primary' href='form_update.php?idproduto=" . $prod['ID_PRODUTO'] . "'>Editar</a></td>
                </tr>
                ";
            }

            ?>
        </table>
    </div>

</body>

</html>