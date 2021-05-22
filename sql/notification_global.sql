-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 22 mai 2021 à 20:08
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

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
-- Structure de la table `notification_global`
--

CREATE TABLE `notification_global` (
  `id_notif_glob` int(10) NOT NULL,
  `titre_notif_glob` varchar(255) NOT NULL,
  `content_notif_glob` text NOT NULL,
  `date_notif_glob` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notification_global`
--

INSERT INTO `notification_global` (`id_notif_glob`, `titre_notif_glob`, `content_notif_glob`, `date_notif_glob`) VALUES
(1, 'Bienvenu', 'Merci de vous etre inscris sur la plateforme\r\na travers cette plateforme vous pouvez vicre pleinement votre passion.', '2021-05-23 02:46:01'),
(2, 'Examen Terminale L1', 'garder votre sans froid et soyer sereins \r\nle but des examens sont pour evalue le niveau et non etre la bete noir d\'un etudiant certe c\'est pas facile mais nous somme avec vous courage !', '2021-05-19 03:14:09'),
(3, 'Nouveau sujet Disponible', 'Les sujets d\'economie pour la filiere CDM sont Maintenant disponble dans l\'option Sujet de la plateforme', '2021-05-24 03:14:09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `notification_global`
--
ALTER TABLE `notification_global`
  ADD PRIMARY KEY (`id_notif_glob`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `notification_global`
--
ALTER TABLE `notification_global`
  MODIFY `id_notif_glob` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
