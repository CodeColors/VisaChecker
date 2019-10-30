-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 30 oct. 2019 à 15:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `visa`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte_client`
--

DROP TABLE IF EXISTS `compte_client`;
CREATE TABLE IF NOT EXISTS `compte_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `metier` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte_client`
--

INSERT INTO `compte_client` (`id`, `nom`, `tel`, `metier`) VALUES
(1, 'James Henri', '132-6235', 'EMS');

-- --------------------------------------------------------

--
-- Structure de la table `placements`
--

DROP TABLE IF EXISTS `placements`;
CREATE TABLE IF NOT EXISTS `placements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` int(11) NOT NULL,
  `montant_depot` varchar(255) NOT NULL,
  `interet` varchar(255) NOT NULL,
  `montant_actuel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

DROP TABLE IF EXISTS `pret`;
CREATE TABLE IF NOT EXISTS `pret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` int(11) NOT NULL,
  `montant_base` varchar(255) NOT NULL,
  `montant_total` varchar(255) NOT NULL,
  `montant_restant` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `rank` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `rank`) VALUES
(10, 'test', '$2y$10$GOrNJsEFDIP5D4JwPmRixOphq2XlVT1VoGH6jGDQAMc5UKeRFm5Ki', 0),
(8, 'James', '$2y$10$0kLyINfxbC7iR2LUVeo4keJIzz6ry5NoWf9j0v6zOT6zSKOEqxJ/.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `visas`
--

DROP TABLE IF EXISTS `visas`;
CREATE TABLE IF NOT EXISTS `visas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `discord` text NOT NULL,
  `nomrp` text NOT NULL,
  `age` text NOT NULL,
  `horaires` text NOT NULL,
  `experience` text NOT NULL,
  `traits` text NOT NULL,
  `description` text NOT NULL,
  `futur` text NOT NULL,
  `checked` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visas`
--

INSERT INTO `visas` (`id`, `date`, `discord`, `nomrp`, `age`, `horaires`, `experience`, `traits`, `description`, `futur`, `checked`) VALUES
(3, '15-Sep-2019', 'piaf#8250', 'James Henri', '17 ans', 'Lundi->17h30 ----> 22h\r\nMardi->17h30 ----> 22h\r\nMercredi->15h00 ----> 22h\r\nJeudi->17h30 ----> 22h\r\nVendredi->17h30 ----> 00h\r\nSamedi->8h30 ----> 00h\r\nDimanche->8h30 ----> 00h', 'J\'ai de l\'experience', 'Ambiteux, Gentil et Raisonné', 'sdfsdfsdfdfsdfsf', 'Patron EMS', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
