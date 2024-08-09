<div class="card">
    <div class="card-header">
        <div class="d-grid gap-2 d-md-block">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Nova-Tarefa">Nova Tarefa</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tarefa</th>
                        <th>Descrição</th>
                        <th>Prazo</th>
                        <th>Prioridade</th>
                        <th>concluída</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaTarefas as $tarefa) : ?>
                    <tr class="<?php echo tarefaConcluida($tarefa['concluida']); ?>">
                        <td>
                            <a href="tarefa.php?id=<?php echo $tarefa['id']; ?>">
                                <?php echo $tarefa['nome']; ?>
                            </a>
                        </td>
                        <td><?php echo $tarefa['descricao']; ?></td>
                        <td><?php echo dataParaExibir($tarefa['prazo']); ?></td>
                        <td><?php echo prioridade($tarefa['prioridade']); ?></td>
                        <td><?php echo converteConcluida($tarefa['concluida']); ?></td>
                        <td>
                            <div class="dropdown">
                                <span data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </span>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="editar.php?id=<?php echo $tarefa['id']; ?>">Editar</a>
                                    <a class="dropdown-item" href="remover.php?id=<?php echo $tarefa['id']; ?>">Remover</a>
                                    <a class="dropdown-item"
                                        href="finalizarTarefa.php?id=<?php echo $tarefa['id']; ?>">Finalizar</a>

                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="Nova-Tarefa" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Nova Tarefa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php require "formulario.php"; ?>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
