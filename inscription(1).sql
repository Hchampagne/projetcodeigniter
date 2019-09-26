-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 26 sep. 2019 à 14:48
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jarditou`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `ins_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `ins_nom` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'nom',
  `ins_prenom` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'prenom',
  `ins_adresse` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'Adresse',
  `ins_cp` varchar(5) NOT NULL COMMENT 'code postal',
  `ins_ville` varchar(100) NOT NULL COMMENT 'ville',
  `ins_portable` varchar(10) NOT NULL COMMENT 'téléphone portable',
  `ins_fixe` varchar(10) DEFAULT NULL COMMENT 'téléphone fixe',
  `ins_login` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'login/mail',
  `ins_mdp` varchar(60) CHARACTER SET utf8 NOT NULL COMMENT 'mot de passe',
  `ins_d_ins` date NOT NULL COMMENT 'date inscription',
  `ins_d_dercon` date DEFAULT NULL COMMENT 'date dernière connexion',
  `ins_bloque` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'compte bloqué',
  `ins_role` varchar(5) CHARACTER SET utf8 NOT NULL DEFAULT 'user' COMMENT 'roles',
  PRIMARY KEY (`ins_id`),
  UNIQUE KEY `login` (`ins_login`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`ins_id`, `ins_nom`, `ins_prenom`, `ins_adresse`, `ins_cp`, `ins_ville`, `ins_portable`, `ins_fixe`, `ins_login`, `ins_mdp`, `ins_d_ins`, `ins_d_dercon`, `ins_bloque`, `ins_role`) VALUES
(1, 'Champagne', 'Hervé', '', '0', '0', '0', '0', 'champagne@gmail.com', '$2y$10$R6mT7cJRVD3SnmXVguv6Ceie4pJrQTJ4j.no6tQ5kXtVzmjFQI6S.', '2019-08-23', '2019-08-27', 0, 'user'),
(2, 'Champagne', 'Hervé', '', '0', '0', '0', '0', 'hchampagne@gmail.com', '$2y$10$qklOj6cSU10d8xCrsteR8u7C6cKatmX09bsB3E80ghkkeTP8aoxdy', '2019-08-23', NULL, 0, 'user'),
(3, 'Champagne', 'Fabienne', '', '0', '0', '0', '0', 'fabienne@gmail.com', '$2y$10$6nhob0ApeeAnLY8uHx73YeAlApyVJyarZP3tFnAxEgwGQTUeuF6mK', '2019-08-23', '2019-08-23', 0, 'user'),
(4, 'Champagne', 'Fabienne', '', '0', '0', '0', '0', 'fabienne1@gmail.com', '$2y$10$jUMdqiLmO8EEM.jiZCLK6O7VfYV.y3Df5GcrvpeuRnVqpm4r5qiza', '2019-08-23', NULL, 0, 'user'),
(5, 'Champagne', 'Hervé', '', '0', '0', '0', '0', 'champagne11@gmail.com', '$2y$10$KKtzWFCTwPLg9UTabziRYu1BKZnlUkrp0qSpxZVDkoyeSJ647j33a', '2019-08-26', '2019-08-26', 0, 'user'),
(6, 'Champagne', 'Hervé', '', '0', '0', '0', '0', 'champagne12@gmail.com', '$2y$10$3hZgsOt7Jxj3473/0gxY/epPPNe5B1mV/Oq1CGGC3dyoGoRa1VJZ2', '2019-08-26', NULL, 0, 'user'),
(7, 'Champagne', 'Hervé', '', '0', '0', '0', '0', 'hch@free.fr', '$2y$10$CkWepLqN5XucrrcVH1Qc5e/AzANiqgFDf7AGBfHakwVug0a.1JTqi', '2019-08-27', NULL, 0, 'user'),
(8, 'Champagne', 'Hervé', '', '0', '0', '0', '0', 'hch1@free.fr', '$2y$10$0ali5maXw/993RT1xEahM.t62j4.Dbnjz6ZWNjSCm6PurNVKE49nK', '2019-08-27', '2019-08-27', 0, 'user'),
(9, 'Champagne', 'Hervé', '', '0', '0', '0', '0', 'hch12@free.fr', '$2y$10$GVNshxMnN0Ln5cdlCN/BbuRJGEqQJMMaTcX1nkIxn8nhM3qL5sHA2', '2019-08-28', NULL, 0, 'admin'),
(10, 'Champagne', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'hchampagne56@gmail.com', 'Azer123;', '2019-09-26', NULL, 0, 'user'),
(11, 'Champagne', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'silinformatique@free.fr', 'Azer123;', '2019-09-26', NULL, 0, 'user'),
(12, 'Champagne', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'silinformatique1@free.fr', 'Azer123;', '2019-09-26', NULL, 0, 'user'),
(13, 'Champagne', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'silinformatique3@free.fr', 'Azer123;', '2019-09-26', NULL, 0, 'user'),
(14, 'Champagneh', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'silinformatique4@free.fr', 'Azer123;', '2019-09-26', NULL, 0, 'user'),
(15, 'Champagne', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'hch13@gmail.com', 'Azer123;', '2019-09-26', NULL, 0, 'user'),
(16, 'Champagne', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'hch15@gmail.com', 'Azer123;', '2019-09-26', NULL, 0, 'user'),
(17, 'Champagne', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'hch15@fee.fr', 'Azer123;', '2019-09-26', NULL, 0, 'user'),
(18, 'Champagne', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'hch27@free.fr', '$2y$10$Xt5b8dW4EBZl1hQ8eHRY8uwtpYVd31MkwcTI2fpc7JAO4e/D9s08q', '2019-09-26', NULL, 0, 'user'),
(19, 'Champagne', 'Hervé', '27 rue de corbeaulieu', '60280', 'Venette', '0670556007', '', 'hch56@free.fr', '$2y$10$QIbpJ590EWkghRuspf9g9eBIhYJWyTwIopl5ZfNYcW4vyUXLlhxVW', '2019-09-26', NULL, 0, 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
