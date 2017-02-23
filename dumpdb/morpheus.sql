-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 23, 2017 alle 17:39
-- Versione del server: 5.7.17-0ubuntu0.16.04.1
-- Versione PHP: 7.1.1-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `morpheus`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `caregivers`
--

CREATE TABLE `caregivers` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_giver` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `pilldispensers`
--

CREATE TABLE `pilldispensers` (
  `id` int(11) NOT NULL,
  `code` varchar(12) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `pilldispensers`
--

INSERT INTO `pilldispensers` (`id`, `code`, `id_user`) VALUES
(1, '000000000000', 14),
(2, '111111111111', 26),
(3, '222222222222', 29),
(4, '333333333333', 30);

-- --------------------------------------------------------

--
-- Struttura della tabella `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `period` text NOT NULL,
  `id_therapy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `sex` char(1) NOT NULL,
  `profile_picture` varchar(1024) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `surname`, `birthdate`, `address`, `birthplace`, `sex`, `profile_picture`, `id_user`) VALUES
(7, 'gino', 'lasleppa', '2017-02-19', 'haaalalala', 'alalalal', 'm', 'http://www.thewrap.com/wp-content/uploads/2015/01/snoop.jpg', 14),
(9, 'admin', 'admin', '2017-02-20', 'admin', 'admin', 'm', 'https://i.ytimg.com/vi/1AwLjJXbA4I/maxresdefault.jpg', 26),
(11, 'gino', 'papapap', '1995-11-12', 'sdf', 'f', 'm', NULL, 29),
(12, 'falso', 'nome', '1995-12-12', 'papapa', 'appapape', 'm', NULL, 30);

-- --------------------------------------------------------

--
-- Struttura della tabella `therapies`
--

CREATE TABLE `therapies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  `id_creator` int(11) NOT NULL,
  `id_reciver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doctor` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `created`, `doctor`) VALUES
(14, 'gino', '$2y$10$NYSpd9ntjXToQa.I9dbaG.rdTwgiTp4eBJjJUSAyB.pgC/rVA4Hfi', 1, '2017-02-14 11:49:46', 0),
(26, 'admin', '$2y$10$ZxVxB4XVpuDs6LAx/sM7FOEuQJxLZPZbY9qPBmiRcajp8AJdtxbTy', 1, '2017-02-19 17:43:31', 0),
(29, 'g@g.g', '$2y$10$T6JZyDI4eLyWjbUfyuU94OVcetrT2wwvPX09UDtYhR7Eiw/WhaQvm', 0, '2017-02-22 22:21:59', 0),
(30, 'falsonome@falso.plzcnt', '$2y$10$/USS/8DRhXaDOGlI4zOtBu/ffFNZveh0MSB0dzerjL4hze5fVaP8m', 0, '2017-02-23 16:15:11', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `caregivers`
--
ALTER TABLE `caregivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_giver` (`id_giver`),
  ADD KEY `user_receiver` (`id_receiver`);

--
-- Indici per le tabelle `pilldispensers`
--
ALTER TABLE `pilldispensers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_dispenser` (`id_user`);

--
-- Indici per le tabelle `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `therapy_prescr` (`id_therapy`);

--
-- Indici per le tabelle `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `therapies`
--
ALTER TABLE `therapies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_creator` (`id_creator`),
  ADD KEY `user_receiver_therapies` (`id_reciver`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `caregivers`
--
ALTER TABLE `caregivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `pilldispensers`
--
ALTER TABLE `pilldispensers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT per la tabella `therapies`
--
ALTER TABLE `therapies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `caregivers`
--
ALTER TABLE `caregivers`
  ADD CONSTRAINT `user_giver` FOREIGN KEY (`id_giver`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_receiver` FOREIGN KEY (`id_receiver`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `pilldispensers`
--
ALTER TABLE `pilldispensers`
  ADD CONSTRAINT `user_dispenser` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `therapy_prescr` FOREIGN KEY (`id_therapy`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_profile` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `therapies`
--
ALTER TABLE `therapies`
  ADD CONSTRAINT `user_creator` FOREIGN KEY (`id_creator`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_receiver_therapies` FOREIGN KEY (`id_reciver`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
