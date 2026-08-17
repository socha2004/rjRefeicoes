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
    $itens_pedido = $_POST["carrinhoResumo"];
    $preco_total = $_POST["precoTotal"];

    $query = "INSERT INTO pedidos (nome_cliente, email_cliente, bairro_cliente, rua_cliente, numero_residencia, telefone_cliente, forma_pagamento, itens_pedido, valor_total) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssssssss', $nome_cliente, $email_cliente, $bairro_cliente, $rua_cliente, $numero_casa, $numero_cliente, $forma_pagamento, $itens_pedido, $preco_total);
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
                <tbody id="resumo-carrinho">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carrinho'])) {
                        $carrinho = json_decode($_POST['carrinho'], true);
                        foreach ($carrinho as $item) {
                            echo "
                                <tr>
           
                                    <td>$item[nome]</td>
                                    <td>$item[quantidade]</td>
                                    <td>$item[precoTotal]</td>
                                    <td>$item[observacao]</td>
                                <tr>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="box-total d-flex">
           
            <h4 class="titulo-preco-total m-2"><span class="preco-total-resumo"></span></h4>
           
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
    <script>
        // Função para somar os valores de uma coluna específica
        function somarColuna(tabelaId, colunaIndex) {
            const tabela = document.querySelector(".table");
            let soma = 0;

            // Iterar sobre as linhas do corpo da tabela (tbody)
            const linhas = tabela.querySelectorAll("tbody tr");
            linhas.forEach((linha) => {
                const celula = linha.cells[colunaIndex]; // Acessa a célula da coluna desejada
                if (celula) {
                    console.log("Entrou no if")
                    const valor = parseFloat(celula.textContent.trim()); // Converte para número
                    if (!isNaN(valor)) {
                        soma += valor; // Soma o valor se for um número válido
                        console.log("somou")
                    }
                }
            });

            return soma;
        }

        // Usar a função para somar a coluna de "Subtotal" (índice 3)
        const total = somarColuna("tabelaProdutos", 2);
  
        // Exibir o resultado
        document.querySelector(".preco-total-resumo").innerHTML = `Valor total do pedido: R$ <span class="valorTotal">${total.toFixed(2)}</span>`;
    </script>
    <script src="src/js/incluiProdutosCheckout.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Notify.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
</body>

</html>