-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Juin 2017 à 15:15
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_shopi183`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_category`
--

CREATE TABLE `t_category` (
  `idCategory` int(11) NOT NULL,
  `catName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_category`
--

INSERT INTO `t_category` (`idCategory`, `catName`) VALUES
(1, 'Vêtement'),
(2, 'Sport'),
(3, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `t_product`
--

CREATE TABLE `t_product` (
  `idProduct` int(11) NOT NULL,
  `proName` varchar(50) NOT NULL,
  `proDescription` text,
  `proPrice` float DEFAULT NULL,
  `proQuantity` smallint(6) DEFAULT NULL,
  `proImage` text,
  `proLike` int(11) NOT NULL DEFAULT '0',
  `fkCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_product`
--

INSERT INTO `t_product` (`idProduct`, `proName`, `proDescription`, `proPrice`, `proQuantity`, `proImage`, `proLike`, `fkCategory`) VALUES
(1, 'Pullover', 'Pullover synthétique', 20.9, 10, 'pull.png', 0, 1),
(2, 'Pantalon', 'Pantalon en Jean\'s véritable', 49.9, 25, 'pants.png', 0, 1),
(3, 'Clé Usb ', 'Clé Usb de 4 Go offrant une fiabilité inégalée.', 4.95, 4, 'usb.png', 10, 3),
(4, 'Disque dur externe', 'Disque dur externe de 1 To, idéal pour stocker et sauvegarder vos données de manière sécurisée.', 79.95, 2, 'harddisk.png', 0, 3),
(5, 'T-Shirt Fox', NULL, 14.9, 50, 'shirt1.png', 0, 2),
(6, 'T-Shirt Mignon', NULL, 14.9, 20, 'shirt2.png', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL,
  `useLogin` varchar(20) NOT NULL,
  `usePassword` text NOT NULL,
  `useRight` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `useLogin`, `usePassword`, `useRight`) VALUES
(1, 'admin', '9f6843d26beb6e3052beb711f8c00488', 'admin'),
(2, 'customer', '817f1e14ca0e4d8e1a941b19adda0d3e', 'customer');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `Index_Category` (`fkCategory`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_product`
--
ALTER TABLE `t_product`
  ADD CONSTRAINT `t_product_ibfk_1` FOREIGN KEY (`fkCategory`) REFERENCES `t_category` (`idCategory`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
