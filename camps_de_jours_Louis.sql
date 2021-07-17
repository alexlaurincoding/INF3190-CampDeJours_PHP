-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 08:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
('4dc24ecc-23ca-432d-91d1-8addb571f75d', 'Ballon chasseur', '260cffb8-909f-4d4c-858f-166fa6ec35e4'),
('538eaf5c-2491-4abd-8170-9f036edc3163', 'Ultimate Frisbee', '260cffb8-909f-4d4c-858f-166fa6ec35e4'),
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

--
-- Dumping data for table `activite_du_bloc`
--

INSERT INTO `activite_du_bloc` (`id_activite`, `id_bloc`, `ordre`) VALUES
('4dc24ecc-23ca-432d-91d1-8addb571f75d', '11dd50f4-b749-44af-84ec-2a0b51b9707c', 1),
('4dc24ecc-23ca-432d-91d1-8addb571f75d', '1b417b04-eb3e-4a11-857d-ca40652341ef', 1),
('4dc24ecc-23ca-432d-91d1-8addb571f75d', '2822f247-802b-4faf-8320-973947cd00c5', 1),
('4dc24ecc-23ca-432d-91d1-8addb571f75d', '33112ccd-089a-4b92-a6e6-667eacb2c0b6', 1),
('4dc24ecc-23ca-432d-91d1-8addb571f75d', '3ca17afe-c691-4d3f-8f93-b6e34b87e4b1', 1),
('4dc24ecc-23ca-432d-91d1-8addb571f75d', '861f7d2c-6c16-4d32-a883-111b70646cc3', 1),
('4dc24ecc-23ca-432d-91d1-8addb571f75d', '95cefa79-ca28-4957-9707-c3a228002786', 1),
('4dc24ecc-23ca-432d-91d1-8addb571f75d', 'c627750f-a187-4cee-868a-eeea53c574b3', 1),
('4dc24ecc-23ca-432d-91d1-8addb571f75d', 'ecad18c2-3d78-4d40-9574-50f7cfdc32e2', 1),
('4dc24ecc-23ca-432d-91d1-8addb571f75d', 'ed6511ef-ab19-47c5-a19a-01b1c80edcb6', 1),
('538eaf5c-2491-4abd-8170-9f036edc3163', '3ca17afe-c691-4d3f-8f93-b6e34b87e4b1', 2),
('721df03d-1823-4da1-8002-fd3b2c56b16f', '0580ac91-dbbd-4174-ae08-47c7f8bdd526', 1),
('721df03d-1823-4da1-8002-fd3b2c56b16f', '3ca17afe-c691-4d3f-8f93-b6e34b87e4b1', 3),
('721df03d-1823-4da1-8002-fd3b2c56b16f', '5d12b253-2a0d-46b8-9587-6a44f5644c40', 2),
('721df03d-1823-4da1-8002-fd3b2c56b16f', 'cc81430f-811c-436f-a2c2-3e0d89d64833', 2),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864', '0580ac91-dbbd-4174-ae08-47c7f8bdd526', 2),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864', '3ca17afe-c691-4d3f-8f93-b6e34b87e4b1', 4),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864', '5d12b253-2a0d-46b8-9587-6a44f5644c40', 1),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864', 'a2fcf31a-198d-4613-b023-ae289e78b2e5', 1),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864', 'cc81430f-811c-436f-a2c2-3e0d89d64833', 1);

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
('0580ac91-dbbd-4174-ae08-47c7f8bdd526'),
('11dd50f4-b749-44af-84ec-2a0b51b9707c'),
('1b417b04-eb3e-4a11-857d-ca40652341ef'),
('2822f247-802b-4faf-8320-973947cd00c5'),
('33112ccd-089a-4b92-a6e6-667eacb2c0b6'),
('3ca17afe-c691-4d3f-8f93-b6e34b87e4b1'),
('4dc24ecc-23ca-432d-91d1-8addb571f75d'),
('538eaf5c-2491-4abd-8170-9f036edc3163'),
('5d12b253-2a0d-46b8-9587-6a44f5644c40'),
('721df03d-1823-4da1-8002-fd3b2c56b16f'),
('7ea82ea6-21cc-4270-9a4c-9175b4e8e864'),
('861f7d2c-6c16-4d32-a883-111b70646cc3'),
('95cefa79-ca28-4957-9707-c3a228002786'),
('a2fcf31a-198d-4613-b023-ae289e78b2e5'),
('c627750f-a187-4cee-868a-eeea53c574b3'),
('cc81430f-811c-436f-a2c2-3e0d89d64833'),
('ecad18c2-3d78-4d40-9574-50f7cfdc32e2'),
('ed6511ef-ab19-47c5-a19a-01b1c80edcb6');

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
('0580ac91-dbbd-4174-ae08-47c7f8bdd526', 'Bloc sportif'),
('11dd50f4-b749-44af-84ec-2a0b51b9707c', 'Bloc sportif'),
('1b417b04-eb3e-4a11-857d-ca40652341ef', 'Bloc sportif'),
('2822f247-802b-4faf-8320-973947cd00c5', 'Bloc sportif'),
('33112ccd-089a-4b92-a6e6-667eacb2c0b6', 'Bloc sportif'),
('3ca17afe-c691-4d3f-8f93-b6e34b87e4b1', 'sports divers'),
('5d12b253-2a0d-46b8-9587-6a44f5644c40', 'soccer-hockey'),
('861f7d2c-6c16-4d32-a883-111b70646cc3', 'Bloc sportif'),
('95cefa79-ca28-4957-9707-c3a228002786', 'Bloc sportif'),
('a2fcf31a-198d-4613-b023-ae289e78b2e5', 'Bloc sportif'),
('c627750f-a187-4cee-868a-eeea53c574b3', 'Bloc sportif'),
('cc81430f-811c-436f-a2c2-3e0d89d64833', 'Bloc sportif'),
('ecad18c2-3d78-4d40-9574-50f7cfdc32e2', 'Bloc sportif'),
('ed6511ef-ab19-47c5-a19a-01b1c80edcb6', 'Bloc sportif');

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
('38e91455-9674-4080-8da4-d9cec41a82ee', 'Simpson', 'Bart', '2021-07-05', 'public/img/photosProfil/b2b0e8a5-b458-4d6f-97ec-650ecbac83b8.jpg', '1be9edcd-aaae-4494-aa68-90406d7461b5', NULL),
('e70770b2-8009-40e7-a957-ffbe99705638', 'asdf', 'bart', '2021-07-10', 'public/img/photosProfil/c46444a9-bd52-4e70-94cb-e0e42c41104b.JPG', '1be9edcd-aaae-4494-aa68-90406d7461b5', NULL);

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

