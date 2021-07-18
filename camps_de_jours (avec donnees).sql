-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 18 juil. 2021 à 05:37
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `camps_de_jours`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `id_activite` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `type_activite` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `nom`, `type_activite`) VALUES
('06d5f533-46ea-4444-9f85-1aab58bbd1be', 'Chimie', 'ae84aa56-ee3e-4319-92cd-2002f5e18792'),
('5e5a303d-af6a-4cf3-8bf9-e48ef2bd718b', 'BaseBall', 'bf0a9682-4907-4005-85f3-1125fb17652d'),
('6bfc3081-6dc3-40c7-9fc8-2e4fa1005731', 'Soccer', 'bf0a9682-4907-4005-85f3-1125fb17652d'),
('ad1a1008-3b50-47f9-81fe-49334d386bc4', 'Yoga', 'bf0a9682-4907-4005-85f3-1125fb17652d'),
('b8e7dda5-618a-4472-93a7-00fda7de71f9', 'Hockey', 'bf0a9682-4907-4005-85f3-1125fb17652d'),
('bb011da1-e8b9-44c8-892c-31b36affbaf9', 'Piano', '938ad37b-ffc1-482a-9a10-354d154751c1'),
('dace9dc5-87bd-4154-9202-7583cb7bfbb2', 'Cuisine', '938ad37b-ffc1-482a-9a10-354d154751c1'),
('dbb4dcd7-f51d-4d64-b629-63c900a23b63', 'Bricolage', 'ae84aa56-ee3e-4319-92cd-2002f5e18792'),
('e6a3ff09-132f-4213-89cb-a28935be1df1', 'Peinture', '938ad37b-ffc1-482a-9a10-354d154751c1'),
('fedb7e64-751c-468c-a22c-655b73387402', 'Physiques', 'ae84aa56-ee3e-4319-92cd-2002f5e18792');

-- --------------------------------------------------------

--
-- Structure de la table `activite_du_bloc`
--

