-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 13, 2022 la 09:07 AM
-- Versiune server: 10.4.21-MariaDB
-- Versiune PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `pmm`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentariu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `comments`
--

INSERT INTO `comments` (`id`, `nume`, `email`, `comentariu`) VALUES
(161, 'monica', 'monica@monica.cmA', 'filip'),
(170, 'mihaela', 'monica@filip.com', 'mihaela'),
(171, 'filip', 'ominub@email.com', 'filipp'),
(172, 'hi', 'jj@jjj.com', 'hi hi');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `experienta_profesionala`
--

CREATE TABLE `experienta_profesionala` (
  `id` int(11) NOT NULL,
  `anul_inceperii` year(4) NOT NULL,
  `anul_incheierii` year(4) DEFAULT NULL,
  `firma` varchar(100) NOT NULL,
  `oras` varchar(100) NOT NULL,
  `pozitia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `experienta_profesionala`
--

INSERT INTO `experienta_profesionala` (`id`, `anul_inceperii`, `anul_incheierii`, `firma`, `oras`, `pozitia`) VALUES
(149, 2019, 2021, 'nokia', 'timi', 'practice'),
(150, 2021, NULL, 'nokia', 'tm', 'ing'),
(152, 2021, 2023, 'upt', 'tm', 'masterat');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `proiecte_universitate`
--

CREATE TABLE `proiecte_universitate` (
  `id` int(11) NOT NULL,
  `titlu` varchar(100) NOT NULL,
  `descriere` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `proiecte_universitate`
--

INSERT INTO `proiecte_universitate` (`id`, `titlu`, `descriere`) VALUES
(1, 'TMM', 'site web folosind css bootstrap html 5 si js'),
(2, 'TMMM', 'Talk tech project with collegues'),
(3, 'SGD', 'connect database with python and UI interface ');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `nume`, `prenume`, `username`, `password`, `tip`) VALUES
(70, 'monica', 'monica', 'monicafilip2', '$2y$10$8Hjw4RXg6Zd0KjuVvZTi9.lyz26jzjNnz46TipbICybADWM1tEgbW', 'administrator'),
(72, 'fsdfsd', 'dfsd', 'normal', '$2y$10$k22tmEKdfitqVG60RiF3GOQoTK2PK21jl4/GW38Zx.2Pn2ubhmWMu', 'normal'),
(80, 'ceva', 'ceva', 'ceva', '$2y$10$yPqVQCFdlrrkApHNf0taK.D3yRFmjEpYPtzMojmXGbqGJZDqLpcWm', 'normal'),
(81, 'moni', 'moni', 'moni', '$2y$10$omCFyBn4.n.KVA/LDRQIuOTZAJDQoSbpSh9AansBCy6DMy7VLzpQe', 'normal'),
(82, 'miham', 'miha', 'miha', '$2y$10$wxYJCJDUFo0c95c9vaQzN.Y7R.N/0OdFodIm.DEJbxctS2MoM2wqS', 'normal');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `experienta_profesionala`
--
ALTER TABLE `experienta_profesionala`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `proiecte_universitate`
--
ALTER TABLE `proiecte_universitate`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`username`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT pentru tabele `experienta_profesionala`
--
ALTER TABLE `experienta_profesionala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT pentru tabele `proiecte_universitate`
--
ALTER TABLE `proiecte_universitate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
