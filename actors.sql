-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Paź 2018, 22:10
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `actors`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `members`
--

CREATE TABLE `members` (
  `id` int(10) NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `quest` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `typ` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `members`
--

INSERT INTO `members` (`id`, `login`, `pass`, `quest`, `typ`) VALUES
(1, 'root', '$2y$11$oG8X6YyMHavBJz3dm2bye.hqIzcvQ7IukADUA8..PQutGGE2FPyPu', 'admin account', 'admin'),
(2, 'test', '$2a$11$i7dxhiwh4RqvaR/9S1YMmuPLEsXKvMFjo90RIyn3zn3v0zSkIPVVC', 'test', 'member');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `options`
--

CREATE TABLE `options` (
  `option_id` int(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8_polish_ci NOT NULL,
  `option_value` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `options`
--

INSERT INTO `options` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'users_can_register', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `d1` longtext COLLATE utf8_polish_ci NOT NULL,
  `p1` longtext COLLATE utf8_polish_ci NOT NULL,
  `d2` longtext COLLATE utf8_polish_ci NOT NULL,
  `p2` longtext COLLATE utf8_polish_ci NOT NULL,
  `d3` longtext COLLATE utf8_polish_ci NOT NULL,
  `p3` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `d1`, `p1`, `d2`, `p2`, `d3`, `p3`) VALUES
('leo', 'Leonardo DiCaprio', 'Leonardo Dicaprio – urodzony w 1974 w Los Angeles aktor. Ma rosyjskie, niemieckie i włoskie korzenie. Wedle anegdoty, swoje imię zawdzięcza Leonardo da Vinci, którego obraz oglądało matka DiCaprio będąc jeszcze w ciąży. Aktor od dziecka przejawiał zdolności aktorskie. Zadebiutował w wieku 5 lat w serialu Romper Room, jednak prawdziwą sławę zyskał dzięki roli w filmie Chłopięcy świat (1993), w którym zagrał u boku Roberta De Niro.', 'Życie prywatne', 'Leonardo nie jest stały w związkach oraz nie ma dzieci. Aktualnie jest z 23 lata młodszą modelką. DiCaprio jest agnostykiem, czyli  uważa, że niemożliwym jest dowiedzenie się czy Bóg istnieje, czy nie.', 'Osiągnięcia', 'Aktor 2 razy wygrał Złotego Globa i 7 razy był do niego nominowany. Raz wygrał Oscar\'a oraz 4 razy był nominowany. Do tego dochodzą 4 nominacje MTV Movie Award, które zdobył dwukrotnie. Co więcej raz wygrał nagrodę BAFTA, gdzie wcześniej 2 razy był nominowany.'),
('will', 'Will Smith', 'Amerykański aktor komediowy, telewizyjny, firmowy, muzyk i producent. Jego pełne imię to naprawdę Willard Christopher Smith Jr,  urodzony w dość bogatej rodzinie wychowywał się w Filadelfii. Był zdolny i pilnym uczniem, co zaowocowało stypendium w collage. Ale Smith od najmłodszych lat zaintrygowany był karierą w show biznesie. Od kiedy miał 12 lat rapował, a ostatecznie założył zespól, który odniósł spora popularność i nominowany był nawet do prestiżowej nagrody Grammy.', 'Życie prywatne', 'Prywatnie był dwukrotnie żonaty, od 1997 jego żoną jest Jada Pinkett Smith, ma trójkę dzieci, dwóch synów i  córkę.', 'Sukcesy', 'Aktor bardzo długo pojawiał się  głownie w rolach komediowych, ale z upływem czasu zaczął również grywać w rolach trudnych i ambitnych. Genialną kreację stworzył a biograficznym filmie legendarnego boksera \"Ali\". Równie dobrze sprawdził się w dramacie \"W pogoni za szczęściem\" czy \"Siedem dusz\", w którym wcielił się w postać mężczyzny, który jako zadośćuczynienie popełnia samobójstwo by swoimi organami uratować siedmioro innych osób.Co zaś tyczy się ról w filmach łatwiejszych, zagrał m.in. w  Faceci w czerni 2, Hitch: Najlepszy doradca przeciętnego faceta czy Bardzo dziki Zachód.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `members`
--
ALTER TABLE `members`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `options`
--
ALTER TABLE `options`
  ADD UNIQUE KEY `option_id` (`option_id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
