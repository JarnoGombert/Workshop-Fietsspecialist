-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 mrt 2023 om 14:29
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
(3, 'Over ons', '', '', '', '', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta.', 'hoofdmenu', 'over-ons', 'actief', '0000-00-00'),
(4, 'Contact', '', '', '', '', '', 'hoofdmenu', 'contact', 'actief', '0000-00-00'),
(5, 'Winkelwagen', '', '', '', '', '', 'hoofdmenu', 'winkelwagen', 'actief', '0000-00-00'),
(6, 'Betalings Methode', '', '', '', '', '', 'overige', 'betalings-methode', 'actief', '0000-00-00'),
(7, 'Betaling Voltooid', '', '', '', '', '', 'overige', 'betaling-voltooid', 'actief', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixxcms_gebruikers`
--

CREATE TABLE `digifixxcms_gebruikers` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `niveau` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'gebruiker',
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
  `datum_invoer` datetime NOT NULL,
  `ipadres` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `digifixxcms_gebruikers`
--

INSERT INTO `digifixxcms_gebruikers` (`id`, `username`, `niveau`, `email`, `password`, `titel`, `geslacht`, `voorletters`, `tussenvoegsel`, `achternaam`, `adres`, `postcode`, `plaats`, `telefoon`, `mobiel`, `actief`, `datum_invoer`, `ipadres`) VALUES
(1, 'digifixx', 'admin', 'info@digifixx.nl', 'Digifixx2000!', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(2, 'user', 'gebruiker', 'info@user.nl', 'user', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixxcms_product_reviews`
--

CREATE TABLE `digifixxcms_product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `titel` varchar(200) NOT NULL,
  `tekst` longtext NOT NULL,
  `auteur` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'actief'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixx_images`
--

CREATE TABLE `digifixx_images` (
  `id` int(11) NOT NULL,
  `cms_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `digifixx_images`
--

INSERT INTO `digifixx_images` (`id`, `cms_id`, `product_id`, `file_name`, `uploaded_on`, `status`) VALUES
(5, 3, 0, 'FietsImage1.png', '2023-03-21 09:13:00', '1'),
(6, 0, 1, 'FietsImage1.png', '2023-03-24 13:12:07', '1'),
(8, 0, 2, 'FietsCard.png', '2023-03-24 14:10:32', '1'),
(9, 0, 3, '03500493_de848293ab__1__0eee.jpg', '2023-03-24 14:15:22', '1'),
(10, 0, 4, 'fff8515cbcba278caa0f6790a511.png', '2023-03-24 14:37:02', '1'),
(11, 0, 5, 'Giant-attend-rs2-heren-blue-ashes.progressive.png', '2023-03-24 14:39:52', '1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `digifixx_producten`
--

CREATE TABLE `digifixx_producten` (
  `id` int(11) NOT NULL,
  `naam` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `merk` varchar(200) NOT NULL,
  `categorie` varchar(200) NOT NULL,
  `prijs` varchar(11) NOT NULL DEFAULT '0',
  `prijs_korting` varchar(11) NOT NULL DEFAULT '0',
  `kleur` varchar(200) NOT NULL,
  `frameMaat` varchar(200) NOT NULL,
  `extras` varchar(200) NOT NULL,
  `paginaurl` varchar(200) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(200) NOT NULL DEFAULT 'actief'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `digifixx_producten`
--

INSERT INTO `digifixx_producten` (`id`, `naam`, `model`, `merk`, `categorie`, `prijs`, `prijs_korting`, `kleur`, `frameMaat`, `extras`, `paginaurl`, `datum`, `status`) VALUES
(1, 'Lite Comfort', 'EVO 5', 'Premio', 'Stadfietsen', '3.749,00', '0', '#ccc7c7', '56/57', '', 'product/premio-evo-5-lite-comfort', '2023-03-08 12:02:45', 'actief'),
(2, 'HMB 2023', ' Grenoble C8', 'Gazelle', 'Elektrische fietsen\r\n', '2.899', '0', '#61a8cc', '', '', 'product/gazelle-grenoble-c8-hmb-2023', '2023-03-31 11:02:45', 'actief'),
(3, 'ENERGY 2023', 'd-RULE', 'Sparta', 'Elektrische fietsen\r\n', '2.999,99', '2.499,99', '#fbad54', '', '', 'product/sparta--d-rule-energy', '2023-03-31 11:02:45', 'actief'),
(4, 'Easy MDS', 'Livorno', 'Stella', 'Elektrische fietsen\r\n', '1.499,99', '0', '#3d5dbd', '', '', 'product/stella-livorno-easy-mds', '2023-03-31 11:02:45', 'actief'),
(5, 'RS 2 2023', 'Attend ', 'Giant', 'Stadfietsen', '699,00', '599,00', '#000000', '', '', 'product/giant-attend-rs-2-2023', '2023-03-31 11:02:45', 'actief');

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
  `aantal_sterren` int(11) DEFAULT NULL,
  `paginaurl` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'niet actief'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `digifixx_reviews`
--

INSERT INTO `digifixx_reviews` (`id`, `titel`, `tekst`, `auteur`, `aantal_sterren`, `paginaurl`, `status`) VALUES
(1, 'Dit is een test', 'Dit is een test review, dus niet echt.', 'John Doe', 4, 'review/test-review', 'actief'),
(2, 'Dit is nog een test review', 'test', 'John Doe', 2, 'review/dit-is-nog-een-test-review', 'actief'),
(3, 'Dit is nog een test review', 'Dit is een test tekst.', 'John Doe', 2, 'review/dit-is-nog-een-test-review', 'actief'),
(4, 'review', '', 'John Doe', 4, 'review/review', 'actief');

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
-- Indexen voor tabel `digifixxcms_product_reviews`
--
ALTER TABLE `digifixxcms_product_reviews`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `digifixxcms_gebruikers`
--
ALTER TABLE `digifixxcms_gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `digifixxcms_product_reviews`
--
ALTER TABLE `digifixxcms_product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `digifixx_images`
--
ALTER TABLE `digifixx_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `digifixx_producten`
--
ALTER TABLE `digifixx_producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `digifixx_product_cat`
--
ALTER TABLE `digifixx_product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `digifixx_reviews`
--
ALTER TABLE `digifixx_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `digifixx_settings`
--
ALTER TABLE `digifixx_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
