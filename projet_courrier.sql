-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 09 Mars 2013 à 13:12
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet_courrier`
--

-- --------------------------------------------------------

--
-- Structure de la table `courrier`
--

CREATE TABLE IF NOT EXISTS `courrier` (
  `id_courrier` int(11) NOT NULL AUTO_INCREMENT,
  `objet_courrier` varchar(80) NOT NULL,
  `date_courrier` date NOT NULL,
  `observation` varchar(100) NOT NULL,
  `id_accuse_de_reception` int(11) NOT NULL,
  `id_nature` int(11) NOT NULL,
  `num_envoi` varchar(13) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  PRIMARY KEY (`id_courrier`),
  KEY `id_accuse_de_reception` (`id_accuse_de_reception`,`id_nature`,`id_type`,`id_expediteur`,`id_destinataire`),
  KEY `id_nature` (`id_nature`,`id_type`,`id_expediteur`,`id_destinataire`),
  KEY `id_type` (`id_type`),
  KEY `id_expediteur` (`id_expediteur`),
  KEY `id_destinataire` (`id_destinataire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `courrier`
--

INSERT INTO `courrier` (`id_courrier`, `objet_courrier`, `date_courrier`, `observation`, `id_accuse_de_reception`, `id_nature`, `num_envoi`, `id_type`, `id_expediteur`, `id_destinataire`) VALUES
(1, 'Attaque de hobbits', '2013-03-06', 'Attention', 0, 2, '1A08023150788', 1, 1, 1),
(2, 'Looping ', '2013-03-06', 'Attention', 0, 1, '6454646546546', 2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `destinataire`
--

CREATE TABLE IF NOT EXISTS `destinataire` (
  `id_destinataire` int(11) NOT NULL AUTO_INCREMENT,
  `nom_destinataire` varchar(80) NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`id_destinataire`),
  KEY `service` (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `destinataire`
--

INSERT INTO `destinataire` (`id_destinataire`, `nom_destinataire`, `id_service`) VALUES
(1, 'Thibault', 5),
(2, 'Sauron', 1);

-- --------------------------------------------------------

--
-- Structure de la table `expediteur`
--

CREATE TABLE IF NOT EXISTS `expediteur` (
  `id_expediteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_expediteur` varchar(80) NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`id_expediteur`),
  KEY `service` (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `expediteur`
--

INSERT INTO `expediteur` (`id_expediteur`, `nom_expediteur`, `id_service`) VALUES
(1, 'Sauron', 1),
(2, 'Moi', 5);

-- --------------------------------------------------------

--
-- Structure de la table `nature`
--

CREATE TABLE IF NOT EXISTS `nature` (
  `id_nature` int(11) NOT NULL AUTO_INCREMENT,
  `nom_nature` varchar(60) NOT NULL,
  PRIMARY KEY (`id_nature`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `nature`
--

INSERT INTO `nature` (`id_nature`, `nom_nature`) VALUES
(1, 'Lettre Simple'),
(2, 'Recommandé'),
(3, 'Colis');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(60) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id_service`, `nom_service`) VALUES
(1, 'Exterieur'),
(2, 'UEPP'),
(3, 'SATES'),
(4, 'SESSAD'),
(5, 'INFORMATIQUE'),
(6, 'EME');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `nom_type`) VALUES
(1, 'Entrant'),
(2, 'Sortant');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(50) NOT NULL,
  `prenom_utilisateur` varchar(50) NOT NULL,
  `login_utilisateur` varchar(50) NOT NULL,
  `mdp_utilisateur` varchar(50) NOT NULL,
  `droit_utilisateur` varchar(20) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `login_utilisateur`, `mdp_utilisateur`, `droit_utilisateur`) VALUES
(1, 'Simpson', 'Homer', 'admin', 'admin', 'admin');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `courrier`
--
ALTER TABLE `courrier`
  ADD CONSTRAINT `courrier_ibfk_1` FOREIGN KEY (`id_nature`) REFERENCES `nature` (`id_nature`),
  ADD CONSTRAINT `courrier_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`),
  ADD CONSTRAINT `courrier_ibfk_3` FOREIGN KEY (`id_expediteur`) REFERENCES `expediteur` (`id_expediteur`),
  ADD CONSTRAINT `courrier_ibfk_4` FOREIGN KEY (`id_destinataire`) REFERENCES `destinataire` (`id_destinataire`);

--
-- Contraintes pour la table `destinataire`
--
ALTER TABLE `destinataire`
  ADD CONSTRAINT `destinataire_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

--
-- Contraintes pour la table `expediteur`
--
ALTER TABLE `expediteur`
  ADD CONSTRAINT `expediteur_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
