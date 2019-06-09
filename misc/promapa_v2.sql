-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2019 às 21:56
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promapa_v2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `numeroProtocolo` bigint(12) NOT NULL,
  `cnpj` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `razaoSocial` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nomeFantasia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataConstituicao` date NOT NULL,
  `anotacao` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nomeContato` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `usuario_id`, `numeroProtocolo`, `cnpj`, `razaoSocial`, `nomeFantasia`, `dataConstituicao`, `anotacao`, `telefone`, `email`, `nomeContato`, `created_at`, `updated_at`) VALUES
(1, 1, 742617000027, '45781347000157', 'João da Silva Barbosa ME', 'Empresa do João', '0000-00-00', 'Cliente ligou para o funcionario admin', '11999999999', 'joao@barbosa.com.br', 'João Barbosa', '2019-06-07', NULL),
(2, 1, 785412369856, '02556741000189', 'Pablo Santos Lopes LTDA', 'Pablinros CO', '2005-06-12', 'Ligou para o funcionario admin', '11982866202', 'sac@pablinros.om.br', 'Pablinros', '2019-06-07', NULL),
(15, 1, 23456789213, '12345678910', 'Razão de Teste', 'Leandro Henrique Martins', '2008-12-21', 'anotação', '1121566476', 'snewor@hotmail.com', 'Leandro Henrique Martins', '2019-06-09', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logacessos`
--

CREATE TABLE `logacessos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logprotocolos`
--

CREATE TABLE `logprotocolos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `logprotocolos`
--

INSERT INTO `logprotocolos` (`id`, `cliente_id`, `usuario_id`, `created_at`) VALUES
(3, 15, 1, '2019-06-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `codigo` int(10) NOT NULL,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `codigo`, `nome`, `senha`, `created_at`) VALUES
(1, 1234, 'admin', 'admin', '2019-06-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numeroProtocolo` (`numeroProtocolo`),
  ADD KEY `ID Usuario` (`usuario_id`);

--
-- Indexes for table `logacessos`
--
ALTER TABLE `logacessos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `logprotocolos`
--
ALTER TABLE `logprotocolos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `logacessos`
--
ALTER TABLE `logacessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logprotocolos`
--
ALTER TABLE `logprotocolos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `ID Usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `logacessos`
--
ALTER TABLE `logacessos`
  ADD CONSTRAINT `logacessos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `logprotocolos`
--
ALTER TABLE `logprotocolos`
  ADD CONSTRAINT `logprotocolos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `logprotocolos_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
