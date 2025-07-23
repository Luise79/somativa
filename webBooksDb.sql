/* escrever create use db ? */
DROP DATABASE IF EXISTS webBooks;
CREATE DATABASE webBooks;
USE webBooks;

CREATE TABLE usuarios (
    id int(11) not null auto_increment,
    username varchar(65) not null unique,
    email varchar(65) not null unique,
    senha varchar(50) not null,
    maiorIdade tinyInt(1) not null,
    primary key(id)
);

CREATE TABLE livros (
    id varchar(65) not null,
    titulo varchar(100),
    genero varchar(30) not null,
    autor varchar(65),
    dataPublicacao date,
    primary key(id)
);

CREATE TABLE recomendados (
    id_usuario int not null,
    cod_livro varchar(100) not null,
    foreign key (id_usuario) references usuarios(id),
    foreign key (cod_livro) references livros(id)
);


INSERT INTO livros (id, titulo, genero, autor, dataPublicacao) VALUES ('livroRomance1', 'Lore Olympus', 'romance', 'Rachel Smythe', '2021-11-02'),
    ('livroRomance2', 'O Cara Que Estou a Fim não É um Cara?!', 'romance', 'Sumiko Arai', '2024-06-20'),
    ('livroTerror1', 'O Estranho Mundo de Jack', 'terror', 'Tim Burton', '1993-12-24'),
    ('livroAcao1', 'One-Punch Man', 'acao', 'ONE', '2012-06-14'),
    ('livroFilosofia1', 'A Biblioteca da Meia-noite', 'filosofia', 'Matt Haig', '2020-08-13');