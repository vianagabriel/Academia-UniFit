<?php
include_once("config.php");

$linhasTabela = getPlanos($conexao);;

if (isset($_POST["nome"])) {
    gravaDadosPlanos($conexao);
}

if (isset($_POST["idInativar"])) {
    inativarAluno($conexao);
}

if (isset($_POST["idAtivar"])) {
    ativarAluno($conexao);
}


$conexao->close();

function gravaDadosPlanos($conexao) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];
    $descricao = $_POST["descricao"];
    $dataCadastro =  date("Y-m-d");

    //Valida se é um cadastro novo ou é para editar
    if ($id == 0) {
        $result = mysqli_query($conexao, "INSERT INTO planos (nome, valor, desccricao)
        VALUES('$nome', '$valor', '$descricao')");
    } else {
        $sql = "UPDATE planos SET nome = '$nome', valor = '$valor', descricao = '$descricao', WHERE id = $id";
        $result = mysqli_query($conexao, $sql);
    }
    if ($result) {
        header("Location: planos.php");
    }
}
function inativarAluno($conexao) {
    $id = $_POST["idInativar"];
    $sql = "UPDATE planos SET ativo = '0' WHERE id = $id";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        header("Location: planos.php");
    }
}
function ativarAluno($conexao) {
    $id = $_POST["idAtivar"];
    $sql = "UPDATE planos SET ativo = '1' WHERE id = $id";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        header("Location: planos.php");
    }
}
function getPlanos($conexao) {
    $sql = "SELECT * FROM planos";
    $result = mysqli_query($conexao, $sql);
    $arrPlanos = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arrPlanos[] = $row;
        }

        // salva as variaveis em uma variavel js para usar no metodo de editar
        echo "<script>var dadosTela = " . json_encode($arrPlanos) . ";</script>";
    }

    return populaTabela($arrPlanos);
}
function populaTabela($arrPlanos) {
    $linhas = "";
    if (count($arrPlanos) > 0) {
        foreach ($arrPlanos as $row) {
            $id = $row["id"];
            $botoes = '';
            if($row["ativo"] == 1) {
                $botoes = '<button type="button" onclick="abrirModalCadastroPlano(' . $id . ')" class="btn btn-primary btn-editar mr-2"><i class="fas fa-pencil"></i> Editar</button>'.
                '<button type="button" onclick="abrirModalInativar(' . $id . ')" class="btn btn-danger"><i class="fas fa-times"></i> Inativar</button>';
            }else{
                $botoes = '<button type="button" onclick="abrirModalAtivar(' . $id . ')" class="btn btn-success btn-editar mr-2"><i class="fas fa-check"></i> Ativar</button>';
            }
            $linhas .= "<tr>";
            $linhas .= "<td class='col-acao'>";
            $linhas .= $botoes;
            $linhas .= "</td>";
            $linhas .= "<td>" . $row["nome"] . "</td>";
            $linhas .= "<td>" . $row["valor"] . "</td>";
            $linhas .= "<td>" . $row["descricao"] . "</td>";
            $linhas .= "</tr>";
        }
    } else {
        $linhas = "<td colspan='5' class='semResultado' text='center'>0 Cadastros</td>";
    }

    return $linhas;
}
