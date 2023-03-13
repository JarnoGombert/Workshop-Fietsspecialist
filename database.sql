-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 mrt 2023 om 15:39
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
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
(3, 'Over ons', '', '', '', '', '', 'hoofdmenu', 'over-ons', 'actief', '0000-00-00'),
(4, 'Contact', '', '', '', '', '', 'hoofdmenu', 'contact', 'actief', '0000-00-00');
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
-- Indexen voor tabel `digifixx_producten`
--
ALTER TABLE `digifixx_producten`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `digifixxcms_gebruikers`
--
ALTER TABLE `digifixxcms_gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `digifixx_producten`
--
ALTER TABLE `digifixx_producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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