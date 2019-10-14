-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Okt 2019 um 14:59
-- Server-Version: 10.4.6-MariaDB
-- PHP-Version: 7.3.9

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
(1, 1, 2, '0000-00-00', '0000-00-00', 'n.A.'),
(2, 1, 2, '0000-00-00', '0000-00-00', 'n.A.'),
(3, 1, 2, '0000-00-00', '0000-00-00', 'n.A.'),
(4, 1, 2, '2000-11-17', '2000-11-19', 'n.A.'),
(5, 1, 2, '2019-11-30', '2019-12-01', 'n.A.'),
(7, 1, 3, '2000-12-12', '2000-12-13', 'n.A.');

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
(8, 'Patrick', 'Odermann', 'patrick.odermann@mail.com', 'pa4.HHSXL55NA', '97i3fn3pdtren9kobt7b1hjp74'),
(9, 'Fabian', 'Rohrmann', 'fabian.rohrmann@mail.com', 'faXiVPE7xyD2E', 'rhq1jmr8c5ierf8q2q5evd7qtc');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
