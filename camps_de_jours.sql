-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 09:49 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camps_de_jours`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `id_activite` varchar(30) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `type_activite` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activite_du_bloc`
--

CREATE TABLE `activite_du_bloc` (
  `id_activite` varchar(30) NOT NULL,
  `id_bloc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activite_programme`
--

CREATE TABLE `activite_programme` (
  `id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bloc`
--

CREATE TABLE `bloc` (
  `id_bloc` varchar(30) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enfant`
--

CREATE TABLE `enfant` (
  `id` varchar(30) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `url_photo` varchar(200) DEFAULT NULL,
  `id_parent` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gabarit_programme`
--

CREATE TABLE `gabarit_programme` (
  `id` varchar(30) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `horaire_programme`
--

CREATE TABLE `horaire_programme` (
  `id_programme` varchar(30) NOT NULL,
  `id_activite_programme` varchar(30) NOT NULL,
  `plage_horaire` int(11) NOT NULL,
  `duree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `id_programme_semaine` varchar(30) NOT NULL,
  `id_enfant` varchar(30) NOT NULL,
  `paye` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` varchar(30) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `courriel` varchar(200) NOT NULL,
  `adresse` varchar(300) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `url_photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `id` varchar(30) NOT NULL,
  `id_gabarit_programme` varchar(30) NOT NULL,
  `id_session` varchar(30) NOT NULL,
  `animateur` varchar(300) DEFAULT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `programme_semaine`
--

CREATE TABLE `programme_semaine` (
  `id` varchar(30) NOT NULL,
  `id_programme` varchar(30) NOT NULL,
  `id_semaine` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semaine`
--

CREATE TABLE `semaine` (
  `id` varchar(30) NOT NULL,
  `id_session` varchar(30) NOT NULL,
  `no_semaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(30) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type_activite`
--

CREATE TABLE `type_activite` (
  `id` varchar(30) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type_activite_du_bloc`
--

CREATE TABLE `type_activite_du_bloc` (
  `id_bloc` varchar(30) NOT NULL,
  `id_type_activite` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` varchar(30) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `est_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id_activite`),
  ADD KEY `activite_fk1` (`type_activite`);

--
-- Indexes for table `activite_du_bloc`
--
ALTER TABLE `activite_du_bloc`
  ADD PRIMARY KEY (`id_activite`,`id_bloc`),
  ADD KEY `activite_du_bloc_fk1` (`id_bloc`);

--
-- Indexes for table `activite_programme`
--
ALTER TABLE `activite_programme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloc`
--
ALTER TABLE `bloc`
  ADD PRIMARY KEY (`id_bloc`);

--
-- Indexes for table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enfant_fk0` (`id_parent`);

--
-- Indexes for table `gabarit_programme`
--
ALTER TABLE `gabarit_programme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horaire_programme`
--
ALTER TABLE `horaire_programme`
  ADD PRIMARY KEY (`id_programme`,`id_activite_programme`,`plage_horaire`),
  ADD KEY `horaire_programme_fk1` (`id_activite_programme`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_programme_semaine`,`id_enfant`),
  ADD KEY `inscription_fk1` (`id_enfant`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_fk0` (`id_gabarit_programme`),
  ADD KEY `programme_fk1` (`id_session`);

--
-- Indexes for table `programme_semaine`
--
ALTER TABLE `programme_semaine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_semaine_fk0` (`id_programme`),
  ADD KEY `programme_semaine_fk1` (`id_semaine`);

--
-- Indexes for table `semaine`
--
ALTER TABLE `semaine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semaine_fk0` (`id_session`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_activite`
--
ALTER TABLE `type_activite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_activite_du_bloc`
--
ALTER TABLE `type_activite_du_bloc`
  ADD PRIMARY KEY (`id_bloc`,`id_type_activite`),
  ADD KEY `type_activite_du_bloc_fk1` (`id_type_activite`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_utilisateur` (`nom_utilisateur`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_fk0` FOREIGN KEY (`id_activite`) REFERENCES `activite_programme` (`id`),
  ADD CONSTRAINT `activite_fk1` FOREIGN KEY (`type_activite`) REFERENCES `type_activite` (`id`);

--
-- Constraints for table `activite_du_bloc`
--
ALTER TABLE `activite_du_bloc`
  ADD CONSTRAINT `activite_du_bloc_fk0` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `activite_du_bloc_fk1` FOREIGN KEY (`id_bloc`) REFERENCES `bloc` (`id_bloc`);

--
-- Constraints for table `bloc`
--
ALTER TABLE `bloc`
  ADD CONSTRAINT `bloc_fk0` FOREIGN KEY (`id_bloc`) REFERENCES `activite_programme` (`id`);

--
-- Constraints for table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `enfant_fk0` FOREIGN KEY (`id_parent`) REFERENCES `parent` (`id`);

--
-- Constraints for table `horaire_programme`
--
ALTER TABLE `horaire_programme`
  ADD CONSTRAINT `horaire_programme_fk0` FOREIGN KEY (`id_programme`) REFERENCES `programme` (`id`),
  ADD CONSTRAINT `horaire_programme_fk1` FOREIGN KEY (`id_activite_programme`) REFERENCES `activite_programme` (`id`);

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_fk0` FOREIGN KEY (`id_programme_semaine`) REFERENCES `programme_semaine` (`id`),
  ADD CONSTRAINT `inscription_fk1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_fk0` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `programme_fk0` FOREIGN KEY (`id_gabarit_programme`) REFERENCES `gabarit_programme` (`id`),
  ADD CONSTRAINT `programme_fk1` FOREIGN KEY (`id_session`) REFERENCES `session` (`id`);

--
-- Constraints for table `programme_semaine`
--
ALTER TABLE `programme_semaine`
  ADD CONSTRAINT `programme_semaine_fk0` FOREIGN KEY (`id_programme`) REFERENCES `programme` (`id`),
  ADD CONSTRAINT `programme_semaine_fk1` FOREIGN KEY (`id_semaine`) REFERENCES `semaine` (`id`);

--
-- Constraints for table `semaine`
--
ALTER TABLE `semaine`
  ADD CONSTRAINT `semaine_fk0` FOREIGN KEY (`id_session`) REFERENCES `session` (`id`);

--
-- Constraints for table `type_activite_du_bloc`
--
ALTER TABLE `type_activite_du_bloc`
  ADD CONSTRAINT `type_activite_du_bloc_fk0` FOREIGN KEY (`id_bloc`) REFERENCES `bloc` (`id_bloc`),
  ADD CONSTRAINT `type_activite_du_bloc_fk1` FOREIGN KEY (`id_type_activite`) REFERENCES `type_activite` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
