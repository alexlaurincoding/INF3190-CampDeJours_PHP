-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 11:53 PM
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
('59460476-f2bc-428d-a329-fc24df2cdcd3', 'criquet', '260cffb8-909f-4d4c-858f-166fa6ec35e4'),
('721df03d-1823-4da1-8002-fd3b2c56b16f', 'Hockey', '260cffb8-909f-4d4c-858f-166fa6ec35e4'),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864', 'soccer', '260cffb8-909f-4d4c-858f-166fa6ec35e4'),
('815d32ba-1528-4e1a-9782-c0e1dad09a1b', 'Eteindre une cigarette avec du gaz', '7d62ec3e-0044-46c4-b256-b94715145b2c'),
('b0df7bfc-a565-44ad-894a-4773292addf5', 'Bricolage', '5c8fbe7b-944a-4f98-b4dc-abcd2d3a82db');

-- --------------------------------------------------------

--
-- Table structure for table `activite_du_bloc`
--

CREATE TABLE `activite_du_bloc` (
  `id_activite` varchar(40) NOT NULL,
  `id_bloc` varchar(40) NOT NULL,
  `ordre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activite_du_bloc`
--

INSERT INTO `activite_du_bloc` (`id_activite`, `id_bloc`, `ordre`) VALUES
('59460476-f2bc-428d-a329-fc24df2cdcd3', '9317448f-8b6d-47b7-98b4-84b7f68b57c7', 1),
('59460476-f2bc-428d-a329-fc24df2cdcd3', 'baa049d0-e50f-49ea-9c21-100257acda80', 1),
('721df03d-1823-4da1-8002-fd3b2c56b16f', '9317448f-8b6d-47b7-98b4-84b7f68b57c7', 2),
('721df03d-1823-4da1-8002-fd3b2c56b16f', '9972dfe2-ceca-47e3-9073-028b88fa2cd7', 1),
('721df03d-1823-4da1-8002-fd3b2c56b16f', 'baa049d0-e50f-49ea-9c21-100257acda80', 2),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864', '9317448f-8b6d-47b7-98b4-84b7f68b57c7', 3),
('815d32ba-1528-4e1a-9782-c0e1dad09a1b', 'ef5f602b-2161-4606-9e79-1a5ea6a48405', 1),
('b0df7bfc-a565-44ad-894a-4773292addf5', '9972dfe2-ceca-47e3-9073-028b88fa2cd7', 2),
('b0df7bfc-a565-44ad-894a-4773292addf5', 'ef5f602b-2161-4606-9e79-1a5ea6a48405', 2);

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
('02f898ff-7772-41cd-8b0b-fd90fa5e0362'),
('063dda06-ad1c-4d5b-86eb-270ea41a0197'),
('1396a8f1-8112-4999-a02a-c3ba61d65d48'),
('17c277eb-9338-46b9-ab10-fcc7600316ea'),
('59460476-f2bc-428d-a329-fc24df2cdcd3'),
('5b669bf7-c79d-48df-982c-50b103e7abc6'),
('721df03d-1823-4da1-8002-fd3b2c56b16f'),
('744faee1-551c-4382-9c6c-8a952f626f89'),
('74d43499-5dd9-4a66-b702-ffa5afd21b58'),
('7e25258e-aa4d-44d1-b3eb-2f883b7e062f'),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864'),
('815d32ba-1528-4e1a-9782-c0e1dad09a1b'),
('9317448f-8b6d-47b7-98b4-84b7f68b57c7'),
('93aac1de-e870-4c8b-880d-c787c993242a'),
('9972dfe2-ceca-47e3-9073-028b88fa2cd7'),
('a1276fca-a987-4298-83e2-bb006d77c4ea'),
('b0df7bfc-a565-44ad-894a-4773292addf5'),
('b8137609-4093-479d-b29d-2f66a4e0f9f5'),
('baa049d0-e50f-49ea-9c21-100257acda80'),
('c5a21560-4d5a-4850-8235-a850d40a4853'),
('c73edfb9-e5ea-4bb5-91e7-20b070f3db95'),
('ef5f602b-2161-4606-9e79-1a5ea6a48405'),
('fb97af13-de66-49e8-a02c-c1e1aec6b4af');

-- --------------------------------------------------------

--
-- Table structure for table `bloc`
--

CREATE TABLE `bloc` (
  `id_bloc` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloc`
--

INSERT INTO `bloc` (`id_bloc`, `nom`) VALUES
('9317448f-8b6d-47b7-98b4-84b7f68b57c7', 'trois c\'est mieux'),
('9972dfe2-ceca-47e3-9073-028b88fa2cd7', 'Bloc sport et Art'),
('baa049d0-e50f-49ea-9c21-100257acda80', 'Bloc Sport'),
('ef5f602b-2161-4606-9e79-1a5ea6a48405', 'Bloc Art et science');

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
  `notes` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enfant`
--

INSERT INTO `enfant` (`id`, `nom`, `prenom`, `date_naissance`, `url_photo`, `id_parent`, `notes`) VALUES
('38e91455-9674-4080-8da4-d9cec41a82ee', 'Simpson', 'Bart', '2021-07-05', 'public/img/photosProfil/b2b0e8a5-b458-4d6f-97ec-650ecbac83b8.jpg', '1be9edcd-aaae-4494-aa68-90406d7461b5', 'Alergique aux crevettes'),
('b6abd3a7-ffc2-4b5c-ae02-c435c08cd2eb', 'Simpson', 'Lisa', '1978-08-05', 'public/img/photosProfil/fdff8092-8ba9-496f-bcec-d6eddca92bb4.jpg', '1be9edcd-aaae-4494-aa68-90406d7461b5', NULL);

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
('art_science', 'Les Arts et la Science', '\r\nLe programme arts et science comprend plusieurs activités d\'arts culinaires, d\'arts visuels, d\'arts plastiques, de chimie, de biologie et de physique. Il ne possède pas d’activité physique, cependant une activité matinale est réservée pour pratiquer le yoga ou jouer à un jeu de course comme le ballon chasseur. '),
('classique', 'Le Classique', 'Le classique comprend chaque jour un bloc d’activités de type sportif et un autre avec une activité de type art et une activité de type science.'),
('enfant_actif', 'L\'Enfant Actif', '\r\nLe programme athlétique est un camp de jour sportif intensif pour les enfants très actifs. Il comprend au moins quatre activités quotidiennes dont le basketball, le tennis, le soccer, le ballon chasseur, le baseball, etc. ');

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

--
-- Dumping data for table `horaire_programme`
--

INSERT INTO `horaire_programme` (`id_programme`, `id_activite_programme`, `plage_horaire`, `duree`) VALUES
('1c305201-3eab-453b-a1fe-5ec1d91b1ab9', '815d32ba-1528-4e1a-9782-c0e1dad09a1b', 2, 2),
('1c305201-3eab-453b-a1fe-5ec1d91b1ab9', 'b0df7bfc-a565-44ad-894a-4773292addf5', 3, 2),
('1c305201-3eab-453b-a1fe-5ec1d91b1ab9', 'ef5f602b-2161-4606-9e79-1a5ea6a48405', 1, 4),
('2f3200cf-9cf0-4aee-b00d-3f699b33adc5', '721df03d-1823-4da1-8002-fd3b2c56b16f', 2, 2),
('2f3200cf-9cf0-4aee-b00d-3f699b33adc5', '7ea82ea6-21cc-4270-9a4c-9175b4e8e864', 1, 4);

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

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `id_gabarit_programme`, `id_session`, `animateur`, `prix`) VALUES
('1c305201-3eab-453b-a1fe-5ec1d91b1ab9', 'art_science', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 'Gilles, Paul, Lucille', 150),
('2f3200cf-9cf0-4aee-b00d-3f699b33adc5', 'art_science', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 'Bob, Lucille, Bobette', 150);

-- --------------------------------------------------------

--
-- Table structure for table `programme_semaine`
--

CREATE TABLE `programme_semaine` (
  `id` varchar(40) NOT NULL,
  `id_programme` varchar(40) NOT NULL,
  `id_semaine` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programme_semaine`
--

INSERT INTO `programme_semaine` (`id`, `id_programme`, `id_semaine`) VALUES
('2d91befd-848c-414c-86ce-9065e8574856', '2f3200cf-9cf0-4aee-b00d-3f699b33adc5', '4341ec63-e58e-4ea6-96dd-2170ad308dc7'),
('2f3434a4-0f48-4a67-beea-1c45047bf9bb', '1c305201-3eab-453b-a1fe-5ec1d91b1ab9', '57c2b7ff-e547-413a-bb0c-0067471f2cde'),
('32a92f6b-6802-472e-a8a2-8343e03901f4', '2f3200cf-9cf0-4aee-b00d-3f699b33adc5', '1c7b98de-2e90-441c-bc89-5e23d1bd71bb'),
('4345bbc2-0d49-402d-b7f0-6c337796bea7', '1c305201-3eab-453b-a1fe-5ec1d91b1ab9', '8bb42465-ee08-48d2-9fd6-ce4a7e487bd4'),
('5e0f1896-5cfc-4e27-a114-4e42816d4c93', '2f3200cf-9cf0-4aee-b00d-3f699b33adc5', 'ce90a550-9614-4a16-bce3-f3e3f4ac1730'),
('822a08d5-509b-4421-9221-0136d2b6d2ae', '2f3200cf-9cf0-4aee-b00d-3f699b33adc5', 'f29809dc-e6b7-402d-b01e-bd8bd2c02ad0'),
('9f71773a-0a86-40e1-a548-7982c7828936', '1c305201-3eab-453b-a1fe-5ec1d91b1ab9', 'faea3d23-9319-4186-ba89-ea00b71fd127'),
('d39892c6-aa72-4bf7-bb55-19cac93f446c', '1c305201-3eab-453b-a1fe-5ec1d91b1ab9', '57182ae8-7771-4ad1-aa12-294f7a4dc555');

-- --------------------------------------------------------

--
-- Table structure for table `semaine`
--

CREATE TABLE `semaine` (
  `id` varchar(40) NOT NULL,
  `id_session` varchar(40) NOT NULL,
  `no_semaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semaine`
--

INSERT INTO `semaine` (`id`, `id_session`, `no_semaine`) VALUES
('092d7182-3eb3-4f5e-b992-8c38543eac3c', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 4),
('0b85fa62-b0ac-47c7-b90a-0000241374f3', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 11),
('0f8c6a28-bf53-4847-89dd-c07aa303181c', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 3),
('1938563c-ea83-4ee0-9eba-db368334a78e', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 15),
('1c7b98de-2e90-441c-bc89-5e23d1bd71bb', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 12),
('22450709-358c-4947-b1a1-80fab9087ae3', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 6),
('2b74f2b8-c0c1-41dd-9171-07228ac1d998', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 15),
('2cfe3621-4d01-482b-b165-01af27c302a6', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 14),
('30652b66-a96a-476a-8347-074f3ed39f17', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 5),
('38d9543f-83da-4e80-9e81-6da55e44bffd', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 10),
('4341ec63-e58e-4ea6-96dd-2170ad308dc7', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 13),
('4c33bbf7-3d59-43b7-a56b-900e7dca452d', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 9),
('57182ae8-7771-4ad1-aa12-294f7a4dc555', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 8),
('57c2b7ff-e547-413a-bb0c-0067471f2cde', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 1),
('5cf2ce9a-da6f-489f-a6ae-b4fd6a2c9fcc', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 5),
('7d266472-fb16-4d7c-9927-30b585f2fe46', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 8),
('8104ee1f-aa54-4436-a76f-58e7cb23d2f1', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 6),
('870e64f3-d149-4842-a2ac-42ac84eb5992', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 14),
('8bb42465-ee08-48d2-9fd6-ce4a7e487bd4', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 3),
('9672d365-c10b-4442-bfd8-8e8a782e8c0c', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 10),
('9fa7b6a1-172a-4147-9a79-f50ff63e4761', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 12),
('ac55448e-8008-494b-94b8-aeb8bed0efaf', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 1),
('b41e0587-cb60-4fc8-ad9e-38308ccd0f92', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 11),
('bbc2aad7-4478-4bbf-a349-160569056643', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 7),
('c868a2c8-d198-4450-89b5-f9eac1bc1e3e', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 2),
('ce90a550-9614-4a16-bce3-f3e3f4ac1730', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 7),
('d9607b3b-0635-429d-a99a-ececae034c85', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 4),
('e8df0d50-9db8-4df6-a55f-340345c1148c', 'e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 13),
('f29809dc-e6b7-402d-b01e-bd8bd2c02ad0', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 2),
('faea3d23-9319-4186-ba89-ea00b71fd127', 'fa40781e-5e0c-4702-ac29-d5a422c76c92', 9);

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
('e68cc607-8cbb-4c0b-b3f7-a6a12cfd925d', 'Session 2022', 'Le Classique, les arts et la science, l\'enfant actif.', '2022-06-01', '2022-08-01'),
('fa40781e-5e0c-4702-ac29-d5a422c76c92', 'Session 2021', 'Le Classique, les arts et la science, l\'enfant actif.', '2021-06-02', '2021-08-01');

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
('cb2a28ae-98a8-4638-95f3-0a989eb2a864', 'Tegridy', '$2y$10$n3oq9nbXJ6rLad.9nTHylu8QGNWQHw9Kbhut.r7x2qWesEaXHi1/a', 0),
('fe031680-545e-4bb6-b3e2-8c7356de6e68', 'admin', '$2y$10$aPuC0HyptQ751xsX2NbBROwoHUVD4n3O/8O6mUXJxlAESGN5Qb.7i', 1);

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
  ADD PRIMARY KEY (`id_activite`,`id_bloc`,`ordre`),
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
