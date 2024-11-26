<?php
// GET: http://localhost/rjrefeicoes/checkout.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_checkout'])) {
    registraPedido();
}

function registraPedido()
{
    include("src/db/conexao.php");
    $nome_cliente = $_POST["nome"];
    $bairro_cliente = $_POST["bairro"];
    $rua_cliente = $_POST["rua"];
    $numero_casa = $_POST["numero"];
    $numero_cliente = $_POST["telefone"];
    $email_cliente = $_POST["email"];
    $forma_pagamento = $_POST["pagamento"];

    $query = "INSERT INTO pedidos (nome_cliente, email_cliente, bairro_cliente, rua_cliente, numero_residencia, telefone_cliente, forma_pagamento) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssssss', $nome_cliente, $email_cliente, $bairro_cliente, $rua_cliente, $numero_casa, $numero_cliente, $forma_pagamento);
    mysqli_stmt_execute($stmt);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/estiloCheckout/estilo.css">
    <link rel="stylesheet" href="src/styles/estiloIndex/estilo.css" type="text/css">
    <link rel="stylesheet" href="src/styles/menuIndex/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .cabecalho {
            background-image: url('src/assets/imagens/FOGO.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
        }

        .faixabranca {
            background-color: #fff;
        }

        .titulo {
            text-align: center;
        }
    </style>
    <title>Checkout de Pedido</title>
</head>

<body>
    <?php include_once("_navbar.php") ?>
    <main>
        <div class="titulo">
            <h2>Finalize seu pedido!!!</h2>
        </div>
        <div class="box-resumo">
            <h3>Resumo do pedido</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Observação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carrinho'])) {
                        $carrinho = json_decode($_POST['carrinho'], true);
                        echo $carrinho;
                        foreach ($carrinho as $item) {
                            echo "
                                <tr>
           
                                    <td>$item[nome]</td>
                                    <td>$item[quantidade]</td>
                                    <td>$item[precoTotal] R$</td>
                                    <td>$item[observacao]</td>
                                <tr>
                            ";

                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="box">
            <br>
            <form action="" method="POST">
                <h3>Informe seus dados para contato e forma de pagamento.</h3>
                <div class="inputBox">
                    <label class="inputLabel" for="nome"><b>Insira seu nome</b></label>
                    <input type="text" class="inputNome" name="nome" required>
                </div>
                <br>
                <div class="inputBox">
                    <label class="inputLabel" for="nome"><b>Bairro da cidade</b></label>
                    <input type="text" class="inputBairro" name="bairro" required>
                </div>
                <br>
                <div class="inputBox">
                    <label class="inputLabel" for="nome"><b>Nome da rua</b></label>
                    <input type="text" class="inputRua" name="rua" required>
                </div>
                <br>
                <div class="inputBox">
                    <label class="inputLabel" for="nome"><b>N° da residência</b></label>
                    <input type="text" class="inputNumero" name="numero" required>
                </div>
                <br>
                <div class="inputBox">
                    <label class="inputLabel" for="nome"><b>Telefone para contato</b></label>
                    <input type="tel" class="inputTelefone" name="telefone" required>
                </div>
                <br>
                <div class="inputBox">
                    <label class="inputLabel" for="email"><b>Endereço de e-mail</b></label>
                    <input type="email" class="inputTelefone" name="email" name="email" required>
                </div>
                <br><br>
                <p>Forma de Pagamento:</p>
                <select class="form-control" name="pagamento">
                    <option value="dinheiro">Dinheiro</option>
                    <option value="PIX">PIX</option>
                    <option value="cartão de débito">Cartão de Débito</option>
                    <option value="cartão de crédito">Cartão de Crédito</option>
                </select>
                <br><br>
                <input type="hidden" name="precoTotal">
                <input type="submit" value="Confirmar" class="submit" name="confirmar_checkout">
            </form>
        </div>
    </main>
</body>

</html>