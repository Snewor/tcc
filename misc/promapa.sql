-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Maio-2019 às 03:36
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promapa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `codfuncionario` int(11) NOT NULL,
  `numeroProtocolo` bigint(12) NOT NULL,
  `CNPJ` varchar(18) NOT NULL,
  `razaosocial` varchar(200) NOT NULL,
  `nomefantasia` char(50) NOT NULL,
  `datadeconsti` date DEFAULT NULL,
  `anotacao` varchar(500) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomecontato` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `codfuncionario`, `numeroProtocolo`, `CNPJ`, `razaosocial`, `nomefantasia`, `datadeconsti`, `anotacao`, `telefone`, `email`, `nomecontato`) VALUES
(1, 1, 123456789012, '00.000.000/0001-00', 'CENTRO PAULA SOUZA LTDA', 'ETEC Professor Camargo Aranha', '1998-12-21', 'Escola técnica estadual', '11999999999', 'teste@teste.com.br', 'Camargo'),
(2, 1, 210987654321, '12.123.321/0001-00', 'ISRAEL CORDEIRO DA FONSECA ME', 'Metanoia Sistemas', '2002-08-13', 'Desenvolvimento de sistemas', '11999999999', 'teste@teste.com.br', 'Camargo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
