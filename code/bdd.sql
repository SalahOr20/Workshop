-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour projet_workshop
CREATE DATABASE IF NOT EXISTS `projet_workshop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projet_workshop`;

-- Listage de la structure de la table projet_workshop. email_valide
CREATE TABLE IF NOT EXISTS `email_valide` (
  `id_email_valide` int(11) NOT NULL AUTO_INCREMENT,
  `token` text,
  `duree` date DEFAULT NULL,
  PRIMARY KEY (`id_email_valide`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_workshop. evenement
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `sous_titre` varchar(255) DEFAULT NULL,
  `description` text,
  `img` text,
  `date_evenement` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_workshop. habitant
CREATE TABLE IF NOT EXISTS `habitant` (
  `id_habitant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email_validee` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_habitant`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_workshop. notification
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `id_createur` int(11) DEFAULT NULL,
  `id_demandeur` int(11) DEFAULT NULL,
  `date_reservation` date DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_notification`),
  KEY `id_createur` (`id_createur`),
  KEY `id_demandeur` (`id_demandeur`),
  KEY `id_produit` (`id_produit`),
  CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_createur`) REFERENCES `habitant` (`id_habitant`),
  CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`id_demandeur`) REFERENCES `habitant` (`id_habitant`),
  CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_workshop. opportunitee
CREATE TABLE IF NOT EXISTS `opportunitee` (
  `id_opportunitee` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text,
  `photo` text,
  `lieu` varchar(255) DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `type_opportunitee` enum('logement','emploi') DEFAULT NULL,
  `id_habitant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_opportunitee`),
  KEY `id_habitant` (`id_habitant`),
  CONSTRAINT `opportunitee_ibfk_1` FOREIGN KEY (`id_habitant`) REFERENCES `habitant` (`id_habitant`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_workshop. participation
CREATE TABLE IF NOT EXISTS `participation` (
  `id_evenement` int(11) DEFAULT NULL,
  `id_habitant` int(11) DEFAULT NULL,
  KEY `id_evenement` (`id_evenement`),
  KEY `id_habitant` (`id_habitant`),
  CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`),
  CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`id_habitant`) REFERENCES `habitant` (`id_habitant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_workshop. produit
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `lieu` varchar(255) DEFAULT NULL,
  `img` text,
  `date_annonce` date DEFAULT NULL,
  `reservee` tinyint(1) DEFAULT NULL,
  `unique_id` text,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
