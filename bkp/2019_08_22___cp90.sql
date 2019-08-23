-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 22-Ago-2019 às 23:51
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
(14, 'Juliana Robles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', NULL, 'juliana@gmail.com', '(14) 5 6212-3121'),
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
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`ct_id`, `ct_nome`, `ct_color`) VALUES
(1, 'Geral', '#cccccc'),
(2, 'Salário', '#A52A2A'),
(3, 'Manutenções', '#A52A2A'),
(4, 'Escritório', '#FFD700'),
(5, 'Transporte', '#548963'),
(6, 'Transporte', '#548963'),
(7, 'Equipamentos', '#875621'),
(8, 'Marketing', '#540987'),
(9, 'Marketing', '#540987'),
(11, 'Supermercado', '#456789'),
(12, 'Farmacia', '#741258'),
(13, 'Investimento', '#876532'),
(14, 'Cinema', '#333444'),
(15, 'Padaria', '#456765'),
(17, 'Manutenção Geral', 'rgb(131, 132, 216'),
(18, 'Aora', 'rgb(57, 196, 255)'),
(19, 'Automóvel', 'rgb(221, 255, 255)'),
(20, 'General', 'rgb(252, 184, 19)'),
(23, 'Mecânica', 'rgb(245, 81, 66)'),
(24, 'dddd', 'rgb(154, 222, 223)'),
(25, 'sadzxczczczc', 'rgb(0, 122, 193)'),
(26, 'AOPA', 'rgb(245, 81, 66)'),
(27, 'Compras', 'rgb(76, 86, 97)'),
(28, 'asdadada23424', 'rgb(215, 131, 215'),
(29, 'Mercado', 'rgb(240, 240, 240)'),
(30, 'Novo Teste ', 'rgb(245, 81, 66)'),
(31, 'farmacia', 'rgb(245, 81, 66)'),
(32, 'Estudos', 'rgb(255, 215, 25)'),
(33, 'sadadadad1212', 'rgb(215, 131, 215'),
(34, 'testes', 'rgb(75, 207, 153)'),
(35, 'readad', 'rgb(158, 221, 148)'),
(36, 'adadad', 'rgb(0, 122, 193)'),
(37, 'Ok tes', 'rgb(252, 184, 19)'),
(39, 'Investimento', 'rgb(82, 214, 255)'),
(40, 'adadadadadad', 'rgb(218, 238, 142)'),
(41, 'Ok está corrigindo', 'rgb(57, 196, 255)'),
(42, 'Aparecido', 'rgb(251, 217, 133'),
(43, 'Teste', 'rgb(218, 238, 142)'),
(46, 'asdadadad', 'rgb(82, 214, 255)'),
(73, 'Água', 'rgb(221, 255, 255)'),
(47, 'a', 'rgb(225, 75, 70)'),
(48, 'aa', 'rgb(227, 243, 198)'),
(49, 'aaa', 'rgb(57, 196, 255)'),
(51, 'ab', 'rgb(163, 234, 194)'),
(53, 'Automóvel', 'rgb(0, 122, 193)'),
(61, 'jlkjlkjk', 'rgb(221, 255, 255)'),
(62, 'dadadada', 'rgb(141, 212, 127)'),
(64, 'bb', 'rgb(252, 184, 19)'),
(65, 'zczcz', 'rgb(154, 222, 223)');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`pg_id`, `pg_descricao`, `pg_data`, `pg_valor`, `pg_datapagamento`, `pg_observacao`, `ct_id`, `cd_id`) VALUES
(13, 'Supermercado', '2019-08-13', 250, NULL, '', 1, 15),
(4, 'Sistema de controle de contas', '2019-08-14', 2600, '2019-08-13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ', 1, 15),
(5, 'Mesas do Escritório', '2019-08-12', 2540, NULL, 'Pagamento total', 4, 4),
(6, 'Manutenção ar condicionado', '2019-08-27', 3500, NULL, 'Manutenção preventiva', 3, 7),
(7, 'Manutenção ar condicionado', '2019-08-27', 3500, NULL, 'Manutenção preventiva', 3, 7),
(8, 'Manutenção ar condicionado', '2019-08-27', 3500, NULL, 'Manutenção preventiva', 3, 7),
(9, 'Manutenção ar condicionado', '2019-08-27', 3500, NULL, 'Manutenção preventiva', 3, 7),
(10, 'Novos quadros', '2019-08-20', 100, NULL, '', 1, 9),
(11, 'Janelas Corredor', '2019-08-20', 300, NULL, '', 4, 14),
(12, 'Salário Secretária', '2019-09-10', 1500, NULL, 'Salário de Agosto', 2, 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
