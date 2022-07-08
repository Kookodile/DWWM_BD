-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 juil. 2022 à 09:56
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `musicos`
--

-- --------------------------------------------------------

--
-- Structure de la table `artistes`
--

DROP TABLE IF EXISTS `artistes`;
CREATE TABLE IF NOT EXISTS `artistes` (
  `idcode_artiste` int NOT NULL AUTO_INCREMENT,
  `nom_artiste` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idcode_artiste`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artistes`
--

INSERT INTO `artistes` (`idcode_artiste`, `nom_artiste`) VALUES
(18, 'AA'),
(20, 'efazfaz');

-- --------------------------------------------------------

--
-- Structure de la table `disques`
--

DROP TABLE IF EXISTS `disques`;
CREATE TABLE IF NOT EXISTS `disques` (
  `idcode_disque` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_code_label` int NOT NULL,
  PRIMARY KEY (`idcode_disque`),
  KEY `Disques_Labels_FK` (`id_code_label`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `labels`
--

DROP TABLE IF EXISTS `labels`;
CREATE TABLE IF NOT EXISTS `labels` (
  `id_code_label` int NOT NULL AUTO_INCREMENT,
  `nom_label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_code_label`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `labels`
--

INSERT INTO `labels` (`id_code_label`, `nom_label`) VALUES
(1, 'Label'),
(2, 'Label'),
(3, 'label');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(9, 'herve', '$2y$10$rjf3XYXqstCVPHaSHr5O..u.EIkpEGgs4SZ/jesPDkeaTN02wNFFG', '2022-07-01 10:52:33'),
(8, 'testeur', '$2y$10$C/RqFeof51giwFQ4s5ORq.AplnMj4wpvyiBEZ1iAwVutGHk8EP/ra', '2022-06-30 14:42:44'),
(7, 'testt', '$2y$10$znwOesazP4DwzEBikac0y.FcmtksiCYbGhpjpz8bvadKY08hmNeA6', '2022-06-30 14:37:38'),
(6, 'bas', '$2y$10$lyi.zQOwjMbr3u1qAJIf0e1Y60O76Bt4AUKbBX21JoOzWV.o3Y4Wu', '2022-06-29 14:00:21'),
(5, 'test', '$2y$10$yv7V2O5Yij6X6IORVVsI5OQdtWFk73M9V/cKr88dcoqz/TT54DjJa', '2022-06-29 13:47:01'),
(10, 'bastien', '$2y$10$1Og.5qjoFwDpK.LGxutTZu1PQoxPRk0CWM/M60VFNufQTgO3UGwUq', '2022-07-01 11:51:44');

-- --------------------------------------------------------

--
-- Structure de la table `y_participe`
--

DROP TABLE IF EXISTS `y_participe`;
CREATE TABLE IF NOT EXISTS `y_participe` (
  `idcode_artiste` int NOT NULL,
  `idcode_disque` int NOT NULL,
  PRIMARY KEY (`idcode_artiste`,`idcode_disque`),
  KEY `y_participe_Disques0_FK` (`idcode_disque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `disques`
--
ALTER TABLE `disques`
  ADD CONSTRAINT `Disques_Labels_FK` FOREIGN KEY (`id_code_label`) REFERENCES `labels` (`id_code_label`);

--
-- Contraintes pour la table `y_participe`
--
ALTER TABLE `y_participe`
  ADD CONSTRAINT `y_participe_Artistes_FK` FOREIGN KEY (`idcode_artiste`) REFERENCES `artistes` (`idcode_artiste`),
  ADD CONSTRAINT `y_participe_Disques0_FK` FOREIGN KEY (`idcode_disque`) REFERENCES `disques` (`idcode_disque`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
