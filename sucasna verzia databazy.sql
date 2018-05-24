-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost
-- Čas generovania: Št 24.Máj 2018, 15:47
-- Verzia serveru: 5.7.21-0ubuntu0.16.04.1
-- Verzia PHP: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `projekt`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `cvicenie`
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
-- Sťahujem dáta pre tabuľku `cvicenie`
--

INSERT INTO `cvicenie` (`id`, `trasa_id`, `user_id`, `start`, `ciel`, `zaciatok`, `koniec`, `pridane`) VALUES
(1, 0, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-11-10 12:00:00', '2018-11-10 13:00:00', '2018-05-24 13:38:25'),
(2, 0, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-11-10 12:00:00', '2018-11-10 13:00:00', '2018-05-24 13:38:53'),
(3, 0, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-11-10 12:00:00', '2018-11-10 13:00:00', '2018-05-24 13:39:07'),
(4, 0, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-11-10 12:00:00', '2018-11-10 13:00:00', '2018-05-24 13:46:20'),
(6, 2, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:01:55', '2018-05-24 15:01:55', '2018-05-24 15:01:55'),
(7, 6, 47, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:02:21', '2018-05-24 15:02:21', '2018-05-24 15:02:21'),
(8, 7, 47, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:02:33', '2018-05-24 15:02:33', '2018-05-24 15:02:33'),
(9, 4, 27, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:03:26', '2018-05-24 15:03:26', '2018-05-24 15:03:26'),
(10, 15, 27, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:04:51', '2018-05-24 15:04:51', '2018-05-24 15:04:51'),
(11, 3, 27, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:04:53', '2018-05-24 15:04:53', '2018-05-24 15:04:53'),
(12, 3, 27, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:04:54', '2018-05-24 15:04:54', '2018-05-24 15:04:54'),
(13, 3, 27, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:04:55', '2018-05-24 15:04:55', '2018-05-24 15:04:55'),
(14, 3, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:29:48', '2018-05-24 15:29:48', '2018-05-24 15:29:48'),
(15, 3, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:30:21', '2018-05-24 15:30:21', '2018-05-24 15:30:21'),
(16, 3, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:33:09', '2018-05-24 15:33:09', '2018-05-24 15:33:09'),
(17, 3, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:33:24', '2018-05-24 15:33:24', '2018-05-24 15:33:24'),
(18, 3, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:33:36', '2018-05-24 15:33:36', '2018-05-24 15:33:36'),
(19, 3, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:38:14', '2018-05-24 15:38:14', '2018-05-24 15:38:14'),
(20, 2, 57, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 15:38:36', '2018-05-24 15:38:36', '2018-05-24 15:38:36');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `trasa`
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
-- Sťahujem dáta pre tabuľku `trasa`
--

INSERT INTO `trasa` (`id`, `nazov`, `autor`, `mod`, `start`, `ciel`, `vytvorene`) VALUES
(1, 'fds', 37, 1, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:00:34'),
(2, 'moja1', 57, 1, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:02:02'),
(3, 'zatial3', 57, 2, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:02:37'),
(4, 'stafeta1', 57, 3, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:02:47'),
(5, 'public1', 57, 2, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:03:04'),
(6, 'moja1', 47, 1, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:03:21'),
(7, 'moja2', 47, 1, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:03:28'),
(8, 'moja2', 47, 1, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:05:51'),
(9, 'moja2', 57, 2, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:08:09'),
(10, 'pokus1', 57, 2, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:08:28'),
(11, 'pokus2', 47, 1, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:08:51'),
(12, 'pokus2', 47, 1, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:10:10'),
(13, 'pokus2', 47, 1, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:12:07'),
(14, 'pokus2', 57, 2, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:12:16'),
(15, 'pokus222', 57, 2, '48.151965,17.072995', '48.151965,17.072995', '2018-05-24 12:31:20');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `priezvisko` varchar(50) COLLATE utf8mb4_slovak_ci NOT NULL,
  `meno` varchar(50) COLLATE utf8mb4_slovak_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_slovak_ci NOT NULL,
  `skola` varchar(200) COLLATE utf8mb4_slovak_ci NOT NULL,
  `skola_adresa` varchar(200) COLLATE utf8mb4_slovak_ci NOT NULL,
  `bydlisko_ulica` varchar(200) COLLATE utf8mb4_slovak_ci NOT NULL,
  `psc` varchar(10) COLLATE utf8mb4_slovak_ci NOT NULL,
  `bydlisko_obec` varchar(200) COLLATE utf8mb4_slovak_ci NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `user`
--

INSERT INTO `user` (`id`, `priezvisko`, `meno`, `email`, `skola`, `skola_adresa`, `bydlisko_ulica`, `psc`, `bydlisko_obec`, `type`) VALUES
(1, 'Abrahám', 'Štefan', 'email1@gmail.com', 'Gymnázium Martina Kukučína', 'Revúca, V. Clementisa 1166/21, 05001', 'Revúcka Lehota 1', '4918', 'Revúcka Lehota\r', 0),
(2, 'Adamec', 'Albert', 'email2@gmail.com', 'Stredná odborná škola strojnícka', 'Považská Bystrica, Športovcov 341/2, 01749', 'Sládkovičova 1', '1701', 'Považská Bystrica\r', 0),
(3, 'Andrášová', 'Adela', 'email3@gmail.com', 'Súkromná stredná odborná škola', 'Poprad, Ul. 29. augusta 4812, 05801', 'Tatranská Lomnica 1', '5960', 'Tatranská Lomnica\r', 0),
(4, 'Baran', 'Adrián', 'email4@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Bartókova 1', '81102', 'Bratislava\r', 0),
(5, 'Bašková', 'Eunika', 'email5@gmail.com', 'Gymnázium arm. gen. Ludvíka Svobodu', 'Humenné, Komenského 4, 06601', 'Partizánska 1', '6601', 'Humenné\r', 0),
(6, 'Beňová', 'Ester', 'email6@gmail.com', 'Gymnázium Antona Bernoláka', 'Námestovo, Ulica mieru 307/23, 02901', 'Novoť 1', '2955', 'Novoť\r', 0),
(7, 'Bernolák', 'Ľubomír', 'email7@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Wolkrova 1', '85101', 'Bratislava - Petržalka\r', 0),
(8, 'Bernolák', 'Norbert', 'email8@gmail.com', 'Gymnázium', 'Myjava, Jablonská 5, 90701', 'Poriadie 1', '90622', 'Poriadie\r', 0),
(9, 'Bilek', 'Jozef', 'email9@gmail.com', 'Stredná priemyselná škola', 'Dubnica nad Váhom, Obrancov mieru 343/1, 01841', 'Neporadza 1', '91326', 'Neporadza\r', 0),
(10, 'Boreková', 'Iveta', 'email10@gmail.com', 'Stredná odborná škola polytechnická', 'Humenné, Štefánikova 1550/20, 06601', 'Puškinova 1', '9303', 'Vranov nad Topľou\r', 0),
(11, 'Bóriková', 'Enna', 'email11@gmail.com', 'Gymnázium', 'Vranov nad Topľou, Dr. C. Daxnera 88/3, 09380', 'Lúčna 1', '9301', 'Vranov nad Topľou\r', 0),
(12, 'Cesnaková', 'Natália', 'email12@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Hostáď 1', '93036', 'Čečínska Potôň\r', 0),
(13, 'Dávidová', 'Karina', 'email13@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Dolná 1', '90051', 'Zohor\r', 0),
(14, 'Debnárová', 'Alana', 'email14@gmail.com', 'Spojená škola-Stredná odborná škola technická', 'Prešov, Ľ. Podjavorinskej 22, 08005', 'L. Novomeského 1', '8001', 'Prešov\r', 0),
(15, 'Devečka', 'Koloman', 'email15@gmail.com', 'Stredná odborná škola obchodu a služieb', 'Nové Mesto nad Váhom, Piešťanská 2262/80, 91501', 'Ivanovce 1', '91305', 'Ivanovce\r', 0),
(16, 'Doležalová', 'Zoja', 'email16@gmail.com', 'Gymnázium', 'Považská Bystrica, Školská 234/8, 01701', 'Riečna 1', '2001', 'Hrabovka\r', 0),
(17, 'Dorko', 'Tibor', 'email17@gmail.com', 'Gymnázium Ľudovíta Štúra', 'Zvolen, Hronská 1467/3, 96049', 'Neresnická 1', '96261', 'Dobrá Niva\r', 0),
(18, 'Droppa', 'Miloslav', 'email18@gmail.com', 'Gymnázium', 'Vranov nad Topľou, Dr. C. Daxnera 88/3, 09380', 'Vyšný Žipov 1', '9433', 'Vyšný Žipov\r', 0),
(19, 'Dudiková', 'Iveta', 'email19@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Hraničiarska 1', '85110', 'Bratislava - Čunovo\r', 0),
(20, 'Ďuricová', 'Olívia', 'email20@gmail.com', 'Gymnázium Pavla Horova', 'Michalovce, Masarykova 1, 07179', 'Hradská 1', '7215', 'Budkovce\r', 0),
(21, 'Ďurka', 'Svetozár', 'email21@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Jasovská 1', '85107', 'Bratislava\r', 0),
(22, 'Ďurová', 'Jela', 'email22@gmail.com', 'Gymnázium', 'Vranov nad Topľou, Dr. C. Daxnera 88/3, 09380', 'Puškinova 1', '9303', 'Čemerné\r', 0),
(23, 'Fajnor', 'Bohumil', 'email23@gmail.com', 'Gymnázium', 'Stropkov, Konštantínova 64, 09101', 'Breznica 1', '9101', 'Stropkov\r', 0),
(24, 'Gál', 'Marcel', 'email24@gmail.com', 'Gymnázium', 'Vranov nad Topľou, Dr. C. Daxnera 88/3, 09380', 'Majerovce 1', '9409', 'Majerovce\r', 0),
(25, 'Gavenda', 'Bohuš', 'email25@gmail.com', 'Gymnázium Ľudovíta Štúra', 'Zvolen, Hronská 1467/3, 96049', 'Ľ. Štúra 1', '96001', 'Zvolen\r', 0),
(26, 'Gavendová', 'Sláva', 'email26@gmail.com', 'Gymnázium Milana Rúfusa', 'Žiar nad Hronom, J. Kollára 2, 96501', 'Janova Lehota 1', '96624', 'Janova Lehota\r', 0),
(27, 'Greguš', 'Mikuláš', 'email27@gmail.com', 'Spojená škola cirkevná-Gymnázium sv. Cyrila a Metoda', 'Humenné, Duchnovičova 24, 06601', 'Ľubiša 1', '6711', 'Ľubiša\r', 0),
(28, 'Habdušová', 'Elvíra', 'email28@gmail.com', 'Gymnázium', 'Bratislava-Ružinov, Metodova 2, 82108', 'Konopná 1', '90025', 'Čierna Voda\r', 0),
(29, 'Hagarová', 'Margita', 'email29@gmail.com', 'Gymnázium', 'Ružomberok, Š. Moyzesa 21, 03401', 'Vavra Šrobára 1', '3401', 'Ružomberok\r', 0),
(30, 'Haňušková', 'Blanka', 'email30@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Parková 1', '90042', 'Alžbetin Dvor\r', 0),
(31, 'Harvánek', 'Ervín', 'email31@gmail.com', 'Stredná priemyselná škola strojnícka', 'Bratislava-Staré Mesto, Fajnorovo nábrežie 5, 81475', 'Stromová 1', '90101', 'Malacky\r', 0),
(32, 'Hlaváčiková', 'Petronela', 'email32@gmail.com', 'Stredná odborná škola sv. Jozefa Robotníka', 'Žilina, Saleziánska 18, 01001', 'Družstevná 1', '1004', 'Bánová\r', 0),
(33, 'Hoza', 'Mário', 'email33@gmail.com', 'Gymnázium', 'Snina, Študentská 4, 06901', 'Parková 1', '6761', 'Stakčín\r', 0),
(34, 'Husťák', 'Miroslav', 'email34@gmail.com', 'Gymnázium', 'Myjava, Jablonská 5, 90701', 'SNP 1', '91601', 'Stará Turá\r', 0),
(35, 'Janček', 'Félix', 'email35@gmail.com', 'Spojená škola-Stredná priemyselná škola elektrotechnická S. A. Jedlika', 'Nové Zámky, Komárňanská 28, 94075', 'Zemné 1', '94122', 'Zemné\r', 0),
(36, 'Jantošovič', 'Karol', 'email36@gmail.com', 'Spojená škola-Gymnázium Jura Hronca', 'Bratislava-Ružinov, Novohradská 3, 82109', 'Suché Miesto 1', '90025', 'Chorvátsky Grob\r', 0),
(37, 'Junás', 'Oldrich', 'email37@gmail.com', 'Stredná priemyselná škola', 'Dubnica nad Váhom, Obrancov mieru 343/1, 01841', 'Farská 1', '1861', 'Beluša\r', 0),
(38, 'Kolár', 'Teodor', 'email38@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Prešov, Plzenská 1, 08047', 'Šarišské Jastrabie 1', '6548', 'Šarišské Jastrabie\r', 0),
(39, 'Kolník', 'Teodor', 'email39@gmail.com', 'Spojená škola-Gymnázium Jura Hronca', 'Bratislava-Ružinov, Novohradská 3, 82109', 'Štefana Králika 1', '84108', 'Bratislava\r', 0),
(40, 'Krajčová', 'Silvia', 'email40@gmail.com', 'Stredná odborná škola elektrotechnická', 'Poprad, Hlavná 1400/1, 05951', 'Vlkovce 1', '5971', 'Vlkovce\r', 0),
(41, 'Kubecová', 'Drahoslava', 'email41@gmail.com', 'Gymnázium Matky Alexie', 'Bratislava-Staré Mesto, Jesenského 4/A, 81102', 'A.Dubčeka 1', '90301', 'Senec\r', 0),
(42, 'Martinek', 'Martin', 'email42@gmail.com', 'Súkromná stredná odborná škola podnikania', 'Senica, Hollého 1380, 90501', 'J.Mudrocha 1', '90501', 'Sotina\r', 0),
(43, 'Maslo', 'Svätopluk', 'email43@gmail.com', 'Gymnázium Ľudovíta Štúra', 'Zvolen, Hronská 1467/3, 96049', 'Centrum 1', '96001', 'Zvolen\r', 0),
(44, 'Melicher', 'Beňadik', 'email44@gmail.com', 'Gymnázium Hansa Selyeho s vyučovacím jazykom maďarským', 'Komárno, Biskupa Királya 5, 94501', 'Veľké Ludince 1', '93565', 'Veľké Ludince\r', 0),
(45, 'Michalko', 'Peter', 'email45@gmail.com', 'Elektrotechnicka a stavebna škola \'Nikola Tesla\'', 'Narodnog Fronta 1, 23000 Zrenjanin', 'Ive Lole Ribara 1', '26215', 'Padina\r', 0),
(46, 'Mrazko', 'Bystrík', 'email46@gmail.com', 'Spojená škola sv. Františka z Assisi-Gymnázium sv. Františka z Assisi', 'Bratislava-Karlova Ves, Karloveská 32, 84104', 'Ľudovíta Fullu 1', '84105', 'Bratislava\r', 0),
(47, 'Novák', 'Zdenko', 'email47@gmail.com', 'Stredná odborná škola technická', 'Šurany, Nitrianska 61, 94201', 'Lipová 1', '94110', 'Tvrdošovce\r', 0),
(48, 'Palo', 'Roman', 'email48@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Kostolná pri Dunaji 1', '90301', 'Kostolná pri Dunaji\r', 0),
(49, 'Paľov', 'Róbert', 'email49@gmail.com', 'Stredná priemyselná škola elektrotechnická', 'Bratislava-Petržalka, Hálova 16, 85101', 'Kadnárova 1', '83151', 'Bratislava - Rača\r', 0),
(50, 'Paulik', 'Viliam', 'email50@gmail.com', 'Stredná priemyselná škola', 'Dubnica nad Váhom, Obrancov mieru 343/1, 01841', 'Dolná Súča 1', '91332', 'Dolná Súča\r', 0),
(51, 'Pavliček', 'Severín', 'email51@gmail.com', 'Stredná odborná škola informačných technológií', 'Bratislava-Rača, Hlinícka 1, 83152', 'Sokolská 1', '90872', 'Závod\r', 0),
(52, 'Pavúk', 'Belo', 'email52@gmail.com', 'Gymnázium Ivana Horvátha', 'Bratislava-Ružinov, Ivana Horvátha 14, 82103', 'Lotyšská 1', '82106', 'Bratislava - Podunajské Biskupice\r', 0),
(53, 'Petruška', 'Marek', 'email53@gmail.com', 'Stredná priemyselná škola', 'Bardejov, Komenského 5, 08542', 'Vaniškovce 1', '8641', 'Vaniškovce\r', 0),
(54, 'Šimko', 'Viktor', 'email54@gmail.com', 'Spojená škola-Športové gymnázium', 'Nitra, Slančíkovej 2, 95050', 'Narcisová 1', '94901', 'Nitra\r', 0),
(55, 'Škantár', 'Blažej', 'email55@gmail.com', 'Stredná odborná škola technická', 'Michalovce, Partizánska 1, 07192', 'Jovsa 1', '7232', 'Jovsa\r', 0),
(56, 'Višňovský', 'Dobroslav', 'email56@gmail.com', 'Spojená škola-Športové gymnázium', 'Nitra, Slančíkovej 2, 95050', 'Chmeľová dolina 1', '94901', 'Zobor\r', 0),
(57, 'bariak', 'matus', 'email57@gmail.com', 'stu', 'ba', 'potor', '99103', 'potor', 1);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `cvicenie`
--
ALTER TABLE `cvicenie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexy pre tabuľku `trasa`
--
ALTER TABLE `trasa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexy pre tabuľku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `cvicenie`
--
ALTER TABLE `cvicenie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pre tabuľku `trasa`
--
ALTER TABLE `trasa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
