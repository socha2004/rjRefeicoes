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
        <form class="subscribe">
            <p>Informe e-mail ou CPF</p>
            <input placeholder="E-mail ou CPF" class="subscribe-input" name="email" type="email">
            <br>
            <input type="submit" class="submit-btn" value="Enviar">
        </form>
    </header>
    <main class="menu-area m-3">
        <h3>Sem pedidos atrelados ao e-mail/CPF</h3>
    </main>
</body>
</html>