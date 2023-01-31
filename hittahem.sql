-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 19 jan 2023 kl 13:53
-- Serverversion: 5.7.24
-- PHP-version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `hittahem`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `admin`
--

CREATE TABLE `admin` (
  `admid` int(50) NOT NULL,
  `admuser` varchar(100) NOT NULL,
  `admmail` varchar(100) NOT NULL,
  `admpass` varchar(100) NOT NULL,
  `admphone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `inquirys`
--

CREATE TABLE `inquirys` (
  `inqid` int(50) NOT NULL,
  `objectid` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `mail` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `inquirys`
--

INSERT INTO `inquirys` (`inqid`, `objectid`, `sender`, `receiver`, `mail`, `date`) VALUES
(1, '', '7', '', '', '2023-01-18 00:45:39'),
(2, '', '7', '6', '', '2023-01-18 00:50:03'),
(3, '1', '7', '6', '', '2023-01-18 00:51:02'),
(4, '1', '7', '6', 'sdgsdgsdg', '2023-01-18 00:57:51'),
(5, '1', '7', '6', '', '2023-01-18 01:03:30'),
(6, '1', '7', '6', '', '2023-01-18 01:07:58'),
(7, '1', '7', '6', '', '2023-01-18 01:08:00'),
(8, '1', '7', '6', '', '2023-01-18 01:08:37'),
(9, '1', '7', '6', 'lksmdflskmflskm slkfmsdl', '2023-01-18 01:08:51'),
(10, '1', '7', '6', 'hello', '2023-01-18 01:09:25'),
(11, '1', '7', '6', 'hello', '2023-01-18 01:12:01'),
(12, '1', '7', '6', 'hello', '2023-01-18 01:12:25'),
(13, '1', '7', '6', 'hello', '2023-01-18 01:17:44'),
(14, '1', '7', '6', 'lfdkmdlkm', '2023-01-18 01:18:30'),
(15, '1', '7', '6', 'hello?', '2023-01-18 01:23:13'),
(16, '1', '7', '6', 'hello?', '2023-01-18 01:28:53'),
(17, '1', '7', '6', 'hejsan', '2023-01-18 01:29:06'),
(18, '1', '7', '6', 'hejsan', '2023-01-18 01:30:20'),
(19, '1', '7', '6', 'hejsan', '2023-01-18 01:31:01'),
(20, '1', '7', '6', 'hejsan', '2023-01-18 01:31:20'),
(21, '1', '7', '6', 'sista test', '2023-01-18 01:32:23'),
(22, '1', '7', '6', '', '2023-01-18 12:49:27'),
(23, '1', '7', '6', 'halo jacob', '2023-01-19 00:12:32'),
(24, '1', '7', '6', 'halo jacob', '2023-01-19 00:15:55'),
(25, '1', '7', '6', 'ok en gång till fast med echo', '2023-01-19 00:16:10'),
(26, '3', '7', '5', 'ok provar en annan säljare', '2023-01-19 00:17:08');

-- --------------------------------------------------------

--
-- Tabellstruktur `objects`
--

CREATE TABLE `objects` (
  `objectid` int(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `tenure` varchar(50) NOT NULL,
  `rooms` int(50) NOT NULL,
  `size` int(50) NOT NULL,
  `floor` int(50) DEFAULT NULL,
  `totalfloor` int(50) DEFAULT NULL,
  `year` int(50) NOT NULL,
  `cooperative` varchar(100) NOT NULL,
  `monthly` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `img` varchar(300) NOT NULL,
  `img1` varchar(300) NOT NULL,
  `img2` varchar(300) NOT NULL,
  `img3` varchar(300) NOT NULL,
  `img4` varchar(300) NOT NULL,
  `floorplan` varchar(300) NOT NULL,
  `map` varchar(300) NOT NULL,
  `userid` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `objects`
--

INSERT INTO `objects` (`objectid`, `address`, `zone`, `city`, `description`, `type`, `tenure`, `rooms`, `size`, `floor`, `totalfloor`, `year`, `cooperative`, `monthly`, `price`, `img`, `img1`, `img2`, `img3`, `img4`, `floorplan`, `map`, `userid`) VALUES
(1, 'Prästgatan 64A', 'Centralt', 'Östersund', 'Charmant våning i byggnad anno 1935 och med allt vad denna tidsepok har att tillföra. Här är takhöjden påtaglig och gavelläget med sitt fantastiska fönsterparti bidrar att boytan upplevs mycket rymlig. Interiören av de 98 kvm är nyproducerade från 2021 och i utmärkt skick utan minsta lilla skråma. Designen följer Skandinaviska influenser med sober färgskala och natursköna material. Fungerande öppen spis ger extra trivsamma vardagskvaliteter. Superläge mitt i city, utsikt över stadspark och sjö.', 'Lägenhet', 'Bostadsrätt', 3, 98, 3, 4, 1935, 'BRF Brandenburg', '6279', '2795000', 'https://media.fastighetsbyran.se/37727492.jpg?Bredd=992', 'https://media.fastighetsbyran.se/37727502.jpg?Bredd=992', 'https://media.fastighetsbyran.se/37727522.jpg?Bredd=992', 'https://media.fastighetsbyran.se/37727496.jpg?Bredd=992', 'https://media.fastighetsbyran.se/37727491.jpg?Bredd=992', 'https://media.fastighetsbyran.se/37677877.jpg?Bredd=992', '', '6'),
(2, 'Krutvaktargränd 19', 'Körfältet', 'Östersund', 'OBS! DENNA LÄGENHET HYRS UT MED KORTTIDSKONTRAKT\r\n\r\nKorttidskontrakt innebär att du som hyresgäst har möjlighet att bo kvar tills dess att Rikshem har behov av bostaden. Åtminstone hela år 2023 eventuellt längre. Avtalet löper med tre kalendermånaders uppsägningstid och ett avtal gällande avstående från besittningsskydd ska undertecknas vid avtalsskrivande.\r\nLägenheten hyrs ut i befintligt skick och enbart nödvändiga reparationer utförs.\r\n\r\nLägenheten är belägen en trappa ned och har en balkong.\r\nI månadshyran ingår värme, uppvärmning vatten och digital- Tv, lagom paketet via Telia. Du som hyresgäst har även tillgång till bredbandsuppkoppling på 1Mbit/s.\r\n\r\nI bostadsområdets mitt finns en större park med stora grönytor, träd och en bollplan. På gångavstånd från kvarteret finns Lillänge Centrum med livsmedelsbutik, diverse småbutiker, restaurang, bensinstation. Varje gård har en stor lekplats. Parkeringsplatser och garage är samlade vid infarterna till kvarteret. För hushållstvätt finns två tvättstugor per gård och för grovtvätt finns totalt fyra tvättstugor i kvarteret. Cykel- och barnvagnsförråd finns i botten- alternativt souterrängplan.', 'Lägenhet', 'Hyresrätt', 1, 46, 1, 3, 1976, 'Rikshem', '3646', NULL, 'https://si.sfcdn.se/Resurs/Image/360007/Medium/638070536230000000/MDIyNnwwMDAxNTEyNDcxNnw5Ng...jpg', 'https://si.sfcdn.se/Resurs/Image/360007/Medium/638070533060000000/MDIyNnwwMDAxNTEyNDcwOHw5Ng...jpg', 'https://si.sfcdn.se/Resurs/Image/360007/Medium/638073101410000000/MDIyNnwwMDAxNTEyNDY2M3w5Ng...jpg', 'https://si.sfcdn.se/Resurs/Image/360007/Medium/638070536230000000/MDIyNnwwMDAxNTEyNDcwOXw5Ng...jpg', 'https://si.sfcdn.se/Resurs/Image/360007/Medium/638070536240000000/MDIyNnwwMDAxNTEyNDcyNXw5Ng...jpg', 'https://si.sfcdn.se/Resurs/Image/360007/Medium/638070533690000000/MDIyNnwwMDAxNTEyNzAyN3w5Ng...jpg', '', '6'),
(3, 'Bleka 130', 'Tandsbyn', 'Östersund', 'Välkommen till Bleka och denna mycket välskötta fastighet bara 30 min från Östersund. Nära Tandsbyn och den magiska Locknesjön hittar du denna idyll. Fantastiskt vackert timmerhus som flyttades till denna plats 1996 och samtidigt genomgick en omfattande renovering. Färgstarkt och pietetsfullt renoverat med fungerande kakelugnar, kaminer, trägolv och allt annat som hör till ett äldre hus och ger den rätta känslan. Stort, härligt kök med vedspis och ett härligt skafferi. Bergvärme ger pengar över till annat och fiber i båda byggnaderna gör hemarbetet smidigt.', 'Villa', 'Äganderätt', 5, 184, 1, 2, 1878, '', '', '4975000', 'https://www.lansfast.se/Content/bilder2/objekt/CMVILLA58JJTN82D0NEMA4M/538291-420-1-077-jpg-729.jpg?width=1400&mode=crop&quality=80', '', '', '', '', '', '', '5'),
(4, 'Drottninggatan 31B', 'Karlslund', 'Östersund', 'Genomtänkt och jordnära har färgpaletten satt prägel från golv till tak, vilket gör det hela enkelt för dig som vill leva avskalat eller med en mer konstnärlig nyans. Här har trettiotalscharmen med högt i tak, vackra plankgolv och breda fönsterlister, kombinerats på ett utsökt sätt tillsammans med moderna materialval och nyanser. Bostaden ligger högst upp i huset och känns tack vare sin takhöjd och fönster i två väderstreck otroligt ljus och rymlig.\r\n\r\nBostaden mäter fyrtiosju kvadratmeter i strumplästen och känns synnerligen väldisponerad, från det nyrenoverade köket, det stilfulla badrummet till det rymliga allrummet. En detalj som säkert uppskattas är det stambytta badrummet, där säljaren valde till exklusiva materialval som höjer både funktion och känslan ytterligare.\r\n\r\nAtt lägenheten ligger i en stabil förening är bara ytterligare ett plus. Föreningen är lågt belånad sett till all renovering som utförts de senaste åren. Helt klart en stor trygghet.', 'Lägenhet', 'Bostadsrätt', 3, 55, 3, 3, 1938, 'BRF Skandia', '2436', '1795000', 'https://si.sfcdn.se/Resurs/Image/315636/Medium/637650554180000000/MDIyNnwwMDAxMjAxMzgwMHw5Ng...jpg', '', '', '', '', '', '', '5'),
(5, 'Altairvägen 5', 'Solsidan', 'Åre', 'Huset är byggt av Forsgrens timmerhus och här har man inte sparat på vare sig yta eller utförande. Huset är på 185 kvadratmeter, entréplanet består av en enorm storstuga och kök i öppen planlösning som sträcker sig över hela främre delen av entréplanet. Här finns en stor matsalsgrupp, soffgrupp vid husets kamin samt fullt utrustat kök med köksö. Från hela storstugan och köket har du fin utsikt mot omgivningarna. Två altandörrar, en från köket och en från den delen av rummet där soffgruppen står leder ut till den stora altanen i sydvästläge.', 'cottage', 'sale', 6, 50, 0, 2, 2016, '', '', '10500000', 'https://mp1.skm.quedro.com/eaimages/74/4f21c-4b125-ce071-3e60e-8be9e-557df-70861-63e1e/829f1-bdf9d-2e1dc-17d25-a028e-f9eff-a6553-0cf21.jpg', 'https://mp1.skm.quedro.com/eaimages/74/4f21c-4b125-ce071-3e60e-8be9e-557df-70861-63e1e/829f1-bdf9d-2e1dc-17d25-a028e-f9eff-a6553-0cf21.jpg', 'https://mp1.skm.quedro.com/eaimages/74/4f21c-4b125-ce071-3e60e-8be9e-557df-70861-63e1e/c0fcb-da528-0f709-ba346-72396-0a9ff-74f35-813ee.jpg', 'https://mp1.skm.quedro.com/eaimages/74/4f21c-4b125-ce071-3e60e-8be9e-557df-70861-63e1e/1d2b0-f26d0-6a1c4-466ca-8f484-d93f2-53bb2-f9475.jpg', 'https://mp1.skm.quedro.com/eaimages/74/4f21c-4b125-ce071-3e60e-8be9e-557df-70861-63e1e/36401-4ed30-378f0-33822-cd026-a1207-50117-166f1.jpg', 'https://mp1.skm.quedro.com/eaimages/74/4f21c-4b125-ce071-3e60e-8be9e-557df-70861-63e1e/e44fe-9333b-19916-1678e-97fc2-d91bc-7755d-2cdfa.jpg', '', '5');

-- --------------------------------------------------------

--
-- Tabellstruktur `saved`
--

CREATE TABLE `saved` (
  `id` int(50) NOT NULL,
  `objectid` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `saved`
--

INSERT INTO `saved` (`id`, `objectid`, `userid`) VALUES
(2, '3', '6'),
(3, '4', '6'),
(20, '5', '6');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `userid` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `usermail` varchar(100) NOT NULL,
  `userphone` varchar(60) NOT NULL,
  `userpass` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `userimg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`userid`, `username`, `usermail`, `userphone`, `userpass`, `usertype`, `userimg`) VALUES
