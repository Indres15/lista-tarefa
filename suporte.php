<?php

function prioridade($codidoPrioridade): string
{
    $prioridadeTraduzida = "";

    if ($codidoPrioridade == 1)
        $prioridadeTraduzida = "Baixa";

    if ($codidoPrioridade == 2)
        $prioridadeTraduzida = "Média";

    if ($codidoPrioridade == 3)
        $prioridadeTraduzida = "Alta";

    return $prioridadeTraduzida;
}

function converteConcluida($codigoConcluida): string
{
    if ($codigoConcluida == 1)
        return "Sim";

    return "Não";
}

function dataParaExibir($data): string
{
    if ($data == "" OR $data == "0000-00-00") {
        return "";
    }

    $dadosData = explode("-", $data); // 2024-07-29 Ex: [2024, 07, 29]

    $dataParaExibicao = "{$dadosData[2]}/{$dadosData[1]}/{$dadosData[0]}";

    return $dataParaExibicao;

}

function dataParaBanco($data): string
{
    if ($data == "") {
        return "";
    }

    $dadosData = explode("/", $data);

    return "{$dadosData[2]}-{$dadosData[1]}-{$dadosData[0]}";
}

/** Verifica se há algo na variável global $_POST */
function temPost()
{
    if (count($_POST) > 0) {
        return true;
    }

    return false;
}

function tratarAnexo($anexo) {
    $padrao = '/^.+(\.pdf|\.zip)$/';
    $resultado = preg_match($padrao, $anexo['name']);

    echo "<h1>{$resultado}</h1>";

    if ($resultado == 0) {
        return false;
    }

    move_uploaded_file(
        $anexo['tmp_name'],
        "anexos/{$anexo['name']}"
    );

    return true;
}

function tarefaConcluida($codigoConcluida): string
{
    if ($codigoConcluida == 1)
        return "tarefaConcluida";

    return "";
}