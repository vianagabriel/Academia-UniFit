<?php
include_once("config.php");

$linhasTabela = getAlunos($conexao);;

if (isset($_POST["nome"])) {
    gravaDadosAlunos($conexao);
}

if (isset($_POST["idInativar"])) {
    inativarAluno($conexao);
}

if (isset($_POST["idAtivar"])) {
    ativarAluno($conexao);
}


$conexao->close();

function gravaDadosAlunos($conexao) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $dataCadastro =  date("Y-m-d");

    //Valida se é um cadastro novo ou é para editar
    if ($id == 0) {
        $result = mysqli_query($conexao, "INSERT INTO Alunos (nome, telefone, email, dataCadastro, ativo)
        VALUES('$nome', '$telefone', '$email', '$dataCadastro', 1)");
    } else {
        $sql = "UPDATE Alunos SET nome = '$nome', telefone = '$telefone', email = '$email', WHERE id = $id";
        $result = mysqli_query($conexao, $sql);
    }
    if ($result) {
        header("Location: aluno.php");
    }
}
function inativarAluno($conexao) {
    $id = $_POST["idInativar"];
    $sql = "UPDATE Alunos SET ativo = '0' WHERE id = $id";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        header("Location: aluno.php");
    }
}
function ativarAluno($conexao) {
    $id = $_POST["idAtivar"];
    $sql = "UPDATE Alunos SET ativo = '1' WHERE id = $id";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        header("Location: aluno.php");
    }
}
function getAlunos($conexao) {
    $sql = "SELECT * FROM Alunos";
    $result = mysqli_query($conexao, $sql);
    $arrAlunos = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arrAlunos[] = $row;
        }

        // salva as variaveis em uma variavel js para usar no metodo de editar
        echo "<script>var dadosTela = " . json_encode($arrAlunos) . ";</script>";
    }

    return populaTabela($arrAlunos);
}
function populaTabela($arrAlunos) {
    $linhas = "";
    if (count($arrAlunos) > 0) {
        foreach ($arrAlunos as $row) {
            $id = $row["id"];
            $botoes = '';
            if($row["ativo"] == 1) {
                $botoes = '<button type="button" onclick="abrirModalCadastroAluno(' . $id . ')" class="btn btn-primary btn-editar mr-2"><i class="fas fa-pencil"></i> Editar</button>'.
                '<button type="button" onclick="abrirModalInativar(' . $id . ')" class="btn btn-danger"><i class="fas fa-times"></i> Inativar</button>';
            }else{
                $botoes = '<button type="button" onclick="abrirModalAtivar(' . $id . ')" class="btn btn-success btn-editar mr-2"><i class="fas fa-check"></i> Ativar</button>';
            }
            $linhas .= "<tr>";
            $linhas .= "<td class='col-acao'>";
            $linhas .= $botoes;
            $linhas .= "</td>";
            $linhas .= "<td>" . $row["nome"] . "</td>";
            $linhas .= "<td>" . $row["telefone"] . "</td>";
            $linhas .= "<td>" . $row["email"] . "</td>";
            $linhas .= "<td>" . $row["dataCadastro"] . "</td>";
            $linhas .= "</tr>";
        }
    } else {
        $linhas = "<td colspan='5' class='semResultado' text='center'>0 Cadastros</td>";
    }

    return $linhas;
}
