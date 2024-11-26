<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="icon" href="img/fivecon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #2c3e50; /* Fundo mais escuro */
            font-family: 'Arial', sans-serif;
            color: #ecf0f1; /* Cor do texto mais clara para contraste */
        }

        .sidebar {
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #34495e; /* Cor mais escura para a sidebar */
            padding-top: 30px;
            padding-right: 20px;
            transition: 0.3s;
        }

        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            font-size: 16px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #2c3e50; /* Efeito hover mais forte */
            color: #f8f9fa;
        }

        .sidebar .admin-info {
            text-align: center;
            margin-bottom: 20px;
            color: #ecf0f1;
        }

        .content {
            margin-left: 260px;
            padding: 30px;
        }

        .card-dashboard {
            border-radius: 15px;
            background-color: #1d262f; /* Fundo mais escuro para os cards */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }

        .card-header {
            background-color: #e74c3c; /* Cor de fundo do cabeçalho do card */
            color: white;
            border-radius: 15px 15px 0 0;
            text-align: center;
            padding: 20px;
        }

        .btn-dashboard {
            font-size: 16px;
            padding: 15px 30px;
            border-radius: 8px;
            color: white;
            text-align: center;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-cadastrar {
            background-color: #0275d8; /* Cor de fundo para o botão de cadastro */
            margin-right: 15px;
        }

        .btn-visualizar {
            background-color: #d9534f; /* Cor de fundo para o botão de visualizar */
        }

        .btn-dashboard:hover {
            opacity: 0.8;
        }

        .fa {
            margin-right: 8px;
        }

        .container-dashboard {
            display: flex;
            justify-content: space-evenly;
        }

        .card-dashboard .card-body {
            text-align: center;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding-top: 20px;
            }

            .content {
                margin-left: 0;
                padding: 20px;
            }

            .container-dashboard {
                flex-direction: column;
                align-items: center;
            }

            .card-dashboard {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['id_admin'])) {
        header("Location: index.php");
        exit;
    }

    // Obtém o nome do administrador logado
    $nomeAdmin = $_SESSION['nome_admin'];
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center text-white">Administrador</h3>
        <div class="admin-info">
            <p>Bem-vindo, <strong><?php echo htmlspecialchars($nomeAdmin); ?></strong></p>
        </div>
        <a href="interface_administrador.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="produtos.php"><i class="fas fa-box"></i> Produtos</a>
        <a href="visualizar_pedidos.php"><i class="fas fa-list"></i> Visualizar Pedidos</a>
        <a href="relatorios.php"><i class="fas fa-chart-line"></i> Relatórios</a>
        <a href="configuracoes.php"><i class="fas fa-cogs"></i> Configurações</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>

    </div>

    <!-- Content Area -->
    <div class="content">
        <div class="container-dashboard">
            <div class="card-dashboard col-md-5">
                <div class="card-header">
                    <h4>Gestão de Produtos</h4>
                </div>
                <div class="card-body">
                    <p>Gerencie os produtos do sistema de forma eficiente.</p>
                    <a href="produtos.php" class="btn btn-cadastrar btn-dashboard"><i class="fas fa-plus"></i> Produtos</a>
                    <a href="visualizar_pedidos.php" class="btn btn-visualizar btn-dashboard"><i class="fas fa-eye"></i> Visualizar Pedidos</a>
                </div>
            </div>
            <div class="card-dashboard col-md-5">
                <div class="card-header">
                    <h4>Relatórios e Configurações</h4>
                </div>
                <div class="card-body">
                    <p>Acesse relatórios e configure o sistema conforme necessário.</p>
                    <a href="relatorios.php" class="btn btn-cadastrar btn-dashboard"><i class="fas fa-chart-pie"></i> Relatórios</a>
                    <a href="settings.php" class="btn btn-visualizar btn-dashboard"><i class="fas fa-cogs"></i> Configurações</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
