<?php
include_once("funcionario_config.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UniFit - Cadastro de Funcionarios</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">UniFit</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="aluno.php">Alunos</a>
                <a class="nav-item nav-link active" href="#">Funcionarios</a>
                <a class="nav-item nav-link" href="#">Pricing</a>
                <a class="nav-item nav-link" href="logout_config.php">Sair</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="mb-3">
            <button class="btn btn-primary" id="btnAddAluno" onclick="abrirModalCadastro()"><i class="fas fa-plus"></i> Adicionar Funcionario</button>
        </div>
        <div class="card">
            <h5 class="card-header">Cadastro do Funcionario</h5>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ação</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $linhasTabela;?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div id="modalCadastro" class="modal modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulario cadastro de funcionario</h5>
                </div>
                <div class="modal-body">
                    <form action="funcionario.php" method="post">
                        <div class="form-group">
                            <label for="nome">Nome do Funcionario*</label>
                            <input type="text" id="nome" class="form-control" name="nome" placeholder="Digite o nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail*</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Digite um e-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha*</label>
                            <input type="password" id="senha" class="form-control" name="senha" placeholder="Digite a senha" required>
                        </div>

                        <!-- IMPORTANTE MANTER O class="idCadastro"-->
                        <input type="text" class="idCadastro" name="id" value="0" hidden>
                        <!-- IMPORTANTE -->
                        <div class="modal-footer mt-4">
                            <input type="submit" class="btn btn-primary" value="Gravar">
                            <button type="button" class="btn btn-secondary dimiss-modal" data-dismiss="modal" aria-label="Close">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalInativar" class="modal modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inativar funcionario</h5>
                </div>
                <div class="modal-body text-center">
                    <h5>Tem certeza que quer inativar esse funcionario?</h5>
                    <form action="funcionario.php" method="post">
                        <!-- IMPORTANTE MANTER O class="idCadastro"-->
                        <input type="text" class="idCadastro" name="idInativar" hidden>
                        <!-- IMPORTANTE -->
                        <div class="modal-footer mt-4">
                            <input type="submit" class="btn btn-danger" value="Inativar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalAtivar" class="modal modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inativar Funcionario</h5>
                </div>
                <div class="modal-body text-center">
                    <h5>Tem certeza que quer ativar esse funcionario?</h5>
                    <form action="funcionario.php" method="post">
                        <!-- IMPORTANTE MANTER O class="idCadastro"-->
                        <input type="text" class="idCadastro" name="idAtivar" hidden>
                        <!-- IMPORTANTE -->
                        <div class="modal-footer mt-4">
                            <input type="submit" class="btn btn-success" value="Ativar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    
    <script src="scripts/scripts.js"></script>
    <script src="scripts/funcionario.js"></script>
</body>

</html>