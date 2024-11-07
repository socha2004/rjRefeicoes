<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>RJ Refeições</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styles/estiloIndex/estilo.css" type="text/css">
    <link rel="stylesheet" href="src/styles/menuIndex/estilo.css">
    <script src="https://kit.fontawesome.com/4a5dfc2a50.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="cabecalho">
        <div class="menu-topo d-flex justify-content-between p-2">
            <label class="popup">
                <input type="checkbox">
                <div class="burger" tabindex="0">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav class="popup-window">
                    <legend>Menu</legend>
                    <ul>
                        <li>
                            <button>
                                <a href="login.html" class="link">
                                    <svg width="30px" height="30px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z" fill="#000000"></path>
                                            <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z" fill="#000000"></path>
                                        </g>
                                    </svg>
                                    <span><b>Login</b></span>
                                </a>
                            </button>
                        </li>
                        <li>
                            <button>
                                <svg fill="#000000" width="30px" height="30px" viewBox="0 -3.84 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 115.21" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path d="M29.03,100.46l20.79-25.21l9.51,12.13L41,110.69C33.98,119.61,20.99,110.21,29.03,100.46L29.03,100.46z M53.31,43.05 c1.98-6.46,1.07-11.98-6.37-20.18L28.76,1c-2.58-3.03-8.66,1.42-6.12,5.09L37.18,24c2.75,3.34-2.36,7.76-5.2,4.32L16.94,9.8 c-2.8-3.21-8.59,1.03-5.66,4.7c4.24,5.1,10.8,13.43,15.04,18.53c2.94,2.99-1.53,7.42-4.43,3.69L6.96,18.32 c-2.19-2.38-5.77-0.9-6.72,1.88c-1.02,2.97,1.49,5.14,3.2,7.34L20.1,49.06c5.17,5.99,10.95,9.54,17.67,7.53 c1.03-0.31,2.29-0.94,3.64-1.77l44.76,57.78c2.41,3.11,7.06,3.44,10.08,0.93l0.69-0.57c3.4-2.83,3.95-8,1.04-11.34L50.58,47.16 C51.96,45.62,52.97,44.16,53.31,43.05L53.31,43.05z M65.98,55.65l7.37-8.94C63.87,23.21,99-8.11,116.03,6.29 C136.72,23.8,105.97,66,84.36,55.57l-8.73,11.09L65.98,55.65L65.98,55.65z"></path>
                                        </g>
                                    </g>
                                </svg>
                                <span><b>Cardapio</b></span>
                            </button>
                        </li>
                        <li>
                            <button>
                                <a href="login.php" class="link">
                                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M16 3.98999H8C6.93913 3.98999 5.92178 4.41135 5.17163 5.1615C4.42149 5.91164 4 6.92912 4 7.98999V17.99C4 19.0509 4.42149 20.0682 5.17163 20.8184C5.92178 21.5685 6.93913 21.99 8 21.99H16C17.0609 21.99 18.0783 21.5685 18.8284 20.8184C19.5786 20.0682 20 19.0509 20 17.99V7.98999C20 6.92912 19.5786 5.91164 18.8284 5.1615C18.0783 4.41135 17.0609 3.98999 16 3.98999Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9 2V7" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15 2V7" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8 16H14" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8 12H16" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                    <span><b>Pedidos</b></span>
                                </a>
                            </button>
                        </li>
                        <hr>
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                            <li>
                                <button>
                                    <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                                        <rect ry="2" rx="2" height="13" width="13" y="9" x="9"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                    <span><b>Cadastrar</b></span>
                                </button>
                            </li>
                            <li>
                                <button>
                                    <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                                        <polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon>
                                    </svg>
                                    <span>Editar</span>
                                </button>
                            </li>
                            <hr>
                            <li>
                                <button>
                                    <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
                                        <line y2="18" x2="6" y1="6" x1="18"></line>
                                        <line y2="18" x2="18" y1="6" x1="6"></line>
                                    </svg>
                                    <span>Logoff</span>
                                </button>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
            </label>
            <img src="src/assets/imagens/cart.svg" alt="notification-atalho" width="50px">
        </div>
        <div class="d-flex align-items-center p-2 cabecalho-container">
            <img src="src/assets/imagens/logo2.jpg" alt="Logo" class="logo">
            <div class="d-flex flex-column">
                <h1>R&J Refeições</h1>
                <i class="fa-solid fa-location-dot">aaa</i>
                <span>Aberto para pedidos!</span>
            </div>
        </div>
    </header>
    <main>
        <div class="cardapio-area">
            <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-area">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="#">Pratos do Dia</a>
                        <a class="nav-item nav-link" href="#">Sobremesa</a>
                        <a class="nav-item nav-link" href="#">Refrigerantes</a>
                        <a class="nav-item nav-link" href="#">Sucos</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-md menu-area wrap d-flex justify-content-around">
            <!--ENVOLVER OS CARDS AQUI!!!-->
            <?php
            include("src/db/conexao.php");

            $sql = "SELECT * FROM produto";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo "<div class='card' style='width: 18rem;'>
                            <img class='card-img-top' src='$linha[imagem_produto]' alt='Card image cap'>
                            <h5 class='card-title p-1'>$linha[nome_produto]</h5>
                            <div class='card-body'>
                                <p class='card-text'>$linha[descricao_produto]</p>
                                <p class='card-text'><b>Preço:</b> $linha[preco_produto]</p>
                                <button type='button' class='btn btn-primary'>Comprar</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>