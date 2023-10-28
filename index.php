<?php
include_once("index_config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UniFit</title>

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
                <a class="nav-item nav-link active" href="#">Inicio</a>
                <a class="nav-item nav-link" href="cadastro/aluno.php">Alunos</a>
                <a class="nav-item nav-link" href="cadastro/funcionario.php">Funcionarios</a>
                <a class="nav-item nav-link" href="cadastro/planos.php">Planos</a>
                <a class="nav-item nav-link" href="cadastro/alunos">Aulas</a>
                <a class="nav-item nav-link" href="logout_config.php">Sair</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="card">
            <h5 class="card-header">Informações</h5>
            <div class="card-body row">
                <div class="col-md-6">
                    <div id="chartAlunos" style="height: 370px; width: 100%;"></div>
                </div>
                <div class="col-md-6">
                    <div id="chartFuncionarios" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartAlunos", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "Alunos (Total: <?php echo getAlunosInativos($conexao) +  getAlunosAtivos($conexao)?>)"
                },
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    dataPoints: <?php echo json_encode($dataAlunos, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            
            var chart = new CanvasJS.Chart("chartFuncionarios", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "Funcionarios (Total: <?php echo getFuncionariosInativos($conexao) +  getFuncionariosAtivos($conexao)?>)"
                },
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    dataPoints: <?php echo json_encode($dataFuncionarios, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
    <script src="../scripts/scripts.js"></script>
    <script src="scripts/index.js"></script>
</body>

</html>