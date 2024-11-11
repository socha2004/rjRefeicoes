<?php

include("../db/conexao.php");
// Receber os dados do formulário
$login = $_POST['usuario'];
$senha = $_POST['senha'];

// Preparar a consulta para evitar SQL Injection
$sql = "SELECT * FROM admin_sistema WHERE login_admin = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

// Verificar se o usuário existe e a senha está correta
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verificar se a senha é válida (caso esteja usando hash)
    if (password_verify($senha, $user["senha_admin"])) {
        echo "Login bem-sucedido! Bem-vindo, " . htmlspecialchars($user['login']) . ".";
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Login não encontrado.";
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>
