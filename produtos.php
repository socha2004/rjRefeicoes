<?php
session_start();
include_once("src/db/conexao.php");

// Verifica se o formulário de cadastro foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_produto = $_POST['nome_produto'];
    $preco_produto = $_POST['preco_produto'];
    $descricao_curta = mysqli_real_escape_string($conn, $_POST['descricao_produto']);
    $status_produto = $_POST['status_produto'];
    $tipo_produto = mysqli_real_escape_string($conn, $_POST['tipo_produto']);
    $qtd_pessoas = $_POST['qtd_pessoas'];
    $imagem_produto = $_FILES["imagem_produto"];
    $nomeImagem = basename($imagem_produto["name"]);
    $localImagem = "uploads/" . $nomeImagem;

    // Faz upload da imagem
    if (move_uploaded_file($imagem_produto["tmp_name"], $localImagem)) {
        $query = "INSERT INTO produto (nome_produto, preco_produto, descricao_produto, imagem_produto, tipo_produto, qtd_pessoas, status_produto) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssssss', $nome_produto, $preco_produto, $descricao_curta, $localImagem, $tipo_produto, $qtd_pessoas, $status_produto);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>notificarSucesso();</script>";
        }
    }
}

// Função para ativar/desativar o produto
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id_produto = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'ativar') {
        $status = 'Disponível';
    } elseif ($action == 'desativar') {
        $status = 'Indisponível';
    }

    $query = "UPDATE produto SET status_produto = ? WHERE id_produto = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'si', $status, $id_produto);
    mysqli_stmt_execute($stmt);

    header("Location: produtos.php"); // Redireciona após a alteração
    exit();
}

// Buscar produtos cadastrados
$query = "SELECT * FROM produto";
$result = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Produtos - Administração</title>
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

        .btn-ativar {
            background-color: #5cb85c;
            color: white;
        }

        .btn-desativar {
            background-color: #d9534f;
            color: white;
        }

        .btn-cadastrar {
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
                <h4>Gestão de Produtos</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <h5 class="text-center mb-3">Cadastrar Produto</h5>
                    <div class="mb-3">
                        <label for="nome_produto" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" name="nome_produto" required>
                    </div>
                    <div class="mb-3">
                        <label for="preco_produto" class="form-label">Preço</label>
                        <input type="number" class="form-control" name="preco_produto" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao_produto" class="form-label">Descrição</label>
                        <textarea class="form-control" name="descricao_produto" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="imagem_produto" class="form-label">Imagem do Produto</label>
                        <input type="file" class="form-control" name="imagem_produto" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_produto" class="form-label">Status</label>
                        <select class="form-control" name="status_produto">
                            <option value="Disponível" selected>Disponível</option>
                            <option value="Indisponível">Indisponível</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_produto" class="form-label">Categoria</label>
                        <select class="form-control" name="tipo_produto">
                            <option value="refeicao">Refeição</option>
                            <option value="sobremesa">Sobremesa</option>
                            <option value="suco">Suco</option>
                            <option value="refrigerante">Refrigerante</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="qtd_pessoas" class="form-label">Qtd. Pessoas</label>
                        <input type="number" class="form-control" name="qtd_pessoas" required>
                    </div>
                    <button type="submit" class="btn btn-cadastrar btn-lg btn-block">Cadastrar Produto</button>
                    <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="confirmCancel()">Cancelar Cadastro</button>
                </form>

                <h5 class="text-center my-4">Produtos Cadastrados</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($produto = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $produto['nome_produto']; ?></td>
                                <td>R$ <?php echo number_format($produto['preco_produto'], 2, ',', '.'); ?></td>
                                <td><?php echo $produto['status_produto']; ?></td>
                                <td>
                                    <?php if ($produto['status_produto'] == 'Disponível') { ?>
                                        <a href="?action=desativar&id=<?php echo $produto['id_produto']; ?>" class="btn btn-desativar btn-sm">Desativar</a>
                                    <?php } else { ?>
                                        <a href="?action=ativar&id=<?php echo $produto['id_produto']; ?>" class="btn btn-ativar btn-sm">Ativar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmCancel() {
            if (confirm("Deseja cancelar o cadastro e voltar a tela principal?")) {
                window.location.href = 'interface_administrador.php';
            }
        }
    </script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>