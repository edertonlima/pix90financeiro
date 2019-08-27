-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 26-Ago-2019 às 10:10
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp90`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `cd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cd_nome` varchar(200) NOT NULL,
  `cd_resumo` varchar(500) DEFAULT NULL,
  `cd_datanascimento` date DEFAULT NULL,
  `cd_cpfcnpj` varchar(18) DEFAULT NULL,
  `cd_rua` varchar(200) DEFAULT NULL,
  `cd_numero` int(11) DEFAULT NULL,
  `cd_bairro` varchar(100) DEFAULT NULL,
  `cd_cidade` varchar(100) DEFAULT NULL,
  `cd_estado` varchar(2) DEFAULT NULL,
  `cd_cep` varchar(9) DEFAULT NULL,
  `cd_email` varchar(200) NOT NULL,
  `cd_telefone` varchar(16) NOT NULL,
  PRIMARY KEY (`cd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`cd_id`, `cd_nome`, `cd_resumo`, `cd_datanascimento`, `cd_cpfcnpj`, `cd_rua`, `cd_numero`, `cd_bairro`, `cd_cidade`, `cd_estado`, `cd_cep`, `cd_email`, `cd_telefone`) VALUES
(1, 'Ederton Cirino Lima', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2019-08-12', '24.875.587-87', 'Rua João Urias Batista', 665, 'Vila Santista', 'Bauru', 'SP', '17054-610', 'marble@gmail.com', '(14) 9 9825-2545'),
(5, 'Lívia Lorena Lima', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1975-01-25', '24.875.587-87', 'Rua João Urias Batista', 665, 'Vila Santista', 'Bauru', 'SP', '17054-610', 'livia@gmail.com', '(14) 9 9985-2585'),
(4, 'Rogério Rodrigues da Silva', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1975-01-25', '24.875.587-87', 'Rua João Urias Batista', 665, 'Vila Santista', 'Bauru', 'SP', '17054-610', 'rogeriosilva@gmail.com', '(14) 9 9985-2585'),
(6, 'Carlos Eduardo Ramos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1975-01-25', '24.875.587-87', 'Rua João Urias Batista', 665, 'Vila Santista', 'Bauru', 'SP', '17054-610', 'carlos_edu@gmail.com', '(14) 9 9985-2585'),
(7, 'Junior Castro Pereira Silva', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1975-01-25', '24.875.587-87', 'Rua João Urias Batista', 665, 'Vila Santista', 'Bauru', 'SP', '17054-610', 'juniorcastro@hotmail.com', '(14) 9 9985-2585'),
(8, 'Bruna Moreira', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1975-01-25', '24.875.587-87', 'Rua João Urias Batista', 665, 'Vila Santista', 'Bauru', 'SP', '17054-610', 'bruna@yahoo.com', '(14) 9 9985-2585'),
(9, 'Roberto Macedo', NULL, NULL, NULL, 'Rua Júlio de Mesquita', 245, 'Vila União', 'João Pessoa', ' ', '17549862', 'robertomacedo@gmail.com', '(54) 4 9879-7879'),
(10, 'Roberto Macedo', NULL, NULL, NULL, 'Rua Júlio de Mesquita', 245, 'Vila União', 'João Pessoa', ' ', '17549862', 'robertomacedo@gmail.com', '(54) 4 9879-7879'),
(12, 'Poliana Rodrigues', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', NULL, 'poliana@gmail.com', '(14) 6565-65565'),
(13, 'Luiza Roberta', NULL, '2019-08-27', NULL, NULL, NULL, NULL, NULL, ' ', NULL, 'luiza@gmail.com', '(14) 5 6454-2313'),
(14, 'Julia Silvas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', NULL, 'juliana@gmail.com', '(14) 5 6212-3121'),
(15, 'Juliana Robles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', NULL, 'asdasda@asdsdad', '(14) 1562-31321'),
(16, 'Paulo Lima', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', NULL, 'asdadad@adadad.com', '(14) 5123-21323');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `ct_nome` varchar(200) NOT NULL,
  `ct_color` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`ct_id`, `ct_nome`, `ct_color`) VALUES
(2, 'Salário', '#A52A2A'),
(3, 'Manutenções', '#A52A2A'),
(4, 'Escritório', '#FFD700'),
(5, 'Transporte', '#548963'),
(6, 'Transporte', '#548963'),
(117, 'teste nova categoria', 'rgb(82, 214, 255)'),
(8, 'Marketing', '#540987'),
(9, 'Marketing', '#540987'),
(11, 'Supermercado', '#456789'),
(12, 'Farmacia', '#741258'),
(13, 'Investimento', '#876532'),
(15, 'Padaria', '#456765'),
(17, 'Manutenção Geral', 'rgb(131, 132, 216'),
(19, 'Automóvel', 'rgb(57, 196, 255)'),
(20, 'General', 'rgb(252, 184, 19)'),
(23, 'Mecânica', 'rgb(245, 81, 66)'),
(27, 'Compras', 'rgb(76, 86, 97)'),
(29, 'Mercado', 'rgb(240, 240, 240)'),
(113, 'Sol', 'rgb(255, 215, 25)'),
(31, 'farmacia', 'rgb(245, 81, 66)'),
(32, 'Estudos', 'rgb(255, 215, 25)'),
(118, 'teste nova categoria', 'rgb(82, 214, 255)'),
(35, 'readad', 'rgb(158, 221, 148)'),
(76, 'Passeios', 'rgb(225, 75, 70)'),
(74, 'Suplementos', 'rgb(57, 196, 255)'),
(39, 'Investimento', 'rgb(82, 214, 255)'),
(116, 'Teste nova categoria', ''),
(114, 'teste', 'rgb(57, 196, 255)'),
(115, 'ok', 'rgb(227, 243, 198)'),
(73, 'Água', 'rgb(221, 255, 255)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `metodo_pagamento`
--

DROP TABLE IF EXISTS `metodo_pagamento`;
CREATE TABLE IF NOT EXISTS `metodo_pagamento` (
  `mp_id` int(11) NOT NULL,
  `mp_nome` varchar(200) DEFAULT NULL,
  `mp_info` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`mp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `nt_id` int(11) NOT NULL AUTO_INCREMENT,
  `nt_data` date NOT NULL,
  `nt_texto` varchar(1000) NOT NULL,
  PRIMARY KEY (`nt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE IF NOT EXISTS `pagamento` (
  `pg_id` int(11) NOT NULL AUTO_INCREMENT,
  `pg_descricao` varchar(300) NOT NULL,
  `pg_data` date NOT NULL,
  `pg_valor` float NOT NULL,
  `pg_datapagamento` date DEFAULT NULL,
  `pg_observacao` varchar(500) DEFAULT NULL,
  `ct_id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  PRIMARY KEY (`pg_id`),
  KEY `categoria_pagamento` (`ct_id`),
  KEY `cadastro_pagamento` (`cd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`pg_id`, `pg_descricao`, `pg_data`, `pg_valor`, `pg_datapagamento`, `pg_observacao`, `ct_id`, `cd_id`) VALUES
(22, 'adadad', '2019-08-24', 23.23, NULL, 'aadadad', 73, 1),
(23, 'adadad', '2019-08-24', 23.23, NULL, 'aadadad', 73, 1),
(24, 'adasdadad', '2019-09-10', 200, NULL, 'asdadadad', 4, 4),
(25, 'adada', '2019-08-24', 121212, NULL, '', 73, 1),
(17, 'Novo Computador', '2019-08-27', 2520, NULL, 'Computadores para o escritório', 4, 1),
(18, 'addad', '2019-08-24', 1.31, NULL, '', 73, 1),
(19, 'aad', '2019-08-24', 1212.12, NULL, '', 73, 1),
(20, 'ada', '2019-08-24', 111111, NULL, '', 73, 1),
(8, 'Manutenção ar condicionada', '2019-08-26', 3520, '2019-08-24', 'Manutenção preventivaa', 4, 8),
(15, 'Teste', '2019-08-23', 15, NULL, 'Teste', 27, 1),
(16, 'teste', '2019-08-24', 2000, NULL, 'Testes', 19, 4),
(12, 'Salário Secretária', '2019-08-23', 1500, '2019-08-24', 'Salário de Agosto', 2, 15),
(26, 'aad', '2019-08-24', 2123.13, NULL, '', 73, 1),
(21, 'adadad', '2019-08-24', 23.23, NULL, 'aadadad', 73, 1),
(27, 'aad', '2019-08-24', 2123.13, NULL, '', 73, 1),
(28, '232231', '2019-08-24', 123.13, NULL, '', 73, 1),
(29, 'adasdadad', '2019-09-10', 200, NULL, 'asdadadad', 4, 4),
(30, 'teste dadada ada da ', '2019-08-24', 2342.42, NULL, 'adad', 73, 1),
(31, 'Teclado', '2019-08-24', 100, NULL, 'adaadd', 19, 1),
(32, 'teste', '2019-08-24', 121.21, NULL, 'adada', 73, 1),
(33, 'teste', '2019-08-24', 121.21, NULL, 'adada', 73, 1),
(34, 'qeqeqe', '2019-08-24', 12.13, NULL, '', 73, 1),
(35, 'adasdadad', '2019-09-10', 200, NULL, 'asdadadad', 4, 4),
(36, 'teste 2', '2019-08-25', 1000, NULL, '', 73, 1),
(37, 'Teste dada d', '2019-07-01', 1212.12, NULL, '', 73, 1),
(38, 'Teste dada dda ad ', '2019-05-01', 1212.12, NULL, '', 73, 1),
(39, '222eda ada d ', '2019-05-16', 1212.12, NULL, '', 73, 1),
(40, 'weqe qe ', '2019-05-29', 1212.12, NULL, '', 73, 1),
(41, 'aaa dd  dada da a ', '2019-06-13', 1212.12, NULL, '', 73, 1),
(42, 'adaczxcvxv', '2019-06-28', 1212.12, NULL, '', 73, 1),
(43, 'wqeqe ada dad', '2019-06-28', 1212.12, NULL, '', 73, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
