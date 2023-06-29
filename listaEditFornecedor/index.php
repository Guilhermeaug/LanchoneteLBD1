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
    <div class="container">
        <?php
        include '../partials/Header.php';
        ?>
        <h1>FORNECEDORES</h1>
        <table class="table">
            <tr>
                <th>CNPJ</th>
                <th>Nome</th>
                <th>Contato</th>
                <th></th>
            </tr>

            <?php
            include(__DIR__ . '/../config.php');

            $sql = "SELECT * FROM FORNECEDOR";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            $suppliers = array();
            while ($supplier = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                array_push($suppliers, $supplier);
            }

            foreach ($suppliers as $supplier => $sup) {
                echo "
                <tr>
                    <td>" . $sup['CNPJ'] . "</td>
                    <td>" . $sup['NOME_FORNECEDOR'] . "</td>
                    <td>" . $sup['CONTATO'] . "</td>
                    <td><a class='btn btn-primary' href='form_update.php?cnpj=" . $sup['CNPJ'] . "'>Editar</a></td>
                </tr>
                ";
            }

            ?>
        </table>
    </div>
</body>

</html>