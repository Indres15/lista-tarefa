
<form method="post">
<div class="mb-3">
  <label for="nome" class="form-label"> Tarefa </label>
  <input type="text" class="form-control" id="nome" name="nome" require >
</div>

<div class="mb-3">
  <label for="descricao" class="form-label"> Descrição </label>
  <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
</div>

<div class="mb-3">
  <label for="prazo" class="form-label"> Prazo </label>
  <input type="date" class="form-control" id="prazo" name="prazo" require >
</div>

</form>











<form method="post">
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
    <fieldset class="container">
        <legend>Nova tarefa</legend>
        <label for="nome">
            Tarefa:
            <input 
                type="text" 
                 
                id="nome" 
                value="<?php echo $tarefa['nome'] ?>"
            />
        </label><br>

        <label for="descricao">
            Descrição (Opcional):
            <textarea 
                name="descricao" 
                id="descricao" 
                cols="30" 
                rows="5"><?php echo $tarefa['descricao']; ?></textarea>
        </label><br>

        <label for="prazo">
            Prazo (Opcional): <span id="dataError" style="color: red; display: none;">Data inválida</span>
            <input 
                type="text" 
                id="prazo" 
                name="prazo" 
                placeholder="Informe apenas números: 00/00/000"
                value="<?php echo dataParaExibir($tarefa['prazo']); ?>"
            >
        </label><br>

        <fieldset>
            <legend>Prioridade:</legend>
            <label for="prioridade">
                <input 
                    type="radio" 
                    name="prioridade" 
                    value="1" 
                    <?php echo $tarefa['prioridade'] == 1 ? "checked" : "" ?>>Baixa
                <input 
                    type="radio" 
                    name="prioridade" 
                    value="2"
                    <?php echo $tarefa['prioridade'] == 2 ? "checked" : ""?>>Média
                <input 
                    type="radio" 
                    name="prioridade" 
                    value="3"
                    <?php echo $tarefa['prioridade'] == 3 ? "checked" : "" ?>>Alta
            </label>
        </fieldset><br>

        <label for="concluida">
            Tarefa concluída:
            <input 
                type="checkbox" 
                name="concluida" 
                id="concluida" 
                value="1"
                <?php echo $tarefa['concluida'] == 1 ? "checked" : ""; ?>
            >
        </label>

        <input type="submit" />
    </fieldset>
</form>