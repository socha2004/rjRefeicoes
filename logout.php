<?php
// Inicia a sessão
session_start();

// Destrói todas as variáveis da sessão
session_unset();

// Destrói a sessão
session_destroy();

// Redireciona o usuário para a página de login
header("Location: login.php");
exit;
?>
