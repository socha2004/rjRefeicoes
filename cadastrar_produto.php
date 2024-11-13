<?php
// Inicia a sessão e inclui o arquivo de segurança

// GET: http://localhost/rjrefeicoes/cadastrar_produto.php

session_start();
include_once("src/db/conexao.php"); //conexão com o banco de dados

// Processa o envio do formulário se a solicitação POST for feita
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Limpe e valide os dados do formulário
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
            alert('Produto cadastrado com sucesso!')
          </script>";
        }
    }



    // Tratamento de upload de arquivos
    // if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
    //     $fileTmpPath = $_FILES['arquivo']['tmp_name'];
    //     $fileName = $_FILES['arquivo']['name'];
    //     $fileSize = $_FILES['arquivo']['size'];
    //     $fileType = $_FILES['arquivo']['type'];

    //     //            tipos de arquivos permitidos
    //     $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    //     // Verifique o tipo e tamanho do arquivo
    //     if (in_array($fileType, $allowedTypes) && $fileSize <= 5000000) { // max 5MB
    //         $newFileName = uniqid() . "_" . basename($fileName);
    //         $uploadDir = 'uploads/';
    //         $fileDest = $uploadDir . $newFileName;



    //         if (move_uploaded_file($fileTmpPath, $fileDest)) {
    //             //Salve os dados no banco de dados após o upload do arquivo com sucesso
    //             $status = isset($_POST['status']) ? $_POST['status'] : 'Disponível'; // default 'Disponível'
    //             $query = "INSERT INTO produto (nome_produto, preco_produto, descricao_produto, imagem_produto, tipo_produto, qtd_pessoas, status_produto) 
    //                       VALUES (?, ?, ?, ?, ?, ?, ?)";

    //             $stmt = mysqli_prepare($conn, $query);
    //             mysqli_stmt_bind_param($stmt, 'sssssss', $nome_produto, $preco_produto, $descricao_curta, $newFileName, $tipo_produto, $qtd_pessoas, $status);

    //             if (mysqli_stmt_execute($stmt)) {
    //                 $_SESSION['message'] = 'Produto cadastrado com sucesso!';
    //                 // header('Location: success_page.php'); //redireciona após sucesso
    //             } else {
    //                 $_SESSION['message'] = 'Erro ao cadastrar produto!';
    //             }

    //             mysqli_stmt_close($stmt);
    //         } else {
    //             $_SESSION['message'] = 'Erro ao fazer upload da imagem.';
    //         }
    //     } else {
    //         $_SESSION['message'] = 'Arquivo inválido. Apenas imagens JPG, PNG e GIF são permitidas, com no máximo 5MB.';
    //     }
    // } else {
    //     $_SESSION['message'] = 'Nenhuma imagem foi selecionada ou houve erro no envio.';
    // }
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
            background-color: #000;
        }
    </style>
</head>

<body>
    <?php include_once("_navbar.php"); ?>

    <main role="main" class="container mt-5">
        <div class="card-cadastro-produto">
            <div class="card-header">
                <h1 class="text-center text-uppercase" style="text-decoration: underline">Cadastrar Produto</h1>
            </div>
            <div class="card-body">
                <!-- <?php
                        if (isset($_SESSION['message'])) {
                            echo '<div class="alert alert-info" role="alert">' . $_SESSION['message'] . '</div>';
                            unset($_SESSION['message']);
                        }
                        ?> -->

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
                            <input type="file" class="form-control-file" name="imagem_produto" id="arquivo">
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
                        <label for="qtd_pessoas" class="col-sm-2 col-form-label">Quantidade de pessoas a serem servidas: </label>
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
                                <option value="eugenio">Refeição</option>
                                <option value="juci">Sobremesa</option>
                                <option value="juci">Suco</option>
                                <option value="juci">Refrigerante</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-success btn-lg">Salvar</button>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>