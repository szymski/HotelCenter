-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Maj 2018, 17:55
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `hotelcenter`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `apartamenty`
--

CREATE TABLE `apartamenty` (
  `id` int(11) NOT NULL,
  `id_hotelu` int(11) NOT NULL,
  `ilosc_miejsc` int(11) NOT NULL,
  `lozka_jednoOS` int(11) NOT NULL,
  `lozka_dwaOS` int(11) NOT NULL,
  `wolne` tinyint(1) NOT NULL,
  `data_in` date NOT NULL,
  `data_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `apartamenty`
--

INSERT INTO `apartamenty` (`id`, `id_hotelu`, `ilosc_miejsc`, `lozka_jednoOS`, `lozka_dwaOS`, `wolne`, `data_in`, `data_out`) VALUES
(20, 9, 7, 2, 2, 1, '0000-00-00', '0000-00-00'),
(21, 10, 1, 3, 2, 1, '0000-00-00', '0000-00-00'),
(22, 5, 8, 1, 2, 1, '0000-00-00', '0000-00-00'),
(23, 8, 2, 2, 3, 1, '0000-00-00', '0000-00-00'),
(24, 14, 6, 3, 1, 1, '0000-00-00', '0000-00-00'),
(25, 13, 3, 2, 2, 1, '0000-00-00', '0000-00-00'),
(26, 13, 2, 2, 2, 1, '0000-00-00', '0000-00-00'),
(27, 11, 3, 1, 2, 1, '0000-00-00', '0000-00-00'),
(28, 13, 2, 2, 1, 1, '0000-00-00', '0000-00-00'),
(30, 10, 3, 1, 1, 1, '0000-00-00', '0000-00-00'),
(31, 13, 5, 3, 1, 1, '0000-00-00', '0000-00-00'),
(32, 4, 4, 1, 1, 1, '0000-00-00', '0000-00-00'),
(33, 12, 1, 3, 1, 1, '0000-00-00', '0000-00-00'),
(34, 14, 8, 1, 2, 1, '0000-00-00', '0000-00-00'),
(35, 12, 7, 1, 2, 1, '0000-00-00', '0000-00-00'),
(36, 13, 2, 3, 2, 1, '0000-00-00', '0000-00-00'),
(37, 11, 5, 1, 1, 1, '0000-00-00', '0000-00-00'),
(38, 9, 1, 2, 1, 1, '0000-00-00', '0000-00-00'),
(39, 9, 7, 2, 2, 1, '0000-00-00', '0000-00-00'),
(40, 6, 7, 3, 1, 1, '0000-00-00', '0000-00-00'),
(41, 8, 1, 3, 1, 1, '0000-00-00', '0000-00-00'),
(42, 12, 1, 2, 1, 1, '0000-00-00', '0000-00-00'),
(43, 10, 1, 3, 1, 1, '0000-00-00', '0000-00-00'),
(44, 8, 3, 1, 1, 1, '0000-00-00', '0000-00-00'),
(45, 10, 3, 3, 3, 1, '0000-00-00', '0000-00-00'),
(46, 13, 3, 3, 2, 1, '0000-00-00', '0000-00-00'),
(48, 9, 8, 3, 2, 1, '0000-00-00', '0000-00-00'),
(49, 5, 1, 1, 2, 1, '0000-00-00', '0000-00-00'),
(51, 5, 3, 2, 3, 1, '0000-00-00', '0000-00-00'),
(52, 10, 2, 3, 1, 1, '0000-00-00', '0000-00-00'),
(53, 8, 3, 2, 1, 1, '0000-00-00', '0000-00-00'),
(54, 4, 3, 3, 2, 1, '0000-00-00', '0000-00-00'),
(56, 10, 7, 2, 1, 1, '0000-00-00', '0000-00-00'),
(57, 10, 1, 3, 1, 1, '0000-00-00', '0000-00-00'),
(58, 6, 8, 2, 3, 1, '0000-00-00', '0000-00-00'),
(59, 9, 2, 1, 1, 1, '0000-00-00', '0000-00-00'),
(60, 14, 4, 2, 1, 1, '0000-00-00', '0000-00-00'),
(61, 14, 4, 2, 2, 1, '0000-00-00', '0000-00-00'),
(62, 6, 2, 3, 1, 1, '0000-00-00', '0000-00-00'),
(65, 8, 5, 3, 1, 1, '0000-00-00', '0000-00-00'),
(66, 7, 7, 1, 2, 1, '0000-00-00', '0000-00-00'),
(67, 11, 3, 1, 3, 1, '0000-00-00', '0000-00-00'),
(68, 8, 3, 3, 3, 1, '0000-00-00', '0000-00-00'),
(69, 4, 8, 2, 2, 1, '0000-00-00', '0000-00-00'),
(70, 4, 3, 3, 1, 1, '0000-00-00', '0000-00-00'),
(71, 9, 1, 1, 2, 1, '0000-00-00', '0000-00-00'),
(72, 4, 6, 1, 1, 1, '0000-00-00', '0000-00-00'),
(73, 7, 8, 3, 1, 1, '0000-00-00', '0000-00-00'),
(74, 5, 2, 1, 1, 1, '0000-00-00', '0000-00-00'),
(75, 14, 8, 2, 1, 1, '0000-00-00', '0000-00-00'),
(77, 12, 2, 2, 1, 1, '0000-00-00', '0000-00-00'),
(78, 5, 3, 1, 2, 1, '0000-00-00', '0000-00-00'),
(79, 9, 6, 3, 1, 1, '0000-00-00', '0000-00-00'),
(80, 7, 7, 2, 2, 1, '0000-00-00', '0000-00-00'),
(81, 10, 2, 3, 2, 1, '0000-00-00', '0000-00-00'),
(82, 8, 7, 2, 2, 1, '0000-00-00', '0000-00-00'),
(83, 13, 7, 2, 2, 1, '0000-00-00', '0000-00-00'),
(84, 4, 8, 3, 3, 1, '0000-00-00', '0000-00-00'),
(85, 10, 7, 1, 2, 1, '0000-00-00', '0000-00-00'),
(86, 14, 6, 2, 3, 1, '0000-00-00', '0000-00-00'),
(87, 10, 4, 1, 3, 1, '0000-00-00', '0000-00-00'),
(88, 11, 7, 3, 1, 1, '0000-00-00', '0000-00-00'),
(89, 13, 3, 3, 1, 1, '0000-00-00', '0000-00-00'),
(90, 4, 6, 1, 3, 1, '0000-00-00', '0000-00-00'),
(91, 11, 4, 2, 3, 1, '0000-00-00', '0000-00-00'),
(92, 10, 2, 1, 3, 1, '0000-00-00', '0000-00-00'),
(93, 8, 1, 2, 1, 1, '0000-00-00', '0000-00-00'),
(94, 10, 1, 2, 3, 1, '0000-00-00', '0000-00-00'),
(95, 14, 7, 3, 1, 1, '0000-00-00', '0000-00-00'),
(96, 13, 5, 3, 1, 1, '0000-00-00', '0000-00-00'),
(97, 11, 3, 3, 1, 1, '0000-00-00', '0000-00-00'),
(98, 7, 7, 3, 1, 1, '0000-00-00', '0000-00-00'),
(99, 8, 1, 2, 3, 1, '0000-00-00', '0000-00-00'),
(100, 14, 7, 1, 2, 1, '0000-00-00', '0000-00-00'),
(102, 12, 4, 1, 2, 1, '0000-00-00', '0000-00-00'),
(103, 12, 6, 1, 3, 1, '0000-00-00', '0000-00-00'),
(104, 5, 7, 3, 3, 1, '0000-00-00', '0000-00-00'),
(105, 9, 5, 3, 3, 1, '0000-00-00', '0000-00-00'),
(107, 6, 7, 3, 1, 1, '0000-00-00', '0000-00-00'),
(108, 4, 4, 2, 2, 1, '0000-00-00', '0000-00-00'),
(109, 11, 8, 2, 3, 1, '0000-00-00', '0000-00-00'),
(110, 12, 6, 3, 2, 1, '0000-00-00', '0000-00-00'),
(112, 6, 6, 3, 2, 1, '0000-00-00', '0000-00-00'),
(113, 4, 2, 1, 2, 1, '0000-00-00', '0000-00-00'),
(114, 14, 3, 2, 1, 1, '0000-00-00', '0000-00-00'),
(115, 5, 7, 2, 2, 1, '0000-00-00', '0000-00-00'),
(116, 10, 1, 2, 3, 1, '0000-00-00', '0000-00-00'),
(117, 11, 6, 3, 2, 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hotele`
--

CREATE TABLE `hotele` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `adres` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `wlasciciel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `hotele`
--

INSERT INTO `hotele` (`id`, `nazwa`, `miasto`, `adres`, `opis`, `wlasciciel`) VALUES
(4, 'Ambrozja', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(5, 'H&R Korba', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(6, 'Villa Silesia', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(7, 'Olimpia', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(8, 'Korona', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(9, 'Alto', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(10, 'Laskowo', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(11, 'Gościniec Wodzisławski', 'Wodzisław Śląski', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(12, 'Biały Dom', 'Wodzisław Śląski', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(13, 'Taaka Ryba', 'Wodzisław Śląski', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(14, 'Monopol Hotel', 'Katowice', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `id` int(11) NOT NULL,
  `nick` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(256) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `konta`
--

INSERT INTO `konta` (`id`, `nick`, `login`, `haslo`) VALUES
(1, 'ukulele', 'maximus', '8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72'),
(2, 'kekus', 'maximus', '0ebe2eca800cf7bd9d9d9f9f4aafbc0c77ae155f43bbbeca69cb256a24c7f9bb'),
(12, 'penetrujelochy321', 'bartek', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(13, 'dawidAdmin', 'dawid', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(15, 'awawawiodajwijd', 'wdaiowjdiawjdo', '3332a47695bae57c3ccb3ea396b281bb3e8efa38be51cf54a86a101f2e7e8775');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miasta`
--

CREATE TABLE `miasta` (
  `id` int(11) NOT NULL,
  `miasto` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `miasta`
--

INSERT INTO `miasta` (`id`, `miasto`) VALUES
(1, 'Rybnik'),
(2, 'Katowice'),
(4, 'Wodzisław Śląski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `id` int(11) NOT NULL,
  `id_hotelu` int(11) NOT NULL,
  `ocena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE `zdjecia` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `id_konta` int(11) NOT NULL,
  `id_hotelu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zdjecia`
--

INSERT INTO `zdjecia` (`id`, `nazwa`, `id_konta`, `id_hotelu`) VALUES
(16, '5ae88da76d7e51.98546856', 0, 4);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `apartamenty`
--
ALTER TABLE `apartamenty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotele`
--
ALTER TABLE `hotele`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miasta`
--
ALTER TABLE `miasta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zdjecia`
--
ALTER TABLE `zdjecia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `apartamenty`
--
ALTER TABLE `apartamenty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT dla tabeli `hotele`
--
ALTER TABLE `hotele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `konta`
--
ALTER TABLE `konta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `miasta`
--
ALTER TABLE `miasta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
