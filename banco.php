<?php

try {
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'db_tarefas';

    $conn = mysqli_connect($servidor, $usuario, $senha, $banco);

} catch (Exception $e) {
    echo 'Algo deu errado:...' . $e->getMessage();
    die();
}

/** Recupera todas as tarefas do banco de dados */
function recuperarTarefas($conn)
{
    $query = "SELECT * FROM db_tarefas.tarefas";

    $result = mysqli_query($conn, $query);

    $tarefas = []; // array que receberá cada tarefas retornada do banco

    while ($tarefa = mysqli_fetch_assoc($result)) {
        $tarefas[] = $tarefa;
    }

    return $tarefas;
}

/** Recupera uma única tarefa para edição */
function recuperarTarefa($conn, $id)
{
    $query = "SELECT * FROM db_tarefas.tarefas WHERE id = $id";

    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

/** Grava uma tarefa no banco de dados */
function gravarTarefa($conn, $tarefa)
{
    $query = "
        INSERT INTO db_tarefas.tarefas (nome, descricao, prazo, prioridade, concluida)
        VALUES (
            '{$tarefa['nome']}',
            '{$tarefa['descricao']}',
            '{$tarefa['prazo']}',
            '{$tarefa['prioridade']}',
            '{$tarefa['concluida']}'
        );
    ";

    mysqli_query($conn, $query);
}

function editarTarefa($conn, $tarefa)
{
    if ($tarefa['prazo'] == '') {
        $prazo = 'NULL';
    } else {
        $prazo = "'{$tarefa['prazo']}'";
    }

    $query = "
        UPDATE db_tarefas.tarefas SET
            nome = '{$tarefa['nome']}',
            descricao = '{$tarefa['descricao']}',
            prazo = {$prazo},
            prioridade = '{$tarefa['prioridade']}',
            concluida = '{$tarefa['concluida']}'
        WHERE id = '{$tarefa['id']}'
    ";

    mysqli_query($conn, $query);
}

function removerTarefa($conn, $id)
{
    $query = "DELETE FROM db_tarefas.tarefas WHERE id = $id";

    mysqli_query($conn, $query);
}

function gravarAnexo($conn, $anexo)
{
    $query = "INSERT INTO db_tarefas.anexos (idtarefa, nome, arquivo)
        VALUES ('{$anexo['tarefaid']}', '{$anexo['nome']}', '{$anexo['arquivo']}')";
    
    mysqli_query($conn, $query);
}

function recuperarAnexos($conn, $idtarefa)
{
    $query = "SELECT * FROM db_tarefas.anexos WHERE idtarefa = {$idtarefa}";

    $resultado = mysqli_query($conn, $query);

    $anexos = [];

    while ($anexo = mysqli_fetch_assoc($resultado)) {
        $anexos[] = $anexo;
    }

    return $anexos;
}