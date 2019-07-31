-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 31 juil. 2019 à 14:50
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project_oc_p5`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `surname`, `firstname`) VALUES
(8, 'testuser2', 'test2@email.com', '$2y$10$QJX.BeRWvpqOLbljb.2V2e21S7bJv8kddznNHQBPty05k9HXjRzC6', 'test2', 'User2'),
(7, 'testuser', 'test@email.com', '$2y$10$HTK.ZYiEoLzhTUe57c32l.gD9YNv7cJchWhhCkW2Dv977AMgAiEym', 'test', 'user'),
(9, 'testuser3', 'test3@email.com', '$2y$10$lahgv2M5hA8C82/BKuXWz.s8SOHxXKmAaEaEssaCyk95.JrLXpXIq', 'test3', 'user3'),
(10, 'yoyo', 'yoyo@yoyo.com', '$2y$10$hzUfaDchhRAW/fN01epRS.lDEMotNGKG4pLRd5c5GM6WlctnTRjcG', 'yoyo', 'yoyo'),
(11, 'toto', 'toto@toto.toto', '$2y$10$BDg3Mqz/9W.ojCOMf6L9OuyGW7MTXinal1fL0KlAVzf.W3hY8QvWy', 'toto', 'toto');

-- --------------------------------------------------------

--
-- Structure de la table `friendship_links`
--

DROP TABLE IF EXISTS `friendship_links`;
CREATE TABLE IF NOT EXISTS `friendship_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_1_id` int(11) NOT NULL,
  `user_2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `friendship_links`
--

INSERT INTO `friendship_links` (`id`, `user_1_id`, `user_2_id`) VALUES
(11, 10, 7),
(10, 11, 10);

-- --------------------------------------------------------

--
-- Structure de la table `friendship_requests`
--

DROP TABLE IF EXISTS `friendship_requests`;
CREATE TABLE IF NOT EXISTS `friendship_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `friendship_requests`
--

INSERT INTO `friendship_requests` (`id`, `sender_id`, `receiver_id`) VALUES
(15, 10, 7);

-- --------------------------------------------------------

--
-- Structure de la table `hive_markers`
--

DROP TABLE IF EXISTS `hive_markers`;
CREATE TABLE IF NOT EXISTS `hive_markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hive_markers`
--

INSERT INTO `hive_markers` (`id`, `account_id`, `name`, `address`, `lat`, `lng`, `private`) VALUES
(1, 8, 'Ruche rouge', '580 Darling Street, Rozelle, NSW', -33.861034, 151.171936, 0),
(2, 8, 'Ruche jaune', '76 Wilford Street, Newtown, NSW', -33.898113, 151.174469, 0),
(3, 8, 'Ruche verte', 'Greenwood Plaza, 36 Blue St, North Sydney NSW', -33.840282, 151.207474, 0),
(4, 8, 'Ruche bleue', '7A, 2 Huntley Street, Alexandria, NSW', -33.910751, 151.194168, 0),
(5, 8, 'Ruche blanche', '16 Foster Street, Surry Hills, NSW', -33.879917, 151.210449, 0),
(6, 8, 'Ruche noire', '43 Macpherson Street, Bronte, NSW', -33.906357, 151.263763, 0),
(7, 8, 'Ruche violette', '60-64 Reservoir Street, Surry Hills, NSW', -33.881123, 151.209656, 0),
(8, 0, 'Ruche orange', '60 Riley Street, Darlinghurst, NSW', -33.874737, 151.215530, 0),
(12, 10, 'testrucheac', '7A, 2 Huntley Street, Alexandria, NSW', -33.924019, 151.244720, 0),
(13, 10, 'ruchemagenta', 'osef', -33.902634, 151.210373, 0),
(14, 10, 'seahive', 'sea', -33.857574, 151.263947, 0),
(15, 10, 'bridgehive', 'test', -33.854153, 151.212784, 0),
(16, 11, 'sdfsdf', 'sdfsdf', -33.861851, 151.246429, 0),
(17, 10, 'Univruche', 'univ', -33.888374, 151.187332, 0),
(18, 11, 'Mascott ruche', 'meh', -33.922836, 151.196304, 0),
(19, 10, 'Lane hive', 'lane', -33.819649, 151.148239, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
