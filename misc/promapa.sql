create database promapa;

CREATE TABLE `Usuario` (
  `id` int not null auto_increment primary key,
  `codigo` int(10) not null,
  `nome` varchar(100) NOT NULL,
  `created_at` datetime not null
);

CREATE TABLE `Cliente` (
  `id` int(11) NOT NULL,
  `usuario_id` int,
  `numeroProtocolo` bigint(12) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `razaoSocial` varchar(200) NOT NULL,
  `nomeFantasia` char(50) NOT NULL,
  `dataConstituicao` date DEFAULT NULL,
  `anotacao` varchar(500) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomeContato` varchar(50) NOT NULL,
  `created_at` datetime not null,
  `updated_at` datetime,
   FOREIGN KEY (usuario_id) references Usuario (id)
);

create table 'LogAcessos'(
`id` int(11) NOT NULL auto_increment primary key,
`usuario_id` int not null,
`created_at`  datetime not null,
FOREIGN KEY (usuario_id) references Usuario (id),
);


create table `LogProtocolos`(
`id` int not null primary key auto_increment,
`cliente_id` int not null,
`usuario_id` int not null,
`created_at` datetime not null,
FOREIGN KEY (usuario_id) references Usuario (id),
FOREIGN KEY (idCliente) references Cliente (id),
);

ALTER DATABASE `promapa` CHARSET = UTF8 COLLATE = utf8_general_ci;