--
-- Dumping data for table `horaire_programme`
--

INSERT INTO `horaire_programme` (`id_programme`, `id_activite_programme`, `plage_horaire`, `duree`) VALUES
('00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', '538eaf5c-2491-4abd-8170-9f036edc3163', 1, 3),
('00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', '721df03d-1823-4da1-8002-fd3b2c56b16f', 2, 3),
('2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '3ca17afe-c691-4d3f-8f93-b6e34b87e4b1', 3, 2),
('2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '5d12b253-2a0d-46b8-9587-6a44f5644c40', 2, 2),
('2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'ecad18c2-3d78-4d40-9574-50f7cfdc32e2', 1, 2),
('9b2481ba-5c87-4d6c-b88f-9c84a72092ba', 'a2fcf31a-198d-4613-b023-ae289e78b2e5', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `id_programme_semaine` varchar(40) NOT NULL,
  `id_enfant` varchar(40) NOT NULL,
  `paye` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`id_programme_semaine`, `id_enfant`, `paye`) VALUES
('0c892311-73d7-45eb-a2ef-260447f0ef3e', '38e91455-9674-4080-8da4-d9cec41a82ee', 0),
('0f0aa62c-ab62-4da4-ad46-3a6ce2282ae2', '38e91455-9674-4080-8da4-d9cec41a82ee', 1),
('1cb56c45-2192-45c1-a132-6380d11d283f', '38e91455-9674-4080-8da4-d9cec41a82ee', 1),
('2fad054e-e0a4-4dfc-a51a-142adc0cd033', '38e91455-9674-4080-8da4-d9cec41a82ee', 1),
('58474c09-f0f8-4528-b492-27e29ec8c640', '38e91455-9674-4080-8da4-d9cec41a82ee', 1);

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
('00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', '222', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 'JC, Emilie', 341),
('2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '333', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 'JC', 222),
('5e82b1f8-c48c-4208-bb5c-c4e60ecbf53e', '111', 'b80bffc5-5a53-4436-bcdf-3d2d978074a8', 'Jean-Charles', 341),
('9b2481ba-5c87-4d6c-b88f-9c84a72092ba', '111', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 'JC', 341);

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
('0151a470-d5c8-4b4a-96ab-2e3f2740c790', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', '7a27d7a3-72b6-4020-a5aa-a934f3892a53'),
('0c892311-73d7-45eb-a2ef-260447f0ef3e', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '3c15dfc8-89d6-4cf9-8bd6-4f06d4150cca'),
('0f0aa62c-ab62-4da4-ad46-3a6ce2282ae2', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', '4abc33e4-6953-4abb-bba6-6838000928cc'),
('11caa92f-a2db-47dc-994d-510f4d2a9af3', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'ee1fab17-f88a-4bf4-9ba0-cfffa0a6436b'),
('14e57ba0-c6b3-4be5-aff3-2faf7ac00c6a', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'f6194161-c364-4262-b92c-8d09eef91396'),
('1cb56c45-2192-45c1-a132-6380d11d283f', '9b2481ba-5c87-4d6c-b88f-9c84a72092ba', '1aa5c1ce-c9a8-4177-a1bb-53e85eb96741'),
('244f73b6-b299-4d3e-b9fb-868b9a70ea5c', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '8dad9f12-8a38-48d7-bbfa-7df8cc3cbf64'),
('25500582-ca2d-4ff1-954a-03167a235b74', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', 'af038619-d091-49b4-9b7e-a3c6f877d0a9'),
('2fad054e-e0a4-4dfc-a51a-142adc0cd033', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'b4049302-9943-454c-af2b-e789af6b4b29'),
('43b9b8c9-cb44-45cf-9747-4d53d269e49a', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', '1a13a484-fa6c-4ef9-9fb5-d8c5ecedb7e1'),
('56dad39f-7c56-4150-9ed7-f6162e9a1c0d', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'c4817d2d-bf97-4bd4-bf81-88107a72b139'),
('58474c09-f0f8-4528-b492-27e29ec8c640', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '1a13a484-fa6c-4ef9-9fb5-d8c5ecedb7e1'),
('5f78c37a-5baa-4633-8819-96df62fbf2d5', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'f2981442-ca6b-472f-b6a7-0d2e63be0b0b'),
('6301f5a2-77fe-4cf4-a208-31261d0716c9', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', '3c15dfc8-89d6-4cf9-8bd6-4f06d4150cca'),
('67636562-dc98-4079-98d0-e79ed46926f2', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', '6f631755-7f38-4d60-89fd-cfb0c9deb233'),
('6f05ac75-d2a4-4c9b-9ea5-de777d16e558', '9b2481ba-5c87-4d6c-b88f-9c84a72092ba', '58f19ea3-e902-4fcd-adf8-e40ce89e0bd0'),
('76f7b425-68a0-4ee1-afa4-9e6622db1b7d', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', 'c0b07693-4dcf-4dc5-b37a-19bca952c105'),
('7e530a45-44cd-41e5-979b-176a216c0328', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', 'c4817d2d-bf97-4bd4-bf81-88107a72b139'),
('904b7d91-cdfd-4821-8579-26ec96e3fbe0', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', 'f2981442-ca6b-472f-b6a7-0d2e63be0b0b'),
('92afc347-125c-4933-b2dc-f604e68953ea', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', 'c59866e7-51c9-40f0-aa82-fb1df811deda'),
('94972236-e785-4676-a102-d219cadafb10', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '8c9cebb2-bc88-4a99-87e5-3855277b14ad'),
('94d72236-e785-4676-a102-d219cadafb10', '5e82b1f8-c48c-4208-bb5c-c4e60ecbf53e', '81bd7cb4-e992-4852-9272-3125816ca4d5'),
('94d77u36-e785-4676-a102-d219cadafb10', '9b2481ba-5c87-4d6c-b88f-9c84a72092ba', '1aa5c1ce-c9a8-4177-a1bb-53e85eb96741'),
('9e260287-06fa-442d-a8dc-af2453427214', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '7a27d7a3-72b6-4020-a5aa-a934f3892a53'),
('a0036b16-550f-4f54-8f57-da64eee0a3a0', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '6f631755-7f38-4d60-89fd-cfb0c9deb233'),
('b6fd1750-e17c-4ea9-aa39-43ec1eb88a9c', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', '4abc33e4-6953-4abb-bba6-6838000928cc'),
('bdaadaa0-c29c-4572-b695-d9b1e84fa653', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'af038619-d091-49b4-9b7e-a3c6f877d0a9'),
('c23128d1-e1c6-4f83-b5ec-01ebf3898786', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', 'c6c71123-08a3-4984-9790-45048914fa78'),
('c461d073-c7c9-449a-aeab-dc253ea1e2f3', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', '8dad9f12-8a38-48d7-bbfa-7df8cc3cbf64'),
('cd7ccb78-25f8-4a4c-9c7a-a986277f508c', '9b2481ba-5c87-4d6c-b88f-9c84a72092ba', 'dc5da32a-fcb4-4aed-9d62-1d0da22105e6'),
('d07308be-a36c-4547-ac39-fc6db09e0268', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'c0b07693-4dcf-4dc5-b37a-19bca952c105'),
('d113e9e4-fcb2-46ac-b0a6-a79785c526cb', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', 'f6194161-c364-4262-b92c-8d09eef91396'),
('ddfccb36-1fba-472b-acd4-be09bbb6ef94', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'c59866e7-51c9-40f0-aa82-fb1df811deda'),
('ea09bf2d-2f3e-4a28-b2a3-aeed6eb3d3ad', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', 'ee1fab17-f88a-4bf4-9ba0-cfffa0a6436b'),
('f340bf07-cfed-42a8-b51b-a0351c2e972d', '2ee446a6-4b1e-4614-8585-1c3de9ba15d3', 'c6c71123-08a3-4984-9790-45048914fa78'),
('fd09910a-cdf1-4a85-a001-04a5bfcd53b4', '00ef12f1-0fb7-4bdc-b2e9-477d2fa67346', 'b4049302-9943-454c-af2b-e789af6b4b29');

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
('0107bc27-8235-4aee-a418-25baec6bfd28', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 3),
('14dff9c7-9cb5-4c04-ac00-21fc0642aeec', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 6),
('1a13a484-fa6c-4ef9-9fb5-d8c5ecedb7e1', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 2),
('1aa5c1ce-c9a8-4177-a1bb-53e85eb96741', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 1),
('3b9a4b8f-e92c-4481-bab7-a1eb5f0126f8', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 14),
('3c15dfc8-89d6-4cf9-8bd6-4f06d4150cca', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 6),
('4abc33e4-6953-4abb-bba6-6838000928cc', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 1),
('4ac05433-1b31-4939-982d-f1a954aac17a', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 5),
('5374109a-ad8b-45a0-8d37-b4b77196930b', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 15),
('58f19ea3-e902-4fcd-adf8-e40ce89e0bd0', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 13),
('6f631755-7f38-4d60-89fd-cfb0c9deb233', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 7),
('7a27d7a3-72b6-4020-a5aa-a934f3892a53', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 13),
('7af5d8d3-0700-40a9-a8f3-b9544151edeb', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 11),
('7f03b053-a348-44d8-9489-7f4a4fdddb5f', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 4),
('81bd7cb4-e992-4852-9272-3125816ca4d5', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 9),
('8c9cebb2-bc88-4a99-87e5-3855277b14ad', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 12),
('8dad9f12-8a38-48d7-bbfa-7df8cc3cbf64', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 15),
('af038619-d091-49b4-9b7e-a3c6f877d0a9', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 10),
('b30802e1-2519-4be2-9c12-a7f28c2171dc', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 7),
('b4049302-9943-454c-af2b-e789af6b4b29', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 4),
('c0b07693-4dcf-4dc5-b37a-19bca952c105', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 14),
('c4817d2d-bf97-4bd4-bf81-88107a72b139', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 9),
('c59866e7-51c9-40f0-aa82-fb1df811deda', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 12),
('c6c71123-08a3-4984-9790-45048914fa78', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 8),
('dc5da32a-fcb4-4aed-9d62-1d0da22105e6', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 8),
('e4d64efa-2c0c-4f73-88ca-9c77f86a0291', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 10),
('ee1fab17-f88a-4bf4-9ba0-cfffa0a6436b', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 11),
('f2981442-ca6b-472f-b6a7-0d2e63be0b0b', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 3),
('f6194161-c364-4262-b92c-8d09eef91396', '0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 5),
('fcabc075-ac0a-4f59-98ca-7398d6cf9667', 'deb2b8a9-2350-4726-aa1d-55530966c01d', 2);

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
('0884f9b5-e058-4f3e-b660-e01f6a63a3b1', 'session allTheTime', 'tt les semaines', '2021-07-01', '2021-07-17'),
('2b166bb1-e430-4274-9bd9-d82f0511f451', 'Session 2021', 'Le Classique, les arts et la science, l\'enfant actif.', '2021-06-01', '2021-09-01'),
('b80bffc5-5a53-4436-bcdf-3d2d978074a8', 'Session 2020', 'Le Classique, les arts et la science, l\'enfant actif.', '2020-07-01', '2020-09-01'),
('dac7e02e-bd0a-46fa-8723-17bff6ce019f', 'Session 2019', 'Le Classique, les arts et la science, l\'enfant actif.', '2019-06-01', '2019-09-01'),
('deb2b8a9-2350-4726-aa1d-55530966c01d', 'Session 2022', 'cet ete', '2021-07-01', '2021-07-03');

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
