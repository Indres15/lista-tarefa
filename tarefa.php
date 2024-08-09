<?php

require "banco.php";
require "suporte.php";

$temErros = false;
$errosValidacao = [];

if (temPost()) {
    $tarefaid = $_POST['tarefaid'];

    if (!array_key_exists('anexo', $_FILES)) {
        $temErros = true;
        $errosValidacao['anexo'] = "É necesspario anexar um arquivo";
    } else {
        if (tratarAnexo($_FILES['anexo'])) {
            $nome = $_FILES['anexo']['name'];
            $anexo = [
                'tarefaid' => $tarefaid,
                'nome' => substr($nome, 0, -4), // [teste].pdf
                'arquivo' => $nome,
            ];
        } else {
            $temErros = true;
            $errosValidacao['anexo'] = "Somente anexos no formato .zip ou .pdf são aceitos";
        }
    }

    if (!$temErros) {
        gravarAnexo($conn, $anexo);
    }
}

$tarefa = recuperarTarefa($conn, $_GET['id']);
$anexos = recuperarAnexos($conn, $_GET['id']);

require "templateTarefa.php";