(5, 'hanna sundin', 'hanna@gmail.com', '0700000000', '$2y$12$FTYY7yDCFwHgl0ONp.W84.J0maHood7Ciqp66FyXHYei/YA6k1pMq', 'buyer', '35431e81ec631af10e1e9b6aaba2e2e4.jpg'),
(6, 'jacob westman', 'jacob@gmail.com', '0703333333', '$2y$12$RSW77Ht5pOatVdBbg7ScF.eSGULv8A.qlpcKhCqFddNn4zhvat866', 'seller', '@hr_linzi.jpeg'),
(7, 'haashira hathija', 'haha@gmail.com', '0709999999', '$2y$12$xeJAKjCoH7oPlijFYegn9uaeiaYUnoZ.d/9ZGvJSdPYuMhanMLaFm', 'seller', 'b7519b7a9f0cb0861fdfd99ba8cba18c.jpg');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admid`);

--
-- Index för tabell `inquirys`
--
ALTER TABLE `inquirys`
  ADD PRIMARY KEY (`inqid`);

--
-- Index för tabell `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`objectid`);

--
-- Index för tabell `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `admin`
--
ALTER TABLE `admin`
  MODIFY `admid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `inquirys`
--
ALTER TABLE `inquirys`
  MODIFY `inqid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT för tabell `objects`
--
ALTER TABLE `objects`
  MODIFY `objectid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
