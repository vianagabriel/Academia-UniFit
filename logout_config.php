<?php
session_start();

// Destrua todas as variáveis de sessão
$_SESSION = array();

// Encerre a sessão
session_destroy();

// Redirecione o usuário de volta para a página de login ou outra página desejada
header("Location: login.php");
exit();
?>
