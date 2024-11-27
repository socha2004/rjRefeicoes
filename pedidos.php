<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/estiloPedidos/estilo.css">
    <title>Pedidos</title>
</head>

<body>
    <?php include_once("_navbar.php") ?>
    <header>
        <form class="subscribe" method="POST">
            <p>Informe e-mail ou CPF</p>
            <input placeholder="E-mail ou CPF" class="subscribe-input" name="email" type="email" required>
            <br>
            <input type="submit" class="submit-btn" value="Enviar" name="consulta_pedido">
        </form>
    </header>
    <main class="menu-area m-3 d-flex justify-content-center">
        <?php
            // echo "<h3>Insira seu e-mail ou CPF para acompanhar seus pedidos.</h3>";
            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['consulta_pedido'])){
                consultaPedidos();
            }
            function consultaPedidos() {
                include("src/db/conexao.php");
                $query = "SELECT * FROM pedidos WHERE email_cliente = '$_POST[email]'";
                $resultado = $conn->query($query);
                if ($resultado->num_rows > 0){
                    while($linha = $resultado->fetch_assoc()){
                        echo "
                            <div class='card' style='width: 18rem; background-color:beige;'>
                                <div class='card-body'>
                                    <h5 class='card-title'>Pedido #$linha[id_pedido]</h5>
                                    <h6 class='card-subtitle mb-2 text-muted'>Nome titular: $linha[nome_cliente]</h6>
                                    <h6 class='card-subtitle mb-2 text-muted'>Data pedido: $linha[data_pedido]</h6>
                                    <hr>
                                    <p class='card-text'>Status: <strong>$linha[status_pedido].</strong></p>
                                    <p class='card-text'>Forma de pagamento: <strong>$linha[forma_pagamento].</strong></p>
                                    <hr>
                                    <span class='card-text'>Preço total: $linha[valor_total]</span>                    
                                </div>
                            </div>
                        ";
                    }
                }
            }
        ?>
    </main>
</body>
</html>