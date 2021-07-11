-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 10:34 PM
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
  `id_activite` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `type_activite` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`id_activite`, `nom`, `type_activite`) VALUES
('721df03d-1823-4da1-8002-fd3b2c56b16f', 'Hockey', '260cffb8-909f-4d4c-858f-166fa6ec35e4'),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864', 'soccer', '260cffb8-909f-4d4c-858f-166fa6ec35e4');

-- --------------------------------------------------------

--
-- Table structure for table `activite_du_bloc`
--

CREATE TABLE `activite_du_bloc` (
  `id_activite` varchar(40) NOT NULL,
  `id_bloc` varchar(40) NOT NULL,
  `ordre` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activite_programme`
--

CREATE TABLE `activite_programme` (
  `id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activite_programme`
--

INSERT INTO `activite_programme` (`id`) VALUES
('721df03d-1823-4da1-8002-fd3b2c56b16f'),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864');

-- --------------------------------------------------------

--
-- Table structure for table `bloc`
--

CREATE TABLE `bloc` (
  `id_bloc` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enfant`
--

CREATE TABLE `enfant` (
  `id` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `url_photo` varchar(200) DEFAULT NULL,
  `id_parent` varchar(40) NOT NULL,
  `note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enfant`
--

INSERT INTO `enfant` (`id`, `nom`, `prenom`, `date_naissance`, `url_photo`, `id_parent`, `note`) VALUES
('38e91455-9674-4080-8da4-d9cec41a82ee', 'Simpson', 'Bart', '2021-07-05', 'public/img/photosProfil/b2b0e8a5-b458-4d6f-97ec-650ecbac83b8.jpg', '1be9edcd-aaae-4494-aa68-90406d7461b5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gabarit_programme`
--

CREATE TABLE `gabarit_programme` (
  `id` varchar(40) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gabarit_programme`
--

INSERT INTO `gabarit_programme` (`id`, `titre`, `description`) VALUES
('111', 'Le Classique', 'Le classique comprend chaque jour un bloc d’activités de type sportif et un autre avec une activité de type art et une activité de type science.'),
('222', 'Les Arts et la Science', '\r\nLe programme arts et science comprend plusieurs activités d\'arts culinaires, d\'arts visuels, d\'arts plastiques, de chimie, de biologie et de physique. Il ne possède pas d’activité physique, cependant une activité matinale est réservée pour pratiquer le yoga ou jouer à un jeu de course comme le ballon chasseur. '),
('333', 'L\'Enfant Actif', '\r\nLe programme athlétique est un camp de jour sportif intensif pour les enfants très actifs. Il comprend au moins quatre activités quotidiennes dont le basketball, le tennis, le soccer, le ballon chasseur, le baseball, etc. ');

-- --------------------------------------------------------

--
-- Table structure for table `horaire_programme`
--

CREATE TABLE `horaire_programme` (
  `id_programme` varchar(40) NOT NULL,
  `id_activite_programme` varchar(40) NOT NULL,
  `plage_horaire` int(11) NOT NULL,
  `duree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `id_programme_semaine` varchar(40) NOT NULL,
  `id_enfant` varchar(40) NOT NULL,
  `paye` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `courriel` varchar(200) NOT NULL,
  `adresse` varchar(300) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `url_photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `nom`, `prenom`, `courriel`, `adresse`, `date_de_naissance`, `url_photo`) VALUES
('1be9edcd-aaae-4494-aa68-90406d7461b5', 'Simpson', 'Homer', 'chunkylover53@aol.com', '742 Evergreen Terrace, Springfield', '1953-05-12', 'public/img/photosProfil/1a7d4a92-def9-415f-90c0-187f3398e1c8.jpg'),
('cb2a28ae-98a8-4638-95f3-0a989eb2a864', 'Marsh', 'Randy', 'randymarsh@southpark.com', '260 Avenue de los Mexicanos, Southpark', '1949-04-08', 'public/img/photosProfil/bcefec85-c3e9-4807-8adc-102e0e86d0ff.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `id` varchar(40) NOT NULL,
  `id_gabarit_programme` varchar(40) NOT NULL,
  `id_session` varchar(40) NOT NULL,
  `animateur` varchar(300) DEFAULT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `programme_semaine`
--

CREATE TABLE `programme_semaine` (
  `id` varchar(40) NOT NULL,
  `id_programme` varchar(40) NOT NULL,
  `id_semaine` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semaine`
--

CREATE TABLE `semaine` (
  `id` varchar(40) NOT NULL,
  `id_session` varchar(40) NOT NULL,
  `no_semaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `nom`, `description`, `date_debut`, `date_fin`) VALUES
('2b166bb1-e430-4274-9bd9-d82f0511f451', 'Session 2021', 'Le Classique, les arts et la science, l\'enfant actif.', '2021-06-01', '2021-09-01'),
('b80bffc5-5a53-4436-bcdf-3d2d978074a8', 'Session 2020', 'Le Classique, les arts et la science, l\'enfant actif.', '2020-07-01', '2020-09-01'),
('dac7e02e-bd0a-46fa-8723-17bff6ce019f', 'Session 2019', 'Le Classique, les arts et la science, l\'enfant actif.', '2019-06-01', '2019-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `type_activite`
--

CREATE TABLE `type_activite` (
  `id` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_activite`
--

INSERT INTO `type_activite` (`id`, `nom`, `description`) VALUES
('260cffb8-909f-4d4c-858f-166fa6ec35e4', 'Sport', 'On bouge!'),
('5c8fbe7b-944a-4f98-b4dc-abcd2d3a82db', 'Art', 'On cree!'),
('7d62ec3e-0044-46c4-b256-b94715145b2c', 'Science', 'On Explose');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` varchar(40) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `est_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom_utilisateur`, `mot_de_passe`, `est_admin`) VALUES
('1be9edcd-aaae-4494-aa68-90406d7461b5', 'homer', '$2y$10$dU8tO7hCXsY7gwvZp6Zn1e89Os67i79XzngLxdblmkFKcR7RinUlS', 0),
('cb2a28ae-98a8-4638-95f3-0a989eb2a864', 'Tegridy', '$2y$10$n3oq9nbXJ6rLad.9nTHylu8QGNWQHw9Kbhut.r7x2qWesEaXHi1/a', 0);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
