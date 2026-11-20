-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 nov. 2026 à 19:28
-- Version du serveur : 10.11.19-MariaDB
-- Version de PHP : 8.3.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `imc_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE `mesures` (
  `id` int(11) NOT NULL,
  `personne_id` int(11) NOT NULL,
  `poids` decimal(5,1) NOT NULL,
  `taille` decimal(3,2) NOT NULL,
  `imc` decimal(4,1) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `date_mesure` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mesures`
--

INSERT INTO `mesures` (`id`, `personne_id`, `poids`, `taille`, `imc`, `categorie`, `date_mesure`) VALUES
(1, 1, 72.5, 1.75, 23.7, 'Normal', '2026-11-20 15:51:52'),
(2, 1, 80.0, 1.75, 26.1, 'Surpoids', '2026-11-20 15:51:52'),
(3, 2, 52.0, 1.68, 18.4, 'Sous-poids', '2026-11-20 15:51:52'),
(4, 2, 58.0, 1.68, 20.5, 'Normal', '2026-11-20 15:51:52'),
(5, 3, 95.0, 1.72, 32.1, 'Obésité', '2026-11-20 15:51:52');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `prenom`) VALUES
(1, 'Ben Salah', 'Amine'),
(2, 'Trabelsi', 'Sana'),
(3, 'Gharbi', 'Youssef');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personne_id` (`personne_id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `mesures`
--
ALTER TABLE `mesures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD CONSTRAINT `mesures_ibfk_1` FOREIGN KEY (`personne_id`) REFERENCES `personnes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
