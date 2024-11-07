<?php
session_start();
include("src/db/conexao.php");

if (!empty($_POST) and (empty($_POST["usuario"]) or empty($_POST["senha"]))) {
    header("Location: index.php");
    exit;
}

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];


