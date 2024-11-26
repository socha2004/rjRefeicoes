<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Login - Admin</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: linear-gradient(to bottom, #f1f1f1, #e63946);
        }

        .form-wrapper {
            max-width: 400px;
            width: 100%;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .form-wrapper:hover {
            transform: scale(1.05);
        }

        .header-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .titulo-login {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
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
            font-size: 1.5rem;
        }

        .input-group input {
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .input-group input:focus {
            border-color: #e63946;
            outline: none;
            box-shadow: 0 0 10px rgba(230, 57, 70, 0.5);
        }

        input[type="submit"], .back-btn input {
            width: 100%;
            padding: 12px;
            background-color: #e63946;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover, .back-btn input:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
        }

        .form-wrapper a {
            text-decoration: none;
            color: #e63946;
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .form-wrapper a:hover {
            text-decoration: underline;
        }

        .back-btn {
            margin-top: 15px;
        }

        /* Animação para o campo de senha */
        .shake {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            50% { transform: translateX(10px); }
            75% { transform: translateX(-10px); }
            100% { transform: translateX(0); }
        }

        @media (max-width: 600px) {
            .form-wrapper {
                padding: 20px;
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include_once('src/db/conexao.php');

    $shakeClass = ''; // Inicializando variável para a classe de animação

    // Verifica se o formulário de login foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Prepara a consulta SQL para verificar se o administrador existe no banco de dados
        $query = "SELECT * FROM administradores WHERE email_admin = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $usuario);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        // Se o administrador for encontrado
        if ($usuario_data = mysqli_fetch_assoc($resultado)) {
            // Verifica se a senha fornecida corresponde à senha no banco (utilizando password_verify)
            if (password_verify($senha, $usuario_data['senha_admin'])) {
                // Inicia a sessão do administrador
                $_SESSION['id_admin'] = $usuario_data['id_admin'];
                $_SESSION['nome_admin'] = $usuario_data['nome_admin'];
                $_SESSION['email_admin'] = $usuario_data['email_admin'];

                // Redireciona para a página de administração
                header('Location: http://localhost/rjRefeicoes-homolog/interface_administrador.php');
                exit; // Importante para garantir que o script pare após o redirecionamento
            } else {
                // Senha incorreta
                echo "<script>document.getElementById('senha').classList.add('shake');</script>";
                $shakeClass = 'shake'; // Adiciona a classe de animação ao campo de senha
            }
        } else {
            // Administrador não encontrado
            echo "<script>document.getElementById('senha').classList.add('shake');</script>";
            $shakeClass = 'shake'; // Adiciona a classe de animação ao campo de senha
        }
    }
    ?>

    <div class="form-wrapper">
        <form method="post" class="login-form" action="">
            <div class="header-form">
                <h2 class="titulo-login">Login no Sistema</h2>
            </div>

            <!-- Campo de Usuário -->
            <div class="input-group">
                <span class="input-group-text" id="usuario-icon"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite seu nome de usuário" required>
            </div>

            <!-- Campo de Senha -->
            <div class="input-group">
                <span class="input-group-text" id="senha-icon"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control <?php echo $shakeClass; ?>" name="senha" id="senha" placeholder="Digite sua senha" required>
            </div>

            <!-- Botão de Acesso -->
            <input type="submit" value="Acessar">
        </form>

        <!-- Botão Voltar -->
        <div class="back-btn">
            <form action="index.php">
                <input type="submit" value="Voltar para o Início">
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
