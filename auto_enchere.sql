-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db:3306
-- Généré le : mer. 15 juin 2022 à 13:25
-- Version du serveur : 5.7.38
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `auto_enchere`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce_produit`
--

CREATE TABLE `annonce_produit` (
  `id` int(11) NOT NULL,
  `prix_depart_enchere` float NOT NULL,
  `date_mise_en_ligne` datetime NOT NULL,
  `date_fin_enchere` datetime NOT NULL,
  `modele` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `puissance` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `historique_encheres`
--

CREATE TABLE `historique_encheres` (
  `id` int(11) NOT NULL,
  `derniere_encheres` datetime NOT NULL,
  `prix_final` float NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_annonce_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce_produit`
--
ALTER TABLE `annonce_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);
  

--
-- Index pour la table `historique_encheres`
--
ALTER TABLE `historique_encheres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_annonce_produit` (`id_annonce_produit`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce_produit`
--
ALTER TABLE `annonce_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historique_encheres`
--
ALTER TABLE `historique_encheres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce_produit`
--
ALTER TABLE `annonce_produit`
  ADD CONSTRAINT `annonce_produit_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `historique_encheres`
--
ALTER TABLE `historique_encheres`
  ADD CONSTRAINT `historique_encheres_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `historique_encheres_ibfk_2` FOREIGN KEY (`id_annonce_produit`) REFERENCES `annonce_produit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
