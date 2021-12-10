-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 déc. 2021 à 21:26
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
-- Base de données : `ticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idcomment` int(11) NOT NULL AUTO_INCREMENT,
  `content` tinytext NOT NULL,
  `date` date NOT NULL,
  `ticket_idticket` int(11) NOT NULL,
  PRIMARY KEY (`idcomment`),
  KEY `fk_comment_ticket1_idx` (`ticket_idticket`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`idcomment`, `content`, `date`, `ticket_idticket`) VALUES
(1, 'Bonjour, ca fonctionne toujours pas ', '2021-12-10', 3),
(2, 'Je vous recontacte car ca fonctionne toujours pas.', '2021-12-12', 3);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `idservice` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`idservice`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idservice`, `name`) VALUES
(1, 'Marketing'),
(2, 'Tech');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `idticket` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` tinytext NOT NULL,
  `date` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `service_idservice` int(11) NOT NULL,
  PRIMARY KEY (`idticket`),
  KEY `fk_ticket_service_idx` (`service_idservice`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`idticket`, `title`, `description`, `date`, `status`, `service_idservice`) VALUES
(3, 'Probleme de PC', 'Nop', '2021-12-09', 'Non resolus', 2),
(4, 'Creation de compte ', 'Bonjours je voudrais un compte pour Adobe', '2021-12-09', 'Non resolus', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_ticket1` FOREIGN KEY (`ticket_idticket`) REFERENCES `ticket` (`idticket`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_service` FOREIGN KEY (`service_idservice`) REFERENCES `service` (`idservice`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
