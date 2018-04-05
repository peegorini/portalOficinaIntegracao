-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Mar-2018 às 21:20
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetooficina`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

DROP TABLE IF EXISTS `jogos`;
CREATE TABLE IF NOT EXISTS `jogos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `hash_arquivo` varchar(40) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `nome`, `descricao`, `hash_arquivo`, `id_usuario`) VALUES
(5, 'msvcr100', 'Pequena Descricao do Jogo!', '1321717ba86552a52f1c5c218dc4003eb7894d62', 1),
(6, 'PHPMailer-master', 'Pequena Descricao do Jogo!', 'da715fb9f55a7907ef42b3ad88139c13962aef67', 16),
(7, 'PHPMailer-master', 'Pequena Descricao do Jogo!', '6fc4704daf3cba030a5065f2485ef264249eae7d', 16),
(8, 'learningPixi-master', 'Pequena Descricao do Jogo!', 'a542da235cbf7e990a6fe493a0a9b42b8ebba8af', 16),
(9, 'php_projeto_tags', 'Pequena Descricao do Jogo!', '9ec6506ca6ff99a6e69f083a78cfc9e0c8f26130', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ra` int(7) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `niveldeacesso` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `ra`, `email`, `nome`, `senha`, `niveldeacesso`) VALUES
(1, 1776533, 'jeanlondero@gmail.com', 'Jean', '51f8b1fa9b424745378826727452997ee2a7c3d7', 1),
(2, 1569847, 'joseantonio@gmail.com', 'José Antônio', '30bfeb65f9370e03fd841b90b2f5e3d91de19883', 1),
(3, 1569847, 'joseantonio@gmail.com', 'José Antônio', '30bfeb65f9370e03fd841b90b2f5e3d91de19883', 1),
(4, 1569847, 'joao@gmail.com', 'João', '3e379f3a5d212b5d0f0a17133293df654e4b7ceb', 1),
(5, 1569847, 'joao@gmail.com', 'João', '970d38f2c16cf9dbba8fa7200c28370eab9f6deb', 1),
(6, 1353558, 'jessica@gmail.com', 'Jéssica Iara Pegorini', 'cdfc7e8dd4f9c60611e934ef4b74750929a67526', 1),
(7, 1764935, 'alexandre@gmail.com', 'Alexandre', 'cd3059d14eb56a5e13c6d9b54581f338b2db8141', 1),
(8, 1652869, 'demiocavalcante@utfpr.edu.br', 'Demio Cavalcante', '4adca71dc205e064a748c3ac1999a7c57f4461ff', 1),
(9, 1518453, 'uranio@gmail.com', 'Uranio', '1fac093cdc7088311ae40b1f86d6f59b2bc1d763', 1),
(10, 1695169, 'jackson@utfpr.br', 'Jackson', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(11, 1476539, 'luisfelipe@gmail.com', 'Luis Felipe', '972fa127b3706a5eecf8766fcc872d80e3cdfd83', 1),
(12, 1476539, 'luisfelipe@gmail.com', 'Luis Felipe', 'c7a6b890a9ab94754ee5ddf70ae0f350f099174f', 1),
(13, 1476539, 'luisfelipe@gmail.com', 'Luis Felipe', 'b736f9fec47abf0aefedbb0c8748a571b206fe6f', 1),
(14, 1476539, 'luisfelipe@gmail.com', 'Luis Felipe', '3c9c5e761a050099eef6096239e014d5341c97c2', 1),
(15, 1476539, 'luisfelipe@gmail.com', 'Luis Felipe', '6ebf143833a860bc16fac2d1d93c0483af65854c', 1),
(16, 1768452, 'marco@gmail.com', 'Marco de Lima', '3829486b93ec44395f0b980424bae9b6fb07b7bc', 1),
(17, 5412369, 'teste@gmail.com', 'Teste', '97fcc7c4f1df18696b23ef9a44efc36482e9e51a', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_tokens`
--

DROP TABLE IF EXISTS `usuarios_tokens`;
CREATE TABLE IF NOT EXISTS `usuarios_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `usado` tinyint(1) NOT NULL DEFAULT '0',
  `expira_em` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_tokens`
--

INSERT INTO `usuarios_tokens` (`id`, `id_usuario`, `hash`, `usado`, `expira_em`) VALUES
(1, 1, '497d03f17ba9cbc57079630fbe5311ae1c5d4935', 0, '2018-04-27 02:54:00'),
(2, 6, '74168919f81e015e6913eb566613408d56ae2354', 1, '2018-04-27 03:25:00'),
(3, 8, '41aa60a956399ddaee04cb8b305e8fb35ed7af18', 1, '2018-04-27 21:39:00'),
(4, 10, 'c2bc161a684d99abbb12ba2c05ee1cf6c6aea1f6', 1, '2018-04-28 00:21:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
