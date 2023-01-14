DROP TABLE IF EXISTS tokens;
DROP TABLE IF EXISTS usuarios;

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
    name VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    color VARCHAR(255) NOT NULL,
    stage VARCHAR(255) NOT NULL,
    digi_type VARCHAR(255) NOT NULL,
    attribute VARCHAR(255) NOT NULL,
    level INT NOT NULL,
    play_cost INT NOT NULL,
    evolution_cost INT NOT NULL,
    cardrarity VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    dp INT NOT NULL,
    cardnumber VARCHAR(255) NOT NULL PRIMARY KEY,
    maineffect VARCHAR(255),
    sourcceffect VARCHAR(255),
    set_nameVARCHAR(255) NOT NULL,
    card_sets VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL

);