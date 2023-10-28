<?php
$dbHost = "localhost"; // "localhost" com "l" minúsculo
$dbUser = 'root';
$dbPassword = '';
$dbName = "academia_gym";

// Estabelece a conexão com o banco de dados
$conexao = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
