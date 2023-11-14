CREATE DATABASE IF NOT EXISTS eleicao;

use eleicao;

CREATE TABLE IF NOT EXISTS candidatos(
id int primary key not null auto_increment,
numero_candidato int not null,
nome_candidato varchar(50) not null,
votos int
);

CREATE TABLE IF NOT EXISTS votantes(
id int primary key not null auto_increment,
email varchar(50) not null	
);

CREATE TABLE IF NOT EXISTS estudantes(
id int primary key not null auto_increment,
nome_estudante varchar(50) not null,
email varchar(50) not null,
senha varchar(50) not null
);

insert into candidatos (numero_candidato, nome_candidato, votos)
values (1, 'jorje', 0),
(2, 'carla', 0),
(3, 'marta', 0);

insert into estudantes (nome_estudante, email, senha)
values ('mateus', 'mateus@gmail.com', 'mateus123'),
('vitor', 'vitor@gmail.com', 'vitor@gmail.com'),
('mariana', 'mariana@gmail.com', 'mariana123');

select * from candidatos;
select * from estudantes;
select * from votantes;