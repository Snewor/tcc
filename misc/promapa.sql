create database contato;

create table usuarios(
usuario_id int not null auto_increment primary key,
codigo int(10) not null,
nome varchar(100) not null,
created_at datetime not null
);

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  usuario_id int,
   FOREIGN KEY (usuario_id) references usuarios (usuario_id),
  `codfuncionario` int(11) NOT NULL,
  `numeroProtocolo` bigint(12) NOT NULL,
  `CNPJ` varchar(18) NOT NULL,
  `razaosocial` varchar(200) NOT NULL,
  `nomefantasia` char(50) NOT NULL,
  `datadeconsti` date DEFAULT NULL,
  `anotacao` varchar(500) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomecontato` varchar(50) NOT NULL,
  created_at datetime not null,
  updated_at datetime
);

create table LogAcessos(
usuario_id int,
LogAc_id int not null primary key auto_increment,
FOREIGN KEY (usuario_id) references usuarios (usuario_id),
created_at  datetime not null
);


create table LogProtocolos(
LogPr_id int not null primary key auto_increment,
FOREIGN KEY (usuario_id) references usuarios (usuario_id),
FOREIGN KEY (idCliente) references cliente (idCliente),
idCliente int,
usuario_id int,
created_at  datetime not null
);