-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 01 août 2019 à 21:41
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `surname`, `firstname`) VALUES
(21, 'Françoise89', 'francoise89@email.com', '$2y$10$B43vC5F9WUft9YtpCaUaPOkAQHi1F6fiWsXH6WMy/9Hew7ukvXJFa', 'Françoise', 'Chaloupe'),
(20, 'Sandrine07', 'sandrine07@email.com', '$2y$10$B43vC5F9WUft9YtpCaUaPOkAQHi1F6fiWsXH6WMy/9Hew7ukvXJFa', 'Sandrine', 'Dulac'),
(17, 'Luc12', 'luc12@email.fr', '$2y$10$B43vC5F9WUft9YtpCaUaPOkAQHi1F6fiWsXH6WMy/9Hew7ukvXJFa', 'Luc', 'Moulin'),
(16, 'John44', 'john44@email.com', '$2y$10$B43vC5F9WUft9YtpCaUaPOkAQHi1F6fiWsXH6WMy/9Hew7ukvXJFa', 'John', 'Doe'),
(19, 'David63', 'david63@email.com', '$2y$10$B43vC5F9WUft9YtpCaUaPOkAQHi1F6fiWsXH6WMy/9Hew7ukvXJFa', 'David', 'Fermier'),
(18, 'Apicultor', 'apicultor@email.com', '$2y$10$B43vC5F9WUft9YtpCaUaPOkAQHi1F6fiWsXH6WMy/9Hew7ukvXJFa', 'Martin', 'Forêt'),
(22, 'Tiphaine72', 'tiphaine72@email.com', '$2y$10$B43vC5F9WUft9YtpCaUaPOkAQHi1F6fiWsXH6WMy/9Hew7ukvXJFa', 'Tiphaine', 'Muraille'),
(23, 'Melanie01', 'melanie01@email.com', '$2y$10$B43vC5F9WUft9YtpCaUaPOkAQHi1F6fiWsXH6WMy/9Hew7ukvXJFa', 'Mélanie', 'Surault'),
(24, 'Paul02', 'paul@email.com', '$2y$10$B43vC5F9WUft9YtpCaUaPOkAQHi1F6fiWsXH6WMy/9Hew7ukvXJFa', 'Paul', 'Tertre'),
(25, 'Mireille41', 'mireille41@email.com', '$2y$10$O841E5pNA3pBxfPfL7yF3OZP55i0sMOVrM3OUV70q/0wPi4FW6a5i', 'Mireille', 'Vigne'),
(26, 'Claude10', 'claude10@email.com', '$2y$10$HdonSeUt5EtTFk97p3Yil.SxKgtH0JkO7QRn.5WpuHIHua.QiheT6', 'Claude', 'Boucher');

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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `friendship_links`
--

INSERT INTO `friendship_links` (`id`, `user_1_id`, `user_2_id`) VALUES
(26, 21, 22),
(25, 17, 18),
(24, 19, 18),
(23, 17, 19),
(27, 21, 23),
(38, 18, 20),
(39, 18, 21),
(30, 20, 26),
(29, 20, 25),
(28, 16, 24),
(35, 16, 20);

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
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `friendship_requests`
--

INSERT INTO `friendship_requests` (`id`, `sender_id`, `receiver_id`) VALUES
(67, 21, 19);

-- --------------------------------------------------------

--
-- Structure de la table `hive_incidents`
--

DROP TABLE IF EXISTS `hive_incidents`;
CREATE TABLE IF NOT EXISTS `hive_incidents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hive_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `incident` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hive_incidents`
--

INSERT INTO `hive_incidents` (`id`, `hive_id`, `owner_id`, `incident`) VALUES
(13, 33, 24, 'Après grand vent, partie cassée'),
(12, 25, 20, 'La ruche est ouverte !'),
(14, 29, 19, 'Ca déborde ! Recolte en urgence !');

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hive_markers`
--

INSERT INTO `hive_markers` (`id`, `account_id`, `name`, `address`, `lat`, `lng`, `private`) VALUES
(33, 24, 'Ruche Poire', 'rue Costes & Lebrix, 44000 Nantes', 47.230427, -1.564443, 0),
(32, 23, 'Ruche Pivoinne', 'rue du Bois, 44000 Nantes', 47.201752, -1.596154, 0),
(31, 22, 'Ruche du lycée', 'rue Gaëtan Rondeau, 44000 Nantes', 47.208546, -1.532722, 0),
(30, 18, 'Parc des Dervallières', 'Parc des Dervalières, 44000 Nantes', 47.224941, -1.593030, 0),
(29, 19, 'Ruche Veolia', 'rue Françoise Giroud, 44000 Nantes', 47.209045, -1.540698, 0),
(28, 16, 'Parc de Beaulieu', 'Parc de Beaulieu, 44000 Nantes', 47.212234, -1.523138, 0),
(27, 17, 'Parc de Procé', 'Boulevard des Anglais, 44000 Nantes', 47.223801, -1.582631, 0),
(26, 20, 'Tennis Club 2', 'rue des Champs Garnier, 44400 Rezé', 47.182270, -1.567478, 0),
(25, 20, 'Tennis Club 1', 'rue des Champs Garnier, 44400 Rezé', 47.182327, -1.567564, 0),
(24, 21, 'Parc de la Moutonnerie', 'rue Tivoli, 44000 Nantes', 47.220840, -1.533229, 0),
(23, 21, 'Jardin des Plantes', 'Boulevard de Stalingrad, 44000 Nantes', 47.220009, -1.543264, 0),
(34, 25, 'Ruche de la terrasse', 'Terrasse des Vents, 44000 Nantes', 47.205448, -1.570140, 0),
(35, 26, 'Ruche publique', 'Square Vertais; 44000 Nantes', 47.202133, -1.546141, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
