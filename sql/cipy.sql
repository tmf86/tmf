-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 mars 2021 à 04:42
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

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
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id_ann` int(10) NOT NULL,
  `title_ann` varchar(255) NOT NULL,
  `content_ann` text NOT NULL,
  `date_ann` datetime NOT NULL,
  `image_ann` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_ann`, `title_ann`, `content_ann`, `date_ann`, `image_ann`) VALUES
(1, 'La Pensee Algorithmique D\'un Developpeur', 'Le faite meme de concevoir un systeme d\'information d\'une application quelque la plateforme a laquel elle est destinee reduit de 80% la tache du codeu. Lorsqu\'il manque a un developpeur cette pensee algorithmique ce denier devient qu\'un vulgaire tracducteur et pas rien d\'autre', '2021-01-20 20:09:37', 'images/annonce/caroussel3.jpg'),
(2, 'Le but Du Binnomage En Grande Ecole', 'jjsksxkn bjgvdbn z,dhw, mnhkmd,e', '2021-01-30 20:20:04', 'images/annonce/caroussel4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_comentaire` int(10) NOT NULL,
  `contenu` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `cible` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(10) NOT NULL,
  `identifiant` varchar(20) NOT NULL,
  `mot_pass` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `mat_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `correction`
--

CREATE TABLE `correction` (
  `id_correct` int(10) NOT NULL,
  `nom_correct` varchar(255) NOT NULL,
  `lien_correct` varchar(255) NOT NULL,
  `id_sujet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `correction`
--

INSERT INTO `correction` (`id_correct`, `nom_correct`, `lien_correct`, `id_sujet`) VALUES
(1, 'correction_algo', '/public/docs/corrections/correction_algo.pdf', 3),
(2, 'correction_bts_anglais', 'dfghjk', 5);

-- --------------------------------------------------------

--
-- Structure de la table `discution`
--

CREATE TABLE `discution` (
  `id_discute` int(10) NOT NULL,
  `message` text NOT NULL,
  `rang_message` int(10) NOT NULL,
  `date_envoi` datetime NOT NULL,
  `id_envoyeur` int(10) NOT NULL,
  `id_receveur` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_forma` int(10) NOT NULL,
  `cour_forma` varchar(255) NOT NULL,
  `titre_forma` varchar(255) NOT NULL,
  `extrait` text NOT NULL,
  `date_ajout` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `auteur_forma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_forma`, `cour_forma`, `titre_forma`, `extrait`, `date_ajout`, `date_modif`, `auteur_forma`) VALUES
(1, 'ALGORITHMIQUE', 'Introduction a l\'algorithmique', 'Dompter le monde de la programmation informatique a travers la puissance qu\'offre\r\nl\'algorithmique.Ce cour procurera les bases nécessaire a la bonne comprehension de tout langage de programmation.', '2021-02-04 19:55:29', '2021-02-11 19:55:29', 'TMF_AAS'),
(2, 'PHP', 'DYNAMISER VOS PAGES WEB AVEC PHP', 'A travers ce cour des php vous serai capable\r\nde faire communiquer vos pages avec l’extérieur(les clients), de concevoir des systèmes de gestion de donnée ....', '2021-02-04 19:56:57', '2021-02-04 19:56:57', 'AAS'),
(3, 'MERISE', 'MONTER VOTRE PROJET AVEC MERISE', 'Ce cour de merise vous aidera a la conception de vos systeme d\'information efficace et developpera votre logique dans les etape de gestion de projet.', '2021-02-10 19:58:19', '2021-02-18 19:58:19', 'TMF_AAS');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `mat_membre` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(90) NOT NULL,
  `contact` varchar(16) NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `genre` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `filiere` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'images/img-bino2.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `parrainage`
--

CREATE TABLE `parrainage` (
  `id_parr` int(11) NOT NULL,
  `date_parr` datetime NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `mat_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `id_sujet` int(10) NOT NULL,
  `nom_sujet` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `lien_sujet` varchar(255) NOT NULL,
  `matiere_sujet` varchar(255) NOT NULL,
  `typ_sujet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `nom_sujet`, `date_ajout`, `lien_sujet`, `matiere_sujet`, `typ_sujet`) VALUES
(2, 'economie_S1_S1_L1', '2020-04-01 14:43:46', '/public/docs/sujets/economie_S1_S1_L1.pdf', 'Economie', 2),
(3, 'devoir_algo', '2020-06-03 17:47:24', '/public/docs/sujets/devoir_algo.pdf', 'Algorithmique', 3),
(4, 'plateforme de pont a peage', '2021-02-04 19:28:19', '/public/docs/projets/pont_peage.zip', 'Projet Info', 4),
(5, 'BTS_2020_MERISE', '2021-02-17 20:02:36', '/public/docs/sujets/bts_2020.pdf', 'MERISE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_sujet`
--

CREATE TABLE `type_sujet` (
  `id_typ_sujet` int(10) NOT NULL,
  `nom_typ_sujet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_sujet`
--

INSERT INTO `type_sujet` (`id_typ_sujet`, `nom_typ_sujet`) VALUES
(1, 'bts'),
(2, 'examen'),
(3, 'devoir'),
(4, 'projet');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id_video` int(10) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `lien_video` varchar(255) NOT NULL,
  `id_forma` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id_video`, `date_ajout`, `lien_video`, `id_forma`) VALUES
(1, '2021-02-03 20:00:05', 'https://www.youtube.com/embed/0z5CRP9VMMo', 2),
(2, '2021-02-17 20:01:24', 'https://www.youtube.com/embed/nowvKBpHBO0', 2),
(3, '2021-02-06 20:02:04', 'videos/algo/chap1.mp4', 1),
(4, '2021-02-08 20:02:04', 'videos/algo/chap2.mp4', 1),
(5, '2021-02-16 20:03:37', 'videos/mrs/chap1.mp4', 3),
(6, '2021-02-24 20:03:37', 'videos/mrs/chap2.mp4', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_ann`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_comentaire`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`),
  ADD KEY `mat_membre` (`mat_membre`);

--
-- Index pour la table `correction`
--
ALTER TABLE `correction`
  ADD PRIMARY KEY (`id_correct`),
  ADD KEY `id_sujet` (`id_sujet`);

--
-- Index pour la table `discution`
--
ALTER TABLE `discution`
  ADD PRIMARY KEY (`id_discute`),
  ADD KEY `id_envoyeur` (`id_envoyeur`),
  ADD KEY `id_receveur` (`id_receveur`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_forma`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`mat_membre`);

--
-- Index pour la table `parrainage`
--
ALTER TABLE `parrainage`
  ADD PRIMARY KEY (`id_parr`),
  ADD KEY `mat_membre` (`mat_membre`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id_sujet`),
  ADD KEY `typ_sujet` (`typ_sujet`);

--
-- Index pour la table `type_sujet`
--
ALTER TABLE `type_sujet`
  ADD PRIMARY KEY (`id_typ_sujet`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_forma` (`id_forma`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_ann` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_comentaire` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `correction`
--
ALTER TABLE `correction`
  MODIFY `id_correct` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `discution`
--
ALTER TABLE `discution`
  MODIFY `id_discute` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_forma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `mat_membre` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parrainage`
--
ALTER TABLE `parrainage`
  MODIFY `id_parr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id_sujet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type_sujet`
--
ALTER TABLE `type_sujet`
  MODIFY `id_typ_sujet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `correction`
--
ALTER TABLE `correction`
  ADD CONSTRAINT `correction_ibfk_1` FOREIGN KEY (`id_sujet`) REFERENCES `sujet` (`id_sujet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `parrainage`
--
ALTER TABLE `parrainage`
  ADD CONSTRAINT `parrainage_ibfk_1` FOREIGN KEY (`mat_membre`) REFERENCES `membre` (`mat_membre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`typ_sujet`) REFERENCES `type_sujet` (`id_typ_sujet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`id_forma`) REFERENCES `formation` (`id_forma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
