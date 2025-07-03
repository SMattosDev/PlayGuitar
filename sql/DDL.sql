CREATE DATABASE PlayGuitar;
USE PlayGuitar;

CREATE TABLE usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(255) NOT NULL,
	usuario VARCHAR(255) NOT NULL,
	senha VARCHAR(255) NOT NULL
);

CREATE TABLE categorias (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome_categoria VARCHAR(50) NOT NULL
);

CREATE TABLE musicas (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome_musica VARCHAR(100) NOT NULL,
	artista VARCHAR(100) NOT NULL,
	link_cifra VARCHAR(300) NOT NULL,
	data_cadastro DATE NOT NULL,
	id_usuario INT,
	id_categoria INT,
	FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
	FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);
