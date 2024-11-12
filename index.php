<?php
session_start();
$_SESSION['admin'] = "eugenio";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RJ Refeições</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styles/estiloIndex/estilo.css" type="text/css">
    <link rel="stylesheet" href="src/styles/menuIndex/estilo.css">
    <script src="https://kit.fontawesome.com/4a5dfc2a50.js" crossorigin="anonymous"></script>
    
    <style>
        .cabecalho {
            background-image: url('src/assets/imagens/FOGO.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
        }
    </style>
    <script src="src/js/abertoFechadoPedidos.js"></script>

</head>

<body>
    <header class="cabecalho">
        <?php include_once("_navbar.php")?>
        <div class="d-flex align-items-center p-2 cabecalho-container">
            <img src="src/assets/imagens/logo.png" alt="Logo" class="logo">
            <div class="d-flex flex-column">
                <h1>R&J Refeições</h1>
                <i class="fa-solid fa-location-dot"> Rua Túlio, 130</i>
                <span class="displayLoja">Aberto para pedidos!</span>
            </div>
        </div>
    </header>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-1">
            <a class="navbar-brand" href="#">Menu de Refeições</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#" data-category="lanche">Pratos do Dia</a>
                    <a class="nav-item nav-link" href="#" data-category="sobremesa">Sobremesa</a>
                    <a class="nav-item nav-link" href="#" data-category="refrigerante">Refrigerantes</a>
                    <a class="nav-item nav-link" href="#" data-category="suco">Sucos</a>
                </div>
            </div>
        </nav>
        <div class="container-md menu-area wrap d-flex justify-content-around">
            <!--ENVOLVER OS CARDS AQUI!!!-->
            <?php
            include("src/db/conexao.php");

            $sql = "SELECT * FROM produto";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    $modalId = "detalhesPratoModal" . $linha['id_produto'];
                    echo "<div class='card' style='width:18rem;' data-category='$linha[tipo_produto]'>
                            <img class='card-img-top' src='$linha[imagem_produto]' alt='Card image cap' style='max-height:190px;'>
                            <h5 class='card-title p-1'>$linha[nome_produto]</h5>
                            <div class='card-body'>
                                <p class='card-text'>Serve <b>$linha[qtd_pessoas] pessoas</b></p>
                                <p class='card-text'><b>Preço:</b> $linha[preco_produto]</p>
                                <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modalCarrinho'>Comprar</button>
                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#$modalId'>Detalhes</button>
                            </div>
                        </div>
                        
                        <div class='modal fade' id='$modalId' tabindex='-1' aria-labelledby=''{$modalId}Label' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='{$modalId}Label'>$linha[nome_produto]</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Fechar'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <!-- Conteúdo detalhado do prato -->
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
            } else {
                echo "<h2>Sem lanches no momento!</h2>";
            }

            mysqli_close($conn);
            ?>

        </div>
    </main>
    <script src="src/js/filtroProdutos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>