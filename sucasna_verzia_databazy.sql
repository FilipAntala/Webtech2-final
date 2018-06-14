-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2018 at 12:51 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvicenie`
--

CREATE TABLE `cvicenie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trasa_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `start` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `ciel` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `zaciatok` datetime NOT NULL,
  `koniec` datetime NOT NULL,
  `pridane` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `cvicenie`
--

INSERT INTO `cvicenie` (`id`, `trasa_id`, `user_id`, `start`, `ciel`, `zaciatok`, `koniec`, `pridane`) VALUES
(1, 2, 37, '51.551965,18.0729', '51.651965,18.0729', '2018-11-10 12:00:00', '2018-11-10 13:00:00', '2018-05-24 13:38:25'),
(2, 3, 57, '47.151965,17.50299', '45.71616, 19.664830', '2018-11-10 12:00:00', '2018-11-10 13:00:00', '2018-05-24 13:38:53'),
(3, 4, 32, '52.151965,14.0729', '51.419268, 15.428264', '2018-11-10 12:00:00', '2018-11-10 13:00:00', '2018-05-24 13:39:07'),
(4, 5, 57, '48.151965,15.0729', '43.112880, 13.701017', '2018-11-10 12:00:00', '2018-11-10 13:00:00', '2018-05-24 13:46:20'),
(5, 34, 60, '48.197,18.557', '48.538934, 18.766476', '2018-04-05 01:00:00', '2019-03-03 14:01:00', '2018-06-14 18:33:45'),
(6, 9, 57, '54.151965,13.0729', '51.467124,13.83', '2018-05-24 15:01:55', '2018-05-24 15:01:55', '2018-05-24 15:01:55'),
(7, 6, 47, '53.151965,19.0729', '51.600838, 13.701017', '2018-05-24 15:02:21', '2018-05-24 15:02:21', '2018-05-24 15:02:21'),
(8, 7, 58, '42.151965,22.0729', '47.6979002, 18.308174', '2018-05-24 15:02:33', '2018-05-24 15:02:33', '2018-05-24 15:02:33'),
(9, 27, 47, '54.151965,12.0729', '51.50265, 15.001089', '2018-05-24 15:29:48', '2018-05-24 15:29:48', '2018-05-24 15:29:48'),
(10, 11, 47, '48.151965,16.072995', '46.977384, 16.806833', '2018-05-24 15:04:55', '2018-05-24 15:04:55', '2018-05-24 15:04:55'),
(11, 1, 37, '53.269, 18.19', '54.502382, 29.884685', '2018-05-24 15:04:53', '2018-05-24 15:04:53', '2018-05-24 15:04:53'),
(12, 10, 60, '50.151965,7.072995', '51.211116, 14.429575', '2018-05-24 15:04:54', '2018-05-24 15:04:54', '2018-05-24 15:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `trasa`
--

CREATE TABLE `trasa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nazov` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `autor` int(11) NOT NULL,
  `mod` int(11) NOT NULL,
  `start` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `ciel` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `vytvorene` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `trasa`
--

INSERT INTO `trasa` (`id`, `nazov`, `autor`, `mod`, `start`, `ciel`, `vytvorene`) VALUES
(1, 'nova3', 37, 1, '53.269, 18.19', '51.551965 42.72995', '2018-06-14 16:44:02'),
(2, 'moja1', 37, 1, '51.551965,18.072995', '51.8619, 18.072295', '2018-05-24 12:02:02'),
(3, 'zatial3', 57, 2, '47.151965,17.502995', '43.151965,19.072995', '2018-05-24 12:02:37'),
(4, 'stafeta1', 32, 3, '52.151965,14.072995', '51.151965,18.072995', '2018-05-24 12:02:47'),
(5, 'public1', 57, 2, '48.151965,15.072995', '42.151965,17.072995', '2018-05-24 12:03:04'),
(6, 'moja5', 47, 1, '53.151965,19.072995', '51.151965,16.072995', '2018-05-24 12:03:21'),
(7, 'moja2', 58, 1, '42.151965,22.072995', '51.151965,18.072995', '2018-05-24 12:03:28'),
(9, 'moja3', 57, 2, '54.151965,13.072995', '49.151965,16.072995', '2018-05-24 12:08:09'),
(10, 'pokus1', 60, 2, '50.151965,7.072995', '51.151965,16.072995', '2018-05-24 12:08:28'),
(11, 'pokus2', 47, 1, '48.151965,16.072995', '46.151965,17.072995', '2018-05-24 12:08:51'),
(27, 'moja4', 47, 1, '54.151965,12.072995', '50.151965,17.072995', '2018-05-24 12:05:51'),
(34, 'trasa-test', 60, 1, '48.197,18.557', '48.985,18.557', '2018-06-14 18:33:08'),
(35, 'trasaX', 60, 1, '48.14,17.09', '48.15,17.07', '2018-06-14 21:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `priezvisko` varchar(40) COLLATE utf8_slovak_ci DEFAULT NULL,
  `meno` varchar(40) COLLATE utf8_slovak_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `type` int(11) NOT NULL,
  `valid` int(11) NOT NULL,
  `hash` varchar(200) COLLATE utf8_slovak_ci DEFAULT NULL,
  `stredna` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `stredna_adresa` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `bydlisko_ulica` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `psc` varchar(20) COLLATE utf8_slovak_ci DEFAULT NULL,
  `bydlisko_obec` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `priezvisko`, `meno`, `email`, `pass`, `type`, `valid`, `hash`, `stredna`, `stredna_adresa`, `bydlisko_ulica`, `psc`, `bydlisko_obec`) VALUES
(1, 'Abrahám', 'Štefan', 'email1@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium Martina Kukuèína', 'Revúca, V. Clementisa 1166/21, 05001', 'Revúcka Lehota 1', '4918', 'Revúcka Lehota'),
(2, 'Adamec', 'Albert', 'email2@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná odborná škola strojnícka', 'Považská Bystrica, Športovcov 341/2, 01749', 'Sládkovièova 1', '1701', 'Považská Bystrica'),
(3, 'Andrášová', 'Adela', 'email3@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Súkromná stredná odborná škola', 'Poprad, Ul. 29. augusta 4812, 05801', 'Tatranská Lomnica 1', '5960', 'Tatranská Lomnica'),
(4, 'Baran', 'Adrián', 'email4@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Bartókova 1', '81102', 'Bratislava'),
(5, 'Bašková', 'Eunika', 'email5@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium arm. gen. Ludvíka Svobodu', 'Humenné, Komenského 4, 06601', 'Partizánska 1', '6601', 'Humenné'),
(6, 'Beòová', 'Ester', 'email6@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium Antona Bernoláka', 'Námestovo, Ulica mieru 307/23, 02901', 'Novo 1', '2955', 'Novo'),
(7, 'Bernolák', '¼ubomír', 'email7@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Wolkrova 1', '85101', 'Bratislava - Petržalka'),
(8, 'Bernolák', 'Norbert', 'email8@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Myjava, Jablonská 5, 90701', 'Poriadie 1', '90622', 'Poriadie'),
(9, 'Bilek', 'Jozef', 'email9@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola', 'Dubnica nad Váhom, Obrancov mieru 343/1, 01841', 'Neporadza 1', '91326', 'Neporadza'),
(10, 'Boreková', 'Iveta', 'email10@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná odborná škola polytechnická', 'Humenné, Štefánikova 1550/20, 06601', 'Puškinova 1', '9303', 'Vranov nad Top¾ou'),
(11, 'Bóriková', 'Enna', '', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Vranov nad Top¾ou, Dr. C. Daxnera 88/3, 09380', 'Lúèna 1', '9301', 'Vranov nad Top¾ou'),
(12, 'Cesnaková', 'Natália', 'email12@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Hostáï 1', '93036', 'Èeèínska Potôò'),
(13, 'Dávidová', 'Karina', 'email13@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Dolná 1', '90051', 'Zohor'),
(14, 'Debnárová', 'Alana', 'email14@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Spojená škola-Stredná odborná škola technická', 'Prešov, ¼. Podjavorinskej 22, 08005', 'L. Novomeského 1', '8001', 'Prešov'),
(15, 'Deveèka', 'Koloman', 'email15@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná odborná škola obchodu a služieb', 'Nové Mesto nad Váhom, Piešanská 2262/80, 91501', 'Ivanovce 1', '91305', 'Ivanovce'),
(16, 'Doležalová', 'Zoja', 'email16@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Považská Bystrica, Školská 234/8, 01701', 'Rieèna 1', '2001', 'Hrabovka'),
(17, 'Dorko', 'Tibor', 'email17@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium ¼udovíta Štúra', 'Zvolen, Hronská 1467/3, 96049', 'Neresnická 1', '96261', 'Dobrá Niva'),
(18, 'Droppa', 'Miloslav', 'email18@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Vranov nad Top¾ou, Dr. C. Daxnera 88/3, 09380', 'Vyšný Žipov 1', '9433', 'Vyšný Žipov'),
(19, 'Dudiková', 'Iveta', 'email19@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Hranièiarska 1', '85110', 'Bratislava - Èunovo'),
(20, 'Ïuricová', 'Olívia', 'email20@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium Pavla Horova', 'Michalovce, Masarykova 1, 07179', 'Hradská 1', '7215', 'Budkovce'),
(21, 'Ïurka', 'Svetozár', 'email21@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Jasovská 1', '85107', 'Bratislava'),
(22, 'Ïurová', 'Jela', 'email22@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Vranov nad Top¾ou, Dr. C. Daxnera 88/3, 09380', 'Puškinova 1', '9303', 'Èemerné'),
(23, 'Fajnor', 'Bohumil', 'email23@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Stropkov, Konštantínova 64, 09101', 'Breznica 1', '9101', 'Stropkov'),
(24, 'Gál', 'Marcel', 'email24@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Vranov nad Top¾ou, Dr. C. Daxnera 88/3, 09380', 'Majerovce 1', '9409', 'Majerovce'),
(25, 'Gavenda', 'Bohuš', 'email25@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium ¼udovíta Štúra', 'Zvolen, Hronská 1467/3, 96049', '¼. Štúra 1', '96001', 'Zvolen'),
(26, 'Gavendová', 'Sláva', 'email26@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium Milana Rúfusa', 'Žiar nad Hronom, J. Kollára 2, 96501', 'Janova Lehota 1', '96624', 'Janova Lehota'),
(27, 'Greguš', 'Mikuláš', 'email27@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Spojená škola cirkevná-Gymnázium sv. Cyrila a Metoda', 'Humenné, Duchnovièova 24, 06601', '¼ubiša 1', '6711', '¼ubiša'),
(28, 'Habdušová', 'Elvíra', 'email28@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Bratislava-Ružinov, Metodova 2, 82108', 'Konopná 1', '90025', 'Èierna Voda'),
(29, 'Hagarová', 'Margita', 'email29@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Ružomberok, Š. Moyzesa 21, 03401', 'Vavra Šrobára 1', '3401', 'Ružomberok'),
(30, 'Haòušková', 'Blanka', 'email30@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Parková 1', '90042', 'Alžbetin Dvor'),
(31, 'Harvánek', 'Ervín', 'email31@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola strojnícka', 'Bratislava-Staré Mesto, Fajnorovo nábrežie 5, 81475', 'Stromová 1', '90101', 'Malacky'),
(32, 'Hlaváèiková', 'Petronela', 'email32@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná odborná škola sv. Jozefa Robotníka', 'Žilina, Saleziánska 18, 01001', 'Družstevná 1', '1004', 'Bánová'),
(33, 'Hoza', 'Mário', 'email33@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Snina, Študentská 4, 06901', 'Parková 1', '6761', 'Stakèín'),
(34, 'Husák', 'Miroslav', 'email34@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium', 'Myjava, Jablonská 5, 90701', 'SNP 1', '91601', 'Stará Turá'),
(35, 'Janèek', 'Félix', 'email35@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Spojená škola-Stredná priemyselná škola elektrotechnická S. A. Jedlika', 'Nové Zámky, Komáròanská 28, 94075', 'Zemné 1', '94122', 'Zemné'),
(36, 'Jantošoviè', 'Karol', 'email36@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Spojená škola-Gymnázium Jura Hronca', 'Bratislava-Ružinov, Novohradská 3, 82109', 'Suché Miesto 1', '90025', 'Chorvátsky Grob'),
(37, 'Junás', 'Oldrich', 'email37@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola', 'Dubnica nad Váhom, Obrancov mieru 343/1, 01841', 'Farská 1', '1861', 'Beluša'),
(38, 'Kolár', 'Teodor', 'email38@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Prešov, Plzenská 1, 08047', 'Šarišské Jastrabie 1', '6548', 'Šarišské Jastrabie'),
(39, 'Kolník', 'Teodor', 'email39@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Spojená škola-Gymnázium Jura Hronca', 'Bratislava-Ružinov, Novohradská 3, 82109', 'Štefana Králika 1', '84108', 'Bratislava'),
(40, 'Krajèová', 'Silvia', 'email40@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná odborná škola elektrotechnická', 'Poprad, Hlavná 1400/1, 05951', 'Vlkovce 1', '5971', 'Vlkovce'),
(41, 'Kubecová', 'Drahoslava', 'email41@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium Matky Alexie', 'Bratislava-Staré Mesto, Jesenského 4/A, 81102', 'A.Dubèeka 1', '90301', 'Senec'),
(42, 'Martinek', 'Martin', 'email42@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Súkromná stredná odborná škola podnikania', 'Senica, Hollého 1380, 90501', 'J.Mudrocha 1', '90501', 'Sotina'),
(43, 'Maslo', 'Svätopluk', 'email43@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium ¼udovíta Štúra', 'Zvolen, Hronská 1467/3, 96049', 'Centrum 1', '96001', 'Zvolen'),
(44, 'Melicher', 'Beòadik', 'email44@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium Hansa Selyeho s vyuèovacím jazykom maïarským', 'Komárno, Biskupa Királya 5, 94501', 'Ve¾ké Ludince 1', '93565', 'Ve¾ké Ludince'),
(45, 'Michalko', 'Peter', 'email45@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Elektrotechnicka a stavebna škola \'Nikola Tesla\'', 'Narodnog Fronta 1, 23000 Zrenjanin', 'Ive Lole Ribara 1', '26215', 'Padina'),
(46, 'Mrazko', 'Bystrík', 'email46@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Spojená škola sv. Františka z Assisi-Gymnázium sv. Františka z Assisi', 'Bratislava-Karlova Ves, Karloveská 32, 84104', '¼udovíta Fullu 1', '84105', 'Bratislava'),
(47, 'Novák', 'Zdenko', 'email47@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná odborná škola technická', 'Šurany, Nitrianska 61, 94201', 'Lipová 1', '94110', 'Tvrdošovce'),
(48, 'Palo', 'Roman', 'email48@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Kostolná pri Dunaji 1', '90301', 'Kostolná pri Dunaji'),
(49, 'Pa¾ov', 'Róbert', 'email49@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Kadnárova 1', '83151', 'Bratislava - Raèa'),
(50, 'Paulik', 'Viliam', 'email50@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola', 'Dubnica nad Váhom, Obrancov mieru 343/1, 01841', 'Dolná Súèa 1', '91332', 'Dolná Súèa'),
(51, 'Pavlièek', 'Severín', 'email51@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná odborná škola informaèných technológií', 'Bratislava-Raèa, Hlinícka 1, 83152', 'Sokolská 1', '90872', 'Závod'),
(52, 'Pavúk', 'Belo', 'email52@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Gymnázium Ivana Horvátha', 'Bratislava-Ružinov, Ivana Horvátha 14, 82103', 'Lotyšská 1', '82106', 'Bratislava - Podunajské Biskupice'),
(53, 'Petruška', 'Marek', 'email53@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná priemyselná škola', 'Bardejov, Komenského 5, 08542', 'Vaniškovce 1', '8641', 'Vaniškovce'),
(54, 'Šimko', 'Viktor', 'email54@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Spojená škola-Športové gymnázium', 'Nitra, Slanèíkovej 2, 95050', 'Narcisová 1', '94901', 'Nitra'),
(55, 'Škantár', 'Blažej', 'email55@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Stredná odborná škola technická', 'Michalovce, Partizánska 1, 07192', 'Jovsa 1', '7232', 'Jovsa'),
(56, 'Višòovský', 'Dobroslav', 'email56@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 0, '', 'Spojená škola-Športové gymnázium', 'Nitra, Slanèíkovej 2, 95050', 'Chme¾ová dolina 1', '94901', 'Zobor'),
(57, 'bariak', 'matus', 'matus.bariak@gmail.com', '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 1, 1, '021b5b2ac76d969722e8b55d88d7a0c83dc61a73fd15abc98a3538a5154d7e8f0e367d771810cba13341f7ade9818e477dd557b233112a3b14fae374f0d25098', 'Stredná odborná škola', 'Cintorínska 4, Nitra', 'Nitra', '99103', 'Nitra'),
(58, 'Boran', 'Brano', 'xxxxxx@gmail.com', 'df62a738b122fc7630ae8ddb43b8587cdcbb6bf127eb0ced57c4bcfd1f1561964b9ab73aee32701c611b8571d69037a1fca485fe90a67613cd3cd2f7ae2a94cb', 0, 0, 'e56954b4f6347e897f954495eab16a88', 'Gymnazium L. Štúra, Trenčín', 'Trenčín', 'Trenčín', '91101', 'Trenčín'),
(59, 'Jakub', 'Novotny', 'novotny@gmail.com', '7f61dde0df109327b032025a0e8016aac534a94eec898dee88e693f9f4b2267e7f7dc475b8f9168e16e46a4492c9d32e815f1d122e6799e75f4f6b0f077562de', 0, 0, '2ba596643cbbbc20318224181fa46b28', 'Gymnazium L. Štúra, Trenčín', 'Trenčín', 'Trenčín', '91101', 'Trenčín'),
(60, 'Filip', 'Antala', 'excentered@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 0, 0, 'b0b183c207f46f0cca7dc63b2604f5cc', 'SOŠ Elektrotechnická ', 'Športová 675, 916 01 Stará Turá', 'Hurbanova 156/70', '91601', 'Stará Turá');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvicenie`
--
ALTER TABLE `cvicenie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `trasa`
--
ALTER TABLE `trasa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvicenie`
--
ALTER TABLE `cvicenie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `trasa`
--
ALTER TABLE `trasa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
