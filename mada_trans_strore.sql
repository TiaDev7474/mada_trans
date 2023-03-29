-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 28 mars 2023 à 15:05
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mada_trans_strore`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(125) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `departure`
--

CREATE TABLE `departure` (
  `id` int(11) NOT NULL,
  `id_voit` varchar(12) NOT NULL,
  `date_dep` datetime NOT NULL,
  `Recette` int(11) DEFAULT NULL,
  `ville_dep` varchar(25) NOT NULL,
  `ville_arrivé` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departure`
--

INSERT INTO `departure` (`id`, `id_voit`, `date_dep`, `Recette`, `ville_dep`, `ville_arrivé`) VALUES
(1, '0014TAU', '2023-03-29 18:00:00', 0, 'Fianarantsoa', 'Antananarivo'),
(2, '1452TAR', '2023-03-29 18:00:00', 0, 'Fianarantsoa', 'Antananarivo');

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE `place` (
  `id_voit` varchar(10) NOT NULL,
  `place` int(11) NOT NULL,
  `occupation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `id_reserv` varchar(100) NOT NULL,
  `id_voit` varchar(12) NOT NULL,
  `id_client` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `date_reserv` datetime NOT NULL,
  `date_voayage` date NOT NULL,
  `payement` varchar(50) NOT NULL,
  `montont_avance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id_voit` varchar(12) NOT NULL,
  `design` varchar(10) NOT NULL,
  `type` varchar(12) NOT NULL,
  `nbr_place` int(11) NOT NULL,
  `frais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id_voit`, `design`, `type`, `nbr_place`, `frais`) VALUES
('0014TAU', '0014TAU', 'classique', 24, 30000),
('1452TAR', '1452TAR', 'classique', 24, 30000),
('2477TBA', '2477TBA', 'VIP', 18, 45000),
('5687TAB', '5687TAB', 'classique', 24, 30000),
('6722TBA', '6722TBA', 'premium', 18, 37000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `departure`
--
ALTER TABLE `departure`
  ADD PRIMARY KEY (`id`,`id_voit`);

--
-- Index pour la table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place`,`id_voit`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`id_reserv`,`id_voit`,`id_client`,`place`,`date_reserv`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id_voit`),
  ADD UNIQUE KEY `design` (`design`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `departure`
--
ALTER TABLE `departure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
