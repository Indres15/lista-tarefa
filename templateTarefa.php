<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    
    <main>
        <div class="container">
            <h1>Detalhes da tarefa</h1>
            <div class="card w-75 mb-3 mx-auto">
                <div class="card-body">
                    <h5 class="card-title"><strong>Tarefa:</strong> <?php echo $tarefa['nome']; ?> </h5>
                    <p class="card-text"> <?php echo $tarefa['descricao']; ?> </p>
                    <p>
                        <strong>Concluída:</strong>
                        <?php echo converteConcluida($tarefa['concluida']); ?>
                    </p>
                    <p>
                        <strong>Prazo:</strong>
                        <?php echo dataParaExibir($tarefa['prazo']); ?>
                    </p>
                    <p>
                        <strong>Prioridade:</strong>
                        <?php echo prioridade($tarefa['prioridade']); ?>
                    </p>

                    <h2>Anexos:</h2>
        <!-- Lista de anexos de uma tarefa -->
                    <a href="index.php" class="btn btn-primary">Voltar para a lista de tarefas</a>          
                </div>
            </div>
        </div>
    </main>
</body>

</html>
