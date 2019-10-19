-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Okt 2019 um 19:38
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fahrrad`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bikes`
--

CREATE TABLE `bikes` (
  `bikeID` int(11) NOT NULL,
  `modellID` int(11) NOT NULL,
  `verliehen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bikes`
--

INSERT INTO `bikes` (`bikeID`, `modellID`, `verliehen`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 1, 0),
(5, 2, 0),
(6, 3, 0),
(7, 1, 0),
(8, 2, 0),
(9, 3, 0),
(10, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `anrede` varchar(255) COLLATE utf32_german2_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf32_german2_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf32_german2_ci NOT NULL,
  `email` varchar(255) COLLATE utf32_german2_ci NOT NULL,
  `grund` varchar(255) COLLATE utf32_german2_ci NOT NULL,
  `message` varchar(10000) COLLATE utf32_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_german2_ci;

--
-- Daten für Tabelle `contact`
--

INSERT INTO `contact` (`id`, `anrede`, `vorname`, `nachname`, `email`, `grund`, `message`) VALUES
(2, 'Herr', 'Max', 'Geis', 'm.geis@mail.com', 'Beratung', 'Wann haben sie Zeit für einen Beratungstermin?'),
(3, 'Frau', 'Simone', 'Hallmeier', 'h.meier@mail.com', 'Leihe', 'Test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `loan`
--

CREATE TABLE `loan` (
  `leihID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `radID` int(11) NOT NULL,
  `leihDat` date NOT NULL,
  `rueckDat` date NOT NULL,
  `rueckStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `loan`
--

INSERT INTO `loan` (`leihID`, `userID`, `radID`, `leihDat`, `rueckDat`, `rueckStatus`) VALUES
(5, 1, 2, '2019-11-30', '2019-12-01', 'n.A.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `type`
--

CREATE TABLE `type` (
  `modellID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `type`
--

INSERT INTO `type` (`modellID`, `name`) VALUES
(1, 'Mountainbike'),
(2, 'Strassenrad'),
(3, 'E-Bike');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `session_id`) VALUES
(11, 'Patrick', 'Odermann', 'p.odermann@web.de', '$2y$10$56wga2npfB8JVHRb9kzikOA5mSmNZ8P4aAvZDkjTwwxVMKIUHc5My', '6ss2e4e0v32ifj1slqs4h3hveu'),
(14, 'Brigitte', 'Maus', 'b.maus@web.de', '$2y$10$CtkEjyLbR4sximiTmc/hge9Ob61ZnnLsQrFHvuX9l8qLfvi8z/Zn2', 'mi9j06fon56vg0fk9u6sfc8e82');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`leihID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
