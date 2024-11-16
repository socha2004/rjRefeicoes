<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styles/estiloIndex/estilo.css" type="text/css">
    <title>Login - Admin</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: 'Arial', sans-serif;
        }

        .form-wraper {
            max-width: 400px;
            margin: 100px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .titulo-login {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        label {
            font-weight: bold;
            font-size: 1rem;
            margin-bottom: 10px;
            color: #555;
        }

        .input-group {
            margin-bottom: 15px;
            width: 100%;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-color: #ccc;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem; /* Tamanho dos ícones */
        }

        .input-group input {
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
        }

        .input-group input:focus {
            border-color: #e63946; /* Cor vermelha */
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #e63946; /* Cor vermelha */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #d32f2f; /* Cor vermelha mais escura */
        }

        .form-wraper a {
            text-decoration: none;
            color: #e63946;
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        .form-wraper a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .form-wraper {
                padding: 20px;
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
    <?php include_once("_navbar.php")?>

    <div class="form-wraper">
        <form method="post" class="login-form" action="src/php/login.php"> 
            <div class="header-form">
                <h2 class="titulo-login">Login no Sistema</h2>
            </div>

            <div class="input-group">
                <span class="input-group-text" id="usuario-icon"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite seu nome de usuário" required>
            </div>

            <div class="input-group">
                <span class="input-group-text" id="senha-icon"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
            </div>

            <input type="submit" value="Acessar">
            

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Link para os ícones do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
