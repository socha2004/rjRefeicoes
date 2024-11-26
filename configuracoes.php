<?php
session_start();
include_once('src/db/conexao.php');

// Verifica se o formulário foi enviado para cadastrar um novo administrador
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar_admin'])) {
    $nome_admin = $_POST['nome_admin'];
    $email_admin = $_POST['email_admin'];
    $senha_admin = $_POST['senha_admin'];

    // Criptografa a senha
    $senha_hash = password_hash($senha_admin, PASSWORD_DEFAULT);

    // Insere o novo administrador no banco de dados
    $query = "INSERT INTO administradores (nome_admin, email_admin, senha_admin) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $nome_admin, $email_admin, $senha_hash);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Administrador cadastrado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar administrador. Tente novamente.');</script>";
    }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Configurações - Administração</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="icon" href="img/fivecon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #34495e;
            padding-top: 30px;
            padding-right: 20px;
        }

        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            font-size: 16px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #2c3e50;
        }

        .content {
            margin-left: 260px;
            padding: 30px;
        }

        .card-dashboard {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .card-header {
            background-color: #d9534f;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-cadastrar-admin {
            background-color: #0275d8;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <?php
  

 

    // Obtém o nome do administrador logado
    $nomeAdmin = $_SESSION['nome_admin'];
    ?>
</body>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center text-white">Administrador</h3>
        <div class="admin-info">
        <p><strong style="color: white; text-align: center; display: block;"><?php echo htmlspecialchars($nomeAdmin); ?></strong></p>
        </div>
        <a href="interface_administrador.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="produtos.php"><i class="fas fa-box"></i> Produtos</a>
        <a href="visualizar_pedidos.php"><i class="fas fa-list"></i> Visualizar Pedidos</a>
        <a href="relatorios.php"><i class="fas fa-chart-line"></i> Relatórios</a>
        <a href="configuracoes.php"><i class="fas fa-cogs"></i> Configurações</a>
        <a href="index.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <div class="card-dashboard">
            <div class="card-header">
                <h4>Configurações do Sistema</h4>
            </div>
            <div class="card-body">
                <h5 class="text-center mb-4">Cadastrar Novo Administrador</h5>
                <form method="POST" action="" class="form-group">
                    <div class="mb-3">
                        <label for="nome_admin" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome_admin" name="nome_admin" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_admin" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email_admin" name="email_admin" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha_admin" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha_admin" name="senha_admin" required>
                    </div>
                    <button type="submit" name="cadastrar_admin" class="btn btn-cadastrar-admin btn-lg btn-block">Cadastrar Administrador</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
