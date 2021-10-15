-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 oct. 2021 à 22:13
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_commande` date DEFAULT NULL,
  `id_1` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_1` (`id_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `id` int(11) NOT NULL,
  `id_1` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_1`),
  KEY `id_1` (`id_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `prix` decimal(12,0) DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `image`, `prix`, `stock`) VALUES
(1, 'Mini Powerbank 10000mAh avec 2x ports USB <br> et Lightning, USB-C, câble MicroUSB - 2A', 'prod1.jpg', '39', 60),
(2, 'Chargeur solaire - 8000MAH – noir\r\n', 'prod2.jpg', '24', 42),
(3, 'Banque d’alimentation sans fil<br> Cyke P1 Plus - Sortie: 5V 2.1A (MicroUSB)<br> 2.1A (Type-C), 2A (Lightning) - 20000mAh', 'prod3.jpg', '42', 99),
(4, 'Chargeur magnétique sans fil<br>\r\nBanque d’alimentation pour iPhone 12<br>\r\niPhone 12 Pro, iPhone 12 Pro Max\r\n<br>iPhone 12 Mini', 'prod4.jpg', '54', 56),
(6, 'GreyLime Power Stone II Powerbank <br> USB-C, 2x USB, 12V / 1,5A <br> 10400mAh, 18W', 'prod5.jpg', '39', 60),
(7, 'Prio Fast Charge Powerbank avec & QC3.0<br>\r\n - Li-Poly (3.7V) - Dual USB-A,<br> Type-C - 20000mAh', 'prod6.jpg', '54', 42),
(8, 'Triple USB Fast Powerbank 50000mAh<br> avec écran LCD -, 18W, 3xUSB,<br>Éclairage, Type-C, MicroUSB', 'prod7.jpg', '50', 87),
(9, 'Karlos Legerfeld Ikonica Outline<br> Magnetic Wireless Powerbank pour<br> iPhone 12, iPhone 12 Pro,<br> iPhone 12 Pro Max, <br>iPhone 12 Mini - 3000mAh', 'prod8.jpg', '89', 76),
(10, 'Forever Travel Battery Powerbank<br> avec câble Lightning, ports USB<br> et USB-C - 5000mAh', 'prod9.jpg', '69', 90),
(11, 'Banque d’énergie solaire compacte <br> 10000 mAh, 3xUSB-A 2.1A / 5V', 'prod10.jpg', '78', 45);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `tel` int(22) DEFAULT NULL,
  `motDePasse` varchar(60) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `tel`, `motDePasse`, `email`, `admin`) VALUES
(3, 'GRENADINE', 'adminatorosorusss', 'rue des supers admin', '88000', '00000', 989900989, '$2y$10$XfnhG1p0qfTrubKpATY8.umAvfLM6/gPS5auI5mbvCawOtMp67DDO', 'admin@gmail.com', 1),
(4, 'GRENADINE', 'FRAISE', 'RUE DES PARFUMS DE SIROP', '88000', 'TEISSEIRE', 989900989, '$2y$10$itGjcdLYmnlgLcLsRoMT/eA4WO2wgxQfpBjxkbKn8MahEvbdYROgK', 'utilisateurlamdas@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
