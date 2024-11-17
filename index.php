<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Testando integração com GitHub pelo VS Code -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RJ Refeições</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styles/estiloIndex/estilo.css" type="text/css">
    <link rel="stylesheet" href="src/styles/menuIndex/estilo.css">
    <link rel="stylesheet" href="src/styles/estiloCarrinho/estilo.css">
    <link rel="stylesheet" href="src/styles/statusindex/statusdorestaurante.css">

    <script src="https://kit.fontawesome.com/4a5dfc2a50.js" crossorigin="anonymous"></script>
    <style>
        .cabecalho {
            background-image: url('src/assets/imagens/Wallpaper2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            padding: 0;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-nav .nav-link {
            color: white;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
            background-color: #495057;
            border-radius: 4px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            text-align: center;
        }

        .card .btn {
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .card .btn:hover {
            background-color: #28a745;
        }

        .modal-content {
            border-radius: 10px;
            padding: 20px;
        }

        .modal-header {
            border-bottom: 1px solid #dee2e6;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
        }

        .btn-close {
            font-size: 1.2rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        /* Responsividade */
        .menu-area {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .menu-area .col-md-4,
        .menu-area .col-sm-6 {
            margin-bottom: 20px;
        }
    </style>

    <script src="src/js/abertoFechadoPedidos.js"></script>
</head>

<body>
    <header class="cabecalho">
        <?php include_once("_navbar.php") ?>
        <div class="d-flex align-items-center cabecalho-container">
            <img src="src/assets/imagens/logo.png" alt="Logo" class="logo">
            <div class="d-flex flex-column">
                <h1 class="logomarca">R&J Refeições</h1>
                <div class="d-flex align-items-center">
                    <!-- Ícone de localização -->
                    <i class="fa-solid fa-location-dot"></i>
                    <!-- Endereço -->
                    <span class="endereco">R. Tulio, 130</span>
                </div>
                <span class="displayLoja">Aberto para pedidos!</span>
            </div>
        </div>
    </header>


    <main>
        <div class="modal" id="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-carrinho">
                        <h4 class="modal-title">Meu Carrinho</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card" style="width: 100%;">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto">
                            <div class="card-body">
                                <h5 class="card-title">Nome do Produto</h5>
                                <p class="card-text">Descrição breve do produto, destacando seus pontos principais.</p>
                                <a href="#" class="btn btn-danger" id="removeFromCart">Remover do Carrinho</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Comprar</button>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #B10005;">
            <a class="navbar-brand" href="#">Menu de Refeições</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link text-light" href="#" data-category="refeicao">Pratos do Dia</a>
                    <a class="nav-item nav-link text-light" href="#" data-category="sobremesa">Sobremesa</a>
                    <a class="nav-item nav-link text-light" href="#" data-category="refrigerante">Refrigerante</a>
                    <a class="nav-item nav-link text-light" href="#" data-category="suco">Sucos</a>
                </div>
            </div>
        </nav>




        <div class="menu-area d-flex justify-content-center">
            <?php
            include("src/db/conexao.php");

            $sql = "SELECT * FROM produto";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    $modalId = "detalhesPratoModal" . $linha['id_produto'];
                    $modalIdLabel = $modalId . "Label"; // Adicionando a definição da variável modalIdLabel

                    $modalId = "detalhesPratoModal" . $linha['id_produto'];
                    if ($linha["status_produto"] == "Disponível") {

                        echo "
                                <div class='card' style='width:18rem; min-width: 200px;' data-category='$linha[tipo_produto]'>
                                    <img class='card-img-top' src='$linha[imagem_produto]' alt='Card image cap' style='max-height:190px;'>
                                    <h5 class='card-title p-1'>$linha[nome_produto]</h5>
                                    <div class='card-body'>
                                        <p class='card-text'>Serve <b>$linha[qtd_pessoas] pessoas</b></p>
                                        <p class='card-text'><b>Preço:</b> $linha[preco_produto]</p>
                                        <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modalCarrinho'>Comprar</button>
                                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#$modalId'>Detalhes</button>
                                    </div>
                                </div>
                           
    
                            <div class='modal fade' id='$modalId' tabindex='-1' aria-labelledby='$modalIdLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='$modalIdLabel'>$linha[nome_produto]</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <p><b>Descrição:</b> $linha[descricao_produto]</p>
                                            <p><b>Tipo de refeição:</b> $linha[tipo_produto]</p>
                                            <p><b>Preço:</b> $linha[preco_produto]</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                }
            }
            ?>
            <div class='modal fade' id='modalCarrinho' tabindex='-1' aria-labelledby='' Label' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='Label'>Adicionar ao carrinho</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar'></button>
                        </div>
                        <div class='modal-body'>
                            <!-- Conteúdo detalhado do prato -->
                            <p><strong>Produto:</strong><span></span></p>
                            <p><strong>Preço:</strong><span></span></p>
                            <h6>Quantidade a ser comprada:</h6>
                            <input type='number' class='form-control'>
                            <h6>Observação no produto:</h6>
                            <input type='text' class='form-control'>
                            <br>
                            <h5>Preço total: <span></span></h5>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                            <button type='button' class='btn btn-success' data-bs-dismiss='modal'>Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>