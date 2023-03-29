-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 29. 20:08
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `sorinet`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `link`
--

CREATE TABLE `link` (
  `id` int(50) NOT NULL DEFAULT 0,
  `linek` varchar(500) NOT NULL,
  `resz` int(50) NOT NULL,
  `sorozatid` int(50) NOT NULL,
  `hostnev` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `link`
--

INSERT INTO `link` (`id`, `linek`, `resz`, `sorozatid`, `hostnev`) VALUES
(1, 'https://jobbmintatv.hu/online/A_Tronok_Harca/1_evad/1_resz/90514', 1, 1, 'Jobbmintatv.hu');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sorozat`
--

CREATE TABLE `sorozat` (
  `id` int(100) NOT NULL,
  `nev` varchar(50) NOT NULL,
  `imd` varchar(100) NOT NULL,
  `kep` varchar(100) NOT NULL,
  `leiras` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `sorozat`
--

INSERT INTO `sorozat` (`id`, `nev`, `imd`, `kep`, `leiras`) VALUES
(1, 'Game of Thrones', 'https://www.imdb.com/title/tt0944947/', 'GoT.jpg', 'In the mythical continent of Westeros, several powerful families fight for control of the Seven King'),
(2, 'Lucifer', 'https://www.google.com', 'Lucifer.jpg', 'description');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `nev` varchar(50) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kep` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `nev`, `jelszo`, `email`, `kep`) VALUES
(1, 'Kaposztas Zsuzsanna', '$2y$10$jWWzef5CdTerGGvn3xTzOeP4SDG04ewtXRMqosFqE7M8O9Ey8xznG', 'zsuzsa22@gmail.com', 'ClickBait.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `sorozat`
--
ALTER TABLE `sorozat`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `sorozat`
--
ALTER TABLE `sorozat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
