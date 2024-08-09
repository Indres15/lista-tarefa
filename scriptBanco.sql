CREATE DATABASE IF NOT EXISTS db_tarefas;

CREATE TABLE IF NOT EXISTS db_tarefas.tarefas (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(40) NOT NULL,
    descricao TEXT,
    prazo DATE,
    prioridade INTEGER(1),
    concluida BOOLEAN
);

CREATE TABLE IF NOT EXISTS db_tarefas.anexos (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    idtarefa INTEGER NOT NULL,
    nome VARCHAR(255),
    arquivo VARCHAR(255)
);

ALTER TABLE db_tarefas.anexos ADD CONSTRAINT FOREIGN KEY (idtarefa)
REFERENCES db_tarefas.tarefas(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

INSERT INTO db_tarefas.tarefas (nome, descricao, prioridade)
VALUES ('Estudar PHP', 'Estudar PHP para o backend do site', 3);

INSERT INTO db_tarefas.tarefas (nome, descricao, prazo, prioridade, concluida)
VALUES ('Estudar SQL', 'Estudar SQL para criar a estrutura do banco', '2024-07-10', 3, 0);
