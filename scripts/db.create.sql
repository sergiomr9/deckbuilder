DROP TABLE IF EXISTS tokens;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS cards;

CREATE TABLE usuarios (
    id int auto_increment PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE,
    passwd VARCHAR(255) NOT NULL,
    img    VARCHAR(255),
    correo VARCHAR(255) NOT NULL UNIQUE,
    descripcion TEXT
);

CREATE TABLE tokens (
    id int auto_increment PRIMARY KEY,
    id_usuario int,
    valor VARCHAR(255),
    expiracion DATETIME NOT NULL DEFAULT (NOW() + INTERVAL 7 DAY),
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE cards(
    name VARCHAR(255),
    type VARCHAR(255),
    color VARCHAR(255),
    stage VARCHAR(255),
    digi_type VARCHAR(255),
    attribute VARCHAR(255),
    level INT NULL,
    play_cost INT NULL,
    evolution_cost INT NULL,
    cardrarity VARCHAR(255),
    artist VARCHAR(255),
    dp INT NULL,
    cardnumber VARCHAR(255) PRIMARY KEY,
    maineffect TEXT,
    sourceeffect TEXT,
    set_name VARCHAR(255),
    card_sets TEXT,
    image_url VARCHAR(255) 
);
