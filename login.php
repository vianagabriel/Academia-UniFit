

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="container">
            <form action="login_config.php" method="post">
                <div class="email">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Seu email">
                </div>

                <div class="password">
                    <label for="">Senha</label>
                    <input type="password" name="senha" placeholder="Sua Senha">
                </div>

                <button type="submit">Entrar</button>
            </form>
        </div>
    </main>
</body>
</html>
