<?php

include_once("config.php");

$dataAlunos = array(
    array("label" => "Ativos", "y" => getAlunosAtivos($conexao)),
    array("label" => "Não ativos", "y" => getAlunosInativos($conexao))
);

$dataFuncionarios = array(
    array("label" => "Ativos", "y" => getFuncionariosAtivos($conexao)),
    array("label" => "Não ativos", "y" => getFuncionariosInativos($conexao))
);


function getAlunosAtivos($conexao) {
    $sql = "SELECT COUNT(ativo) FROM alunos WHERE ativo = 1";
    $result = mysqli_query($conexao, $sql);
    $res = $result->fetch_assoc();
    return $res['COUNT(ativo)'];
}


function getAlunosInativos($conexao) {
    $sql = "SELECT COUNT(ativo) FROM alunos WHERE ativo = 0";
    $result = mysqli_query($conexao, $sql);
    $res = $result->fetch_assoc();
    return $res['COUNT(ativo)'];
}
function getFuncionariosAtivos($conexao) {
    $sql = "SELECT COUNT(ativo) FROM funcionario WHERE ativo = 1";
    $result = mysqli_query($conexao, $sql);
    $res = $result->fetch_assoc();
    return $res['COUNT(ativo)'];
}


function getFuncionariosInativos($conexao) {
    $sql = "SELECT COUNT(ativo) FROM funcionario WHERE ativo = 0";
    $result = mysqli_query($conexao, $sql);
    $res = $result->fetch_assoc();
    return $res['COUNT(ativo)'];
}