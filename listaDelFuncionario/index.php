<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Exclusao de funcionários</title>
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
        <h1>FUNCIONÁRIOS</h1>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Cpf</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Salario</th>
            </tr>

            <?php
            include(__DIR__ . '/../config.php');

            $sql = "SELECT * FROM FUNCIONARIO";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            $employees = array();
            while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                array_push($employees, $row);
            }

            foreach ($employees as $employee => $emp) {
                echo "
                <tr>
                    <td>" . $emp['ID_FUNCIONARIO'] . "</td>
                    <td>" . $emp['CPF'] . "</td>
                    <td>" . $emp['NOME_FUNCIONARIO'] . "</td>
                    <td>" . $emp['TELEFONE_FUNCIONARIO'] . "</td>
                    <td>" . $emp['SALARIO'] . "</td>
                    <td><a class='btn btn-danger' href='delete.php?deleteid=" . $emp['ID_FUNCIONARIO'] . "'>Excluir</a></td>
                </tr>
                ";
            }

            ?>
        </table>
    </div>
</body>

</html>