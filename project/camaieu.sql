-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 21 avr. 2021 à 14:35
-- Version du serveur :  10.3.25-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `camaieu`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210420094418', '2021-04-20 11:44:36', 19),
('DoctrineMigrations\\Version20210420094618', '2021-04-20 11:46:22', 19);

-- --------------------------------------------------------

--
-- Structure de la table `palette`
--

CREATE TABLE `palette` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `palette`
--

INSERT INTO `palette` (`id`, `name`, `image`, `color_1`, `color_2`, `color_3`, `color_4`) VALUES
(1, 'Bagger 293', 'wallpaper1.jpg', '#8f725b', '#cee0ed', '#242a35', '#5b4940'),
(2, 'Montagnes enneigées', 'wallpaper2.jpeg', '#395d7a', '#dcddd1', '#66899a', '#96b3b8'),
(3, 'Collines verdoyantes', 'wallpaper3.jpg', '#526e23', '#d9e3f4', '#76a5f0', '#2e7aea'),
(4, 'Matin d\'automne', 'wallpaper4.jpg', '#ebdd9c', '#377d80', '#86ae88', '#c14e47'),
(5, 'L\'hiver vient', 'wallpaper5.jpg', '#d9926e', '#407e9a', '#74bcbb', '#1e2549'),
(6, 'Tempête sur le moulin', 'wallpaper6.jpg', '#d0993d', '#506d97', '#efe7ab', '#ac4c24'),
(7, 'Percée de lumière', 'wallpaper7.jpg', '#2f3028', '#b5b080', '#ced1c2', '#868876'),
(8, 'Là-haut', 'wallpaper8.jpg', '#4d7e8f', '#542454', '#96cab1', '#ccaf99'),
(9, 'Chalet au calme', 'wallpaper9.jpg', '#6d715d', '#64513d', '#c19e3e', '#b65237'),
(10, 'Le jour d\'après', 'wallpaper10.jpg', '#3f4c5e', '#ece6de', '#6f757f', '#bcb7b0'),
(11, 'Cool Colorado', 'wallpaper11.jpg', '#343137', '#d79e3e', '#825641', '#5c443a');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `palette`
--
ALTER TABLE `palette`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `palette`
--
ALTER TABLE `palette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
