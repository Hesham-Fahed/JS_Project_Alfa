-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 05. Dez 2019 um 07:29
-- Server-Version: 8.0.13-4
-- PHP-Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `YhnpaevF7o`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hause`
--

CREATE TABLE `hause` (
  `id` int(11) NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imgdb` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `hause`
--

INSERT INTO `hause` (`id`, `owner`, `address`, `email`, `description`, `imgdb`) VALUES
(4, 'Hesham', 'Bielefeld', 'hisham@gmail.com', '   Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque libero aspernatur at soluta, vitae vel odit consequatur dolores excepturi natus nam optio harum tenetur illo, ut ipsa quo accusantium perferendis.', ''),
(5, 'Frend', 'Paderborn', 'fr@paderborn.de', ' 	Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque libero aspernatur at soluta, vitae vel odit consequatur dolores excepturi natus nam optio harum tenetur illo, ut ipsa quo accusantium perferendis.', ''),
(8, 'b', 'b', 'b', 'b', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `hause`
--
ALTER TABLE `hause`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `hause`
--
ALTER TABLE `hause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
