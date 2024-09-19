<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>RJ Refeições</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styles/estiloIndex/estilo.css">
</head>

<body>
    <head class="cabecalho">
        <div class="menu-topo d-flex justify-content-between">
            <img src="src/assets/imagens/menu.svg" alt="menu-atalho" width="50px">
            <img src="src/assets/imagens/notification.svg" alt="notification-atalho" width="50px">

        </div>
        <div class="d-flex align-items-center p-2 cabecalho-container">
            <img src="src/assets/imagens/logo2.jpg" alt="Logo" class="logo">
            <div>
                <h1>R&J Refeições</h1>
                <h3>Realize seu pedido!</h3>
            </div>
        </div>
    </head>
    <main>
        <div class="cardapio-area">
            <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-area">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav nav-tabs">
                            <li class="nav-item nav-link">Pratos do Dia</li>
                            <li class="nav-item nav-link">Carne</li>
                            <li class="nav-item nav-link">Frango</li>
                            <li class="nav-item nav-link">Sobremesa</li>
                            <li class="nav-item nav-link">Refrigerantes</li>
                            <li class="nav-item nav-link">Sucos</li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="card-area d-flex flex-column align-items-start">
                <!-- Modelo de Card -->
                <div class="p-2 card d-flex flex-row align-items-center justify-content-between flex-wrap">
                    <div class="text-area">
                        <h3>Refeição 1</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                    </div>
                    <img src="src/assets/imagens/burguer.jpeg" alt="refeicao foto" class="refeicao-foto rounded">
                </div>
                <!-- Fim Modelo de Card -->
                <div class="p-2 card d-flex flex-row align-items-center justify-content-between flex-wrap">
                    <div class="text-area">
                        <h3>Refeição 2</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                    </div>
                    <img src="src/assets/imagens/burguer.jpeg" alt="refeicao foto" class="refeicao-foto rounded">
                </div>
                <div class="p-2 card d-flex flex-row align-items-center justify-content-between flex-wrap">
                    <div class="text-area">
                        <h3>Refeição 3</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                    </div>
                    <img src="src/assets/imagens/burguer.jpeg" alt="refeicao foto" class="refeicao-foto rounded">
                </div>
            </div>
        </div>
    </main>
    <!-- <footer class="rodape-area">
        <h3>&copy;Seven Code</h3>
    </footer> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>