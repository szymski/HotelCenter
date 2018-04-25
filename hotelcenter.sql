-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Kwi 2018, 20:11
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
  `wolne` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `apartamenty`
--

INSERT INTO `apartamenty` (`id`, `id_hotelu`, `ilosc_miejsc`, `lozka_jednoOS`, `lozka_dwaOS`, `wolne`) VALUES
(1, 1, 11, 2, 15, 1),
(2, 1, 1, 3, 7, 1),
(3, 2, 1, 12, 1, 1),
(4, 3, 3, 1, 1, 1),
(5, 4, 3, 1, 1, 1),
(6, 5, 3, 1, 1, 1),
(7, 6, 3, 1, 1, 1),
(8, 7, 3, 1, 1, 1),
(10, 9, 3, 1, 1, 1),
(11, 10, 3, 1, 1, 1),
(12, 11, 3, 1, 1, 1),
(13, 12, 3, 1, 1, 1),
(14, 13, 3, 1, 1, 1),
(15, 14, 3, 1, 1, 1),
(16, 15, 3, 1, 1, 1),
(17, 16, 3, 1, 1, 1),
(18, 17, 3, 1, 1, 1);

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
(1, 'Politański', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(2, 'Politański', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(3, 'Przy Mlynie', 'Rybnik', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
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
(14, 'Monopol Hotel', 'Katowice', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(15, 'Vienna House', 'Katowice', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(16, 'Katowice Economy', 'Katowice', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12),
(17, 'Diament Plaza', 'Katowice', 'Ul. Kekus Maximus 11', 'Nasz superowy hotel 320', 12);

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
(12, 'bartekAdmin', 'bartek', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `apartamenty`
--
ALTER TABLE `apartamenty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `hotele`
--
ALTER TABLE `hotele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
