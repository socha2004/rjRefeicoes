<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdfdfd; /* Fundo claro */
            color: #212529;
        }

        header {
            background-color: #f8f9fa;
            color: #212529;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        header p {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .subscribe {
            max-width: 500px;
            margin: 0 auto;
        }

        .subscribe-input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            margin-bottom: 10px;
        }

        .submit-btn {
            width: 100%;
            background-color: #dc3545; /* Vermelho */
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #c82333; /* Vermelho mais escuro */
        }

        .menu-area {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 18rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #dc3545; /* Destaque vermelho */
        }

        .card-subtitle {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .card-text {
            font-size: 1rem;
        }

        hr {
            margin: 10px 0;
        }

        .alert {
            margin-top: 20px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .nota-fiscal {
            background-color: #fffbe6; /* Cor de nota fiscal */
            border: 1px solid #f5c518; /* Borda amarelada */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra leve */
            border-radius: 10px; /* Cantos arredondados */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .nota-fiscal:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

    </style>
</head>

<body>
    <?php include_once("_navbar.php"); ?>

    <header>
        <form class="subscribe" method="POST">
            <p>Informe seu E-mail ou CPF para acompanhar seus pedidos</p>
            <input placeholder="E-mail ou CPF" class="subscribe-input" name="email" type="email" required>
            <input type="submit" class="submit-btn" value="Acompanhar meu pedido" name="consulta_pedido">
        </form>
    </header>

    <main class="menu-area">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['consulta_pedido'])) {
            consultaPedidos();
        }

        function consultaPedidos()
        {
            include("src/db/conexao.php");
            $email = $_POST['email'];
            $query = "SELECT * FROM pedidos WHERE email_cliente = '$email'";
            $resultado = $conn->query($query);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo "
                    
                        <div class='card' style='width: 18rem; background-color:beige;'>
                            <div class='card-body'>
                                <h5 class='card-title'>Pedido #{$linha['id_pedido']}</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>Nome titular: {$linha['nome_cliente']}</h6>
                                <h6 class='card-subtitle mb-2 text-muted'>Data do pedido: {$linha['data_pedido']}</h6>
                                <hr>
                                <p class='card-text'>Status: <strong>{$linha['status_pedido']}</strong></p>
                                <p class='card-text'>Forma de pagamento: <strong>{$linha['forma_pagamento']}</strong></p>
                                <hr>
                                <p class='card-text'>Preço total: <strong>R$ {$linha['valor_total']}</strong></p>
                            </div>
                        </div>

                    ";
                }
            } else {
                echo "
                    <div class='alert alert-warning text-center' role='alert'>
                        Nenhum pedido encontrado para o e-mail informado.
                    </div>
                ";
            }
        }
        ?>
    </main>
</body>

</html>
