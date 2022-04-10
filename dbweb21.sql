-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 29 Δεκ 2021 στις 16:06:52
-- Έκδοση διακομιστή: 10.4.21-MariaDB
-- Έκδοση PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `dbweb21`
--
create database dbweb21;
use dbweb21;
-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pois`
--

CREATE TABLE `pois` (
  `id` varchar(100) NOT NULL,
  `name` varchar(300) NOT NULL,
  `address` varchar(500) NOT NULL,
  `lat` float(20,10) NOT NULL,
  `lng` float(20,10) NOT NULL,
  `rating` float(10,5) NOT NULL,
  `rating_n` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pois_freq`
--

CREATE TABLE `pois_freq` (
  `id` int(11) NOT NULL,
  `id_poi` varchar(100) NOT NULL,
  `day1` varchar(20) NOT NULL,
  `hour1` int(11) NOT NULL,
  `persent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `id_poi` varchar(100) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `hasCovid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `hasCovid`) VALUES
(1, 'usr1', '123234', 'a@a.gr', 0),
(2, 'user2', '1234Abcd!', 'user2@user.gr', 0),
(3, 'user3', '1234hjerA!', 'user3@user.gr', 0),
(6, 'user4', '124543wAsd!', 'use4@lllgr.gr', 0),
(7, 'user3@ppp;.gr', '1234Ahkwej!', 'werwer@lek.wr', 0),
(8, 'admin2', '1234Adf!', 'a@lll.gr', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users_poi`
--

CREATE TABLE `users_poi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_poi` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Ευρετήρια για πίνακα `pois`
--
ALTER TABLE `pois`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `pois_freq`
--
ALTER TABLE `pois_freq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_poi` (`id_poi`);

--
-- Ευρετήρια για πίνακα `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_poi` (`id_poi`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Ευρετήρια για πίνακα `users_poi`
--
ALTER TABLE `users_poi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_poi` (`id_poi`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `pois_freq`
--
ALTER TABLE `pois_freq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `users_poi`
--
ALTER TABLE `users_poi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `pois_freq`
--
ALTER TABLE `pois_freq`
  ADD CONSTRAINT `pois_freq_ibfk_1` FOREIGN KEY (`id_poi`) REFERENCES `pois` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_ibfk_1` FOREIGN KEY (`id_poi`) REFERENCES `pois` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `users_poi`
--
ALTER TABLE `users_poi`
  ADD CONSTRAINT `users_poi_ibfk_1` FOREIGN KEY (`id_poi`) REFERENCES `pois` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_poi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
