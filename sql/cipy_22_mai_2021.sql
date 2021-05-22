-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 22 mai 2021 à 20:11
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
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(255) NOT NULL,
  `prenom_admin` varchar(255) NOT NULL,
  `logiin_admin` varchar(255) NOT NULL,
  `mdp_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `prenom_admin`, `logiin_admin`, `mdp_admin`) VALUES
(0, 'Toure', 'Marc Fabrice', 'tmf123', 'Toure13$');

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id_ann` int(10) NOT NULL,
  `title_ann` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ann` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ann` datetime NOT NULL,
  `image_ann` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_ann`, `title_ann`, `content_ann`, `date_ann`, `image_ann`) VALUES
(1, 'La pensee algorithmique du developpeur', 'Le faite meme de concevoir un systeme d\'information d\'une application quelque la plateforme a laquel elle est destinee reduit de 80% la tache du codeu. Lorsqu\'il manque a un developpeur cette pensee algorithmique ce denier devient qu\'un vulgaire tracducteur et pas rien d\'autre', '2021-01-20 20:09:37', 'images/annonce/caroussel3.jpg'),
(2, 'Le but du binnomage en grande ecole', 'jjsksxkn bjgvdbn z,dhw, mnhkmd,e', '2021-01-30 20:20:04', 'images/annonce/caroussel4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_comentaire` int(10) NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `cible` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(10) NOT NULL,
  `identifiant` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime DEFAULT NULL,
  `mat_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `identifiant`, `mot_pass`, `created_at`, `last_update`, `mat_membre`) VALUES
(1, 'RGL789F78-0001', '$2y$12$fv0Np0zE7/SX0k8swVZPjexRiY6arPkqAqx/bkO1YfeQ847TCx8wS', '2021-04-28 13:01:18', NULL, 1),
(2, 'RGL76414F-0003', '$2y$12$HhrTnZlLF59UtO2v6gZ2LuuJ35LEdt4Baiu/2tXutLKxePiFE9Kra', '2021-04-28 13:27:28', NULL, 3),
(3, 'CF741DD3-0004', '$2y$12$KcUGTpE4UgTkE/cHaAA0fO2/x5nJBBtNfvWGz28PgHqjD9dockgt.', '2021-04-28 13:47:26', NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `compte_demande`
--

CREATE TABLE `compte_demande` (
  `id_cmpt_dmd` int(11) NOT NULL,
  `identifiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_cmpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_dmd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_demande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compte_demande`
--

INSERT INTO `compte_demande` (`id_cmpt_dmd`, `identifiant`, `mdp_cmpt`, `code_dmd`, `id_demande`) VALUES
(7, 'RGL2021', '98915c30', '05c9831985d00cf6f4dc0740f7b2c361', 7);

-- --------------------------------------------------------

--
-- Structure de la table `correction`
--

CREATE TABLE `correction` (
  `id_correct` int(10) NOT NULL,
  `nom_correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sujet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `correction`
--

