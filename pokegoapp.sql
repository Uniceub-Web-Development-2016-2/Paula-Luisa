-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Set-2016 às 16:20
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pokegoapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(50) COLLATE utf8_bin NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pokemon`
--

CREATE TABLE IF NOT EXISTS `pokemon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_bin NOT NULL,
  `dexNumber` int(11) NOT NULL,
  `attackIv` int(11) NOT NULL,
  `defenseIv` int(11) NOT NULL,
  `staminaIv` int(11) NOT NULL,
  `species` varchar(20) COLLATE utf8_bin NOT NULL,
  `candyForEvolution` int(11) NOT NULL,
  `combatPower` int(11) NOT NULL,
  `quickMove` varchar(20) COLLATE utf8_bin NOT NULL,
  `chargeMove` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(155) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `situation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_pokemon`
--

CREATE TABLE IF NOT EXISTS `user_pokemon` (
  `userId` int(11) NOT NULL,
  `pokemonId` int(11) NOT NULL,
  `dateCaught` date NOT NULL,
  `nickname` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
