<?php
// Inicia a sessão e inclui o arquivo de segurança

// GET: http://localhost/rjrefeicoes/cadastrar_produto.php

session_start();
include_once("src/db/conexao.php"); //conexão com o banco de dados

// Processa o envio do formulário se a solicitação POST for feita
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Limpe e valide os dados do formulário
//     $nome_protudo = mysqli_real_escape_string($conectar, $_POST['nome_protudo']);
//     $codigo = mysqli_real_escape_string($conectar, $_POST['codigo']);
//     $preco_protudo = $_POST['preco_protudo'];
//     $descricao_curta = mysqli_real_escape_string($conectar, $_POST['descricao_curta']);
//     $tipo_protudo = mysqli_real_escape_string($conectar, $_POST['tipo_protudo']);
//     $id_protudo = (int) $_POST['id_protudo'];

//     // Tratamento de upload de arquivos
//     if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
//         $fileTmpPath = $_FILES['arquivo']['tmp_name'];
//         $fileName = $_FILES['arquivo']['name'];
//         $fileSize = $_FILES['arquivo']['size'];
//         $fileType = $_FILES['arquivo']['type'];

//         //            tipos de arquivos permitidos
//         $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

//         // Verifique o tipo e tamanho do arquivo
//         if (in_array($fileType, $allowedTypes) && $fileSize <= 5000000) { // max 5MB
//             $newFileName = uniqid() . "_" . basename($fileName);
//             $uploadDir = 'uploads/';
//             $fileDest = $uploadDir . $newFileName;

//             if (move_uploaded_file($fileTmpPath, $fileDest)) {
//                 //Salve os dados no banco de dados após o upload do arquivo com sucesso
//                 $status = isset($_POST['status']) ? $_POST['status'] : 'Disponível'; // default 'Disponível'
//                 $query = "INSERT INTO produtos (nome_protudo, codigo, preco_protudo, descricao_curta, descricao_protudo, id_protudo, imagem, status) 
//                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

//                 $stmt = mysqli_prepare($conectar, $query);
//                 mysqli_stmt_bind_param($stmt, 'ssssssss', $nome, $codigo, $preco, $descricao_curta, $descricao, $categoria_id, $newFileName, $status);

//                 if (mysqli_stmt_execute($stmt)) {
//                     $_SESSION['message'] = 'Produto cadastrado com sucesso!';
//                     header('Location: success_page.php'); //redireciona após sucesso
//                 } else {
//                     $_SESSION['message'] = 'Erro ao cadastrar produto!';
//                 }

//                 mysqli_stmt_close($stmt);
//             } else {
//                 $_SESSION['message'] = 'Erro ao fazer upload da imagem.';
//             }
//         } else {
//             $_SESSION['message'] = 'Arquivo inválido. Apenas imagens JPG, PNG e GIF são permitidas, com no máximo 5MB.';
//         }
//     } else {
//         $_SESSION['message'] = 'Nenhuma imagem foi selecionada ou houve erro no envio.';
//     }
// }
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
        body{
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
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome do produto" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="arquivo" class="col-sm-2 col-form-label">Foto do Produto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="arquivo" id="arquivo" required>
                            <small class="form-text text-muted">Apenas imagens JPG, PNG ou GIF (máx. 5MB)</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="preco" class="col-sm-2 col-form-label">Preço</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="preco" id="preco" placeholder="Preço (R$)" required step="0.01">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="descricao_curta" class="col-sm-2 col-form-label">Descrição Curta</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="descricao_curta" id="descricao_curta" rows="3" placeholder="Descrição do produto" required maxlength="60"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="disponivel" value="Disponível" checked>
                                <label class="form-check-label" for="disponivel">Disponível</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="esgotado" value="Esgotado">
                                <label class="form-check-label" for="esgotado">Esgotado</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="categoria_id" class="col-sm-2 col-form-label">Subcategoria</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="categoria_id" id="categoria_id" required>
                                <option value="eugenio">eugenio</option>
                                <option value="juci">juci</option>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>