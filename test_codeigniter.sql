-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2012 at 02:29 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `nome` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `created`, `updated`, `nome`, `status`) VALUES
(7, '2012-09-06 23:54:44', '2012-09-06 23:55:00', 'Categoria de teste', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `sufixo` varchar(10) NOT NULL,
  `imagem` varchar(64) NOT NULL,
  `produto_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `imagens`
--

INSERT INTO `imagens` (`id`, `created`, `updated`, `sufixo`, `imagem`, `produto_id`, `status`) VALUES
(26, '2012-09-07 00:29:07', '0000-00-00 00:00:00', 'test_sufix', '95d7fddb16c1b3f0a0a27bd4fa46c1f8.jpg', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` varchar(255) NOT NULL,
  `updated` datetime NOT NULL,
  `referencia` varchar(10) NOT NULL,
  `descricao` varchar(128) NOT NULL,
  `categoria_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `created`, `updated`, `referencia`, `descricao`, `categoria_id`, `status`) VALUES
(7, '2012-09-06 23:54:07', '2012-09-06 23:55:05', 'REF', 'Descrição vai aqui', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'stevneves', '698dc19d489c4e4db73e28a713eab07b', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
