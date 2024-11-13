<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styles/estiloIndex/estilo.css" type="text/css">
    <title>Login - Admin</title>
</head>

<body>
   <?php include_once("_navbar.php")?>
    <div class="form-wraper">
        <form method="post" class="login-form" action="src/php/login.php"> 
            <div class="header-form">
                <h2 class="titulo-login">Login no Sistema</h2>
            </div>

            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario">

            <label for="senha">Senha:</label>
            <input type="password" name="senha">

            <input type="submit" value="Acessar">
        </form>
    </div>
</body>

</html>