-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Ápr 19. 22:17
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `minta_kft`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `projects`
--

CREATE TABLE `projects` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `starting_date` date NOT NULL,
  `end_date` date NOT NULL,
  `payment` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `file_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `projects`
--

INSERT INTO `projects` (`id`, `name`, `starting_date`, `end_date`, `payment`, `description`, `file_id`) VALUES
(13, 'Bar foo', '1996-01-05', '1685-05-04', 10, 'lorem ipsum foo bar', 2),
(20, 'Foo', '1999-03-05', '2200-05-05', 100, ' lorem ipsum foo bar', NULL),
(28, 'Sikeres PHP modulzÃ¡rÃ³???', '2021-04-17', '2021-04-21', 1, '<p><u>RemÃ©lem </u>jobban sikerÃ¼l, mint a <b>Javascript <font color=\"#ffff00\" style=\"background-color: rgb(0, 0, 255);\">vizsga</font>.</b></p>', 1),
(29, 'file_id teszt', '1999-03-05', '2200-05-05', 0, '<h1><u><b><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">UNSINGED Payment!!!</font></b></u></h1>', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `tax_number` int(10) UNSIGNED NOT NULL,
  `mother` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `birth_date`, `birth_place`, `tax_number`, `mother`, `role`) VALUES
(3, 'AK47', 'ak@47.com', '$2y$10$4p1T6kEXYGHUFoWyT78GqOn1rNLpQsVEqmBBYHbsQZqtSnl41ZFPi', '1947-01-01', '', 1111111111, 'STG44', 3),
(18, 'GergÅ‘ VÃ¡radi', 'varger96@gmail.com', '$2y$10$qTMyC2Aa8bo5wbyTeWf3ceezHs1U8CxslKuaD68jR/S/G.UCH/z9.', '1947-01-01', 'New York', 1234567890, 'Scarlet Johanson', 1),
(20, 'Foo Bar', 'foo@bar.com', '$2y$10$qB8WMOQKV2XcDjHBowSRB.niPJzyFqLUQsA0eIrMhTyDIn4yABYpa', '1947-01-10', 'New York', 4294967295, 'W3', 2),
(21, 'John Doe', 'john@doe.com', '$2y$10$TqDJfGBaJeZuvXrJegpX2ODkcwsyJrdbavYwnru0bE5PZOOR6EnPe', '1998-01-26', 'Great Barrington', 2481632641, 'W3', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `works`
--

CREATE TABLE `works` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `works`
--

INSERT INTO `works` (`id`, `date`, `time`, `comment`, `user_id`, `project_id`) VALUES
(1, '2021-04-29', '18:08:42', 'bla bla..', 3, 20),
(2, '2021-04-01', '10:10:42', 'tro-lo-lo', 15, 13),
(3, '2021-04-01', '19:47:49', 'bla bal lalalalffl', 3, 20),
(4, '1996-03-25', '00:00:03', '...', 3, 20),
(5, '1996-03-25', '00:00:03', '...', 3, 20),
(6, '1996-03-25', '20:00:03', 'a', 3, 20),
(7, '1996-03-25', '20:00:03', 'a', 3, 20),
(8, '1996-03-25', '20:00:03', 'a', 3, 20),
(9, '1654-03-25', '20:30:00', '', 3, 20),
(10, '1996-03-25', '03:30:00', 'aaa', 3, 20),
(11, '1996-03-25', '03:30:00', 'aaa', 3, 20),
(12, '1996-03-25', '20:30:00', '...', 3, 13),
(13, '1996-03-25', '20:30:00', '...', 3, 13),
(14, '1654-03-25', '20:30:00', 'bla...', 3, 13),
(15, '1996-03-25', '20:30:00', 'bla...', 18, 20),
(16, '1654-03-25', '03:30:00', 'aaa', 18, 20),
(17, '1996-03-25', '20:30:00', 'bla...', 18, 13),
(18, '2021-04-17', '03:30:01', 'A rettegÃ©s foka.', 18, 28),
(19, '2021-04-17', '03:30:00', 'FelhasznÃ¡lÃ³k kezelÃ©se.', 18, 28),
(20, '2021-04-18', '01:00:00', 'Mappa kezelÃ©s, utolsÃ³ simÃ­tÃ¡sok az e-mail alapjÃ¡n.', 18, 28),
(21, '2021-04-18', '00:00:01', 'A felismerÃ©s, hogy a mappa tÃ¶rlÃ©sekor a projektet is tÃ¶rlÃ¶m. EgyeztetÃ©s szÃ¼ksÃ©ges.', 18, 28),
(22, '2021-04-18', '06:00:00', 'A Projektek modul elkÃ©szÃ­tÃ©se.', 18, 28),
(23, '2021-04-18', '00:00:01', 'Nagy levegÅ‘ a timetracking elÅ‘tt.', 18, 28),
(24, '2021-04-18', '00:30:00', 'VÃ©gsÅ‘ kÃ©tsÃ©gbe esÃ©s.', 18, 28),
(25, '2021-04-18', '00:00:30', 'KÃ¼zdj Ã©s bÃ­zva bÃ­zzÃ¡l!!!', 18, 28),
(26, '2021-04-18', '03:00:00', 'Time tracking kÃ©sz (tÃ¶bbÃ©, kevÃ©sbÃ©).', 18, 28),
(27, '1996-03-25', '00:00:03', 'bla...', 3, 20),
(28, '1996-03-25', '00:00:03', 'bla...', 3, 20),
(29, '1996-03-25', '00:00:03', 'a', 3, 20),
(30, '1111-11-11', '00:00:01', 'bla...', 3, 20);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_id` (`project_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
