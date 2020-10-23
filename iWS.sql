CREATE DATABASE iWatchSolution
    DEFAULT CHARACTER SET utf8;

USE iWatchSolution;

CREATE TABLE AdminNeg(
id INT NOT NULL UNIQUE AUTO_INCREMENT,
Admin varchar(50) NOT NULL UNIQUE,
Password varchar(255) NOT NULL,
PRIMARY KEY(id)
);


CREATE TABLE UsuarioNeg(
id INT NOT NULL UNIQUE AUTO_INCREMENT,
EmailNeg varchar(50) NOT NULL UNIQUE,
UsuarioNeg varchar(50) NOT NULL UNIQUE,
PasswordNeg varchar(255) NOT NULL,
DireccionNeg varchar(255) NOT NULL,
CiudadNeg varchar(25) NOT NULL,
TelefonoNeg BIGINT NOT NULL UNIQUE,
FechaRegistro DATETIME NOT NULL,
PRIMARY KEY(id)
);


CREATE TABLE NotaNeg(
id INT NOT NULL UNIQUE AUTO_INCREMENT,
Autor_id INT,
GuiaEnvio varchar(50),
NombreNota varchar(100) NOT NULL,
TelefonoNota BIGINT,
ModeloNota varchar(20) NOT NULL,
IMEINota varchar(20) NOT NULL,
PasswordNota varchar(25),
PantallaRota varchar(20),
PantallaRayada varchar(20),
Enciende varchar(20),
Mojado varchar(20),
ObservacionesNota TEXT CHARACTER SET utf8,
FechaRegistro DATETIME NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(Autor_id)
    REFERENCES UsuarioNeg(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);