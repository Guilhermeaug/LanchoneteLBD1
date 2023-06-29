<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link href="./style.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-uppercase font-weight-bold center">MENU DE OPERAÇÕES</h1>
        <div class="d-grid">
            <a class="btn btn-primary" href="/lanchonete/stats">Página de estatísticas</a>
        </div>
        <div>
            <table class="table">
                <tr>
                    <th class="center">
                        <h2>CADASTRAR</h2>
                    </th>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/produto">Produto</a></td>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/fornecedor">Fornecedor</a></td>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/funcionario">Funcionario</a></td>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/cliente">Cliente</a></td>
                </tr>
            </table>
        </div>
        <div>
            <table class="table ">
                <tr class="linha">
                    <th class="center">
                        <h2>EDITAR</h2>
                    </th>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/listaEditProdutos">Produto</a></td>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/listaEditFornecedor">Fornecedor</a></td>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/listaEditFuncionario">Funcionario</a></td>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/listaEditCliente">Cliente</a></td>
                </tr>
            </table>
        </div>
        <div>
            <table class="table ">
                <tr class="linha">
                    <th class="center">
                        <h2>EXCLUIR</h2>
                    </th>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/listaDelProduto">Produto</a></td>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/listaDelFornecedor">Fornecedor</a></td>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/listaDelFuncionario">Funcionario</a></td>
                </tr>
                <tr>
                    <td class="center"><a class="link" href="/lanchonete/listaDelCliente">Cliente</a></td>
                </tr>
            </table>
        </div>

</body>

</html>