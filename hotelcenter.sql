-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Maj 2018, 14:31
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
  `data_out` date NOT NULL,
  `cena` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `apartamenty`
--

INSERT INTO `apartamenty` (`id`, `id_hotelu`, `ilosc_miejsc`, `lozka_jednoOS`, `lozka_dwaOS`, `wolne`, `data_in`, `data_out`, `cena`, `user_id`) VALUES
(20, 9, 7, 2, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(21, 10, 1, 3, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(22, 5, 8, 1, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(23, 8, 2, 2, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(25, 13, 3, 2, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(26, 13, 2, 2, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(27, 11, 3, 1, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(28, 13, 2, 2, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(30, 10, 3, 1, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(31, 13, 5, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(32, 4, 4, 1, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(33, 12, 1, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(35, 12, 7, 1, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(36, 13, 2, 3, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(37, 11, 5, 1, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(38, 9, 1, 2, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(39, 9, 7, 2, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(40, 6, 7, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(41, 8, 1, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(42, 12, 1, 2, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(43, 10, 1, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(44, 8, 3, 1, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(45, 10, 3, 3, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(46, 13, 3, 3, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(48, 9, 8, 3, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(49, 5, 1, 1, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(51, 5, 3, 2, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(52, 10, 2, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(53, 8, 3, 2, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(54, 4, 3, 3, 2, 0, '0000-00-00', '0000-00-00', 123, 0),
(56, 10, 7, 2, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(57, 10, 1, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(58, 6, 8, 2, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(59, 9, 2, 5, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(62, 6, 2, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(65, 8, 5, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(66, 7, 7, 1, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(67, 11, 3, 1, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(68, 8, 3, 3, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(70, 4, 3, 3, 1, 0, '0000-00-00', '0000-00-00', 123, 0),
(71, 9, 1, 1, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(72, 4, 6, 1, 1, 0, '0000-00-00', '0000-00-00', 123, 0),
(73, 7, 8, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(74, 5, 2, 1, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(77, 12, 2, 2, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(78, 5, 3, 1, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(79, 9, 6, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(80, 7, 7, 3, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(81, 10, 2, 3, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(82, 8, 7, 2, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(83, 13, 7, 2, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(84, 4, 8, 3, 3, 0, '0000-00-00', '0000-00-00', 123, 0),
(85, 10, 7, 1, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(87, 10, 4, 1, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(88, 11, 7, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(89, 13, 3, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(90, 4, 6, 1, 3, 0, '0000-00-00', '0000-00-00', 123, 0),
(91, 11, 4, 2, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(92, 10, 2, 1, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(93, 8, 1, 2, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(94, 10, 1, 2, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(96, 13, 5, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(97, 11, 3, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(99, 8, 1, 2, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(102, 12, 4, 1, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(103, 12, 6, 1, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(104, 5, 7, 3, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(105, 9, 5, 3, 3, 1, '0000-00-00', '0000-00-00', 2115, 0),
(107, 6, 7, 3, 1, 1, '0000-00-00', '0000-00-00', 123, 0),
(108, 4, 4, 2, 2, 0, '0000-00-00', '0000-00-00', 123, 0),
(109, 11, 8, 2, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(110, 12, 6, 3, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(112, 6, 6, 3, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(113, 4, 2, 1, 2, 0, '0000-00-00', '0000-00-00', 123, 0),
(115, 5, 7, 2, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(116, 10, 1, 2, 3, 1, '0000-00-00', '0000-00-00', 123, 0),
(117, 11, 6, 3, 2, 1, '0000-00-00', '0000-00-00', 123, 0),
(118, 4, 50, 12, 32, 0, '0000-00-00', '0000-00-00', 123, 0),
(119, 4, 123, 123, 123, 0, '0000-00-00', '0000-00-00', 321, 0),
(120, 4, 2, 2, 2, 1, '0000-00-00', '0000-00-00', 12345, 0);

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
(15, 'TwojaStaraPL', 'Katowice', 'Każda Ulica', 'Coniedzielezafree', 12);

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
(12, 'Kekus Maximus', 'bartek', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
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
(4, 'Wodzisław Śląski'),
(5, 'Warszawa'),
(6, 'Gdańsk'),
(7, 'Sosnowiec'),
(8, 'Szczecin'),
(9, 'Ulanice WIelkie');

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
  `id_hotelu` int(11) NOT NULL,
  `id_apartamentu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zdjecia`
--

INSERT INTO `zdjecia` (`id`, `nazwa`, `id_konta`, `id_hotelu`, `id_apartamentu`) VALUES
(16, '5ae88da76d7e51.98546856', 0, 4, 0),
(17, '5af02f0b139a31.30437621', 0, 5, 0),
(18, '5af2e81ce6e2f1.34450707', 0, 0, 32),
(19, '5af2e85967d087.15159011', 0, 0, 32),
(20, '5af2e969ee9bd1.86873921', 0, 0, 32),
(21, '5af2e971650db7.60642661', 0, 0, 32);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
