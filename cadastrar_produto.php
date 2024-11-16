<?php
session_start();
include_once("src/db/conexao.php");

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

    if (move_uploaded_file($imagem_produto["tmp_name"], $localImagem)) {
        $query = "INSERT INTO produto (nome_produto, preco_produto, descricao_produto, imagem_produto, tipo_produto, qtd_pessoas, status_produto) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssssss', $nome_produto, $preco_produto, $descricao_curta, $localImagem, $tipo_produto, $qtd_pessoas, $status_produto);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                notificarSucesso();
            </script>";
        }
    }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrativo - Cadastro de Produtos</title>
    <link rel="stylesheet" href="src/styles/cadastrarProduto/cadastrarProduto.css">
    <link rel="icon" href="img/fivecon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .card-cadastro-produto {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .card-header {
            background-color: #d9534f;
            color: white;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-success {
            background-color: #5cb85c;
            border-color: #4cae4c;
            border-radius: 10px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-text {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .alert {
            border-radius: 10px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php include_once("_navbar.php"); ?>

    <main role="main" class="container mt-5">
        <div class="card-cadastro-produto">
            <div class="card-header">
                <h1 class="text-uppercase">Cadastrar Produto</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome_produto" id="nome" placeholder="Digite o nome do produto" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="arquivo" class="col-sm-2 col-form-label">Foto do Produto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="imagem_produto" id="arquivo" required>
                            <small class="form-text text-muted">Apenas imagens JPG, PNG ou GIF (máx. 5MB)</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="preco" class="col-sm-2 col-form-label">Preço</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="preco_produto" id="preco" placeholder="Preço (R$)" required step="0.01">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="descricao_produto" class="col-sm-2 col-form-label">Descrição Curta</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="descricao_produto" id="descricao_produto" rows="3" placeholder="Descrição do produto" required maxlength="60"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="qtd_pessoas" class="col-sm-2 col-form-label">Qtd. Pessoas</label>
                        <div class="col-sm-10">
                            <input type="number" name="qtd_pessoas" id="qtd_pessoas" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_produto" id="disponivel" value="Disponível" checked>
                                <label class="form-check-label" for="disponivel">Disponível</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_produto" id="esgotado" value="Esgotado">
                                <label class="form-check-label" for="esgotado">Indisponível</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipo_produto" class="col-sm-2 col-form-label">Categoria</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipo_produto" id="tipo_produto" required>
                                <option value="refeicao">Refeição</option>
                                <option value="sobremesa">Sobremesa</option>
                                <option value="suco">Suco</option>
                                <option value="refrigerante">Refrigerante</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Função para exibir notificação de sucesso
        function notificarSucesso() {
            $.notify("Produto cadastrado com sucesso!", "success");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="src/js/notify.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
