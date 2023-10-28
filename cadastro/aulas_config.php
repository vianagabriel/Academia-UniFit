<?php
include_once("../config.php");

$linhasTabela = getAulas($conexao);
$personais = getPersonal($conexao);
if (isset($_POST["nome"])) {
    gravaDados($conexao);
}

if (isset($_POST["idInativar"])) {
    inativar($conexao);
}

if (isset($_POST["idAtivar"])) {
    ativar($conexao);
}


$conexao->close();

function gravaDados($conexao) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $idPersonal = $_POST["professor"];
    $dataCadastro =  date("Y-m-d");

    //Valida se é um cadastro novo ou é para editar
    if ($id == 0) {
        $result = mysqli_query($conexao, "INSERT INTO aulas (nome, descricao, idPersonal, dataCadastro, ativo)
        VALUES('$nome', '$descricao', '$idPersonal', '$dataCadastro', 1)");
    } else {
        $sql = "UPDATE aulas SET nome = '$nome', descricao = '$descricao', idPersonal = '$idPersonal' WHERE id = $id";
        $result = mysqli_query($conexao, $sql);
    }
    if ($result) {
        header("Location: aulas.php");
    }
}
function inativar($conexao) {
    $id = $_POST["idInativar"];
    $sql = "UPDATE aulas SET ativo = '0' WHERE id = $id";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        header("Location: aulas.php");
    }
}
function ativar($conexao) {
    $id = $_POST["idAtivar"];
    $sql = "UPDATE aulas SET ativo = '1' WHERE id = $id";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        header("Location: aulas.php");
    }
}
function getAulas($conexao) {
    $sql = "SELECT * FROM aulas";
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
                $botoes = '<button type="button" onclick="abrirModalCadastroAula(' . $id . ')" class="btn btn-primary btn-editar mr-2"><i class="fas fa-pencil"></i> Editar</button>'.
                '<button type="button" onclick="abrirModalInativar(' . $id . ')" class="btn btn-danger"><i class="fas fa-times"></i> Inativar</button>';
            }else{
                $botoes = '<button type="button" onclick="abrirModalAtivar(' . $id . ')" class="btn btn-success btn-editar mr-2"><i class="fas fa-check"></i> Ativar</button>';
            }
            $linhas .= "<tr>";
            $linhas .= "<td class='col-acao'>";
            $linhas .= $botoes;
            $linhas .= "</td>";
            $linhas .= "<td>" . $row["nome"] . "</td>";
            $linhas .= "<td>" . $row["descricao"] . "</td>";
            $linhas .= "<td>" . $row["idPersonal"] . "</td>";
            $linhas .= "<td>" . $row["dataCadastro"] . "</td>";
            $linhas .= "</tr>";
        }
    } else {
        $linhas = "<td colspan='5' class='semResultado' text='center'>0 Cadastros</td>";
    }

    return $linhas;
}
function getPersonal($conexao) {
    $sql = "SELECT * FROM funcionario";
    $result = mysqli_query($conexao, $sql);
    $arrPersonal = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arrPersonal[] = $row;
        }

        // salva as variaveis em uma variavel js para usar no metodo de editar
        echo "<script>var dadosFuncionario = " . json_encode($arrPersonal) . ";</script>";
    }

    return populaSelect($arrPersonal);
}
function populaSelect($arrPersonal) {
    $linhas = "<option value=\"0\">Selecione</td>";
    
    foreach ($arrPersonal as $row) {
        $linhas .= "<option value=". $row["id"].">" . $row["nome"] . "</td>";
    }

    return $linhas;
}