# deckbuilder
proyecto deck builder 

Crear base de datos

CREATE DATABASE deckbuilder;
CREATE USER 'deckbuilder'@'localhost' IDENTIFIED BY 'deckbuilder';
GRANT ALL PRIVILEGES ON deckbuilder.* TO 'deckbuilder'@'localhost' WITH GRANT OPTION;


Comenzar aplicación en limpio

mysql -u deckbuilder -p deckbuilder < scripts/db.create.sql

Ejecutar servidor dev
./rundevserver.sh 8000

Librerías
Instalar composer

composer install phpmailer/phpmailer