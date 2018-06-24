-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 24 Juin 2018 à 21:50
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `prometech`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionneurs`
--

CREATE TABLE `actionneurs` (
  `ID`          int(11)      DEFAULT NULL,
  `numeroCemac` varchar(256) DEFAULT NULL,
  `numSerie`    int(11)      DEFAULT NULL,
  `etat`        int(11)      DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `ID`          int(11)      DEFAULT NULL,
  `numeroCemac` varchar(256) DEFAULT NULL,
  `numSerie`    int(11)      DEFAULT NULL,
  `nom_capteur` text
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

CREATE TABLE `cemac` (
  `numero`         varchar(256) DEFAULT NULL,
  `ID_logement`    int(11)      DEFAULT NULL,
  `ID_utilisateur` int(11)      DEFAULT NULL,
  `trameCount`     int(11)      DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

CREATE TABLE `donnees` (
  `ID`          int(11) NOT NULL,
  `numCemac`    varchar(256) DEFAULT NULL,
  `identifiant` int(11)      DEFAULT NULL,
  `valeur`      int(11)      DEFAULT NULL,
  `unite`       varchar(256) DEFAULT NULL,
  `date`        datetime     DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `gestionLogement`
--

CREATE TABLE `gestionLogement` (
  `ID_utilisateur` int(11) NOT NULL,
  `ID_logement`    int(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

CREATE TABLE `logements` (
  `ID`           int(11) NOT NULL,
  `adresse`      text,
  `nbrPieces`    int(11) DEFAULT NULL,
  `nbrHabitants` int(11) DEFAULT NULL,
  `superficie`   int(11) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `ID`             int(11) NOT NULL,
  `time`           datetime DEFAULT NULL,
  `action`         text    NOT NULL,
  `ID_utilisateur` int(11)  DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modeleProduits`
--

CREATE TABLE `modeleProduits` (
  `ID`        int(11) NOT NULL,
  `modele`    varchar(256) DEFAULT NULL,
  `icon`      int(11)      DEFAULT NULL,
  `ID_modele` int(11)      DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `occupationLogement`
--

CREATE TABLE `occupationLogement` (
  `ID_utilisateur` int(11) NOT NULL,
  `ID_logement`    int(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE `pieces` (
  `ID`          int(11) NOT NULL,
  `ID_logement` int(11)      DEFAULT NULL,
  `nom`         varchar(256) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `positionProduit`
--

CREATE TABLE `positionProduit` (
  `numeroDeSerie` int(11) NOT NULL,
  `ID_piece`      int(11) NOT NULL,
  `nom_capteur`   text
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `numeroDeSerie` int(11) NOT NULL,
  `nom`           varchar(256) DEFAULT NULL,
  `modele`        varchar(256) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`numeroDeSerie`, `nom`, `modele`) VALUES
  (15, 'luminosite', '5'),
  (16, 'infrarouge', '7'),
  (17, 'TestNom', '4'),
  (1234, 'capteur IR', '7'),
  (1251, 'capteur de luminosité', '5'),
  (1290, 'capteur de température', '3'),
  (1951, 'capteur de luminosité', '5'),
  (9999, 'verrou', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `proprieteProduit`
--

CREATE TABLE `proprieteProduit` (
  `ID_utilisateur` int(11) NOT NULL,
  `numeroDeSerie`  int(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ticketsDeSupport`
--

CREATE TABLE `ticketsDeSupport` (
  `ID`       int(11) NOT NULL,
  `etat`     int(11)      DEFAULT NULL,
  `priorite` int(11)      DEFAULT NULL,
  `time`     datetime     DEFAULT NULL,
  `contenu`  text,
  `email`    varchar(256) DEFAULT NULL,
  `objet`    varchar(256) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID`                 int(11) NOT NULL,
  `nom`                varchar(256) DEFAULT NULL,
  `prenom`             varchar(256) DEFAULT NULL,
  `email`              varchar(256) DEFAULT NULL,
  `password`           varchar(256) DEFAULT NULL,
  `statutClient`       tinyint(1)   DEFAULT NULL,
  `statutGestionnaire` tinyint(1)   DEFAULT NULL,
  `statutAdmin`        tinyint(1)   DEFAULT NULL,
  `statutSubordonne`   tinyint(1)   DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `nom`, `prenom`, `email`, `password`, `statutClient`, `statutGestionnaire`, `statutAdmin`, `statutSubordonne`)
VALUES
  (1, 'admin', 'admin', 'admin@domisep.fr', '$2y$10$6xtSda7mfk2TkcGfCh7eQeFK34DY1CFtFS21a/iSXRanlgUKsaG.W', 0, 0, 1, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `donnees`
--
ALTER TABLE `donnees`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `gestionLogement`
--
ALTER TABLE `gestionLogement`
  ADD PRIMARY KEY (`ID_utilisateur`, `ID_logement`);

--
-- Index pour la table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `modeleProduits`
--
ALTER TABLE `modeleProduits`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `occupationLogement`
--
ALTER TABLE `occupationLogement`
  ADD PRIMARY KEY (`ID_utilisateur`, `ID_logement`);

--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `positionProduit`
--
ALTER TABLE `positionProduit`
  ADD PRIMARY KEY (`numeroDeSerie`, `ID_piece`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`numeroDeSerie`);

--
-- Index pour la table `proprieteProduit`
--
ALTER TABLE `proprieteProduit`
  ADD PRIMARY KEY (`ID_utilisateur`, `numeroDeSerie`);

--
-- Index pour la table `ticketsDeSupport`
--
ALTER TABLE `ticketsDeSupport`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `donnees`
--
ALTER TABLE `donnees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 901;
--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 17;
--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 77;
--
-- AUTO_INCREMENT pour la table `modeleProduits`
--
ALTER TABLE `modeleProduits`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
--
-- AUTO_INCREMENT pour la table `pieces`
--
ALTER TABLE `pieces`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `numeroDeSerie` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10000;
--
-- AUTO_INCREMENT pour la table `ticketsDeSupport`
--
ALTER TABLE `ticketsDeSupport`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
