-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Lip 2020, 10:10
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lms_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `employees`
--

INSERT INTO `employees` (`id`, `name`, `supervisor_id`, `email`, `password`) VALUES
(1, 'root', 1, 'root@gmail.com', 'root'),
(2, 'Adam', 1, 'Adam@gmail.com', '12345'),
(3, 'Julia', 1, 'Julia@gmail.com', '12345'),
(4, 'Ala', 1, 'Ala@gmail.com', '12345'),
(5, 'Piotr', 1, 'Piotr@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `leaves`
--

INSERT INTO `leaves` (`id`, `status`, `employee_id`, `start_date`, `end_date`) VALUES
(1, 2, 2, '2019-05-16', '2020-04-22'),
(2, 2, 3, '2020-04-26', '2020-04-27'),
(5, 3, 3, '2020-04-06', '2020-04-11'),
(6, 2, 2, '2020-01-25', '2020-04-27'),
(7, 2, 2, '2020-04-25', '2020-04-30'),
(8, 1, 4, '2020-04-25', '2020-05-31'),
(9, 1, 4, '2020-04-15', '1999-04-19'),
(10, 1, 5, '2020-04-25', '2020-04-30'),
(11, 1, 3, '2020-07-11', '2020-07-31'),
(12, 2, 1, '2020-07-18', '2020-07-31'),
(13, 3, 2, '2020-07-08', '2020-07-09');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indeksy dla tabeli `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `employees` (`id`);

--
-- Ograniczenia dla tabeli `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