CREATE TABLE `activite_du_bloc` (
  `id_activite` varchar(40) NOT NULL,
  `id_bloc` varchar(40) NOT NULL,
  `ordre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activite_du_bloc`
--

INSERT INTO `activite_du_bloc` (`id_activite`, `id_bloc`, `ordre`) VALUES
('06d5f533-46ea-4444-9f85-1aab58bbd1be', 'bf169699-5d33-429c-a73c-b20b812b22d8', 1),
('5e5a303d-af6a-4cf3-8bf9-e48ef2bd718b', '13d535a9-01c4-46d2-9f7d-230dc9b42052', 1),
('6bfc3081-6dc3-40c7-9fc8-2e4fa1005731', '13d535a9-01c4-46d2-9f7d-230dc9b42052', 2),
('ad1a1008-3b50-47f9-81fe-49334d386bc4', '254c1283-58cb-4649-b7e9-3b7f6ad4832b', 1),
('b8e7dda5-618a-4472-93a7-00fda7de71f9', '13d535a9-01c4-46d2-9f7d-230dc9b42052', 3),
('dace9dc5-87bd-4154-9202-7583cb7bfbb2', 'bf169699-5d33-429c-a73c-b20b812b22d8', 3),
('dbb4dcd7-f51d-4d64-b629-63c900a23b63', 'bf169699-5d33-429c-a73c-b20b812b22d8', 4),
('e6a3ff09-132f-4213-89cb-a28935be1df1', '254c1283-58cb-4649-b7e9-3b7f6ad4832b', 2),
('fedb7e64-751c-468c-a22c-655b73387402', 'bf169699-5d33-429c-a73c-b20b812b22d8', 2);

-- --------------------------------------------------------

--
-- Structure de la table `activite_programme`
--

CREATE TABLE `activite_programme` (
  `id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activite_programme`
--

INSERT INTO `activite_programme` (`id`) VALUES
('06d5f533-46ea-4444-9f85-1aab58bbd1be'),
('13d535a9-01c4-46d2-9f7d-230dc9b42052'),
('254c1283-58cb-4649-b7e9-3b7f6ad4832b'),
('5e5a303d-af6a-4cf3-8bf9-e48ef2bd718b'),
('6bfc3081-6dc3-40c7-9fc8-2e4fa1005731'),
('ad1a1008-3b50-47f9-81fe-49334d386bc4'),
('b8e7dda5-618a-4472-93a7-00fda7de71f9'),
('bb011da1-e8b9-44c8-892c-31b36affbaf9'),
('bf169699-5d33-429c-a73c-b20b812b22d8'),
('dace9dc5-87bd-4154-9202-7583cb7bfbb2'),
('dbb4dcd7-f51d-4d64-b629-63c900a23b63'),
('e6a3ff09-132f-4213-89cb-a28935be1df1'),
('fedb7e64-751c-468c-a22c-655b73387402');

-- --------------------------------------------------------

--
-- Structure de la table `bloc`
--

CREATE TABLE `bloc` (
  `id_bloc` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bloc`
--

INSERT INTO `bloc` (`id_bloc`, `nom`) VALUES
('13d535a9-01c4-46d2-9f7d-230dc9b42052', 'Sports d\'équipe'),
('254c1283-58cb-4649-b7e9-3b7f6ad4832b', 'Matin relax'),
('bf169699-5d33-429c-a73c-b20b812b22d8', 'Art et Science');

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE `enfant` (
  `id` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `url_photo` varchar(200) DEFAULT NULL,
  `id_parent` varchar(40) NOT NULL,
  `notes` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`id`, `nom`, `prenom`, `date_naissance`, `url_photo`, `id_parent`, `notes`) VALUES
('550c8251-230e-4376-be26-5557068fae0e', 'Simpson', 'Lisa', '2005-11-08', 'public/img/photosProfil/a88a8056-3957-4fdb-b856-827092ae4139.jpg', 'efd06f9f-ffb9-4f54-8a32-86501f315890', 'Aucunes alergies'),
('9a9902ed-26e6-4878-a008-fe91d958cc9b', 'Simpson', 'Bart', '2007-03-08', 'public/img/photosProfil/6911cdd2-0e02-4e1f-86ce-5d528f252c09.jpg', 'efd06f9f-ffb9-4f54-8a32-86501f315890', 'Alergie aux crevettes');

-- --------------------------------------------------------

--
-- Structure de la table `gabarit_programme`
--

CREATE TABLE `gabarit_programme` (
  `id` varchar(40) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `gabarit_programme`
--

INSERT INTO `gabarit_programme` (`id`, `titre`, `description`) VALUES
('art_science', 'Les Arts et la Science', '\r\nLe programme arts et science comprend plusieurs activités d\'arts culinaires, d\'arts visuels, d\'arts plastiques, de chimie, de biologie et de physique. Il ne possède pas d’activité physique, cependant une activité matinale est réservée pour pratiquer le yoga ou jouer à un jeu de course comme le ballon chasseur. '),
('classique', 'Le Classique', 'Le classique comprend chaque jour un bloc d’activités de type sportif et un autre avec une activité de type art et une activité de type science.'),
('enfant_actif', 'L\'Enfant Actif', '\r\nLe programme athlétique est un camp de jour sportif intensif pour les enfants très actifs. Il comprend au moins quatre activités quotidiennes dont le basketball, le tennis, le soccer, le ballon chasseur, le baseball, etc. ');

-- --------------------------------------------------------

--
-- Structure de la table `horaire_programme`
--

CREATE TABLE `horaire_programme` (
  `id_programme` varchar(40) NOT NULL,
  `id_activite_programme` varchar(40) NOT NULL,
  `plage_horaire` int(11) NOT NULL,
  `duree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `horaire_programme`
--

INSERT INTO `horaire_programme` (`id_programme`, `id_activite_programme`, `plage_horaire`, `duree`) VALUES
('16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', '254c1283-58cb-4649-b7e9-3b7f6ad4832b', 1, 4),
('16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', 'dbb4dcd7-f51d-4d64-b629-63c900a23b63', 2, 4),
('2a442328-bd10-4087-af2d-7b68c72a61c1', '13d535a9-01c4-46d2-9f7d-230dc9b42052', 1, 8),
('4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '6bfc3081-6dc3-40c7-9fc8-2e4fa1005731', 2, 2),
('4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'bf169699-5d33-429c-a73c-b20b812b22d8', 4, 2),
('4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'dace9dc5-87bd-4154-9202-7583cb7bfbb2', 1, 2),
('4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'fedb7e64-751c-468c-a22c-655b73387402', 3, 2),
('9a19c33b-3c54-49a5-84c3-0a3121cde532', '13d535a9-01c4-46d2-9f7d-230dc9b42052', 1, 2),
('9a19c33b-3c54-49a5-84c3-0a3121cde532', '13d535a9-01c4-46d2-9f7d-230dc9b42052', 3, 3),
('9a19c33b-3c54-49a5-84c3-0a3121cde532', 'bf169699-5d33-429c-a73c-b20b812b22d8', 2, 3),
('d80498b5-0bcb-4b56-9690-de44a3ffbda2', '13d535a9-01c4-46d2-9f7d-230dc9b42052', 1, 4),
('d80498b5-0bcb-4b56-9690-de44a3ffbda2', '5e5a303d-af6a-4cf3-8bf9-e48ef2bd718b', 2, 2),
('d80498b5-0bcb-4b56-9690-de44a3ffbda2', '6bfc3081-6dc3-40c7-9fc8-2e4fa1005731', 3, 2),
('edd13f7b-3e99-4b07-9c22-7db45be4d51a', '13d535a9-01c4-46d2-9f7d-230dc9b42052', 2, 3),
('edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'bb011da1-e8b9-44c8-892c-31b36affbaf9', 1, 1),
('edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'bf169699-5d33-429c-a73c-b20b812b22d8', 4, 2),
('edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'dbb4dcd7-f51d-4d64-b629-63c900a23b63', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_programme_semaine` varchar(40) NOT NULL,
  `id_enfant` varchar(40) NOT NULL,
  `paye` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_programme_semaine`, `id_enfant`, `paye`) VALUES
('0bb22503-a687-43b5-8b2d-0e51509dbbd0', '9a9902ed-26e6-4878-a008-fe91d958cc9b', 1),
('43c546fb-27b6-4ef3-884e-279dca531f96', '550c8251-230e-4376-be26-5557068fae0e', 1),
('47250748-87b2-4366-a5a1-b4ddc242aca6', '550c8251-230e-4376-be26-5557068fae0e', 1),
('47250748-87b2-4366-a5a1-b4ddc242aca6', '9a9902ed-26e6-4878-a008-fe91d958cc9b', 1),
('4f0cba9b-addf-4826-b568-588dc66d9355', '9a9902ed-26e6-4878-a008-fe91d958cc9b', 1),
('6ee688a8-a72e-4de2-a07b-9bc428a73244', '550c8251-230e-4376-be26-5557068fae0e', 0),
('6ee688a8-a72e-4de2-a07b-9bc428a73244', '9a9902ed-26e6-4878-a008-fe91d958cc9b', 0),
('74007ba5-806d-4df3-b1b9-0d51aaa07483', '9a9902ed-26e6-4878-a008-fe91d958cc9b', 1),
('8ffdc977-0160-43f5-9091-bc741ecc546c', '9a9902ed-26e6-4878-a008-fe91d958cc9b', 1),
('a14e0574-ffc1-41fa-816f-4738a19e8bf4', '550c8251-230e-4376-be26-5557068fae0e', 1),
('b246582c-98e5-48c3-adef-ea1dee839e5b', '550c8251-230e-4376-be26-5557068fae0e', 1),
('c19d1e09-260e-4a38-a004-8ffe5ccd6ea7', '550c8251-230e-4376-be26-5557068fae0e', 1),
('c19d1e09-260e-4a38-a004-8ffe5ccd6ea7', '9a9902ed-26e6-4878-a008-fe91d958cc9b', 1),
('e731cd57-c55a-4ea3-b0f1-4457ee5c2a00', '550c8251-230e-4376-be26-5557068fae0e', 1),
('e731cd57-c55a-4ea3-b0f1-4457ee5c2a00', '9a9902ed-26e6-4878-a008-fe91d958cc9b', 1),
('f8af53c6-1b57-43be-9728-b3a5b034a98a', '550c8251-230e-4376-be26-5557068fae0e', 0),
('fc168858-7af0-4423-9eb4-8007475ce26b', '550c8251-230e-4376-be26-5557068fae0e', 1);

-- --------------------------------------------------------

--
-- Structure de la table `parent`
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
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`id`, `nom`, `prenom`, `courriel`, `adresse`, `date_de_naissance`, `url_photo`) VALUES
('efd06f9f-ffb9-4f54-8a32-86501f315890', 'Simpson', 'Homer', 'homer@email.com', 'Adresse de Homer et de ses enfants', '1960-02-11', 'public/img/photosProfil/49555423-31b9-4c8b-b63a-9345e9759f46.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE `programme` (
  `id` varchar(40) NOT NULL,
  `id_gabarit_programme` varchar(40) NOT NULL,
  `id_session` varchar(40) NOT NULL,
  `animateur` varchar(300) DEFAULT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `programme`
--

INSERT INTO `programme` (`id`, `id_gabarit_programme`, `id_session`, `animateur`, `prix`) VALUES
('16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', 'art_science', '14026a14-a1a8-456b-98a0-5210145a169d', 'Joe, Anik', 45),
('2a442328-bd10-4087-af2d-7b68c72a61c1', 'enfant_actif', '14026a14-a1a8-456b-98a0-5210145a169d', 'Maxime, Maxim, Maxine, Maxence', 68),
('4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'classique', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 'Soya, Veronique, Anibal', 45),
('9a19c33b-3c54-49a5-84c3-0a3121cde532', 'classique', '14026a14-a1a8-456b-98a0-5210145a169d', 'Marte, Paul', 30),
('d80498b5-0bcb-4b56-9690-de44a3ffbda2', 'enfant_actif', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 'Joe, Bob, Jean', 87),
('edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'classique', '14026a14-a1a8-456b-98a0-5210145a169d', 'Soya, Annie', 37);

-- --------------------------------------------------------

--
-- Structure de la table `programme_semaine`
--

CREATE TABLE `programme_semaine` (
  `id` varchar(40) NOT NULL,
  `id_programme` varchar(40) NOT NULL,
  `id_semaine` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `programme_semaine`
--

INSERT INTO `programme_semaine` (`id`, `id_programme`, `id_semaine`) VALUES
('02025952-6df8-42e4-a63b-6b4f52ca2a74', '16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', 'b1160f5a-6441-4947-bd73-1fc306a1a01a'),
('023465cd-4167-4497-b678-33839d9c8062', '9a19c33b-3c54-49a5-84c3-0a3121cde532', 'dc3ae4a5-e854-4d63-9611-5098c184e3ec'),
('0bb22503-a687-43b5-8b2d-0e51509dbbd0', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', '95e077d0-a035-4b26-8447-32d4702775fa'),
('14036abe-8bd8-4dab-a17b-ffd5854010e3', '9a19c33b-3c54-49a5-84c3-0a3121cde532', '516f4bb6-34f1-456a-a62b-70f5df37ea53'),
('187f19cc-445e-4f85-82c7-07e3110726ee', '2a442328-bd10-4087-af2d-7b68c72a61c1', '516f4bb6-34f1-456a-a62b-70f5df37ea53'),
('1a90a4a3-5ce5-4aa7-bd19-c1939f1d0286', 'd80498b5-0bcb-4b56-9690-de44a3ffbda2', 'c5e4f319-5c8e-4edd-8189-e4592b6963ca'),
('1cdffa3f-6970-4ddf-9eb3-b1efedcafc9f', '16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', '35367c38-ac98-401f-8cb3-fbfb5edda775'),
('1d9c3558-eaa2-4901-afc8-44a3623ad2f2', '2a442328-bd10-4087-af2d-7b68c72a61c1', '269883f2-9487-41a7-b415-d546085e354f'),
('22213c1d-0935-4de1-ac4b-8f79cbb60c80', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'ec0db861-02a3-4138-85f3-b977d1b4d42b'),
('244924df-7470-4c58-b66b-90838e15ee27', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'cf31c0cd-57d0-45ed-89dd-659e63a49deb'),
('2d8f458c-b08e-47e6-942a-fa7953297cc6', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '92bbf5fd-93c6-4455-9d56-865e617347f0'),
('370a5df4-549a-46d2-b8b3-d9e9f1136bbc', '9a19c33b-3c54-49a5-84c3-0a3121cde532', 'fe7e54da-05a5-46e6-b0e4-430d446d5c23'),
('37e61bc4-6f66-4b10-aad2-fdfbb6b9655a', 'd80498b5-0bcb-4b56-9690-de44a3ffbda2', '9a6d20b5-6a00-47a7-b4cb-882d6c0e77fe'),
('3b4ff837-11dd-4a3c-b8c5-cd9e5d2c333a', '16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', 'dc3ae4a5-e854-4d63-9611-5098c184e3ec'),
('4023b8e9-0236-4d19-aefb-17a97b98fd4e', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '1eb3ee18-b6ad-4ca4-acaf-8a452a5a1912'),
('43c546fb-27b6-4ef3-884e-279dca531f96', '16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', '95e077d0-a035-4b26-8447-32d4702775fa'),
('447c1bcd-d340-45e1-aca6-d149e00cb8d1', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'a6f0fe54-729a-46ac-b31f-49e66df5ac94'),
('4510dc81-8a9f-4c50-9d5c-e57402aa21a4', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '61824666-a282-4365-aee9-c900a2ae4a2a'),
('47250748-87b2-4366-a5a1-b4ddc242aca6', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '09061140-8b7a-486e-b037-96d6106d40bb'),
('4f0cba9b-addf-4826-b568-588dc66d9355', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'a97bcc8f-80c1-49f3-ae7b-776e950c170f'),
('58ada181-7b03-4f59-9f87-f1613b6dd694', '9a19c33b-3c54-49a5-84c3-0a3121cde532', '95e077d0-a035-4b26-8447-32d4702775fa'),
('5a25f2f7-3ee5-420d-b8af-efd0836d1054', '9a19c33b-3c54-49a5-84c3-0a3121cde532', 'b1160f5a-6441-4947-bd73-1fc306a1a01a'),
('5ec67adc-27e4-4fe2-86f8-d4c0682bdc90', '9a19c33b-3c54-49a5-84c3-0a3121cde532', '79f18596-92d5-4b86-ae9b-df244e3f88f7'),
('68908f7d-f3c4-4cf1-81dd-38dd9ffeebab', 'd80498b5-0bcb-4b56-9690-de44a3ffbda2', '9bb815ce-cc71-4c6e-8484-1fb2b09c12c5'),
('6ce247a6-e9fc-4796-a468-fc14ecee948f', '16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', '121ca78c-6465-46a4-b8d3-4bad52c4edd0'),
('6ee688a8-a72e-4de2-a07b-9bc428a73244', '2a442328-bd10-4087-af2d-7b68c72a61c1', '6c2ee83b-6d17-4e45-9829-02b8f3168c0e'),
('6f221578-ccff-4e9f-a617-ee8684e1133e', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'b1160f5a-6441-4947-bd73-1fc306a1a01a'),
('74007ba5-806d-4df3-b1b9-0d51aaa07483', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '39bd638c-d785-480d-94fb-ddf58cc22f81'),
('74dd6cf3-6e92-43c7-ac50-437d3ba9f40d', '16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', 'c8de5816-6673-4311-9065-df33a94d4b65'),
('86f98c34-dec4-46e2-811c-df5aa82adfee', '2a442328-bd10-4087-af2d-7b68c72a61c1', '79f18596-92d5-4b86-ae9b-df244e3f88f7'),
('89c1d010-c491-47e6-bb09-815d72d096e7', '9a19c33b-3c54-49a5-84c3-0a3121cde532', '121ca78c-6465-46a4-b8d3-4bad52c4edd0'),
('8af91c05-9a3d-4ff4-a675-3e6b029b1290', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', '35367c38-ac98-401f-8cb3-fbfb5edda775'),
('8ffdc977-0160-43f5-9091-bc741ecc546c', '2a442328-bd10-4087-af2d-7b68c72a61c1', '0ac77264-783c-4615-86aa-6037245ed5d8'),
('91d8fa58-da1d-46e1-aee6-695b791ba550', 'd80498b5-0bcb-4b56-9690-de44a3ffbda2', '5a930ffd-885e-4c5e-b20a-c191f9a8dd06'),
('923cfe49-eef3-49db-bcf2-d5ad15275c70', 'd80498b5-0bcb-4b56-9690-de44a3ffbda2', 'c23896a0-0754-482e-a551-7f904d5b20c2'),
('96e97669-06c1-462e-9058-b766e466f2aa', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'c8de5816-6673-4311-9065-df33a94d4b65'),
('97c25dc9-80f6-4b98-b13c-7150a66e1d0a', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', '6c2ee83b-6d17-4e45-9829-02b8f3168c0e'),
('a14e0574-ffc1-41fa-816f-4738a19e8bf4', '9a19c33b-3c54-49a5-84c3-0a3121cde532', '0ac77264-783c-4615-86aa-6037245ed5d8'),
('a96e7eed-3bc7-4821-b095-0cc2498b4394', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '6f93fa10-c981-4da2-ab14-6657ea6519dc'),
('a972db3a-3038-4f27-bf4b-41128226ea82', '9a19c33b-3c54-49a5-84c3-0a3121cde532', '6c2ee83b-6d17-4e45-9829-02b8f3168c0e'),
('ae461033-cb81-4425-ad13-873efdb69cf9', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '53f17117-fe30-4e35-a2f5-9c8cc30883f6'),
('b052db16-086c-4ab6-9557-573205730ec9', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'faa567ad-6ae4-4b9e-bb47-66ad8c17013c'),
('b246582c-98e5-48c3-adef-ea1dee839e5b', '16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', 'a97bcc8f-80c1-49f3-ae7b-776e950c170f'),
('b50856db-0618-4ec7-9267-34a8c8ef4120', '9a19c33b-3c54-49a5-84c3-0a3121cde532', 'f9b1bb4d-df90-4518-ab4e-916cded9bd94'),
('bcdddf69-b59f-4f9f-b6c1-a3a989bf1d93', '9a19c33b-3c54-49a5-84c3-0a3121cde532', 'a97bcc8f-80c1-49f3-ae7b-776e950c170f'),
('c19d1e09-260e-4a38-a004-8ffe5ccd6ea7', '2a442328-bd10-4087-af2d-7b68c72a61c1', 'fe7e54da-05a5-46e6-b0e4-430d446d5c23'),
('c1d95fd8-832d-4663-946f-361d8ccb84e5', '16a75d0e-1e45-4ec2-85bc-d39cb2874a5a', 'f9b1bb4d-df90-4518-ab4e-916cded9bd94'),
('cbe03454-8279-476b-b3f5-a105988a2fc1', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', '2023b74e-ad8b-425e-860e-b4d686639829'),
('ceb31833-a4a4-4e1e-b49f-f8234095ec18', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'dc3ae4a5-e854-4d63-9611-5098c184e3ec'),
('cf3ba048-be1e-4bd6-8e60-331d7aa5bc63', 'd80498b5-0bcb-4b56-9690-de44a3ffbda2', 'b48ab36b-912a-46d7-8860-7be4c61c1b48'),
('d0575811-a033-4b49-94fa-6f61d8da068d', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'cccb84f0-e359-4c37-a3db-5b4aabd55975'),
('d16de450-5110-4c06-82e0-813b8e359997', '9a19c33b-3c54-49a5-84c3-0a3121cde532', 'c8de5816-6673-4311-9065-df33a94d4b65'),
('d2e2d411-b56a-4f16-92ec-c10b903e9650', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '8f0a837c-a629-4ba4-954e-779dc212cd3f'),
('d4bdd7de-b1a8-4270-b7aa-ad95f48bfd3d', '9a19c33b-3c54-49a5-84c3-0a3121cde532', '269883f2-9487-41a7-b415-d546085e354f'),
('da3a77d6-d7ab-46a0-a9a0-c54774e98f38', '9a19c33b-3c54-49a5-84c3-0a3121cde532', '35367c38-ac98-401f-8cb3-fbfb5edda775'),
('e3ec53b6-b20a-499b-b633-29b9d72f5222', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', '121ca78c-6465-46a4-b8d3-4bad52c4edd0'),
('e4a50d55-f338-47ac-8e61-91af741d6939', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', '79f18596-92d5-4b86-ae9b-df244e3f88f7'),
('e5a2aa5e-b277-4ce9-ac2b-88159ad89920', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', '516f4bb6-34f1-456a-a62b-70f5df37ea53'),
('e731cd57-c55a-4ea3-b0f1-4457ee5c2a00', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', '78c2abc9-f021-45aa-af03-0a9a3217fa48'),
('ed062913-3e6f-4426-b185-bcc3f9a3a1d3', 'd80498b5-0bcb-4b56-9690-de44a3ffbda2', '8d78e645-e9cd-447c-9cc9-f2a45b81be92'),
('efba9d4a-b96f-4806-9509-5297535bd63a', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', '0ac77264-783c-4615-86aa-6037245ed5d8'),
('f52b626d-56f3-46f9-a1f5-4451b08f77b3', '9a19c33b-3c54-49a5-84c3-0a3121cde532', '2023b74e-ad8b-425e-860e-b4d686639829'),
('f544b603-8b8a-476e-96d2-701266de6ba3', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'fe7e54da-05a5-46e6-b0e4-430d446d5c23'),
('f7c9b936-68f0-4dcd-af65-aafa6976ad2c', '2a442328-bd10-4087-af2d-7b68c72a61c1', '2023b74e-ad8b-425e-860e-b4d686639829'),
('f8af53c6-1b57-43be-9728-b3a5b034a98a', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', '269883f2-9487-41a7-b415-d546085e354f'),
('fc168858-7af0-4423-9eb4-8007475ce26b', '4aacfdb2-8309-4ca0-bf9d-b8dead776cec', 'd461e8d0-fe79-4f4d-b965-94de540b7d41'),
('fdf8a5f2-4961-4ae8-b6f5-6b6dd0ddb57f', 'edd13f7b-3e99-4b07-9c22-7db45be4d51a', 'f9b1bb4d-df90-4518-ab4e-916cded9bd94');

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

CREATE TABLE `semaine` (
  `id` varchar(40) NOT NULL,
  `id_session` varchar(40) NOT NULL,
  `no_semaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `semaine`
--

INSERT INTO `semaine` (`id`, `id_session`, `no_semaine`) VALUES
('09061140-8b7a-486e-b037-96d6106d40bb', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 9),
('0ac77264-783c-4615-86aa-6037245ed5d8', '14026a14-a1a8-456b-98a0-5210145a169d', 2),
('121ca78c-6465-46a4-b8d3-4bad52c4edd0', '14026a14-a1a8-456b-98a0-5210145a169d', 7),
('128b9979-8f1e-4aad-be0e-8deac81d175a', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 10),
('1eb3ee18-b6ad-4ca4-acaf-8a452a5a1912', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 10),
('2023b74e-ad8b-425e-860e-b4d686639829', '14026a14-a1a8-456b-98a0-5210145a169d', 10),
('269883f2-9487-41a7-b415-d546085e354f', '14026a14-a1a8-456b-98a0-5210145a169d', 8),
('35367c38-ac98-401f-8cb3-fbfb5edda775', '14026a14-a1a8-456b-98a0-5210145a169d', 1),
('39bd638c-d785-480d-94fb-ddf58cc22f81', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 13),
('4c6d1361-dacc-4eea-9708-3453cfe8636e', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 2),
('5070caad-9d91-479d-9284-f68edeee39b7', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 9),
('516f4bb6-34f1-456a-a62b-70f5df37ea53', '14026a14-a1a8-456b-98a0-5210145a169d', 14),
('53f17117-fe30-4e35-a2f5-9c8cc30883f6', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 11),
('541cb7b2-89e5-447e-9095-cbcac7234c15', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 14),
('590ebb85-2c4c-4aad-baa1-9d3c5b7957c3', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 7),
('5a930ffd-885e-4c5e-b20a-c191f9a8dd06', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 8),
('61824666-a282-4365-aee9-c900a2ae4a2a', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 3),
('6c2ee83b-6d17-4e45-9829-02b8f3168c0e', '14026a14-a1a8-456b-98a0-5210145a169d', 12),
('6f93fa10-c981-4da2-ab14-6657ea6519dc', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 7),
('78c2abc9-f021-45aa-af03-0a9a3217fa48', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 5),
('79f18596-92d5-4b86-ae9b-df244e3f88f7', '14026a14-a1a8-456b-98a0-5210145a169d', 4),
('8d78e645-e9cd-447c-9cc9-f2a45b81be92', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 3),
('8f0a837c-a629-4ba4-954e-779dc212cd3f', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 8),
('92bbf5fd-93c6-4455-9d56-865e617347f0', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 4),
('95e077d0-a035-4b26-8447-32d4702775fa', '14026a14-a1a8-456b-98a0-5210145a169d', 3),
('9a6d20b5-6a00-47a7-b4cb-882d6c0e77fe', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 5),
('9bb815ce-cc71-4c6e-8484-1fb2b09c12c5', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 11),
('a6f0fe54-729a-46ac-b31f-49e66df5ac94', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 12),
('a97bcc8f-80c1-49f3-ae7b-776e950c170f', '14026a14-a1a8-456b-98a0-5210145a169d', 5),
('b1160f5a-6441-4947-bd73-1fc306a1a01a', '14026a14-a1a8-456b-98a0-5210145a169d', 15),
('b48ab36b-912a-46d7-8860-7be4c61c1b48', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 15),
('c23896a0-0754-482e-a551-7f904d5b20c2', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 13),
('c5e4f319-5c8e-4edd-8189-e4592b6963ca', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 1),
('c8de5816-6673-4311-9065-df33a94d4b65', '14026a14-a1a8-456b-98a0-5210145a169d', 11),
('cccb84f0-e359-4c37-a3db-5b4aabd55975', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 6),
('cf31c0cd-57d0-45ed-89dd-659e63a49deb', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 15),
('d461e8d0-fe79-4f4d-b965-94de540b7d41', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 2),
('dba7306b-120e-47ac-a361-4112c74919aa', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 6),
('dc3ae4a5-e854-4d63-9611-5098c184e3ec', '14026a14-a1a8-456b-98a0-5210145a169d', 13),
('e85a43b1-9600-46d5-83f3-4826d8b52456', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 4),
('ec0db861-02a3-4138-85f3-b977d1b4d42b', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 1),
('f9b1bb4d-df90-4518-ab4e-916cded9bd94', '14026a14-a1a8-456b-98a0-5210145a169d', 9),
('faa567ad-6ae4-4b9e-bb47-66ad8c17013c', 'f70426e1-74fd-4029-8722-a16a976e8fa1', 14),
('fbbb0388-d5e3-4ac1-9c3d-76e4ee45a46b', '20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 12),
('fe7e54da-05a5-46e6-b0e4-430d446d5c23', '14026a14-a1a8-456b-98a0-5210145a169d', 6);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `id` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`id`, `nom`, `description`, `date_debut`, `date_fin`) VALUES
('14026a14-a1a8-456b-98a0-5210145a169d', 'Session 2021', 'Ete 2021', '2021-06-01', '2021-09-01'),
('20e2cf3e-79f9-4eee-a2f5-68900ec2db4e', 'Session 2022', 'Ete 2022', '2022-06-01', '2022-09-01'),
('f70426e1-74fd-4029-8722-a16a976e8fa1', 'Session 2020', 'Ete 2020', '2020-06-01', '2020-09-01');

-- --------------------------------------------------------

--
-- Structure de la table `type_activite`
--

CREATE TABLE `type_activite` (
  `id` varchar(40) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_activite`
--

INSERT INTO `type_activite` (`id`, `nom`, `description`) VALUES
('938ad37b-ffc1-482a-9a10-354d154751c1', 'Arts', 'Ca crée!'),
('ae84aa56-ee3e-4319-92cd-2002f5e18792', 'Sciences', 'Ca explose!'),
('bf0a9682-4907-4005-85f3-1125fb17652d', 'Sport', 'Ca bouge!');

-- --------------------------------------------------------

--
-- Structure de la table `type_activite_du_bloc`
--

CREATE TABLE `type_activite_du_bloc` (
  `id_bloc` varchar(40) NOT NULL,
  `id_type_activite` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` varchar(40) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `est_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom_utilisateur`, `mot_de_passe`, `est_admin`) VALUES
('efd06f9f-ffb9-4f54-8a32-86501f315890', 'homer', '$2y$10$CEeEveO9MpLFT.x17Rkbt.plGuW3VqQ3RyG2AOZVqmHKmWcF9P3Fi', 0),
('fe031680-545e-4bb6-b3e2-8c7356de6e68', 'admin', '$2y$10$aPuC0HyptQ751xsX2NbBROwoHUVD4n3O/8O6mUXJxlAESGN5Qb.7i', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id_activite`),
  ADD KEY `activite_fk1` (`type_activite`);

--
-- Index pour la table `activite_du_bloc`
--
ALTER TABLE `activite_du_bloc`
  ADD PRIMARY KEY (`id_activite`,`id_bloc`,`ordre`),
  ADD KEY `activite_du_bloc_fk1` (`id_bloc`);

--
-- Index pour la table `activite_programme`
--
ALTER TABLE `activite_programme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bloc`
--
ALTER TABLE `bloc`
  ADD PRIMARY KEY (`id_bloc`);

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enfant_fk0` (`id_parent`);

--
-- Index pour la table `gabarit_programme`
--
ALTER TABLE `gabarit_programme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `horaire_programme`
--
ALTER TABLE `horaire_programme`
  ADD PRIMARY KEY (`id_programme`,`id_activite_programme`,`plage_horaire`),
  ADD KEY `horaire_programme_fk1` (`id_activite_programme`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_programme_semaine`,`id_enfant`),
  ADD KEY `inscription_fk1` (`id_enfant`);

--
-- Index pour la table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_fk0` (`id_gabarit_programme`),
  ADD KEY `programme_fk1` (`id_session`);

--
-- Index pour la table `programme_semaine`
--
ALTER TABLE `programme_semaine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_semaine_fk0` (`id_programme`),
  ADD KEY `programme_semaine_fk1` (`id_semaine`);

--
-- Index pour la table `semaine`
--
ALTER TABLE `semaine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semaine_fk0` (`id_session`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_activite`
--
ALTER TABLE `type_activite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_activite_du_bloc`
--
ALTER TABLE `type_activite_du_bloc`
  ADD PRIMARY KEY (`id_bloc`,`id_type_activite`),
  ADD KEY `type_activite_du_bloc_fk1` (`id_type_activite`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_utilisateur` (`nom_utilisateur`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_fk0` FOREIGN KEY (`id_activite`) REFERENCES `activite_programme` (`id`),
  ADD CONSTRAINT `activite_fk1` FOREIGN KEY (`type_activite`) REFERENCES `type_activite` (`id`);

--
-- Contraintes pour la table `activite_du_bloc`
--
ALTER TABLE `activite_du_bloc`
  ADD CONSTRAINT `activite_du_bloc_fk0` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `activite_du_bloc_fk1` FOREIGN KEY (`id_bloc`) REFERENCES `bloc` (`id_bloc`);

--
-- Contraintes pour la table `bloc`
--
ALTER TABLE `bloc`
  ADD CONSTRAINT `bloc_fk0` FOREIGN KEY (`id_bloc`) REFERENCES `activite_programme` (`id`);

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `enfant_fk0` FOREIGN KEY (`id_parent`) REFERENCES `parent` (`id`);

--
-- Contraintes pour la table `horaire_programme`
--
ALTER TABLE `horaire_programme`
  ADD CONSTRAINT `horaire_programme_fk0` FOREIGN KEY (`id_programme`) REFERENCES `programme` (`id`),
  ADD CONSTRAINT `horaire_programme_fk1` FOREIGN KEY (`id_activite_programme`) REFERENCES `activite_programme` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_fk0` FOREIGN KEY (`id_programme_semaine`) REFERENCES `programme_semaine` (`id`),
  ADD CONSTRAINT `inscription_fk1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id`);

--
-- Contraintes pour la table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_fk0` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `programme_fk0` FOREIGN KEY (`id_gabarit_programme`) REFERENCES `gabarit_programme` (`id`),
  ADD CONSTRAINT `programme_fk1` FOREIGN KEY (`id_session`) REFERENCES `session` (`id`);

--
-- Contraintes pour la table `programme_semaine`
--
ALTER TABLE `programme_semaine`
  ADD CONSTRAINT `programme_semaine_fk0` FOREIGN KEY (`id_programme`) REFERENCES `programme` (`id`),
  ADD CONSTRAINT `programme_semaine_fk1` FOREIGN KEY (`id_semaine`) REFERENCES `semaine` (`id`);

--
-- Contraintes pour la table `semaine`
--
ALTER TABLE `semaine`
  ADD CONSTRAINT `semaine_fk0` FOREIGN KEY (`id_session`) REFERENCES `session` (`id`);

--
-- Contraintes pour la table `type_activite_du_bloc`
--
ALTER TABLE `type_activite_du_bloc`
  ADD CONSTRAINT `type_activite_du_bloc_fk0` FOREIGN KEY (`id_bloc`) REFERENCES `bloc` (`id_bloc`),
  ADD CONSTRAINT `type_activite_du_bloc_fk1` FOREIGN KEY (`id_type_activite`) REFERENCES `type_activite` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
