-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 11-Jul-2017 às 11:29
-- Versão do servidor: 5.6.11
-- versão do PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `estetica`
--
CREATE DATABASE IF NOT EXISTS `estetica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `estetica`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `servico` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Agendado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `title`, `start`, `end`, `servico`, `status`) VALUES
(1, 'Maycon Amorim  -  Limpeza de Pele', '2017-07-11 10:00:00', '2017-07-11 11:00:00', 'Limpeza de Pele', 'agendado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idclientes` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cli_telefone` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `cli_cpf` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `cli_aniversario` date DEFAULT NULL,
  `cli_email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cli_sexo` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cli_endereco` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cli_bairro` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cli_cidade` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cli_estado` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idclientes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idclientes`, `cli_nome`, `cli_telefone`, `cli_cpf`, `cli_aniversario`, `cli_email`, `cli_sexo`, `cli_endereco`, `cli_bairro`, `cli_cidade`, `cli_estado`) VALUES
(1, 'DANUBIA AMORIM DE LIMA', NULL, NULL, NULL, NULL, NULL, 'RUA CLARA NUNES, 145', 'DA PAZ', 'PARAUAPEBAS', 'PARA'),
(2, 'ROBSON AMORIM DE LIMA', '(94) 99113-6012', '718.961.202-53', '2017-07-10', 'robson.dmtt@gmail.com', 'masculino', 'Rua Clara Nunes, 145', 'da Paz', 'Parauapebas', 'PA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE IF NOT EXISTS `colaboradores` (
  `idcolaboradores` int(11) NOT NULL AUTO_INCREMENT,
  `col_nome` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `col_telefone` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `col_cpf` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `col_aniversario` date DEFAULT NULL,
  `col_email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `col_sexo` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `col_endereco` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `col_bairro` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `col_cidade` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `col_estado` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idcolaboradores`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`idcolaboradores`, `col_nome`, `col_telefone`, `col_cpf`, `col_aniversario`, `col_email`, `col_sexo`, `col_endereco`, `col_bairro`, `col_cidade`, `col_estado`) VALUES
(1, 'IZABELITA SANTOS DE MEDEIROS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comanda`
--

CREATE TABLE IF NOT EXISTS `comanda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_colaborador` int(11) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Aberta',
  PRIMARY KEY (`id`),
  KEY `id_cliente_idx` (`id_cliente`),
  KEY `id_colaborador_idx` (`id_colaborador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `comanda`
--

INSERT INTO `comanda` (`id`, `id_cliente`, `id_colaborador`, `total`, `data`, `status`) VALUES
(1, 1, 1, NULL, '2017-07-10', 'Aberta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nome` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `prod_descricao` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `prod_preco_custo` double(10,2) DEFAULT NULL,
  `prod_preco_venda` double(10,2) DEFAULT NULL,
  `prod_estoque` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `prod_nome`, `prod_descricao`, `prod_preco_custo`, `prod_preco_venda`, `prod_estoque`) VALUES
(1, 'BASE MARY KAY', NULL, 30.00, 50.00, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod_comanda`
--

CREATE TABLE IF NOT EXISTS `prod_comanda` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `id_comanda` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_comanda_idx` (`id_comanda`),
  KEY `id_produto_idx` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serv_nome` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `serv_valor` double(10,2) DEFAULT NULL,
  `serv_comissao` int(11) DEFAULT NULL,
  `serv_profissional` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `serv_nome`, `serv_valor`, `serv_comissao`, `serv_profissional`) VALUES
(1, 'LIMPEZA DE PELE', 130.00, NULL, 'IZABELITA SANTOS DE MEDEIROS'),
(2, 'SOMBRANCELHAS FIO A FIO', 350.00, NULL, 'IZABELITA SANTOS DE MEDEIROS'),
(3, 'Sombrancelhas Henna', 40.00, 0, ' IZABELITA SANTOS DE MEDEIROS ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `serv_comanda`
--

CREATE TABLE IF NOT EXISTS `serv_comanda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `id_comanda` int(11) DEFAULT NULL,
  `id_servico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_comanda_idx` (`id_comanda`),
  KEY `id_servico_idx` (`id_servico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `serv_comanda`
--

INSERT INTO `serv_comanda` (`id`, `quantidade`, `id_comanda`, `id_servico`) VALUES
(1, 1, 1, 2),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `cpf` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `cpf`) VALUES
(0, 'robson', 'controle', '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_colaborador` FOREIGN KEY (`id_colaborador`) REFERENCES `colaboradores` (`idcolaboradores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prod_comanda`
--
ALTER TABLE `prod_comanda`
  ADD CONSTRAINT `id_comanda_pk` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `serv_comanda`
--
ALTER TABLE `serv_comanda`
  ADD CONSTRAINT `id_comanda` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_servico` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
