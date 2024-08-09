<?php

require "banco.php";
require "suporte.php";

$exibirTabela = false;

$temErros = false;
$errosValidacao = [];

if (temPost()) {
    $tarefa = [
        'id' => $_POST['id'],
        'nome' => $_POST['nome'],
        'descricao' => '',
        'prazo' => '',
        'prioridade' => $_POST['prioridade'],
        'concluida' => 0,
    ];
 
    if (strlen($tarefa['nome']) == 0) {
        $temErros = true;
        $errosValidacao['nome'] = "O nome da tarefa é obrigatório";
    }

    if (array_key_exists('descricao', $_POST)) {
        $tarefa['descricao'] = $_POST['descricao'];
    }

    if (array_key_exists('prazo', $_POST) && strlen($_POST['prazo'] > 0)) {
        $tarefa['prazo'] = dataParaBanco($_POST['prazo']);
    }

    if (array_key_exists('concluida', $_POST)) {
        $tarefa['concluida'] = $_POST['concluida'];
    }

    /** Grava as alterações somente se não houver erros no formulário */
    if (!$temErros) {
        editarTarefa($conn, $tarefa); // Atualiza a tarefa editada
        header('location: index.php'); // Redireciona para a página index.php
        exit();
    }
}

$tarefa = recuperarTarefa($conn, $_GET['id']);

$tarefa['nome'] = (array_key_exists('nome', $_POST)) 
    ? $_POST['nome'] 
    : $tarefa['nome'];

$tarefa['descricao'] = (array_key_exists('descricao', $_POST))
    ? $_POST['descricao'] : $tarefa['descricao'];

$tarefa['prazo'] = (array_key_exists('prazo', $_POST))
    ? $_POST['prazo'] : $tarefa['prazo'];

$tarefa['prioridade'] = (array_key_exists('prioridade', $_POST))
    ? $_POST['prioridade'] : $tarefa['prioridade'];

$tarefa['concluida'] = (array_key_exists('concluida', $_POST))
    ? $_POST['concluida'] : $tarefa['concluida'];

require "template.php";
