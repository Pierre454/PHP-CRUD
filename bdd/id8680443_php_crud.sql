-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 26 fév. 2019 à 15:50
-- Version du serveur :  10.3.13-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `id8680443_php_crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `c_id` int(10) NOT NULL,
  `c_nom` varchar(25) NOT NULL,
  `c_adresse` varchar(50) NOT NULL,
  `c_telephone` varchar(15) NOT NULL,
  `c_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`c_id`, `c_nom`, `c_adresse`, `c_telephone`, `c_mail`) VALUES
(84, 'Louis Laiolo', '140 rue test', '0611353644', 'Test@gmail.com'),
(85, 'Pierre Chiesa', '140 rue Albert Einstein', '0600000000', 'Test@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `c_facture`
--

CREATE TABLE `c_facture` (
  `cf_id` int(11) NOT NULL,
  `cf_c_id` int(10) NOT NULL,
  `cf_ref` varchar(20) NOT NULL,
  `cf_date_em` date NOT NULL,
  `cf_date_rec` date NOT NULL,
  `cf_taux_tva` double NOT NULL DEFAULT 0.2,
  `cf_total_ht` double NOT NULL,
  `cf_montant_tva` double NOT NULL,
  `cf_total_ttc` double NOT NULL,
  `cf_acquitte` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `f_id` int(10) NOT NULL,
  `f_nom` varchar(25) NOT NULL,
  `f_adresse` varchar(50) NOT NULL,
  `f_telephone` varchar(15) NOT NULL,
  `f_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`f_id`, `f_nom`, `f_adresse`, `f_telephone`, `f_mail`) VALUES
(12, 'Consom\'F', '22 rue Dupont, 06000 Nice', '0645857695', 'consom@gmail.com'),
(14, 'Test', '160 avenue test', '0600000011', 'test2@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `f_facture`
--

CREATE TABLE `f_facture` (
  `ff_id` int(11) NOT NULL,
  `ff_f_id` int(10) NOT NULL,
  `ff_ref` varchar(20) NOT NULL,
  `ff_desc` varchar(200) NOT NULL,
  `ff_date` date NOT NULL,
  `ff_date_rec` date NOT NULL,
  `ff_montant_ht` double NOT NULL,
  `ff_montant_tva` double NOT NULL,
  `ff_montant_ttc` int(11) NOT NULL,
  `ff_fact_paye` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `f_facture`
--

INSERT INTO `f_facture` (`ff_id`, `ff_f_id`, `ff_ref`, `ff_desc`, `ff_date`, `ff_date_rec`, `ff_montant_ht`, `ff_montant_tva`, `ff_montant_ttc`, `ff_fact_paye`) VALUES
(20, 12, '142', 'Facture test', '2019-02-11', '2019-02-14', 1000, 200, 1200, b'1'),
(21, 14, '142', 'Facture Test2', '2019-02-14', '2019-02-18', 1000, 200, 1200, b'0');

-- --------------------------------------------------------

--
-- Structure de la table `listeproduit`
--

CREATE TABLE `listeproduit` (
  `idListe` int(11) NOT NULL,
  `idP` int(10) NOT NULL,
  `idF` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `p_id` int(10) NOT NULL,
  `p_appellation` varchar(10) NOT NULL,
  `p_description` varchar(200) NOT NULL,
  `p_image` varchar(200) NOT NULL,
  `p_montantHT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`p_id`, `p_appellation`, `p_description`, `p_image`, `p_montantHT`) VALUES
(14, 'SGBD-O.', 'SGBD associable à l\'espace', '', 100),
(19, 'SGBD2', 'New SGBD', '', 200);

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

CREATE TABLE `salarie` (
  `s_id` int(11) NOT NULL,
  `s_nom` varchar(25) NOT NULL,
  `s_adresse` varchar(50) NOT NULL,
  `s_telephone` varchar(15) NOT NULL,
  `s_mail` varchar(50) NOT NULL,
  `s_fonction` varchar(20) NOT NULL,
  `s_salaire_net` double NOT NULL,
  `s_salaire_brut` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`s_id`, `s_nom`, `s_adresse`, `s_telephone`, `s_mail`, `s_fonction`, `s_salaire_net`, `s_salaire_brut`) VALUES
(1, 'Jean-Pierre', '45 rue du poiriet', '0645632178', 'jp@free.fr', 'Agent de maintenance', 1800, 2000);

-- --------------------------------------------------------

--
-- Structure de la table `taxe`
--

CREATE TABLE `taxe` (
  `t_id` int(11) NOT NULL,
  `t_type` varchar(30) NOT NULL,
  `t_montant` double NOT NULL,
  `t_date_em` date NOT NULL,
  `t_date_rec` date NOT NULL,
  `t_acquitte` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `taxe`
--

INSERT INTO `taxe` (`t_id`, `t_type`, `t_montant`, `t_date_em`, `t_date_rec`, `t_acquitte`) VALUES
(1, 'Internet', 2500, '2018-01-01', '2018-01-31', b'1'),
(3, 'Location', 500, '2017-12-30', '2018-01-30', b'0'),
(4, 'Eau', 600, '2018-01-01', '2018-01-05', b'1'),
(9, 'Taxe Professionnelle', 1000, '2018-01-18', '2018-12-15', b'1');

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

CREATE TABLE `tva` (
  `tva_id` int(11) NOT NULL,
  `tva_montant` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`tva_id`, `tva_montant`) VALUES
(1, 0.2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_id`);

--
-- Index pour la table `c_facture`
--
ALTER TABLE `c_facture`
  ADD PRIMARY KEY (`cf_id`),
  ADD KEY `cf_c_id` (`cf_c_id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`f_id`);

--
-- Index pour la table `f_facture`
--
ALTER TABLE `f_facture`
  ADD PRIMARY KEY (`ff_id`),
  ADD KEY `ff_f_id` (`ff_f_id`);

--
-- Index pour la table `listeproduit`
--
ALTER TABLE `listeproduit`
  ADD PRIMARY KEY (`idListe`),
  ADD KEY `idP` (`idP`),
  ADD KEY `idF` (`idF`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`p_id`);

--
-- Index pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD PRIMARY KEY (`s_id`);

--
-- Index pour la table `taxe`
--
ALTER TABLE `taxe`
  ADD PRIMARY KEY (`t_id`);

--
-- Index pour la table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`tva_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `c_facture`
--
ALTER TABLE `c_facture`
  MODIFY `cf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `f_facture`
--
ALTER TABLE `f_facture`
  MODIFY `ff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `listeproduit`
--
ALTER TABLE `listeproduit`
  MODIFY `idListe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `salarie`
--
ALTER TABLE `salarie`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `taxe`
--
ALTER TABLE `taxe`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tva`
--
ALTER TABLE `tva`
  MODIFY `tva_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `c_facture`
--
ALTER TABLE `c_facture`
  ADD CONSTRAINT `FK_client` FOREIGN KEY (`cf_c_id`) REFERENCES `client` (`c_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `f_facture`
--
ALTER TABLE `f_facture`
  ADD CONSTRAINT `F_FACTURE_ibfk_1` FOREIGN KEY (`ff_f_id`) REFERENCES `fournisseur` (`f_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `listeproduit`
--
ALTER TABLE `listeproduit`
  ADD CONSTRAINT `LISTEPRODUIT_ibfk_1` FOREIGN KEY (`idP`) REFERENCES `produit` (`p_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `LISTEPRODUIT_ibfk_2` FOREIGN KEY (`idF`) REFERENCES `c_facture` (`cf_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
