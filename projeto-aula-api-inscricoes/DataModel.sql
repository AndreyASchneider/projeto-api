-- Tabela eventos
CREATE TABLE eventos
(
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nome      VARCHAR(255),
    data      DATE,
    hora      TIME,
    local     VARCHAR(255),
    descricao TEXT
);

-- Tabela usuarios
CREATE TABLE usuarios
(
    id    INT AUTO_INCREMENT PRIMARY KEY,
    nome  VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255)
);

-- Tabela inscricoes
CREATE TABLE inscricoes
(
    id             INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id     INT,
    evento_id      INT,
    data_inscricao DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
    FOREIGN KEY (evento_id) REFERENCES eventos (id)
);

-- Tabela presencas
CREATE TABLE presencas
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id    INT,
    evento_id     INT,
    data_presenca DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
    FOREIGN KEY (evento_id) REFERENCES eventos (id)
);

-- Tabela emails
CREATE TABLE emails
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    destinatario VARCHAR(255),
    assunto      VARCHAR(255),
    corpo        TEXT,
    data_envio   DATETIME
);
CREATE TABLE logs
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    timestamp    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    method       VARCHAR(10),
    endpoint     VARCHAR(255),
    request_body TEXT
);
