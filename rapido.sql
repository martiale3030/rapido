-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 21 fév. 2026 à 14:08
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rapido`
--

-- --------------------------------------------------------

--
-- Structure de la table `chauffeurs`
--

DROP TABLE IF EXISTS `chauffeurs`;
CREATE TABLE IF NOT EXISTS `chauffeurs` (
  `chauffeur_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(100) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`chauffeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chauffeurs`
--

INSERT INTO `chauffeurs` (`chauffeur_id`, `nom`, `prenoms`, `telephone`, `disponible`) VALUES
(1, 'Houeto', 'Sylvain', '0197000006', 1),
(2, 'Gnanou', 'Patrice', '0197000005', 1),
(3, 'Fagla', 'Romuald', '0197000004', 1),
(4, 'Dansi', 'Hervé', '0197000003', 1),
(5, 'Bello', 'Moussa', '0197000002', 1),
(6, 'Adjovi', 'Kokou', '0197000001', 1),
(7, 'Koudjo', 'Arsène', '0197000007', 0),
(8, 'Loko', 'Fernand', '0197000008', 1);

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `point_depart` varchar(150) NOT NULL,
  `point_arrivee` varchar(150) NOT NULL,
  `date_heure` datetime NOT NULL,
  `image_vehicule` varchar(255) DEFAULT NULL,
  `chauffeur_id` int DEFAULT NULL,
  `statut` enum('en attente','en cours','terminée') DEFAULT 'en attente',
  PRIMARY KEY (`course_id`),
  KEY `fk_course_chauffeur` (`chauffeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`course_id`, `point_depart`, `point_arrivee`, `date_heure`, `image_vehicule`, `chauffeur_id`, `statut`) VALUES
(1, 'Calavi', 'Ouidah', '2026-02-20 09:00:00', NULL, 5, 'terminée'),
(2, 'Cotonou', 'Porto-Novo', '2026-02-20 08:00:00', NULL, 6, 'en cours'),
(3, 'Parakou', 'Natitingou', '2026-02-20 10:00:00', NULL, NULL, 'en attente'),
(4, 'Bohicon', 'Abomey', '2026-02-20 11:00:00', NULL, 1, 'en cours'),
(5, 'Lokossa', 'Cotonou', '2026-02-20 12:00:00', NULL, 2, 'terminée'),
(6, 'Porto-Novo', 'Calavi', '2026-02-20 13:00:00', NULL, 3, 'en cours'),
(7, 'Ouidah', 'Cotonou', '2026-02-19 08:00:00', NULL, 4, 'terminée'),
(8, 'Natitingou', 'Parakou', '2026-02-19 09:00:00', NULL, 6, 'terminée'),
(10, 'cotonou', 'ganhi', '2026-02-20 14:49:00', NULL, 6, 'terminée'),
(12, 'cotonou', 'pahou', '2026-02-20 15:03:00', '1771682645_télécharger (9).jpg', NULL, 'en attente');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_course_chauffeur` FOREIGN KEY (`chauffeur_id`) REFERENCES `chauffeurs` (`chauffeur_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
