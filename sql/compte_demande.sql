-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 01 avr. 2021 à 18:31
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cipy`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte_demande`
--

CREATE TABLE `compte_demande` (
  `id_cmpt_dmd` int(11) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mdp_cmpt` varchar(255) NOT NULL,
  `code_dmd` varchar(255) NOT NULL,
  `id_demande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte_demande`
--

INSERT INTO `compte_demande` (`id_cmpt_dmd`, `identifiant`, `mdp_cmpt`, `code_dmd`, `id_demande`) VALUES
(55, 'RGL2021', '054b1969', '41965b09073998e40c12d958b60c99a0', 57),
(56, 'RGL2021', '73904224', '243792043655667a78e3f1ae5d4480f2', 58),
(57, 'RGL2021', '429eddbb', '4d9de2bb3fddd5fb56b43bfa35b636dc', 59),
(58, 'RGL2021', '61f6c681', '61f616c81cc5e51854d12f2d1689cb00', 60),
(59, 'RGL2021', '490d23a2', '920d42a32e44b2c0ea2f48088f1c89ea', 61),
(60, 'RGL2021', 'f3bd1dcc', 'bd1ccf3d40fc6cabceef4179a6d01936', 62),
(61, 'AD2021', '9a38d7e2', '93a28e7d411f2af7dcc70e7c52b0f579', 63),
(62, 'CDM2021', 'cdb3156b', 'c53bb16d3531d19637b7a517497941bc', 64),
(63, 'MA2021', 'e4e0936a', 'ae0e63941def6a13008e5ccea4bd9cf7', 65),
(64, 'RGL2021', 'ac688269', '8ac26986402d88940c2c5728c74a6b7d', 66);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte_demande`
--
ALTER TABLE `compte_demande`
  ADD PRIMARY KEY (`id_cmpt_dmd`),
  ADD KEY `id_demande` (`id_demande`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte_demande`
--
ALTER TABLE `compte_demande`
  MODIFY `id_cmpt_dmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compte_demande`
--
ALTER TABLE `compte_demande`
  ADD CONSTRAINT `compte_demande_ibfk_1` FOREIGN KEY (`id_demande`) REFERENCES `demande` (`id_demad`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
