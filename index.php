<?php
session_start();

require 'banco.php';
require 'suporte.php';

$exibirTabela = true;
$listaTarefas = []; // array que guardará as tarefas temporariamente

if (array_key_exists('nome', $_POST) && $_POST['nome'] !== "") {

    $tarefa = [];

    $tarefa['nome'] = $_POST['nome'];

    if (array_key_exists('descricao', $_POST)) {
        $tarefa['descricao'] = $_POST['descricao'];
    } else {
        $tarefa['descricao'] = "";
    }

    if (array_key_exists('prazo', $_POST)) {
        $tarefa['prazo'] = dataParaBanco($_POST['prazo']);
    } else {
        $tarefa['prazo'] = "";
    }

    $tarefa['prioridade'] = $_POST['prioridade'];

    if (array_key_exists('concluida', $_POST)) {
        $tarefa['concluida'] = $_POST['concluida'];
    } else {
        $tarefa['concluida'] = 0;
    }

    gravarTarefa($conn, $tarefa);
    header('Location: index.php'); // Redireciona para a página index.php
} // fim do corpo do if

$listaTarefas = recuperarTarefas($conn);

$tarefa = [
    'id' => 0,
    'nome' => $_POST['nome'] ?? '',
    'descricao' => $_POST['descricao'] ?? '',
    'prazo' => isset($_POST['prazo']) ? dataParaBanco($_POST['prazo']) : '',
    'prioridade' => $_POST['prazo'] ?? 1,
    'concluida' => $_POST['concluida'] ?? ''
];


include 'template.php';
