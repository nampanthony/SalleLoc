-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 18, 2021 at 04:10 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `BDDMatp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Calendrier`
--

CREATE TABLE `Calendrier` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#839C49',
  `border_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#839C49',
  `text_color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#ffffff',
  `nom_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Calendrier`
--

INSERT INTO `Calendrier` (`id`, `start`, `end`, `title`, `url`, `description`, `background_color`, `border_color`, `text_color`, `nom_url`) VALUES
(1, '2021-05-18 12:00:00', '2021-05-18 13:00:00', 'Réunion inaugurale', 'jpg.com\r\n', 'Réunion test pour la migration vers le télétravail', '#839C49', '#839C49', '#ffffff', 'xxx'),
(2, '2021-05-18 16:00:00', '2021-05-18 17:00:00', 'Réunion mini-série JPM', 'ra.com', 'Réunion juniors pour madagarscar', '#839C49', '#839C49', '#ffffff', 'ra');

-- --------------------------------------------------------

--
-- Table structure for table `Entreprise`
--

CREATE TABLE `Entreprise` (
  `IdEnt` int(11) NOT NULL,
  `nomEnt` varchar(15) NOT NULL,
  `mdpEnt` varchar(1000) NOT NULL,
  `mailEnt` varchar(30) NOT NULL,
  `typeEnt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Entreprise`
--

INSERT INTO `Entreprise` (`IdEnt`, `nomEnt`, `mdpEnt`, `mailEnt`, `typeEnt`) VALUES
(1, 'Nampoina', 'nampanthony', 'nampanthony@gmail.com', 'Client'),
(2, 'Serge', 'sergerahandri', 'serge@mahtp.gov.mg', 'Administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `Vols`
--

CREATE TABLE `Vols` (
  `id` int(11) NOT NULL,
  `ville_depart` varchar(30) NOT NULL,
  `ville_destination` varchar(30) NOT NULL,
  `date_depart` datetime NOT NULL,
  `nb_heure_vol` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Vols`
--

INSERT INTO `Vols` (`id`, `ville_depart`, `ville_destination`, `date_depart`, `nb_heure_vol`, `prix`) VALUES
(1, 'Paris', 'Toulouse', '2021-05-18 11:40:44', 1, 110),
(2, 'Lyon', 'Paris', '2021-05-19 11:40:44', 1, 90),
(3, 'Paris', 'Lyon', '2021-05-20 17:37:03', 1, 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Calendrier`
--
ALTER TABLE `Calendrier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD PRIMARY KEY (`IdEnt`);

--
-- Indexes for table `Vols`
--
ALTER TABLE `Vols`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Calendrier`
--
ALTER TABLE `Calendrier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Entreprise`
--
ALTER TABLE `Entreprise`
  MODIFY `IdEnt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Vols`
--
ALTER TABLE `Vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
