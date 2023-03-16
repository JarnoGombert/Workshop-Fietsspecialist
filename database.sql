-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 mrt 2023 om 18:34
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digifixx`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixxcms`
--

CREATE TABLE `digifixxcms` (
  `id` int(11) NOT NULL,
  `item1` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item2` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item3` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item4` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item5` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tekst` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keuze` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paginaurl` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'actief',
  `datum` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `digifixxcms`
--

INSERT INTO `digifixxcms` (`id`, `item1`, `item2`, `item3`, `item4`, `item5`, `tekst`, `keuze`, `paginaurl`, `status`, `datum`) VALUES
(1, 'Home', '', '', '', '', '', 'hoofdmenu', 'home', 'actief', '0000-00-00'),
(2, 'Producten', '', '', '', '', '', 'hoofdmenu', 'producten', 'actief', '0000-00-00'),
(3, 'Over ons', '', '', '', '', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta.', 'hoofdmenu', 'over-ons', 'actief', '0000-00-00'),
(4, 'Contact', '', '', '', '', '', 'hoofdmenu', 'contact', 'actief', '0000-00-00'),
(5, 'Winkelwagen', '', '', '', '', '', 'hoofdmenu', 'winkelwagen', 'actief', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixxcms_gebruikers`
--

CREATE TABLE `digifixxcms_gebruikers` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `niveau` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `titel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `geslacht` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `voorletters` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tussenvoegsel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `achternaam` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `plaats` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefoon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `mobiel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `actief` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `datum_invoer` date NOT NULL,
  `ipadres` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `digifixxcms_gebruikers`
--

INSERT INTO `digifixxcms_gebruikers` (`id`, `username`, `niveau`, `email`, `password`, `titel`, `geslacht`, `voorletters`, `tussenvoegsel`, `achternaam`, `adres`, `postcode`, `plaats`, `telefoon`, `mobiel`, `actief`, `datum_invoer`, `ipadres`) VALUES
(1, 'digifixx', 'admin', 'info@digifixx.nl', 'Digifixx2000!', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixx_images`
--

CREATE TABLE `digifixx_images` (
  `id` int(11) NOT NULL,
  `cms_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `digifixx_images`
--

INSERT INTO `digifixx_images` (`id`, `cms_id`, `file_name`, `uploaded_on`, `status`) VALUES
(1, 4, 'foto_1.png', '2023-03-15 11:30:32', '1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixx_producten`
--

CREATE TABLE `digifixx_producten` (
  `id` int(11) NOT NULL,
  `naam` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `merk` varchar(200) NOT NULL,
  `kleur` varchar(200) NOT NULL,
  `frameMaat` varchar(200) NOT NULL,
  `extras` varchar(200) NOT NULL,
  `paginaurl` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'niet actief'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixx_product_cat`
--

CREATE TABLE `digifixx_product_cat` (
  `id` int(11) NOT NULL,
  `catNaam` varchar(255) NOT NULL,
  `catPopulair` varchar(255) NOT NULL DEFAULT 'nee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `digifixx_product_cat`
--

INSERT INTO `digifixx_product_cat` (`id`, `catNaam`, `catPopulair`) VALUES
(1, 'Stadfietsen', 'ja'),
(2, 'Toerfietsen', 'nee'),
(3, 'Fitness fietsen\r\n', 'nee'),
(4, 'Kinderfietsen', 'ja'),
(5, 'Mountianbike', 'ja'),
(6, 'Racefietsen', 'ja'),
(7, 'Elektrische fietsen\r\n', 'ja'),
(8, 'Allrounder\n', 'nee'),
(9, 'Gravel fietsen\r\n', 'nee');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixx_reviews`
--

CREATE TABLE `digifixx_reviews` (
  `id` int(11) NOT NULL,
  `titel` varchar(200) NOT NULL,
  `tekst` longtext NOT NULL,
  `auteur` varchar(200) NOT NULL,
  `paginaurl` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'niet actief'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixx_settings`
--

CREATE TABLE `digifixx_settings` (
  `id` int(11) NOT NULL,
  `weburl` text COLLATE utf8_unicode_ci NOT NULL,
  `naamwebsite` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `digifixx_settings`
--

INSERT INTO `digifixx_settings` (`id`, `weburl`, `naamwebsite`) VALUES
(1, 'https://localhost/School/Workshops/Workshop-Fietsspecialist/', 'Fietsspecialist Bakker');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `digifixxcms`
--
ALTER TABLE `digifixxcms`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `digifixxcms_gebruikers`
--
ALTER TABLE `digifixxcms_gebruikers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexen voor tabel `digifixx_images`
--
ALTER TABLE `digifixx_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `digifixx_producten`
--
ALTER TABLE `digifixx_producten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `digifixx_product_cat`
--
ALTER TABLE `digifixx_product_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `digifixx_reviews`
--
ALTER TABLE `digifixx_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `digifixx_settings`
--
ALTER TABLE `digifixx_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `digifixxcms`
--
ALTER TABLE `digifixxcms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `digifixxcms_gebruikers`
--
ALTER TABLE `digifixxcms_gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `digifixx_images`
--
ALTER TABLE `digifixx_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `digifixx_producten`
--
ALTER TABLE `digifixx_producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `digifixx_product_cat`
--
ALTER TABLE `digifixx_product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `digifixx_reviews`
--
ALTER TABLE `digifixx_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `digifixx_settings`
--
ALTER TABLE `digifixx_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
