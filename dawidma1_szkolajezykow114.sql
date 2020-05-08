-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Mar 2020, 15:21
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dawidma1_szkolajezykow114`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administrator`
--

CREATE TABLE `administrator` (
  `administrator_id` int(11) NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uprawnienia` varchar(16) NOT NULL DEFAULT 'admin',
  `haslo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `administrator`
--

INSERT INTO `administrator` (`administrator_id`, `imie`, `nazwisko`, `email`, `uprawnienia`, `haslo`) VALUES
(3, '', '', 'admin@test.pl', 'admin', '$2y$10$OfBcwz5k0HJv47kgJ.i20.ZzmPwro7nFGhI1zqthzP2mDCsFbQdmy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administrator_has_nauczyciel`
--

CREATE TABLE `administrator_has_nauczyciel` (
  `administrator_administrator_id` int(11) NOT NULL,
  `nauczyciel_nauczyciel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fiszki`
--

CREATE TABLE `fiszki` (
  `fiszki_id` int(11) NOT NULL,
  `nazwa` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `opis` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `zdjecie` varchar(85) CHARACTER SET utf8mb4 DEFAULT NULL,
  `kurs_kurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Zrzut danych tabeli `fiszki`
--

INSERT INTO `fiszki` (`fiszki_id`, `nazwa`, `opis`, `zdjecie`, `kurs_kurs_id`) VALUES
(2, 'die Gabel   - Widelec', 'Das ist eine Gabel   - To jest jakiś widelec', 'zdjecia/Niemiecki-A1-1/eine-gabel-widelec.jpg', 1),
(3, 'der Löffel - Łyżka', 'Der Joghurt isst man mit einem Löffel - Jogurt je się łyżką', 'zdjecia/Niemiecki-A1-1/der-Loeffel-lyzka .jpg', 1),
(4, 'die Wanne \\ die Badewanne \\ das Bad', 'Eine Badewanne ist cool - Wanna jest fajna', 'zdjecia/Niemiecki-A1-1/das-Bad-wanna.jpg', 1),
(5, 'der Herd - Kuchenka ', 'Die Töpfe stehen auf dem Herd - Te garnki leżą na tej kuchence ', 'zdjecia/Niemiecki-A1-1/der-herd-kuchenka.jpg', 1),
(6, 'die Tür - drzwi', ' Wird die Tür offen lassen -  Zostaw otwarte drzwi', 'zdjecia/Niemiecki-A1-1/die-tuer-drzwi.jpg', 1),
(7, 'das Fenster - okno', ' Öffne bitte das Fenster - Otwórz okno proszę', 'zdjecia/Niemiecki-A1-1/das-fenster-okno.jpg', 1),
(8, 'das Tischchen / die Tischchen - stolik ', ' Auf dem Tisch steht ein Wecker - na stoliku leży budzik', 'zdjecia/Niemiecki-A1-1/das-Tischchen-stolik.jpg', 1),
(9, 'der Tisch / die Tische - stół', 'In der Küche steht ein Tisch - W kuchni jest stół', 'zdjecia/Niemiecki-A1-1/der-tisch-stol.jpg', 1),
(10, 'der Sessel / die Sessel', 'Es gibt einen bequemen Sessel - Tam stoi wygodny fotel', 'zdjecia/Niemiecki-A1-1/der-Sessel-fotel.jpg', 1),
(11, 'schnell', 'szybko - Ich muss das schneller machen', 'zdjecia/Niemiecki-A1-1/schnell-szybko.jpg', 1),
(12, 'zdjecia/pies2.jpg', 'zdjecia/pies2.jpg', 'zdjecia/Niemiecki-A1-1/schnell-szybko.jpg', 1),
(15, 'Bath - Wanna ', 'I like to bathe in a bath -  Lubię kąpać się w wannie', 'zdjecia/Angielski-A1-1/bath-wanna.jpg', 11),
(16, 'bookcase - regał na książki', ' My books are on a bookcase - moje książki leżą na regale na książki', 'zdjecia/Angielski-A1-1/bookcase-regal-na-ksiazki.jpg', 11),
(17, 'bookcase - regał na książki', ' My books are on a bookcase -  Moje książki są na regale na książki', 'zdjecia/Angielski-A1-1/bookcase-regal-na-ksiazki.jpg', 11),
(21, 'der Löffel - Łyżka', 'Der Joghurt isst man mit einem Löffel - Jogurt je się łyżką	', 'zdjecia/Niemiecki-A1-1/der-Loeffel-lyzka .jpg	', 2),
(22, 'der Herd - Kuchenka', 'Die Töpfe stehen auf dem Herd - Te garnki leżą na tej kuchence', 'zdjecia/Niemiecki-A1-1/der-herd-kuchenka.jpg', 2),
(23, 'die Tür - drzwi', 'Wird die Tür offen lassen - Zostaw otwarte drzwi', 'zdjecia/Niemiecki-A1-1/die-tuer-drzwi.jpg', 2),
(24, 'das Fenster - okno', 'Öffne bitte das Fenster - Otwórz okno proszę', 'zdjecia/Niemiecki-A1-1/das-fenster-okno.jpg', 2),
(25, 'das Tischchen / die Tischchen - stolik', 'Auf dem Tisch steht ein Wecker - na stoliku leży budzik	', 'zdjecia/Niemiecki-A1-1/das-Tischchen-stolik.jpg	', 4),
(26, 'der Tisch / die Tische - stół	', 'In der Küche steht ein Tisch - W kuchni jest stół	', 'zdjecia/Niemiecki-A1-1/der-tisch-stol.jpg	', 2),
(27, 'der Sessel / die Sessel	', 'Es gibt einen bequemen Sessel - Tam stoi wygodny fotel	', 'zdjecia/Niemiecki-A1-1/der-Sessel-fotel.jpg	', 2),
(28, 'schnell	', 'szybko - Ich muss das schneller machen	', 'zdjecia/Niemiecki-A1-1/schnell-szybko.jpg	', 2),
(30, 'das Messer - Nóż', 'Man schälen das essen mit ein Messer - To jedzenie obiera się nożem', 'zdjecia/Niemiecki-A1-1/das-Messer-noz-.jpg	', 3),
(31, 'die Gabel - Widelec	', 'Das ist eine Gabel - To jest jakiś widelec	', 'zdjecia/Niemiecki-A1-1/eine-gabel-widelec.jpg	', 3),
(32, 'der Löffel - Łyżka	', 'Der Joghurt isst man mit einem Löffel - Jogurt je się łyżką	', 'zdjecia/Niemiecki-A1-1/der-Loeffel-lyzka .jpg	', 3),
(33, 'die Wanne \\ die Badewanne \\ das Bad	', 'Eine Badewanne ist cool - Wanna jest fajna	', 'zdjecia/Niemiecki-A1-1/das-Bad-wanna.jpg	', 3),
(34, 'der Herd - Kuchenka	', 'Die Töpfe stehen auf dem Herd - Te garnki leżą na tej kuchence	', 'zdjecia/Niemiecki-A1-1/der-herd-kuchenka.jpg	', 3),
(35, 'die Tür - drzwi	', 'Wird die Tür offen lassen - Zostaw otwarte drzwi	', 'zdjecia/Niemiecki-A1-1/die-tuer-drzwi.jpg	', 3),
(36, 'das Fenster - okno	', 'Öffne bitte das Fenster - Otwórz okno proszę	', 'zdjecia/Niemiecki-A1-1/das-fenster-okno.jpg	', 3),
(37, 'das Tischchen / die Tischchen - stolik	', 'Auf dem Tisch steht ein Wecker - na stoliku leży budzik	', 'zdjecia/Niemiecki-A1-1/das-Tischchen-stolik.jpg	', 3),
(38, 'der Tisch / die Tische - stół	', 'In der Küche steht ein Tisch - W kuchni jest stół	', 'zdjecia/Niemiecki-A1-1/der-tisch-stol.jpg	', 3),
(39, 'der Sessel / die Sessel	', 'Es gibt einen bequemen Sessel - Tam stoi wygodny fotel	', 'zdjecia/Niemiecki-A1-1/der-Sessel-fotel.jpg	', 3),
(40, 'schnell	', 'szybko - Ich muss das schneller machen	', 'zdjecia/Niemiecki-A1-1/schnell-szybko.jpg	', 3),
(41, 'zdjecia/pies2.jpg	', 'zdjecia/pies2.jpg	', 'zdjecia/Niemiecki-A1-1/schnell-szybko.jpg	', 3),
(42, 'das Messer - Nóż	', 'Man schälen das essen mit ein Messer - To jedzenie obiera się nożem	', 'zdjecia/Niemiecki-A1-1/das-Messer-noz-.jpg	', 4),
(43, 'die Gabel - Widelec	', 'Das ist eine Gabel - To jest jakiś widelec	', 'zdjecia/Niemiecki-A1-1/eine-gabel-widelec.jpg	', 4),
(44, 'der Löffel - Łyżka	', 'Der Joghurt isst man mit einem Löffel - Jogurt je się łyżką	', 'zdjecia/Niemiecki-A1-1/der-Loeffel-lyzka .jpg	', 4),
(45, 'die Wanne \\ die Badewanne \\ das Bad	', 'Eine Badewanne ist cool - Wanna jest fajna	', 'zdjecia/Niemiecki-A1-1/das-Bad-wanna.jpg	', 4),
(46, 'der Herd - Kuchenka	', 'Die Töpfe stehen auf dem Herd - Te garnki leżą na tej kuchence	', 'zdjecia/Niemiecki-A1-1/der-herd-kuchenka.jpg	', 4),
(47, 'die Tür - drzwi	', 'Wird die Tür offen lassen - Zostaw otwarte drzwi	', 'zdjecia/Niemiecki-A1-1/die-tuer-drzwi.jpg	', 4),
(48, 'das Fenster - okno	', 'Öffne bitte das Fenster - Otwórz okno proszę	', 'zdjecia/Niemiecki-A1-1/das-fenster-okno.jpg	', 4),
(49, 'das Tischchen / die Tischchen - stolik	', 'Auf dem Tisch steht ein Wecker - na stoliku leży budzik	', 'zdjecia/Niemiecki-A1-1/das-Tischchen-stolik.jpg	', 4),
(50, 'der Tisch / die Tische - stół	', 'In der Küche steht ein Tisch - W kuchni jest stół	', 'zdjecia/Niemiecki-A1-1/der-tisch-stol.jpg	', 4),
(51, 'der Sessel / die Sessel	', 'Es gibt einen bequemen Sessel - Tam stoi wygodny fotel	', 'zdjecia/Niemiecki-A1-1/der-Sessel-fotel.jpg	', 4),
(52, 'zdjecia/pies2.jpg	', 'zdjecia/pies2.jpg	', 'zdjecia/Niemiecki-A1-1/schnell-szybko.jpg	', 4),
(53, 'Bath - Wanna	', 'I like to bathe in a bath - Lubię kąpać się w wannie	', 'zdjecia/Angielski-A1-1/bath-wanna.jpg	', 4),
(54, 'das Messer - Nóż	', 'Man schälen das essen mit ein Messer - To jedzenie obiera się nożem	', 'zdjecia/Niemiecki-A1-1/das-Messer-noz-.jpg	', 5),
(55, 'die Gabel - Widelec	', 'Das ist eine Gabel - To jest jakiś widelec	', 'zdjecia/Niemiecki-A1-1/eine-gabel-widelec.jpg	', 5),
(56, 'der Löffel - Łyżka	', 'Der Joghurt isst man mit einem Löffel - Jogurt je się łyżką	', 'zdjecia/Niemiecki-A1-1/der-Loeffel-lyzka .jpg	', 5),
(59, 'die Wanne \\ die Badewanne \\ das Bad	', 'Eine Badewanne ist cool - Wanna jest fajna	', 'zdjecia/Niemiecki-A1-1/das-Bad-wanna.jpg	', 6),
(60, 'die Tür - drzwi	', 'Wird die Tür offen lassen - Zostaw otwarte drzwi	', 'zdjecia/Niemiecki-A1-1/die-tuer-drzwi.jpg	', 6),
(61, 'das Fenster - okno	', 'Öffne bitte das Fenster - Otwórz okno proszę	', 'zdjecia/Niemiecki-A1-1/das-fenster-okno.jpg	', 7),
(62, 'das Tischchen / die Tischchen - stolik	', 'Auf dem Tisch steht ein Wecker - na stoliku leży budzik	', 'zdjecia/Niemiecki-A1-1/das-Tischchen-stolik.jpg	', 7),
(63, 'der Tisch / die Tische - stół	', 'In der Küche steht ein Tisch - W kuchni jest stół	', 'zdjecia/Niemiecki-A1-1/der-tisch-stol.jpg	', 8),
(64, 'der Sessel / die Sessel	', 'Es gibt einen bequemen Sessel - Tam stoi wygodny fotel	', 'zdjecia/Niemiecki-A1-1/der-Sessel-fotel.jpg	', 8),
(65, 'schnell	', 'szybko - Ich muss das schneller machen	', 'zdjecia/Niemiecki-A1-1/schnell-szybko.jpg	', 9),
(66, 'zdjecia/pies2.jpg	', 'zdjecia/pies2.jpg	', 'zdjecia/Niemiecki-A1-1/schnell-szybko.jpg	', 9),
(67, 'Bath - Wanna	', 'I like to bathe in a bath - Lubię kąpać się w wannie	', 'zdjecia/Angielski-A1-1/bath-wanna.jpg	', 10),
(68, 'das Messer - Nóż	', 'Man schälen das essen mit ein Messer - To jedzenie obiera się nożem	', 'zdjecia/Niemiecki-A1-1/das-Messer-noz-.jpg	', 11),
(69, 'die Gabel - Widelec	', 'Das ist eine Gabel - To jest jakiś widelec	', 'zdjecia/Niemiecki-A1-1/eine-gabel-widelec.jpg	', 11),
(70, 'der Löffel - Łyżka	', 'Der Joghurt isst man mit einem Löffel - Jogurt je się łyżką	', 'zdjecia/Niemiecki-A1-1/der-Loeffel-lyzka .jpg	', 11),
(71, 'die Wanne \\ die Badewanne \\ das Bad	', 'Eine Badewanne ist cool - Wanna jest fajna	', 'zdjecia/Niemiecki-A1-1/das-Bad-wanna.jpg	', 12),
(72, 'der Herd - Kuchenka	', 'Die Töpfe stehen auf dem Herd - Te garnki leżą na tej kuchence	', 'zdjecia/Niemiecki-A1-1/der-herd-kuchenka.jpg	', 12),
(73, 'die Tür - drzwi	', 'Wird die Tür offen lassen - Zostaw otwarte drzwi	', 'zdjecia/Niemiecki-A1-1/die-tuer-drzwi.jpg	', 13),
(74, 'das Fenster - okno	', 'Öffne bitte das Fenster - Otwórz okno proszę	', 'zdjecia/Niemiecki-A1-1/das-fenster-okno.jpg	', 14),
(75, 'das Tischchen / die Tischchen - stolik	', 'Auf dem Tisch steht ein Wecker - na stoliku leży budzik	', 'zdjecia/Niemiecki-A1-1/das-Tischchen-stolik.jpg	', 15),
(76, 'der Tisch / die Tische - stół	', 'In der Küche steht ein Tisch - W kuchni jest stół	', 'zdjecia/Niemiecki-A1-1/der-tisch-stol.jpg	', 17),
(77, 'der Sessel / die Sessel	', 'Es gibt einen bequemen Sessel - Tam stoi wygodny fotel	', 'zdjecia/Niemiecki-A1-1/der-Sessel-fotel.jpg	', 17),
(82, 'bookcase - regał na książki	', 'My books are on a bookcase - Moje książki są na regale na książki	', 'zdjecia/Angielski-A1-1/bookcase-regal-na-ksiazki.jpg	', 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `kategoria_id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `opis` text DEFAULT NULL,
  `zdjecie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`kategoria_id`, `nazwa`, `opis`, `zdjecie`) VALUES
(1, 'Jezyk niemiecki podstawyy', 'Podstawowe zagawdnieniaa', 'bvcxa'),
(2, 'Niemiecki zagadnienia ogólne', 'a', 'a'),
(3, 'ddd', 'ad', 'ddd'),
(4, 'Angieslki  zagadnienia ogólne', 'Zagadnienia ogólne', 'a');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kraj_zamieszkania`
--

CREATE TABLE `kraj_zamieszkania` (
  `kraj_zamieszkania_id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kraj_zamieszkania`
--

INSERT INTO `kraj_zamieszkania` (`kraj_zamieszkania_id`, `nazwa`) VALUES
(1, 'Niemcy'),
(2, 'Polska'),
(7, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `kurs_id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `cena` int(5) NOT NULL,
  `zdjecie` varchar(150) DEFAULT NULL,
  `data_utworzenia` datetime NOT NULL DEFAULT current_timestamp(),
  `kategoria_kategoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kurs`
--

INSERT INTO `kurs` (`kurs_id`, `nazwa`, `opis`, `cena`, `zdjecie`, `data_utworzenia`, `kategoria_kategoria_id`) VALUES
(1, 'Kurs niemieckiego  A1-1', 'Kurs niemieckiego', 33, 'zdjecia/Niemiecki-A1-1/Niemiecki-A1-1.jpg', '2020-01-23 23:16:00', 1),
(2, 'Kurs niemieckiego A1-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-B1-2/Niemiecki-B1-2.jpg', '2020-01-23 23:15:00', 2),
(3, 'Kurs niemieckiego  A2-1', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-A2-1/Niemiecki-A2-1.jpg', '2020-01-22 21:02:25', 1),
(4, 'Kurs niemieckiego  A2-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-A2-2/Niemiecki-A2-2.jpg', '2020-01-22 21:02:56', 1),
(5, 'Kurs niemieckiego  B1-1', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-B1-1/Niemiecki-B1-1.jpg', '2020-01-22 21:03:35', 2),
(6, 'Kurs niemieckiego  B1-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-B1-2/Niemiecki-B1-2.jpg', '2020-01-22 21:04:00', 2),
(7, 'Kurs niemieckiego  B2-1', 'Kurs niemieckiego ', 30, ' zdjecia/Niemiecki-B1-2/Niemiecki-B1-2.jpg', '2020-01-22 21:04:22', 1),
(8, 'Kurs niemieckiego  B2-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-B2-2/Niemiecki-B2-2.jpg', '2020-01-22 21:05:27', 1),
(9, 'Kurs niemieckiego C1-1', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-B1-2/Niemiecki-B1-2.jpg', '2020-01-22 21:07:46', 1),
(10, 'Kurs niemieckiego C1-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-C1-2/Niemiecki-C1-2.jpg', '2020-01-22 21:08:14', 1),
(11, 'Kurs angielskiego A1-1', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-A1-1/Angielski-A1-1.jpg', '2020-01-22 21:15:57', 4),
(12, 'Kurs angielskiego A1-2', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-A1-2/Angielski-A1-2.jpg', '2020-01-22 21:15:57', 4),
(13, 'Kurs angielskiego A2-1', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-A2-1/Angielski-A2-1.jpg', '2020-01-22 21:15:57', 4),
(14, 'Kurs angielskiego A2-2', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-A2-2/Angielski-A2-2.jpg', '2020-01-22 21:15:57', 4),
(15, 'Kurs angielskiego B2-1', 'Kurs angielskiego ', 30, 'zdjecia/Niemiecki-B1-2/Niemiecki-B1-2.jpg', '2020-01-22 21:15:57', 4),
(16, 'Kurs angielskiego B2-2', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-B2-2/Angielski-B2-2.jpg', '2020-01-22 21:15:57', 4),
(17, 'Kurs angielskiego C1-1', 'Kurs angielskiego ', 30, 'zdjecia/Niemiecki-B1-2/Niemiecki-B1-2.jpg', '2020-01-22 21:15:57', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs_has_nauczyciel`
--

CREATE TABLE `kurs_has_nauczyciel` (
  `kurs_kurs_id` int(11) NOT NULL,
  `nauczyciel_nauczyciel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kurs_has_nauczyciel`
--

INSERT INTO `kurs_has_nauczyciel` (`kurs_kurs_id`, `nauczyciel_nauczyciel_id`) VALUES
(1, 132),
(2, 132),
(3, 132),
(4, 132),
(5, 132),
(6, 132),
(7, 132),
(8, 132),
(9, 132),
(10, 132),
(11, 132),
(12, 132),
(13, 132),
(14, 132),
(15, 132);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `materialy_do_lekcji`
--

CREATE TABLE `materialy_do_lekcji` (
  `materialy_do_lekcji_id` int(11) NOT NULL,
  `nazwa` varchar(100) CHARACTER SET utf8 NOT NULL,
  `opis` text CHARACTER SET utf8 DEFAULT NULL,
  `link_lekcja_pdf` varchar(150) CHARACTER SET utf8 NOT NULL,
  `kurs_kurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Zrzut danych tabeli `materialy_do_lekcji`
--

INSERT INTO `materialy_do_lekcji` (`materialy_do_lekcji_id`, `nazwa`, `opis`, `link_lekcja_pdf`, `kurs_kurs_id`) VALUES
(101, 'Język niemiecki A1-1 lekcja-1', 'Podstawowe zagadnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 1),
(102, 'Język niemiecki A1-lekcja-2', 'Podstawowe zagadnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 2),
(103, 'Język niemiecki A1-lekcja-2', 'Podstawowe zagadnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 3),
(104, 'Język niemiecki A1-lekcja-2', 'Podstawowe zagadnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 4),
(118, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf	', 5),
(119, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 6),
(120, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 7),
(121, 'Język niemiecki A1-lekcja-2', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 8),
(122, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 9),
(123, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 10),
(124, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 11),
(125, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 12),
(126, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagawdnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 13),
(127, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagawdnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 14),
(128, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagawdnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 15),
(129, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagawdnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 16),
(130, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagawdnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 17);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciel`
--

CREATE TABLE `nauczyciel` (
  `nauczyciel_id` int(11) NOT NULL,
  `imie` varchar(100) NOT NULL,
  `nazwisko` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `haslo` varchar(100) NOT NULL,
  `miniaturka_zdjecia` varchar(150) DEFAULT NULL,
  `data_dolaczenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `uprawnienia` varchar(45) DEFAULT 'nauczyciel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `nauczyciel`
--

INSERT INTO `nauczyciel` (`nauczyciel_id`, `imie`, `nazwisko`, `email`, `haslo`, `miniaturka_zdjecia`, `data_dolaczenia`, `uprawnienia`) VALUES
(128, 'Dawid', 'dd', 'dd@dd.pl', '123', 'zdjecia/dawid.jpg', '2020-03-15 09:59:43', ''),
(129, 'Dawid', 'Mariankowski', 'dawid21.9@o2.pl', '123', 'zdjecia/dawid.jpg', '2020-03-16 21:05:50', NULL),
(131, '', '', 'nauczyciel@test.pl', '$2y$10$CfMoUbe4GvoC9ROBct0ZTOz26MznT3l4qsZXQOWlovoe9bSeiFjge', '', '2020-03-20 11:50:41', 'nauczyciel'),
(132, '', '', 'test@nauczyciel.pl', '$2y$10$SLajqgKVr9YHSb8Ai6BBgudbcFc0hKGVju4zqyBPFyUSaxShs75FS', NULL, '2020-03-20 12:11:22', 'nauczyciel');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciel_adres`
--

CREATE TABLE `nauczyciel_adres` (
  `nauczyciel_adres_id` int(11) NOT NULL,
  `miasto` varchar(100) NOT NULL,
  `kod_pocztowy` varchar(10) NOT NULL,
  `ulica` varchar(50) NOT NULL,
  `kraj_zamieszkania_id` int(11) DEFAULT NULL,
  `nauczyciel_nauczyciel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `nauczyciel_adres`
--

INSERT INTO `nauczyciel_adres` (`nauczyciel_adres_id`, `miasto`, `kod_pocztowy`, `ulica`, `kraj_zamieszkania_id`, `nauczyciel_nauczyciel_id`) VALUES
(136, 'test', '53-319', 'aaddd', 2, 128),
(137, 'test', '53-319', 'aa', 2, 129);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinia`
--

CREATE TABLE `opinia` (
  `opinia_id` int(11) NOT NULL,
  `tytul` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `ocena` int(2) NOT NULL,
  `data_wystawienia` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_student_id` int(11) NOT NULL,
  `kurs_kurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `opinia`
--

INSERT INTO `opinia` (`opinia_id`, `tytul`, `opis`, `ocena`, `data_wystawienia`, `student_student_id`, `kurs_kurs_id`) VALUES
(33, 's', 's', 1, '2020-01-23 21:48:27', 1, 1),
(36, 'asdd', 'bvcx', 2, '2020-01-22 23:00:00', 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `imie` varchar(100) DEFAULT NULL,
  `nazwisko` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `haslo` varchar(100) NOT NULL,
  `miniaturka_zdjecia` varchar(150) DEFAULT NULL,
  `data_dolaczenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `uprawnienia` varchar(16) NOT NULL DEFAULT 'student',
  `nr_telefonu` int(20) DEFAULT NULL,
  `typ_konta` int(11) DEFAULT NULL,
  `data_zamkniecia` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `student`
--

INSERT INTO `student` (`student_id`, `imie`, `nazwisko`, `email`, `haslo`, `miniaturka_zdjecia`, `data_dolaczenia`, `uprawnienia`, `nr_telefonu`, `typ_konta`, `data_zamkniecia`) VALUES
(1, 'awwdd', 'aaaaaaaaaa', 'dawid2114.9@o2.pl', '123', 'zdjecia/dawid.jpg', '2020-01-22 21:06:17', 'student', NULL, NULL, '2020-01-14 23:00:00'),
(18, 'ddaa', 'ddaa', 'test@test4.pl', '$2y$10$yUcpb/Sscdmsd5GpNKVSOOn89Nf7NaFi40fxQaKAZ2Gc7TAUg0ZmW', 'zdjecia/dawid.jpggg', '2020-02-09 20:52:39', 'admin', NULL, NULL, NULL),
(19, 'da', 'dw', 'test@test.pl', '$2y$10$xlgmp8ZCXeUJ5Yv43lF2KeE546U4AtSQzlPbII0y/KxsAh2wsnTvy', 'zdjecia/dawid.jpg', '2020-02-28 21:54:18', 'student', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `student_adres`
--

CREATE TABLE `student_adres` (
  `student_adres_id` int(11) NOT NULL,
  `miasto` varchar(100) DEFAULT NULL,
  `kod_pocztowy` varchar(10) DEFAULT NULL,
  `ulica` varchar(50) DEFAULT NULL,
  `kraj_zamieszkania_id` int(11) DEFAULT NULL,
  `student_student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `student_adres`
--

INSERT INTO `student_adres` (`student_adres_id`, `miasto`, `kod_pocztowy`, `ulica`, `kraj_zamieszkania_id`, `student_student_id`) VALUES
(1, 'Wrocław', '58-964', 'Hallera', 2, 1),
(37, 'test', '53-319', 'aa', 2, 18),
(39, 'test', '53-319', 'aa', 2, 19);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `student_has_kurs`
--

CREATE TABLE `student_has_kurs` (
  `kurs_kurs_id` int(11) NOT NULL,
  `student_student_id` int(11) NOT NULL,
  `ostatnia_wplata` datetime DEFAULT NULL,
  `data_utworzenia` datetime NOT NULL DEFAULT current_timestamp(),
  `ostatnia_naleznosc` datetime DEFAULT NULL,
  `odnawialny` bit(1) NOT NULL DEFAULT b'0',
  `oplacony` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `student_has_kurs`
--

INSERT INTO `student_has_kurs` (`kurs_kurs_id`, `student_student_id`, `ostatnia_wplata`, `data_utworzenia`, `ostatnia_naleznosc`, `odnawialny`, `oplacony`) VALUES
(1, 18, NULL, '2020-03-19 14:13:32', NULL, b'0', b'0'),
(1, 19, NULL, '2020-03-19 14:13:32', NULL, b'0', b'0'),
(2, 19, NULL, '2020-03-19 21:13:58', NULL, b'0', b'0'),
(4, 19, NULL, '2020-03-19 21:17:56', NULL, b'0', b'0'),
(6, 19, NULL, '2020-03-19 21:17:56', NULL, b'0', b'0'),
(11, 1, NULL, '2020-03-19 14:13:32', NULL, b'0', b'0'),
(11, 19, NULL, '2020-03-20 18:13:36', NULL, b'0', b'0'),
(16, 18, NULL, '2020-03-19 21:17:38', NULL, b'0', b'0'),
(17, 19, NULL, '2020-03-20 23:58:40', NULL, b'0', b'0');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`administrator_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `administrator_has_nauczyciel`
--
ALTER TABLE `administrator_has_nauczyciel`
  ADD PRIMARY KEY (`administrator_administrator_id`,`nauczyciel_nauczyciel_id`),
  ADD KEY `fk_administrator_has_nauczyciel_nauczyciel1_idx` (`nauczyciel_nauczyciel_id`),
  ADD KEY `fk_administrator_has_nauczyciel_administrator1_idx` (`administrator_administrator_id`);

--
-- Indeksy dla tabeli `fiszki`
--
ALTER TABLE `fiszki`
  ADD PRIMARY KEY (`fiszki_id`),
  ADD KEY `fk_fiszki_kurs1_idx` (`kurs_kurs_id`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`kategoria_id`);

--
-- Indeksy dla tabeli `kraj_zamieszkania`
--
ALTER TABLE `kraj_zamieszkania`
  ADD PRIMARY KEY (`kraj_zamieszkania_id`);

--
-- Indeksy dla tabeli `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`kurs_id`),
  ADD KEY `fk_kurs_kategoria1_idx` (`kategoria_kategoria_id`);

--
-- Indeksy dla tabeli `kurs_has_nauczyciel`
--
ALTER TABLE `kurs_has_nauczyciel`
  ADD PRIMARY KEY (`kurs_kurs_id`,`nauczyciel_nauczyciel_id`),
  ADD KEY `fk_kurs_has_nauczyciel_nauczyciel1_idx` (`nauczyciel_nauczyciel_id`),
  ADD KEY `fk_kurs_has_nauczyciel_kurs1_idx` (`kurs_kurs_id`);

--
-- Indeksy dla tabeli `materialy_do_lekcji`
--
ALTER TABLE `materialy_do_lekcji`
  ADD PRIMARY KEY (`materialy_do_lekcji_id`),
  ADD KEY `fk_materialy_do_lekcji_kurs1_idx` (`kurs_kurs_id`);

--
-- Indeksy dla tabeli `nauczyciel`
--
ALTER TABLE `nauczyciel`
  ADD PRIMARY KEY (`nauczyciel_id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `nauczyciel_adres`
--
ALTER TABLE `nauczyciel_adres`
  ADD PRIMARY KEY (`nauczyciel_adres_id`),
  ADD UNIQUE KEY `nauczyciel_nauczyciel_id` (`nauczyciel_nauczyciel_id`),
  ADD KEY `fk_nauczyciel_adres_kraj_zamieszkania1_idx` (`kraj_zamieszkania_id`);

--
-- Indeksy dla tabeli `opinia`
--
ALTER TABLE `opinia`
  ADD PRIMARY KEY (`opinia_id`) USING BTREE,
  ADD UNIQUE KEY `fk_opinia_student1_idx` (`student_student_id`,`kurs_kurs_id`) USING BTREE,
  ADD UNIQUE KEY `fk_opinia_kurs1_idx` (`kurs_kurs_id`,`student_student_id`) USING BTREE;

--
-- Indeksy dla tabeli `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `student_adres`
--
ALTER TABLE `student_adres`
  ADD PRIMARY KEY (`student_adres_id`),
  ADD KEY `fk_student_adres_kraj_zamieszkania1_idx` (`kraj_zamieszkania_id`),
  ADD KEY `fk_student_adres_student1_idx` (`student_student_id`);

--
-- Indeksy dla tabeli `student_has_kurs`
--
ALTER TABLE `student_has_kurs`
  ADD PRIMARY KEY (`kurs_kurs_id`,`student_student_id`),
  ADD KEY `fk_kurs_has_student_student1_idx` (`student_student_id`),
  ADD KEY `fk_kurs_has_student_kurs1_idx` (`kurs_kurs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `administrator`
--
ALTER TABLE `administrator`
  MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `fiszki`
--
ALTER TABLE `fiszki`
  MODIFY `fiszki_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `kategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `kraj_zamieszkania`
--
ALTER TABLE `kraj_zamieszkania`
  MODIFY `kraj_zamieszkania_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `kurs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT dla tabeli `materialy_do_lekcji`
--
ALTER TABLE `materialy_do_lekcji`
  MODIFY `materialy_do_lekcji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT dla tabeli `nauczyciel`
--
ALTER TABLE `nauczyciel`
  MODIFY `nauczyciel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT dla tabeli `nauczyciel_adres`
--
ALTER TABLE `nauczyciel_adres`
  MODIFY `nauczyciel_adres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT dla tabeli `opinia`
--
ALTER TABLE `opinia`
  MODIFY `opinia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT dla tabeli `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT dla tabeli `student_adres`
--
ALTER TABLE `student_adres`
  MODIFY `student_adres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `administrator_has_nauczyciel`
--
ALTER TABLE `administrator_has_nauczyciel`
  ADD CONSTRAINT `fk_administrator_has_nauczyciel_administrator1` FOREIGN KEY (`administrator_administrator_id`) REFERENCES `administrator` (`administrator_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_administrator_has_nauczyciel_nauczyciel1` FOREIGN KEY (`nauczyciel_nauczyciel_id`) REFERENCES `nauczyciel` (`nauczyciel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `fiszki`
--
ALTER TABLE `fiszki`
  ADD CONSTRAINT `fk_fiszki_kurs1` FOREIGN KEY (`kurs_kurs_id`) REFERENCES `kurs` (`kurs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `fk_kurs_kategoria1` FOREIGN KEY (`kategoria_kategoria_id`) REFERENCES `kategoria` (`kategoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `kurs_has_nauczyciel`
--
ALTER TABLE `kurs_has_nauczyciel`
  ADD CONSTRAINT `fk_kurs_has_nauczyciel_kurs1` FOREIGN KEY (`kurs_kurs_id`) REFERENCES `kurs` (`kurs_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kurs_has_nauczyciel_nauczyciel1` FOREIGN KEY (`nauczyciel_nauczyciel_id`) REFERENCES `nauczyciel` (`nauczyciel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `materialy_do_lekcji`
--
ALTER TABLE `materialy_do_lekcji`
  ADD CONSTRAINT `fk_materialy_do_lekcji_kurs1` FOREIGN KEY (`kurs_kurs_id`) REFERENCES `kurs` (`kurs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `nauczyciel_adres`
--
ALTER TABLE `nauczyciel_adres`
  ADD CONSTRAINT `fk_nauczyciel_adres_kraj_zamieszkania1` FOREIGN KEY (`kraj_zamieszkania_id`) REFERENCES `kraj_zamieszkania` (`kraj_zamieszkania_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nauczyciel_adres_nauczyciel1` FOREIGN KEY (`nauczyciel_nauczyciel_id`) REFERENCES `nauczyciel` (`nauczyciel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `opinia`
--
ALTER TABLE `opinia`
  ADD CONSTRAINT `fk_opinia_kurs1` FOREIGN KEY (`kurs_kurs_id`) REFERENCES `kurs` (`kurs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_opinia_student1` FOREIGN KEY (`student_student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `student_adres`
--
ALTER TABLE `student_adres`
  ADD CONSTRAINT `fk_student_adres_kraj_zamieszkania1` FOREIGN KEY (`kraj_zamieszkania_id`) REFERENCES `kraj_zamieszkania` (`kraj_zamieszkania_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_adres_student1` FOREIGN KEY (`student_student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `student_has_kurs`
--
ALTER TABLE `student_has_kurs`
  ADD CONSTRAINT `fk_kurs_has_student_kurs1` FOREIGN KEY (`kurs_kurs_id`) REFERENCES `kurs` (`kurs_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kurs_has_student_student1` FOREIGN KEY (`student_student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
