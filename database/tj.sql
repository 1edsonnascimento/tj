create database tj default charset utf8 collate utf8_general_ci;
use tj;
create table usuario(
idUsuario int not null auto_increment primary key,
nome varchar(100) not null,
cpf char(11),
logradouro enum("Rua","Avenida","Outros"),
endereco varchar(100),
numero varchar(10),
bairro varchar(100),
cep varchar(10),
cidade varchar(100),
uf char(2),
circuito varchar(10),
dtBatismo date,
dtNascimento date,
status enum("ativo","inativo") not null,
obs Text
)default charset = utf8;

create table relatorio(
idRelatorio int not null auto_increment primary key,
publicacoes tinyInt,
videos tinyInt unsigned ,
horas decimal(5,2),
visitas tinyInt unsigned,
estudos tinyInt unsigned,
dat date,
idUsuario int not null,
foreign key(idUsuario) references usuario(idUsuario)
)default charset = utf8;

create table login(
idLogin int not null auto_increment primary key,
username varchar(50) not null,
senha varchar(100) not null,
permissoes enum("1","2","3"),
idUsuario int not null,
foreign key(idUsuario) references usuario(idusuario)
)default charset=utf8;