<?php
session_start();
include_once("src/db/conexao.php");

// Consultar pedidos e detalhes
$query_pedidos = "SELECT id_pedido, data_pedido, status_pedido, valor_total, nome_cliente, email_cliente 
                  FROM pedidos
                  ORDER BY data_pedido DESC";


$result_pedidos = mysqli_query($conn, $query_pedidos);

// Função para obter os itens de cada pedido
function obterItensPedido($conn, $id_pedido) {
    $query_itens = "SELECT ip.quantidade, ip.preco_unitario, pr.nome_produto 
                    FROM itens_pedido ip
                    JOIN produto pr ON ip.id_produto = pr.id_produto
                    WHERE ip.id_pedido = $id_pedido";
    return mysqli_query($conn, $query_itens);
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visualização de Pedidos</title>
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

        .btn-visualizar {
            background-color: #0275d8;
            color: white;
        }

        .btn-cancelar {
            background-color: #d9534f;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .collapse .card-body {
            padding: 10px;
            background-color: #f8f9fa;
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
                <h4>Visualização de Pedidos</h4>
            </div>
            <div class="card-body">
                <h5 class="text-center my-4">Pedidos Recentes</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Pedido ID</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Data do Pedido</th>
                            <th scope="col">Status</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($pedido = mysqli_fetch_assoc($result_pedidos)) { ?>
                            <tr>
                                <td><?php echo $pedido['id_pedido']; ?></td>
                                <td><?php echo $pedido['nome_cliente']; ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($pedido['data_pedido'])); ?></td>
                                <td><?php echo $pedido['status_pedido']; ?></td>
                                <td>R$ <?php echo number_format($pedido['valor_total'], 2, ',', '.'); ?></td>
                                <td>
                                    <!-- Botão para visualizar os itens do pedido -->
                                    <button class="btn btn-visualizar" data-bs-toggle="collapse" data-bs-target="#itens-<?php echo $pedido['id_pedido']; ?>" aria-expanded="false" aria-controls="itens-<?php echo $pedido['id_pedido']; ?>">
                                        Visualizar Itens
                                    </button>
                                    <!-- Botão para cancelar o pedido -->
                                    <a href="cancelar_pedido.php?id=<?php echo $pedidos['id_pedido']; ?>" class="btn btn-cancelar">Cancelar Pedido</a>
                                </td>
                            </tr>

                            <!-- Detalhes do Pedido (Itens) -->
                            <tr>
                                <td colspan="6">
                                    <div class="collapse" id="itens-<?php echo $pedido['id_pedido']; ?>">
                                        <div class="card card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Produto</th>
                                                        <th>Quantidade</th>
                                                        <th>Preço Unitário</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $itens = obterItensPedido($conn, $pedido['id_pedido']);
                                                    while ($item = mysqli_fetch_assoc($itens)) { ?>
                                                        <tr>
                                                            <td><?php echo $item['nome_produto']; ?></td>
                                                            <td><?php echo $item['quantidade']; ?></td>
                                                            <td>R$ <?php echo number_format($item['preco_unitario'], 2, ',', '.'); ?></td>
                                                            <td>R$ <?php echo number_format($item['quantidade'] * $item['preco_unitario'], 2, ',', '.'); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>

               
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