INSERT INTO `correction` (`id_correct`, `nom_correct`, `lien_correct`, `id_sujet`) VALUES
(1, 'correction_algo', '/public/docs/corrections/correction_algo.pdf', 3),
(2, 'correction_bts_anglais', 'dfghjk', 5);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_demad` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id_demad`, `date`, `lieu`, `filiere`, `qualite`, `id_membre`) VALUES
(7, '2021-05-31 00:00:00', 'Yamoussoukro', 'RGL', 'DELEGUE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `discution`
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
-- Structure de la table `formation`
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
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_forma`, `cour_forma`, `titre_forma`, `extrait`, `date_ajout`, `date_modif`, `auteur_forma`) VALUES
(1, 'ALGORITHMIQUE', 'Introduction a l\'algorithmique', 'Dompter le monde de la programmation informatique a travers la puissance qu\'offre\r\nl\'algorithmique.Ce cour procurera les bases nécessaire a la bonne comprehension de tout langage de programmation.', '2021-02-04 19:55:29', '2021-02-11 19:55:29', 'TMF_AAS'),
(2, 'PHP', 'DYNAMISER VOS PAGES WEB AVEC PHP', 'A travers ce cour des php vous serai capable\r\nde faire communiquer vos pages avec l’extérieur(les clients), de concevoir des systèmes de gestion de donnée ....', '2021-02-04 19:56:57', '2021-02-04 19:56:57', 'AAS'),
(3, 'MERISE', 'MONTER VOTRE PROJET AVEC MERISE', 'Ce cour de merise vous aidera a la conception de vos systeme d\'information efficace et developpera votre logique dans les etape de gestion de projet.', '2021-02-10 19:58:19', '2021-02-18 19:58:19', 'TMF_AAS');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
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
-- Structure de la table `forum_category`
--

CREATE TABLE `forum_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forum_subject`
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
-- Structure de la table `membre`
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
  `about_me` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '\'Donnez aux autres une bref decription de qui vous êtes ...\'',
  `validation` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'faux'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`mat_membre`, `nom`, `prenom`, `date_naissance`, `email`, `contact`, `ville`, `genre`, `status`, `filiere`, `image`, `created_at`, `last_update`, `about_me`, `validation`) VALUES
(1, 'toure', 'Marc Fabrice', '1997-01-13', 'touremarc25@gmail.com', '0586291789', 'Abidjan', 'homme', 'parrain', 'RGL2A', 'images/img-bino2.png', '2021-04-28 12:59:41', NULL, '\'Donnez aux autres une bref decription de qui vous êtes ...\'', 'vrai'),
(2, 'stark', 'tony', '1999-05-25', 'riliw34329@hype68.com', '05416765', 'olympe', 'homme', 'parrain', 'RGL2A', 'images/img-bino2.png', '2021-04-28 13:19:27', NULL, '\'Donnez aux autres une bref decription de qui vous êtes ...\'', 'vrai'),
(3, 'palm', 'sie yves', '1999-05-26', 'yvesvaleriane27@gmail.com', '08516764', 'Abidjan', 'homme', 'parrain', 'RGL2A', 'images/img-bino2.png', '2021-04-28 13:24:34', NULL, '\'Donnez aux autres une bref decription de qui vous êtes ...\'', 'vrai'),
(4, 'kouassi', 'albert', '1997-01-12', 'daltuvapsa@biyac.com', '01669741', 'Abidjan', 'homme', 'filleul', 'RGL1A', 'images/img-bino2.png', '2021-04-28 13:44:18', NULL, '\'Donnez aux autres une bref decription de qui vous êtes ...\'', 'vrai'),
(5, 'kouadjo', 'kouassi rita', '1985-04-21', 'daltuvapsa@biyac.com', '01669741', 'touba', 'FEMME', 'filleul', 'RGL1A', 'images/img-bino2.png', '2021-04-28 14:07:53', NULL, '\'Donnez aux autres une bref decription de qui vous êtes ...\'', 'vrai'),
(6, 'bamba', 'aicha', '1998-04-27', 'daltuvapsa@biyac.com', '01669744', 'san pedro', 'femme', 'filleul', 'RGL1A', 'images/img-bino2.png', '2021-04-28 14:13:18', NULL, '\'Donnez aux autres une bref decription de qui vous êtes ...\'', 'vrai'),
(7, 'minato', 'uzumaki', '1991-04-19', 'daltuvapsa@biyac.com', '01647945', 'konoha', 'homme', 'parrain', 'RGL2A', 'images/img-bino2.png', '2021-04-28 14:15:56', NULL, '\'Donnez aux autres une bref decription de qui vous êtes ...\'', 'vrai'),
(8, 'madara', 'uchiwa', '1985-04-19', 'daltuvapsa@biyac.com', '45916475', 'konoha', 'homme', 'parrain', 'RGL2A', 'images/img-bino2.png', '2021-04-28 14:21:08', NULL, '\'Donnez aux autres une bref decription de qui vous êtes ...\'', 'vrai'),
(9, 'ino', 'yamanaka', '1981-04-22', 'daltuvapsa@biyac.com', '05479154', 'tokyo', 'femme', 'filleul', 'RGL1A', 'images/img-bino2.png', '2021-04-28 14:21:08', NULL, '\'Donnez aux autres une bref decription de qui vous êtes ...\'', 'vrai');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_notif` int(10) NOT NULL,
  `titre_notif` varchar(255) NOT NULL,
  `content_notif` varchar(255) NOT NULL,
  `date_notif` datetime NOT NULL,
  `destinataire` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id_notif`, `titre_notif`, `content_notif`, `date_notif`, `destinataire`) VALUES
(1, 'Hola', 'Salut TMF cool de te compter parmis nos membres', '2021-05-23 02:49:00', 1);

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

-- --------------------------------------------------------

--
-- Structure de la table `parrainage`
--

CREATE TABLE `parrainage` (
  `id_parr` int(11) NOT NULL,
  `date_parr` datetime NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

CREATE TABLE `suggestion` (
  `id_suggest` int(10) NOT NULL,
  `content_suggest` text NOT NULL,
  `date_suggest` datetime NOT NULL,
  `id_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `suggestion`
--

INSERT INTO `suggestion` (`id_suggest`, `content_suggest`, `date_suggest`, `id_membre`) VALUES
(17, 'super cool', '2021-05-21 08:05:45', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
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
  `nom_typ_sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `lien_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_forma` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Index pour la table `compte_demande`
--
ALTER TABLE `compte_demande`
  ADD PRIMARY KEY (`id_cmpt_dmd`),
  ADD KEY `id_demande` (`id_demande`);

--
-- Index pour la table `correction`
--
ALTER TABLE `correction`
  ADD PRIMARY KEY (`id_correct`),
  ADD KEY `id_sujet` (`id_sujet`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_demad`),
  ADD KEY `id_menbre` (`id_membre`);

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
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `forum_category_id` (`forum_category_id`);

--
-- Index pour la table `forum_category`
--
ALTER TABLE `forum_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `forum_subject`
--
ALTER TABLE `forum_subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `subtitle` (`subtitle`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`mat_membre`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `destinatiaire` (`destinataire`);

--
-- Index pour la table `notification_global`
--
ALTER TABLE `notification_global`
  ADD PRIMARY KEY (`id_notif_glob`);

--
-- Index pour la table `parrainage`
--
ALTER TABLE `parrainage`
  ADD PRIMARY KEY (`id_parr`),
  ADD KEY `mat_membre` (`mat_membre`);

--
-- Index pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id_suggest`),
  ADD KEY `id_membre` (`id_membre`);

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
  MODIFY `id_compte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `compte_demande`
--
ALTER TABLE `compte_demande`
  MODIFY `id_cmpt_dmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `correction`
--
ALTER TABLE `correction`
  MODIFY `id_correct` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_demad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forum_subject`
--
ALTER TABLE `forum_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `mat_membre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `notification_global`
--
ALTER TABLE `notification_global`
  MODIFY `id_notif_glob` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `parrainage`
--
ALTER TABLE `parrainage`
  MODIFY `id_parr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id_suggest` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`mat_membre`) REFERENCES `membre` (`mat_membre`);

--
-- Contraintes pour la table `correction`
--
ALTER TABLE `correction`
  ADD CONSTRAINT `correction_ibfk_1` FOREIGN KEY (`id_sujet`) REFERENCES `sujet` (`id_sujet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`forum_category_id`) REFERENCES `forum_category` (`id`);

--
-- Contraintes pour la table `forum_subject`
--
ALTER TABLE `forum_subject`
  ADD CONSTRAINT `forum_subject_ibfk_1` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`),
  ADD CONSTRAINT `forum_subject_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `membre` (`mat_membre`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`destinataire`) REFERENCES `membre` (`mat_membre`);

--
-- Contraintes pour la table `parrainage`
--
ALTER TABLE `parrainage`
  ADD CONSTRAINT `parrainage_ibfk_1` FOREIGN KEY (`mat_membre`) REFERENCES `membre` (`mat_membre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`mat_membre`) ON DELETE CASCADE ON UPDATE CASCADE;

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
