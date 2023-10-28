<?php
session_start();
include_once('config.php'); // Substitua com o nome do seu arquivo de configuração

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Realize a consulta no banco de dados
    $sql = "SELECT * FROM funcionario WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        // Funcionário encontrado, inicie a sessão
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id']; // Salve o ID do usuário na sessão

        // Redirecione para outra página
        header("Location: index.php");
        exit(); // Encerre o script para evitar execução adicional
    } else {
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>
