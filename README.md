# crud
Um sistema simples de cadastro em php



Instalar XAMPP
Start Apache
Start Mysql
Clicar em 'ADMIN' no mysql
Colar o código SQL abaixo

Após, acessar: http://localhost/crud/index.html

ADM login: root
ADM senha: root

//////////////////////////////////// CÓDIGO SQL /////////////////////////////////////////


DROP DATABASE IF EXISTS crud;
CREATE DATABASE crud;

USE crud;

CREATE TABLE usuario
(
    id_usuario INTEGER NOT NULL AUTO_INCREMENT,
    nome_usuario VARCHAR (45) NOT NULL,
    telefone_usuario VARCHAR(11),
    cpf CHAR (11) NOT NULL,
    cnh CHAR (11),
    endereco_usuario VARCHAR (45) ,
    carro VARCHAR (30),
    
    PRIMARY KEY(id_usuario)    
);

CREATE TABLE usuarios
(
	id INTEGER UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
	login VARCHAR(30) NOT NULL,
	senha VARCHAR(40) NOT NULL,

	PRIMARY KEY (id)) ENGINE = MyISAM;

CREATE TABLE empresa
(
	id_empresa INTEGER NOT NULL AUTO_INCREMENT,
    nome_empresa VARCHAR(45) NOT NULL,
    nome_fantasia VARCHAR (45) NOT NULL,
    cnpj CHAR (14) NOT NULL,
    endereco_empresa VARCHAR(45),
    telefone VARCHAR(11),
    id_adm INTEGER,
    
    PRIMARY KEY (id_empresa),
    FOREIGN KEY (id_adm) REFERENCES usuario(id_usuario) ON DELETE CASCADE
);
 
/////////////////////////////////////////////////////////////////////////////////////////
