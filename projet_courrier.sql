-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 05 Avril 2013 à 12:58
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
-- Structure de la table `accuse_de_reception`
--

CREATE TABLE IF NOT EXISTS `accuse_de_reception` (
  `id_accuse` int(11) NOT NULL AUTO_INCREMENT,
  `num_accuse` varchar(50) NOT NULL,
  `date_accuse` date NOT NULL,
  PRIMARY KEY (`id_accuse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `accuse_de_reception`
--

INSERT INTO `accuse_de_reception` (`id_accuse`, `num_accuse`, `date_accuse`) VALUES
(10, '123456', '2013-04-05');

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
  `num_envoi` varchar(13) DEFAULT NULL,
  `id_type` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  PRIMARY KEY (`id_courrier`),
  KEY `id_accuse_de_reception` (`id_accuse_de_reception`,`id_nature`,`id_type`,`id_expediteur`,`id_destinataire`),
  KEY `id_nature` (`id_nature`,`id_type`,`id_expediteur`,`id_destinataire`),
  KEY `id_type` (`id_type`),
  KEY `id_expediteur` (`id_expediteur`),
  KEY `id_destinataire` (`id_destinataire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `courrier`
--

INSERT INTO `courrier` (`id_courrier`, `objet_courrier`, `date_courrier`, `observation`, `id_accuse_de_reception`, `id_nature`, `num_envoi`, `id_type`, `id_expediteur`, `id_destinataire`) VALUES
(1, 'Attaque de hobbits', '2013-03-06', 'Attention', 0, 2, '1A08023150788', 1, 1, 1),
(2, 'Looping ', '2013-03-06', 'Attention', 0, 1, '6454646546546', 2, 2, 2),
(3, 'sdfghjk', '2013-03-13', 'dsdfgsdfgsdf', 0, 1, 'ieuhgfvdchgfv', 1, 3, 3),
(4, 'Plop', '2013-03-05', 'ça pique', 0, 2, 'dfgsdfgsdgs', 1, 4, 4),
(5, 'jhgfdcs', '2013-03-06', 'salut', 0, 1, '', 1, 5, 5),
(6, 'Plop', '2013-03-12', 'ça pique tres tres fort', 0, 1, '', 2, 6, 6),
(7, 'Plop', '2013-03-06', 'ça pique', 0, 1, '', 1, 4, 7),
(8, 'Plop', '2013-03-19', 'salut', 0, 1, '', 1, 5, 8),
(9, 'hgfd', '2013-03-19', '', 0, 1, '', 1, 5, 9),
(10, 'hgfd', '2013-04-02', 'ça pique', 0, 1, '', 1, 6, 3),
(11, 'kjh', '2013-04-04', 'Attention', 0, 1, '', 1, 2, 2),
(12, 'Chicken1', '2013-04-04', 'super Urgent', 10, 2, 'x5vwx3vw4fv', 2, 2, 10),
(13, 'plop', '2013-04-04', 'On est ses amis', 0, 1, '', 1, 7, 11);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `destinataire`
--

INSERT INTO `destinataire` (`id_destinataire`, `nom_destinataire`, `id_service`) VALUES
(1, 'Thibault', 5),
(2, 'Sauron', 1),
(3, 'Simpson', 5),
(4, 'Maurice', 4),
(5, 'Casimir', 5),
(6, 'Maurice', 6),
(7, 'Simpson', 1),
(8, 'Maurice', 1),
(9, 'Casimir', 1),
(10, 'Resto asiat', 1),
(11, 'Tibo', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `expediteur`
--

INSERT INTO `expediteur` (`id_expediteur`, `nom_expediteur`, `id_service`) VALUES
(1, 'Sauron', 1),
(2, 'Moi', 5),
(3, 'bart', 5),
(4, 'Roger', 1),
(5, 'Oui oui', 1),
(6, 'bart', 3),
(7, 'plopexpe', 1);

-- --------------------------------------------------------

--
-- Structure de la table `histo_courrier`
--

CREATE TABLE IF NOT EXISTS `histo_courrier` (
  `id_modif` int(11) NOT NULL AUTO_INCREMENT,
  `id_courrier` int(11) NOT NULL,
  `login_utilisateur` varchar(50) NOT NULL,
  `date_modif` date NOT NULL,
  `objet_modif` varchar(80) NOT NULL,
  `observation_modif` varchar(100) NOT NULL,
  `id_nature_modif` int(11) NOT NULL,
  `nom_expediteur_modif` varchar(50) NOT NULL,
  `service_expediteur_modif` varchar(50) NOT NULL,
  `nom_destinataire_modif` varchar(50) NOT NULL,
  `service_destinataire_modif` varchar(50) NOT NULL,
  PRIMARY KEY (`id_modif`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `histo_courrier`
--

INSERT INTO `histo_courrier` (`id_modif`, `id_courrier`, `login_utilisateur`, `date_modif`, `objet_modif`, `observation_modif`, `id_nature_modif`, `nom_expediteur_modif`, `service_expediteur_modif`, `nom_destinataire_modif`, `service_destinataire_modif`) VALUES
(5, 12, 'admin', '2013-04-04', 'Chicken', 'urgent', 2, 'Moi', '5', 'Resto asiat', '1'),
(6, 12, 'admin', '2013-04-04', 'Chicken1', 'super Urgent', 2, 'Moi', '5', 'Resto asiat', '1'),
(7, 6, 'admin', '2013-04-04', 'Plop', 'ça pique tres tres fort', 1, 'bart', '3', 'Maurice', '6');

-- --------------------------------------------------------

--
-- Structure de la table `nature`
--

CREATE TABLE IF NOT EXISTS `nature` (
  `id_nature` int(11) NOT NULL AUTO_INCREMENT,
  `nom_nature` varchar(60) NOT NULL,
  `num_envoi` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_nature`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `nature`
--

INSERT INTO `nature` (`id_nature`, `nom_nature`, `num_envoi`, `active`) VALUES
(1, 'Lettre simple', 0, 1),
(2, 'Recommandé', 1, 1),
(3, 'Colis', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `service_destinataire`
--

CREATE TABLE IF NOT EXISTS `service_destinataire` (
  `id_serviceD` int(11) NOT NULL AUTO_INCREMENT,
  `nom_serviceD` varchar(60) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_serviceD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `service_destinataire`
--

INSERT INTO `service_destinataire` (`id_serviceD`, `nom_serviceD`, `active`) VALUES
(1, 'Exterieur', 1),
(2, 'UEPP', 1),
(3, 'SATES', 1),
(4, 'SESSAD', 1),
(5, 'INFORMATIQUE', 1),
(6, 'EME', 1);

-- --------------------------------------------------------

--
-- Structure de la table `service_expediteur`
--

CREATE TABLE IF NOT EXISTS `service_expediteur` (
  `id_serviceE` int(11) NOT NULL AUTO_INCREMENT,
  `nom_serviceE` varchar(60) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_serviceE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `service_expediteur`
--

INSERT INTO `service_expediteur` (`id_serviceE`, `nom_serviceE`, `active`) VALUES
(1, 'Exterieur', 1),
(2, 'UEPP', 1),
(3, 'SATES', 1),
(4, 'SESSAD', 1),
(5, 'INFORMATIQUE', 1),
(6, 'EME', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `login_utilisateur`, `mdp_utilisateur`, `droit_utilisateur`) VALUES
(1, 'Simpson', 'Homer', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Simpson', 'Bart', 'bart', 'f54146a3fc82ab17e5265695b23f646b', 'user');

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
  ADD CONSTRAINT `destinataire_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service_destinataire` (`id_serviceD`);

--
-- Contraintes pour la table `expediteur`
--
ALTER TABLE `expediteur`
  ADD CONSTRAINT `expediteur_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service_expediteur` (`id_serviceE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
