-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 07:24 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cipy`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id_ann` int(10) NOT NULL,
  `title_ann` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ann` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ann` datetime NOT NULL,
  `image_ann` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id_ann`, `title_ann`, `content_ann`, `date_ann`, `image_ann`) VALUES
(1, 'La pensee algorithmique du developpeur', 'Le faite meme de concevoir un systeme d\'information d\'une application quelque la plateforme a laquel elle est destinee reduit de 80% la tache du codeu. Lorsqu\'il manque a un developpeur cette pensee algorithmique ce denier devient qu\'un vulgaire tracducteur et pas rien d\'autre', '2021-01-20 20:09:37', 'images/annonce/caroussel3.jpg'),
(2, 'Le but du binnomage en grande ecole', 'jjsksxkn bjgvdbn z,dhw, mnhkmd,e', '2021-01-30 20:20:04', 'images/annonce/caroussel4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_comentaire` int(10) NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `cible` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(10) NOT NULL,
  `identifiant` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime DEFAULT NULL,
  `mat_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compte_demande`
--

CREATE TABLE `compte_demande` (
  `id_cmpt_dmd` int(11) NOT NULL,
  `identifiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_cmpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_dmd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_demande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compte_demande`
--

INSERT INTO `compte_demande` (`id_cmpt_dmd`, `identifiant`, `mdp_cmpt`, `code_dmd`, `id_demande`) VALUES
(1, 'AD2021', '237dc018', '2037d81c586a2405e47817be4c8874f8', 1),
(2, 'AD2021', 'ae8668e3', '3ea68e86fe152cae5da52acdf17d7538', 2),
(3, 'CDM2021', 'fcd3391c', 'c3cf319d47bc3737f4b0faea25fac079', 3),
(4, 'CDM2021', 'ec30ec0b', 'e30cb0ce0edd813255798d1cc40cbc29', 4);

-- --------------------------------------------------------

--
-- Table structure for table `correction`
--

CREATE TABLE `correction` (
  `id_correct` int(10) NOT NULL,
  `nom_correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sujet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `correction`
--

INSERT INTO `correction` (`id_correct`, `nom_correct`, `lien_correct`, `id_sujet`) VALUES
(1, 'correction_algo', '/public/docs/corrections/correction_algo.pdf', 3),
(2, 'correction_bts_anglais', 'dfghjk', 5);

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `id_demad` int(10) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menbre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`id_demad`, `date`, `lieu`, `filiere`, `qualite`, `id_menbre`) VALUES
(1, '2021-04-22', 'dddd', 'AD', 'CDM', 2),
(2, '2021-04-22', 'dddd', 'AD', 'CDM', 2),
(3, '2021-04-11', 'Yamousoukro', 'CDM', 'CDM', 1),
(4, '2021-04-11', 'Yamousoukro', 'CDM', 'CDM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discution`
--

CREATE TABLE `discution` (
  `id_discute` int(10) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rang_message` int(10) NOT NULL,
  `date_envoi` datetime NOT NULL,
  `id_envoyeur` int(10) NOT NULL,
  `id_receveur` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `id_forma` int(10) NOT NULL,
  `cour_forma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre_forma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrait` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ajout` datetime NOT NULL,
  `date_modif` datetime NOT NULL,
  `auteur_forma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id_forma`, `cour_forma`, `titre_forma`, `extrait`, `date_ajout`, `date_modif`, `auteur_forma`) VALUES
(1, 'ALGORITHMIQUE', 'Introduction a l\'algorithmique', 'Dompter le monde de la programmation informatique a travers la puissance qu\'offre\r\nl\'algorithmique.Ce cour procurera les bases nécessaire a la bonne comprehension de tout langage de programmation.', '2021-02-04 19:55:29', '2021-02-11 19:55:29', 'TMF_AAS'),
(2, 'PHP', 'DYNAMISER VOS PAGES WEB AVEC PHP', 'A travers ce cour des php vous serai capable\r\nde faire communiquer vos pages avec l’extérieur(les clients), de concevoir des systèmes de gestion de donnée ....', '2021-02-04 19:56:57', '2021-02-04 19:56:57', 'AAS'),
(3, 'MERISE', 'MONTER VOTRE PROJET AVEC MERISE', 'Ce cour de merise vous aidera a la conception de vos systeme d\'information efficace et developpera votre logique dans les etape de gestion de projet.', '2021-02-10 19:58:19', '2021-02-18 19:58:19', 'TMF_AAS');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_category`
--

CREATE TABLE `forum_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_subject`
--

CREATE TABLE `forum_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `mat_membre` int(10) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filiere` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/img-bino2.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime DEFAULT NULL,
  `about_me` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '\'Donnez aux autres une bref decription de qui vous êtes ...\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parrainage`
--

CREATE TABLE `parrainage` (
  `id_parr` int(11) NOT NULL,
  `date_parr` datetime NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sujet`
--

CREATE TABLE `sujet` (
  `id_sujet` int(10) NOT NULL,
  `nom_sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ajout` datetime NOT NULL,
  `lien_sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matiere_sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typ_sujet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `nom_sujet`, `date_ajout`, `lien_sujet`, `matiere_sujet`, `typ_sujet`) VALUES
(2, 'economie_S1_S1_L1', '2020-04-01 14:43:46', '/public/docs/sujets/economie_S1_S1_L1.pdf', 'Economie', 2),
(3, 'devoir_algo', '2020-06-03 17:47:24', '/public/docs/sujets/devoir_algo.pdf', 'Algorithmique', 3),
(4, 'plateforme de pont a peage', '2021-02-04 19:28:19', '/public/docs/projets/pont_peage.zip', 'Projet Info', 4),
(5, 'BTS_2020_MERISE', '2021-02-17 20:02:36', '/public/docs/sujets/bts_2020.pdf', 'MERISE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_sujet`
--

CREATE TABLE `type_sujet` (
  `id_typ_sujet` int(10) NOT NULL,
  `nom_typ_sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_sujet`
--

INSERT INTO `type_sujet` (`id_typ_sujet`, `nom_typ_sujet`) VALUES
(1, 'bts'),
(2, 'examen'),
(3, 'devoir'),
(4, 'projet');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(10) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `lien_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_forma` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `date_ajout`, `lien_video`, `id_forma`) VALUES
(1, '2021-02-03 20:00:05', 'https://www.youtube.com/embed/0z5CRP9VMMo', 2),
(2, '2021-02-17 20:01:24', 'https://www.youtube.com/embed/nowvKBpHBO0', 2),
(3, '2021-02-06 20:02:04', 'videos/algo/chap1.mp4', 1),
(4, '2021-02-08 20:02:04', 'videos/algo/chap2.mp4', 1),
(5, '2021-02-16 20:03:37', 'videos/mrs/chap1.mp4', 3),
(6, '2021-02-24 20:03:37', 'videos/mrs/chap2.mp4', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_ann`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_comentaire`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`),
  ADD KEY `mat_membre` (`mat_membre`);

--
-- Indexes for table `compte_demande`
--
ALTER TABLE `compte_demande`
  ADD PRIMARY KEY (`id_cmpt_dmd`),
  ADD KEY `id_demande` (`id_demande`);

--
-- Indexes for table `correction`
--
ALTER TABLE `correction`
  ADD PRIMARY KEY (`id_correct`),
  ADD KEY `id_sujet` (`id_sujet`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_demad`),
  ADD KEY `id_menbre` (`id_menbre`);

--
-- Indexes for table `discution`
--
ALTER TABLE `discution`
  ADD PRIMARY KEY (`id_discute`),
  ADD KEY `id_envoyeur` (`id_envoyeur`),
  ADD KEY `id_receveur` (`id_receveur`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_forma`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `forum_category_id` (`forum_category_id`);

--
-- Indexes for table `forum_category`
--
ALTER TABLE `forum_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `forum_subject`
--
ALTER TABLE `forum_subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `subtitle` (`subtitle`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`mat_membre`);

--
-- Indexes for table `parrainage`
--
ALTER TABLE `parrainage`
  ADD PRIMARY KEY (`id_parr`),
  ADD KEY `mat_membre` (`mat_membre`);

--
-- Indexes for table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id_sujet`),
  ADD KEY `typ_sujet` (`typ_sujet`);

--
-- Indexes for table `type_sujet`
--
ALTER TABLE `type_sujet`
  ADD PRIMARY KEY (`id_typ_sujet`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_forma` (`id_forma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_ann` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_comentaire` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compte_demande`
--
ALTER TABLE `compte_demande`
  MODIFY `id_cmpt_dmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `correction`
--
ALTER TABLE `correction`
  MODIFY `id_correct` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_demad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discution`
--
ALTER TABLE `discution`
  MODIFY `id_discute` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_forma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_subject`
--
ALTER TABLE `forum_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `mat_membre` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parrainage`
--
ALTER TABLE `parrainage`
  MODIFY `id_parr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id_sujet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_sujet`
--
ALTER TABLE `type_sujet`
  MODIFY `id_typ_sujet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`mat_membre`) REFERENCES `membre` (`mat_membre`);

--
-- Constraints for table `correction`
--
ALTER TABLE `correction`
  ADD CONSTRAINT `correction_ibfk_1` FOREIGN KEY (`id_sujet`) REFERENCES `sujet` (`id_sujet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`forum_category_id`) REFERENCES `forum_category` (`id`);

--
-- Constraints for table `forum_subject`
--
ALTER TABLE `forum_subject`
  ADD CONSTRAINT `forum_subject_ibfk_1` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`),
  ADD CONSTRAINT `forum_subject_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `membre` (`mat_membre`);

--
-- Constraints for table `parrainage`
--
ALTER TABLE `parrainage`
  ADD CONSTRAINT `parrainage_ibfk_1` FOREIGN KEY (`mat_membre`) REFERENCES `membre` (`mat_membre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`typ_sujet`) REFERENCES `type_sujet` (`id_typ_sujet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`id_forma`) REFERENCES `formation` (`id_forma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
