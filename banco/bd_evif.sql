-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 15-Jan-2025 às 03:08
-- Versão do servidor: 5.7.25
-- versão do PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_evif`
--
CREATE DATABASE IF NOT EXISTS `bd_evif` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_evif`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `abertocursos`
--
-- Criação: 14-Jan-2025 às 03:16
-- Última actualização: 14-Jan-2025 às 20:49
--

DROP TABLE IF EXISTS `abertocursos`;
CREATE TABLE `abertocursos` (
  `idatividadecurso` int(11) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `abertocursos`:
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--
-- Criação: 07-Jan-2025 às 18:01
-- Última actualização: 15-Jan-2025 às 02:54
--

DROP TABLE IF EXISTS `atividade`;
CREATE TABLE `atividade` (
  `idatividade` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `professor` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `local` varchar(50) NOT NULL,
  `datainicio` date NOT NULL,
  `datafim` date NOT NULL,
  `aberto` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `atividade`:
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--
-- Criação: 06-Jan-2025 às 17:00
-- Última actualização: 14-Jan-2025 às 20:35
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `periodos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `curso`:
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--
-- Criação: 14-Jan-2025 às 17:58
-- Última actualização: 15-Jan-2025 às 02:54
--

DROP TABLE IF EXISTS `inscricao`;
CREATE TABLE `inscricao` (
  `idinscricao` int(11) NOT NULL,
  `idatividade` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `datainscricao` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `inscricao`:
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--
-- Criação: 14-Jan-2025 às 00:22
-- Última actualização: 15-Jan-2025 às 02:55
--

DROP TABLE IF EXISTS `matricula`;
CREATE TABLE `matricula` (
  `matricula` varchar(13) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `matricula`:
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--
-- Criação: 13-Jan-2025 às 17:45
-- Última actualização: 15-Jan-2025 às 02:55
--

DROP TABLE IF EXISTS `solicitacao`;
CREATE TABLE `solicitacao` (
  `idsolicitacao` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nivel` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `solicitacao`:
--   `idusuario`
--       `usuario` -> `idusuario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--
-- Criação: 07-Jan-2025 às 23:52
-- Última actualização: 15-Jan-2025 às 02:55
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int(1) DEFAULT '0',
  `datacriacao` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `usuario`:
--

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `senha`, `nivel`, `datacriacao`) VALUES
(4, 'João Augusto Marciano Silva', 'joao@gmail.com', '123', 0, '2025-01-07 16:46:07'),
(7, 'admin', 'admin@gmail.com', '123', 1, '2025-01-07 20:55:23'),
(8, 'prof', 'prof@gmail.com', 'prof', 2, '2025-01-14 01:09:17'),
(9, 'aluno', 'aluno@gmail.com', 'aluno', 3, '2025-01-14 01:10:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abertocursos`
--
ALTER TABLE `abertocursos`
  ADD PRIMARY KEY (`idatividadecurso`);

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`idatividade`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indexes for table `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`idinscricao`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`idsolicitacao`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abertocursos`
--
ALTER TABLE `abertocursos`
  MODIFY `idatividadecurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atividade`
--
ALTER TABLE `atividade`
  MODIFY `idatividade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `idinscricao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `idsolicitacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD CONSTRAINT `solicitacao_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
