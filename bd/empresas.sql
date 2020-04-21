-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Ago-2017 às 02:21
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empresas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `code` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `inscricao_municipal` varchar(10) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `datainscricao` date DEFAULT NULL,
  `data_situacao` date DEFAULT NULL,
  `nome_extra` text,
  `uf` tinytext,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `atividade_principal` int(11) DEFAULT NULL,
  `atividades_secundarias` int(11) DEFAULT NULL,
  `situacao` text,
  `bairro` text,
  `logradouro` text,
  `numero` int(11) DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `municipio` text,
  `abertura` date DEFAULT NULL,
  `natureza_juridica` text,
  `fantasia` text,
  `cnpj` varchar(50) DEFAULT NULL,
  `ultima_atualizacao` text,
  `status` varchar(10) DEFAULT NULL,
  `tipo_extra` varchar(20) DEFAULT NULL,
  `complemento` text,
  `efr` text,
  `motivo_situacao` text,
  `situacao_especial` text,
  `data_situacao_especial` date DEFAULT NULL,
  `capital_social` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_atividades`
--

CREATE TABLE `empresa_atividades` (
  `codigo_empresa` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
