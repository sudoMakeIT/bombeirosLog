-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Set-2017 às 16:14
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bombeiros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `username` varchar(30) DEFAULT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`username`, `mail`, `password`) VALUES
('teste123', '', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `desporto`
--

CREATE TABLE `desporto` (
  `dia` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `elementos` int(11) DEFAULT NULL,
  `localizacao` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fanfarra`
--

CREATE TABLE `fanfarra` (
  `dia` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `localizacao` varchar(30) DEFAULT NULL,
  `elementos` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

CREATE TABLE `formacao` (
  `dia` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `duracao` varchar(40) DEFAULT NULL,
  `localizacao` varchar(50) DEFAULT NULL,
  `destinatario` varchar(50) DEFAULT NULL,
  `elementos` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao_ex`
--

CREATE TABLE `formacao_ex` (
  `dia` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `duracao` varchar(40) DEFAULT NULL,
  `localizacao` varchar(50) DEFAULT NULL,
  `destinatario` varchar(50) DEFAULT NULL,
  `elementos` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `honor`
--

CREATE TABLE `honor` (
  `dia` date DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `elem` int(11) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `protocolos`
--

CREATE TABLE `protocolos` (
  `dia` date DEFAULT NULL,
  `entidade` varchar(100) DEFAULT NULL,
  `condicoes` text,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `dia` date DEFAULT NULL,
  `numero` int(20) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `socios_empresas`
--

CREATE TABLE `socios_empresas` (
  `dia` date DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `quantia` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `socios_particulares`
--

CREATE TABLE `socios_particulares` (
  `dia` date DEFAULT NULL,
  `evento` varchar(100) DEFAULT NULL,
  `new_members` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `viaturas_antigas`
--

CREATE TABLE `viaturas_antigas` (
  `dia` date DEFAULT NULL,
  `tempo` varchar(40) DEFAULT NULL,
  `localizacao` varchar(30) DEFAULT NULL,
  `manutencao` text,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `visita_estudo`
--

CREATE TABLE `visita_estudo` (
  `dia` date DEFAULT NULL,
  `entidade` varchar(50) DEFAULT NULL,
  `guia` varchar(100) DEFAULT NULL,
  `elementos` int(11) DEFAULT NULL,
  `contacto` varchar(12) NOT NULL,
  `resp` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `obs` text,
  `note` int(4) NOT NULL,
  `arquivo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desporto`
--
ALTER TABLE `desporto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fanfarra`
--
ALTER TABLE `fanfarra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formacao`
--
ALTER TABLE `formacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formacao_ex`
--
ALTER TABLE `formacao_ex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protocolos`
--
ALTER TABLE `protocolos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socios_empresas`
--
ALTER TABLE `socios_empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socios_particulares`
--
ALTER TABLE `socios_particulares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viaturas_antigas`
--
ALTER TABLE `viaturas_antigas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visita_estudo`
--
ALTER TABLE `visita_estudo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desporto`
--
ALTER TABLE `desporto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fanfarra`
--
ALTER TABLE `fanfarra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `formacao`
--
ALTER TABLE `formacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `formacao_ex`
--
ALTER TABLE `formacao_ex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `protocolos`
--
ALTER TABLE `protocolos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `socios_empresas`
--
ALTER TABLE `socios_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `socios_particulares`
--
ALTER TABLE `socios_particulares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `viaturas_antigas`
--
ALTER TABLE `viaturas_antigas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `visita_estudo`
--
ALTER TABLE `visita_estudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
