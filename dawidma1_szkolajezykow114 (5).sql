-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Maj 2020, 17:21
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
  `haslo` varchar(250) NOT NULL,
  `umowa_od_dnia` int(11) DEFAULT NULL,
  `umowa_do_dnia` int(11) DEFAULT NULL,
  `rodzaj_umowy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `administrator`
--

INSERT INTO `administrator` (`administrator_id`, `imie`, `nazwisko`, `email`, `uprawnienia`, `haslo`, `umowa_od_dnia`, `umowa_do_dnia`, `rodzaj_umowy`) VALUES
(3, '', '', 'admin@test.pl', 'admin', '$2y$10$OfBcwz5k0HJv47kgJ.i20.ZzmPwro7nFGhI1zqthzP2mDCsFbQdmy', NULL, NULL, NULL);

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
  `nazwa` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `wymowa` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `opis` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `zdjecie` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `kurs_kurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Zrzut danych tabeli `fiszki`
--

INSERT INTO `fiszki` (`fiszki_id`, `nazwa`, `wymowa`, `opis`, `zdjecie`, `kurs_kurs_id`) VALUES
(2, 'die Gabel   - Widelecaa', 'Nu', 'Das ist eine Gabel   - To jest jakiś widelec', 'zdjecia/Niemiecki-A1-1/eine-gabel-widelec.jpg', 1),
(3, 'der Löffel - Łyżka', '/dea lufyl/', 'Der Joghurt isst man mit einem Löffel - Jogurt je się łyżką', 'zdjecia/Niemiecki-A1-1/der-Loeffel-lyzka .jpg', 1),
(4, 'die Wanne | die Badewanne | das Bad', '/die wanne/', 'Eine Badewanne ist cool - Wanna jest fajna', 'zdjecia/Niemiecki-A1-1/das-Bad-wanna.jpg', 1),
(5, 'der Herd - Kuchenka ', '/dea herd/', 'Die Töpfe stehen auf dem Herd - Te garnki leżą na tej kuchence ', 'zdjecia/Niemiecki-A1-1/der-herd-kuchenka.jpg', 1),
(6, 'die Tür - drzwi', '/di tua/', ' Wird die Tür offen lassen -  Zostaw otwarte drzwi', 'zdjecia/Niemiecki-A1-1/die-tuer-drzwi.jpg', 1),
(7, 'das Fenster - okno', '/das fensta/', ' Öffne bitte das Fenster - Otwórz okno proszę', 'zdjecia/Niemiecki-A1-1/das-fenster-okno.jpg', 1),
(8, 'das Tischchen | die Tischchen - stolik ', '/das tiszśyn/', ' Auf dem Tisch steht ein Wecker - na stoliku leży budzik', 'zdjecia/Niemiecki-A1-1/das-Tischchen-stolik.jpg', 1),
(9, 'der Tisch | die Tische - stół', '/dea tiszsz/', 'In der Küche steht ein Tisch - W kuchni jest stół', 'zdjecia/Niemiecki-A1-1/der-tisch-stol.jpg', 1),
(10, 'der Sessel | die Sessel - Fotel', '/dea sesyl/', 'Es gibt einen bequemen Sessel - Tam stoi wygodny fotel', 'zdjecia/Niemiecki-A1-1/der-Sessel-fotel.jpg', 1),
(11, 'Schnell - Szybko', '/sznell/', 'szybko - Ich muss das schneller machen', 'zdjecia/Niemiecki-A1-1/schnell-szybko.jpg', 1),
(15, 'Bath - Wanna ', '/baf/', 'I like to bathe in a bath -  Lubię kąpać się w wannie', 'zdjecia/Angielski-A1-1/bath-wanna.jpg', 11),
(16, 'bookcase - regał na książki', '/bukkeis/', ' My books are on a bookcase - moje książki leżą na regale na książki', 'zdjecia/Angielski-A1-1/bookcase-regal-na-ksiazki.jpg', 11),
(21, 'Schwierig - Trudny', '/szfiryś/', 'Diese Lektion ist schwierig - Ta lekcja jest trudna', 'zdjecia/Niemiecki-A1-2/trudny.jpg', 2),
(22, 'Krank - Chory', '/Krank/', 'Ich bin krank - Jestem chory ', ' 	zdjecia/Niemiecki-A1-2/chory.jpg', 2),
(23, 'fleißig - Pracowity', '/flaisyś/', 'Marek ist fleißig - Marek jest pracowity ', 'zdjecia/Niemiecki-A1-2/pracowity.jpg', 2),
(24, 'Dick  - Gruby', '/dik/', 'Ich bin ein bisschen dick - Jestem trochę gruby ', 'zdjecia/Niemiecki-A1-2/gruby.jpg', 2),
(27, 'Schlecht - Niedobry, Zły, słaby', '/szleśt/', 'Dieser Film ist schlecht - Ten film jest słaby', 'zdjecia/Niemiecki-A1-2/zly.jpg', 2),
(30, 'der Bildschirm/ die Bildschirme - ekran (telewizora, komputera)', '/dea bildszirm/', 'Abends schaue ich gerne fern - Lubię oglądać telewizję wieczorem', 'zdjecia/Niemiecki-A2-1/ekran.jpg', 3),
(31, 'die Fremdsprache |die Fremdsprachen -język obcy ', '/die fremdszprache/', 'Ich kenne zwei Fremdsprachen - Znam, dwa języki obce ', 'zdjecia/Niemiecki-A2-1/jezyk-obcy.jpg', 3),
(32, 'der Grund | die Gründe - powód, ziemia', '/dea grunt/', 'Manchmal sitze ich auf dem Grund - Czasami siedzę na ziemi', 'zdjecia/Niemiecki-A2-1/ziemia.jpg', 3),
(33, 'die Öffentlichkeit - publiczność, opinia publiczna', '/di ufentliśkait/', 'Die öffentliche Meinung ist wichtig - Opinia publiczna jest ważna', 'zdjecia/Niemiecki-A2-1/opinia-publiczna.jpg', 3),
(34, 'das Lebensmittel | die Lebensmittel - artykuły spożywcze', '/di libynsmityl/', 'Ich kaufe jeden Samstag neue Lebensmittel - W każdą sobotę kupuję nowe artykuły spożywcze', 'zdjecia/Niemiecki-A2-1/artykuly-spozywcze.jpg', 3),
(82, 'bookcase - regał na książki	', NULL, 'My books are on a bookcase - Moje książki są na regale na książki	', 'zdjecia/Angielski-A1-1/bookcase-regal-na-ksiazki.jpg	', 16),
(83, 'das Wasser / die Wässer - Woda', '/das wassa/', ' Ein Glas Wasser bitte - Poproszę jedną szklanke wody ', 'zdjecia/a1-niemiecki/jezyk-niemiecki-kurs-a1-1.jpg', 1),
(84, 'der Wein / die Weine - Wino ', '/dea wain/', 'Ich mag Rotwein - Lubię czerwone wino', 'zdjecia/a1-niemiecki/jezyk-niemiecki-kurs-a1-1.jpg', 1),
(85, 'der Computer / die Computer - Komputer ', '/dea kompiuta/', 'Ich verbringe Zeit am Computer - Spędzam czas przy komputerze. ', '', 1),
(86, 'der Monitor ( die Monitore, die Monitoren) ', '/dea monitoa/', 'Mein Monitor ist groß - Mój monitor jest duży', '', 1),
(91, 'Leicht - Lekki, Łatwy', '/laiśt/', 'Deutsch ist leicht - Niemiecki jest łatwy ', 'zdjecia/Niemiecki-A1-2/latwy.jpg', 2),
(92, 'Leise - cichy', '/laize/', 'Er ist eine sehr leise Person - On jest bardzo cichą osobą', 'zdjecia/Niemiecki-A1-2/cichy.jpg', 2),
(93, 'Sauer - Kwaśny', '/zała/', 'Dieser Apfel ist sauer - To jabłko jest kwaśne', 'zdjecia/Niemiecki-A1-2/kwasny.jpg', 2),
(94, 'unter -wśród, pośród, pod poniżej na dole, mniej niż', '/unta/ ', 'Da ist ein Hund unter dem Tisch - Pod stołem jest pies', 'zdjecia/Niemiecki-A2-1/ponizej.jpg', 3),
(97, 'breit - szeroki', '/brait/ ', 'Diese Straße ist breit - Ta ulica jest szeroka', 'zdjecia/Niemiecki-A2-1/szeroki.jpg', 3),
(98, 'Gott | die Götter - Bóg', '/got/', 'Mein Gott, was ist los? - Mój boże, co się dzieje?', 'zdjecia/Niemiecki-A2-1/bog.jpg', 3),
(100, 'der Fisch - ryba', '/dea fisz/', 'Schöner und großer Fisch - Ładna i duża ryba', 'zdjecia/Niemiecki-A2-1/ryba.jpg', 3),
(101, 'die Flasche, -n | Butelka', '/di flasze/', 'Eine Flasche Orangeade bitte - Poproszę jedną butelkę oranżady', 'zdjecia/Niemiecki-A2-2/butelka.jpg', 4),
(102, 'das Fleisch - MIęso', '/das flaisz/', 'Ich mag Hühnerfleisch - Lubię mięso z kurczaka', 'zdjecia/Niemiecki-A2-2/mieso.jpg', 4),
(103, 'der Abflug, -e | Wylot', '/dea apflug/ ', 'Der Abflug ist um 15.00 Uhr - Wylot jest o godzinie 15.00', 'zdjecia/Niemiecki-A2-2/wylot.jpg', 4),
(104, 'der Flughafen | die Flughäfen - Lotnisko', '/dea flughafyn/', 'Können Sie mich heute um 12.00 Uhr zum Flughafen bringen? - Czy możesz zabrać mnie dzisiaj o 12.00 na lotnisko?', 'zdjecia/Niemiecki-A2-2/lotnisko.jpg', 4),
(105, 'das Flugzeug, -e | Samolot', '/das flugcojg/', 'Unser Flugzeug fliegt gleich ab - Nasz samolot zaraz odlatuje', 'zdjecia/Niemiecki-A2-2/samolot.jpg', 4),
(106, 'das Formular, -e | Formularz', '/das formular/ ', 'Ich muss ein Formular ausfüllen - Muszę wypełnić jakiś formularz', 'zdjecia/Niemiecki-A2-2/formularz.jpg', 4),
(107, 'die Frage, -n | Pytanie', '/di frage/', 'Darf ich Sie etwas fragen? - Czy mogę się coś zapytać?', 'zdjecia/Niemiecki-A2-2/pytac.jpg', 4),
(108, 'die Freizeit - Czas wolny', '/di fraizait/ ', 'Ich habe keine Freizeit - Nie mam wolnego czasu', 'zdjecia/Niemiecki-A2-2/czas.jpg', 4),
(109, 'der Freund, -e | Przyjaciel', '/ dea froińd/ ', 'Ich habe hier nicht viele Freunde - Nie mam tutaj wielu przyjaciół', 'zdjecia/Niemiecki-A2-2/przyjaciel.jpg', 4),
(110, 'Früher - Wcześniej', '/funhe/', 'Ich war früher bei der Arbeit - Byłem w pracy', 'zdjecia/Niemiecki-A2-2/praca.jpg', 4),
(111, 'Frühstücken - Jeść śniadanie', '/frusztukyn/', 'Ich frühstücke immer um 8.00 Uhr - Jem śniadanie zawsze o godzinie 8.00 rano', 'zdjecia/Niemiecki-A2-2/sniadanie.jpg', 4),
(112, 'die Führung - Oprowadzanie z przewodnikiem', '/di furun/ ', 'Führungen durch die Burg kosten 30 Euro - Zwiedzanie zamku z przewodnikiem kosztuje 30 euro', 'zdjecia/Niemiecki-B1-1/przewodnik.jpg', 5),
(113, 'der Garten | die Gärten - Ogród ', '/dea gartyn/', 'Wir haben einen schönen Garten - My mamy piękny ogród ', 'zdjecia/Niemiecki-B1-1/ogrod.jpg', 5),
(114, 'Gefallen - Podobać się', '/gefalen/', 'Das Buch gefällt mir - Lubię tę książkę', 'zdjecia/Niemiecki-B1-1/chetnie.jpg', 5),
(115, 'Gehören -  Należeć', '/gehuuren/', 'Es gehört mir - To należy do mnie', 'zdjecia/Niemiecki-B1-1/nalezec.jpg', 5),
(116, 'das Gemüse - Warzywa', '/das gemuze/', 'Ich esse gerne Gemüse - Lubię jeść warzywa ', 'zdjecia/Niemiecki-B1-1/warzywa.jpg', 5),
(117, 'Gerade - prosto, właśnie ', '/gerade/ ', 'Setzen Sie gerade - Usiądź prosto', 'zdjecia/Niemiecki-B1-1/prosto.jpg', 5),
(118, 'Geradeaus - iść prosto ', '/geradeaus/', 'Bitte gehen Sie geradeaus - Proszę idź prosto', 'zdjecia/Niemiecki-B1-1/idz-prosto.jpg', 5),
(119, 'Gerne - Chętnie', '/gerne/', 'Ich lerne gerne - Lubię się uczyć', 'zdjecia/Niemiecki-B1-1/chetnie.jpg', 5),
(120, 'das Gewicht, -e | Waga ciała', '/das gewiśt/ ', 'Ich habe zu viel Körpergewicht - Mam zbyt dużą wagę ciała', 'zdjecia/Niemiecki-B1-1/waga.jpg', 5),
(121, 'Glauben - Wierzyć ', '/glauben/', 'Ich glaube - Tak mi się wydaje', 'zdjecia/Niemiecki-B1-1/wierzyc.jpg', 5),
(122, 'Gleich - Równa się, zaraz ', '/glaiś/', 'Ich bin gleich da - Zaraz tam będę', 'zdjecia/Niemiecki-B1-1/zaraz.jpg', 5),
(123, 'das Glück - Szczęście', '/das gluk/ ', 'Ich habe viel Glück - Mam dużo szczęścia ', 'zdjecia/Niemiecki-B1-2/szczescie.jpg', 6),
(124, 'Glücklich - Szczęśliwy ', '/glukliś/', 'Ich bin glücklich - Jestem szczęśliwy', 'zdjecia/Niemiecki-B1-2/szczesliwy.jpg', 6),
(125, 'Gratulieren - Gratulować ', '/gratuliryn/', 'Ich gratuliere ihr - Ja gratuluje jej', 'zdjecia/Niemiecki-B1-2/gratulowac.jpg', 6),
(126, 'Groß - Duży', '/gros/', 'Meine Schwester ist groß - Moja siostra jest duża', 'zdjecia/Niemiecki-B1-2/duzy.jpg', 6),
(127, 'die Größe, -n | Rozmiar', '/di grusse/', 'Welche Größe hat dieses Shirt? - Jakiego rozmiaru jest ta koszulka', 'zdjecia/Niemiecki-B1-2/rozmiar.jpg', 6),
(128, 'die Großeltern - Dziadkowie', '/di grosselten/', 'Meine Großeltern leben in derselben Stadt - Moi dziadkowie mieszkają w tym samym mieście', 'zdjecia/Niemiecki-B1-2/dziadkowie.jpg', 6),
(129, 'die Gruppe - Grupa', '/di gruppe/', 'Ich mag Gruppenarbeit - Lubię pracę w grupie', 'zdjecia/Niemiecki-B1-2/grupa.jpg', 6),
(130, 'Gültig - Ważny', '/gultiś/', 'Diese Prüfung ist mir gültig - Ten egzamin jest dla mnie ważny', 'zdjecia/Niemiecki-B1-2/wazny.jpg', 6),
(131, 'das Haar, -e - Włosy ', '/das haar/', 'Ich habe lange Haare - Mam długie włosy', 'zdjecia/Niemiecki-B1-2/wlosy.jpg', 6),
(132, 'das Hähnchen - Kurczak', '/das hensien/ ', 'Ich esse gerne gegrilltes Hähnchen - Lubię jeść kurczaki z rożna', 'zdjecia/Niemiecki-B1-2/kurczak.jpg', 6),
(133, 'die Halbpension - Niepełne wyżywienie ', '/halbpenzion/', 'Wollen Sie Vollpension oder Halbpension? - Chcesz pełne lub niepełne wyżywienie?', 'zdjecia/Niemiecki-B2-1/wyzywienie.jpg', 7),
(134, 'Halten - Trzymać ', '/halten/', 'Ich halte dir - Trzymam cie', 'zdjecia/Niemiecki-B2-1/trzymac.jpg', 7),
(135, 'die Hand |  die Hände', '/di hand/ ', 'Ich wasche oft meine Hände - Ja często myje swoje ręce', 'zdjecia/Niemiecki-B2-1/rece.jpg', 7),
(136, 'das Handy, -s', '/das hendi/', 'Ich mag mein Handy - Ja lubię swój telefon', 'zdjecia/Niemiecki-B2-1/telefon.jpg', 7),
(137, 'Hell - Jasny ', '/hell/', 'Die Wand in meinem Zimmer ist hell - Ściana w moim pokoju jest jasna ', 'zdjecia/Niemiecki-B2-1/jasny.jpg', 7),
(138, 'Herzlich - Serdecznie', '/hercliś/', 'Herzlich willkommen - Witamy serdecznie', 'zdjecia/Niemiecki-B2-1/serdecznie.jpg', 7),
(139, 'Hinten - Z tyłu ', '/hinten/', 'Warum stehst du hinten? - Czemu stoisz z tyłu?', 'zdjecia/Niemiecki-B2-1/z-tylu.jpg', 7),
(140, 'Hoch - Wysoki ', '/hooh/', 'Dieses Gebäude ist sehr hoch - Ten budynek jest bardzo wysoki', 'zdjecia/Niemiecki-B2-1/wysoki.jpg', 7),
(141, 'Holen - Przynosić ( w dwie strony w jedną bringen) ', '/holen/ ', 'Bringst du mir meine Jacke aus dem Kleiderschrank? - Przyniesiesz mi moją kurtkę z szafy?', 'zdjecia/Niemiecki-B2-1/przynosic.jpg', 7),
(142, 'Hören - Słyszeć ', '/hyren/', 'Ich kann dich nicht hören - Nie słyszę ciebie', 'zdjecia/Niemiecki-B2-2/slyszec.jpg', 8),
(143, 'die Jacke,-n', '/di jake/ ', 'Hast du meine Jacke gesehen? - Czy widziałeś moją kurtkę?', 'zdjecia/Niemiecki-B2-2/kurtka.jpg', 8),
(144, 'Jetzt - Teraz, Obecnie', '/ject/', 'Ich studiere jetzt Informatik - Studiuję teraz informatykę', 'zdjecia/Niemiecki-B2-2/teraz.jpg', 8),
(145, 'der Job, -s | Praca', '/dea dżob/ ', 'Ich mag meinen Job - Lubię swoją pracę ', 'zdjecia/Niemiecki-B2-2/praca.jpg', 8),
(146, 'der Junge, -n | Chłopak ', '/dea junge/ ', 'Das ist der Junge - To jest ten chłopak', 'zdjecia/Niemiecki-B2-2/chlopak.jpg', 8),
(147, 'der Kaffee, -s | Kawa', '/dea kaffe/ ', 'Ich trinke gerne Kaffee - Lubię pić kawę', 'zdjecia/Niemiecki-B2-2/kawa.jpg', 8),
(148, ' die Kasse, -n | Kasa ', '/di kasse/ ', 'Bitte kommen Sie zur Registrierkasse - Proszę podejść do kasy ', 'zdjecia/Niemiecki-B2-2/kasa.jpg', 8),
(149, 'Kaufen - Kupować', '/kaufyn/', 'Kamila kauft sich ein neues Auto - Kamila kupuje nowy samochód', 'zdjecia/Niemiecki-B2-2/kupowac.jpg', 8),
(150, 'Kennen - Znać ', '/kenen/', 'Kennen Sie diesen Mitarbeiter? - Czy znasz tego pracownika?', 'zdjecia/Niemiecki-B2-2/znac.jpg', 8),
(151, 'die Kleidung,-en', '/di klaidun/', 'Wo finde ich Männerkleidung? - Gdzie mogę znaleźć męskie ubrania?', 'zdjecia/Niemiecki-B2-2/ubrania.jpg', 8),
(152, 'Klein - Mały ', '/klain/', 'Diese Katze ist sehr klein - Ten kot jest bardzo mały', 'zdjecia/Niemiecki-B2-2/maly.jpg', 8),
(153, 'Kochen - Gotować', '/kochen/', 'Ich koche sehr gerne - Bardzo lubię gotować', 'zdjecia/Niemiecki-C1-1/gotowac.jpg', 9),
(154, 'der Koffer - Walizka', '/dea koffa/', 'Wo ist mein Koffer? - Gdzie jest moja walizka', 'zdjecia/Niemiecki-C1-1/walizka.jpg', 9),
(155, 'der Kollege, -n | Kolega ', '/dea kolege/', 'Wo ist dein Kollege? - Wo ist dein Freund?', 'zdjecia/Niemiecki-C1-1/kolega.jpg', 9),
(156, 'Kommen - Przychodzić, Pochodzić', '/komyn/', 'Woher kommen Sie? - Skąd jesteś', 'zdjecia/Niemiecki-C1-1/pochodzic.jpg', 9),
(157, 'Können', '/kunen/', 'Ich kann Deutsch und Englisch - Mogę mówić po niemiecku i angielsku', 'zdjecia/Niemiecki-C1-1/moge.jpg', 9),
(158, 'das Konto', '/das konto/', 'Ich habe ein Bankkonto - Mam konto w banku', 'zdjecia/Niemiecki-C1-1/konto.jpg', 9),
(159, 'der Kopf - die Köpfe | Głowa', '/dea kopf/', 'Ich habe diese Informationen im Kopf - Mam te informacje w głowie', 'zdjecia/Niemiecki-C1-1/glowa.jpg', 9),
(160, 'Kosten - Kosztować ', '/kosten/ ', 'Wie viel kostet das? - Ile to kosztuje?', 'zdjecia/Niemiecki-C1-1/kosztowac.jpg', 9),
(161, 'Krank', '/krank/ ', 'Ich bin krank - Jestem chory', 'zdjecia/Niemiecki-C1-1/chory.jpg', 9),
(162, 'Kriegen - Dostać', '/herkrigyn/', 'Tom hat Wasser gekriegt - Tom dostał wodę', 'zdjecia/Niemiecki-C1-1/dostac.jpg', 9),
(163, 'die Küche, -n', '/di kusie/ ', 'Ich habe eine kleine Küche - Mam małą kuchnie', 'zdjecia/Niemiecki-C1-1/kuchnia.jpg', 9),
(164, 'der Kuchen - Ciasto', '/dea kuchen/', 'Ich esse gerne Kuchen - Lubię jeść ciasto', 'zdjecia/Niemiecki-C1-2/ciasto.jpg', 10),
(165, ' der Kugelschreiber', '/dea kugelszraiba/', 'Ich habe einen Stift in meinem Rucksack - Mam długopis w moim plecaku', 'zdjecia/Niemiecki-C1-2/dlugopis.jpg', 10),
(166, 'der Kühlschrank | die Kühlschränke - Lodówka', '/dea kulszrank/', 'Ich habe nichts im Kühlschrank - Nie mam nic w lodówce ', 'zdjecia/Niemiecki-C1-2/lodowka.jpg', 10),
(167, 'Kulturell - Kultura', '/kurturel/ ', 'Ich bin kulturell interessiert. Ich gehe oft ins Museum - Interesuję się kulturą. Często chodzę do muzeum.', 'zdjecia/Niemiecki-C1-2/kultura.jpg', 10),
(168, 'der Kunde, -n - Klient', '/dea kunde/', 'Guter Kundenservice - Dobra obsługa klienta', 'zdjecia/Niemiecki-C1-2/klient.jpg', 10),
(169, 'Lachen -Śmiać się', '/lachen/', 'Ich lache gern - Lubię się śmiać', 'zdjecia/Niemiecki-C1-2/smiech.jpg', 10),
(170, 'der Laden, -ä | Sklep', '/dea laden/', 'Ich gehe gerne in den Laden - Lubię chodzić do sklepu ', 'zdjecia/Niemiecki-C1-2/sklep.jpg', 10),
(171, 'das Land, -ä, er | Kraj, wieś, land', '/das land/', 'Deutschland ist ein Land - Niemcy to jest kraj', 'zdjecia/Niemiecki-C1-2/kraj.jpg', 10),
(172, 'Lang, -ä, er | Długi', '/lang/', 'Diese Reise war lang - Ta podróż była długa', 'zdjecia/Niemiecki-C1-2/dlugi.jpg', 10),
(173, 'Langsam - Powoli', '/langzam/', 'Ich arbeite langsam - Pracuję powoli', 'zdjecia/Niemiecki-C1-2/powoli.jpg', 10),
(174, 'Fork- Widelec', '/fork/', 'That is a fork - To jest jakiś widelec', 'zdjecia/Angielski-A1-1/widelec.jpg', 11),
(175, 'Spoon - Łyżka', '/spuun/', 'Yogurt is eaten with a spoon - Jogurt je się łyżką', 'zdjecia/Angielski-A1-1/lyzka.jpg', 11),
(176, 'Stove - Kuchenka ', '/stouw/', 'The pots are on the stove - Garnki są na kuchence', 'zdjecia/Angielski-A1-1/kuchenka.jpg', 11),
(177, 'Door - Drzwi', '/door/', 'Will leave the door open - Zostaw otwarte drzwi', 'zdjecia/Angielski-A1-1/drzwi.jpg', 11),
(178, 'Window - Okno', '/łindoł/', 'Please open the window - Proszę otwórz to okno ', 'zdjecia/Angielski-A1-1/okno.jpg', 11),
(179, 'Tea table - Stolik ', '/tii tejbul/', 'There is an alarm clock on the tea table - Tam jest budzik na tym stoliku', 'zdjecia/Angielski-A1-1/stolik.jpg', 11),
(180, 'Table - Stół', '/tejbul/', 'There is a table in the kitchen - W kuchni jest stół', 'zdjecia/Angielski-A1-1/stol.jpg', 11),
(181, 'Armchair - Fotel', '/armczeer/', 'There is a comfortable armchair - Tam jest wygodny fotel', 'zdjecia/Angielski-A1-1/fotel.jpg', 11),
(182, 'Quickly - Szybko', '/kłikli/', 'I have to do it faster - Muszę to zrobić szybciej', 'zdjecia/Angielski-A1-1/szybko.jpg', 11),
(183, 'Water - Woda', '/łoder/', 'Poproszę szklankę wody - A glass of water, please', 'zdjecia/Angielski-A1-1/woda.jpg', 11),
(184, 'Wine - Wino', '/łain/', 'I like red wine - Lubię czerwone wino', 'zdjecia/Angielski-A1-1/wino.jpg', 11),
(185, 'Computer - Komputer', '/kompiuter/', 'I spend time on the computer - Spędzam czas przy komputerze', 'zdjecia/Angielski-A1-1/komputer.jpg', 11),
(186, 'Monitor - Monitor', '/moniytoor/', 'My monitor is big - Mój monitor jest duży', 'zdjecia/Angielski-A1-1/monitor.jpg', 11),
(187, 'difficult  - Trudny', '/difikylt/', 'This lesson is difficult - Ta lekcja jest trudna', 'zdjecia/Angielski-A1-2/trudny.jpg', 12),
(188, 'sick - Chory', '/sik/', 'I\'m sick - Jestem chory', 'zdjecia/Angielski-A1-2/chory.jpg', 12),
(189, 'Hard-working - Pracowity ', '/hard workinn/', 'Marek is hardworking - Marek jest pracowity', 'zdjecia/Angielski-A1-2/pracowity.jpg', 12),
(190, 'Thick - Gruby', '/fik/', 'I&#39;m a bit fat - Jestem trochę gruby', 'zdjecia/Angielski-A1-2/gruby.jpg', 12),
(191, 'Bad - Zły, kiepski', '/baad/', 'This film is bad - Ten film jest kiepski', 'zdjecia/Angielski-A1-2/zly.jpg', 12),
(192, 'Easy - Łatwy', '/iizi/', 'English is easy - Angielski jest łatwy', 'zdjecia/Angielski-A1-2/latwy.jpg', 12),
(193, 'Silent - Cichy, milczący', '/sailent/', 'He is a very silent person - On jest bardzo cichą osobą', 'zdjecia/Angielski-A1-2/cichy.jpg', 12),
(194, 'Sour - Kwaśny', '/sałer/', 'Lemon is sour - Cytryna jest kwaśna', 'zdjecia/Angielski-A1-2/kwasny.jpg', 12),
(195, 'Screen - Ekran', '/skriin/', 'I like to have a big screen - Lubię mieć durzy ekran', 'zdjecia/Angielski-A2-1/ekran.jpg', 13),
(196, 'Foreign language - Foren langłidż', '/foren langłidż/', 'I know two foreign languages - Znam, dwa języki obce ', 'zdjecia/Angielski-A2-1/jezyk-obcy.jpg', 13),
(197, 'Ground ', '/graund/', 'Sometimes I sit on the ground - Czasami siedzę na ziemi', 'zdjecia/Angielski-A2-1/ziemia.jpg', 13),
(198, 'Public opinion - Opinia publiczna', '/pablik opiniyn/', 'Public opinion is important - Opinia publiczna jest ważna', 'zdjecia/Angielski-A2-1/opinia-publiczna.jpg', 13),
(199, 'Groceries - Artykuły spożywcze ', '/grosyriz/', 'I buy new groceries every Saturday - Kupuję nowe artykuły spożywcze w każdą sobotę', 'zdjecia/Angielski-A2-1/artykuly-spozywcze.jpg', 13),
(200, 'Under - Pod czymś', '/ander/', 'There&#39;s a dog under the table - Pod stołem jest pies', 'zdjecia/Angielski-A2-1/ponizej.jpg', 13),
(201, 'articulate', '/artykjulejt/', 'Wyrażnie i jasno wypowiadać swoje myśli ', '', 21),
(202, 'coherent', '/kołhirent/', 'Spójnie i logicznie wyrażać swoje myśli, być komunikatywnym', '', 21),
(203, 'consistent ', '/konsistynt/', 'Zwięzły i logiczny', '', 21),
(204, 'Eloquent - Elokwentny', '/elokłent/', 'Osoba z bogatym zasobem słownictwa, która ma dużą wiedzę na dany temat.', '', 21),
(205, 'Fluent - Biegły', '', 'Osoba płynnie posługująca się jakimś językiem.', '', 21),
(206, 'Hesitant', '/hazytynt/', 'Osoba, która nie jest pewna tego co mówi', '', 20),
(207, 'Inarticulate - Niedokładny', '', 'Osoba mówiąca niezrozumiale lub niewyraźnie', '', 21),
(208, 'Inhibited - Zachamowany', '/inhibitiyd/', 'Osoba, która jest niepewna siebie i pełna zachamowań', '', 21),
(209, 'Lucid - Jasny', '/lusyd/', 'Osoba wypowiadająca się w przejrzysty i zrozumiały sposób', '', 21),
(210, 'Persuasive - Przekonujący', '/pyrsłejziv/', 'Osoba, która potrafi przekonać kogoś do swojego zdania', '', 21),
(211, 'Rambling - chaotycznie', '/ramblinng/', 'Wypowiadanie słów bez ładu i składu', '', 21),
(212, 'Responsive', '/rysponsiv/', 'Osoba, która jezszz zaangarzowana w rozmowę', '', 21),
(213, 'Engage - Zaangażowany', '/engeidż/', 'Osoba która jest zainteresowana, zatrudniać, rezerwować', '', 20),
(214, 'Sensitive', '/sensitiv/', 'Osoba wrażliwa na opinie innych', '', 20),
(215, 'Succinct - Treściwy', '/syksint/', 'Zwięzła wypowiedź', '', 20),
(216, 'Tongue-tied - Oniemiały ', '/tan taid/ ', 'Zabrakło komuś języka w gębie, zawstydzony, zszokowany', '', 20),
(217, 'Bleiben - Zostawać /blaiben/', '', '<b>Präsens </b><br> ich bleibe<br> du bleibst <br>er/sie/es bleibt <br>wir bleiben <br>ihr bleibt <br>Sie bleiben<br><b>Perfekt</b><br>ich bin geblieben<br>du bist geblieben<br>er/sie/es ist geblieben<br>wir sind geblieben<br>ihr seid geblieben<br>Sie sind geblieben<br><b>Präteritum</b><br>ich blieb<br>du bliebst<br>er/sie/es blieb<br>wir blieben<br>ihr bliebt<br>Sie blieben<br>', '', 2),
(218, 'Fahren - Jechać  /faren/ ', '', '<b>Präsens<br></b>\r\n \r\nich fahre<br>\r\ndu fährst<br>\r\ner/sie/es fährt<br>\r\nwir fahren<br>\r\nihr fahrt<br>\r\nSie fahren<br>\r\n \r\n<b>Perfekt<br></b>\r\n \r\nich bin gefahren<br>\r\ndu bist gefahren<br>\r\ner/sie/es ist gefahren<br>\r\nwir sind gefahren<br>\r\nihr seid gefahren<br>\r\nSie sind gefahren<br>\r\n \r\n<b>Präteritum<br></b>\r\nich fuhr<br>\r\ndu fuhrst<br>\r\ner/sie/es fuhr<br>\r\nwir fuhren<br>\r\nihr fuhrt<br>\r\nSie fuhren<br>\r\n', '', 2),
(220, 'Hassen - Nienawidzić /hassyn/', '', '<b>Präsens</br></b>\r\nich hasse</br>\r\ndu hasst</br>\r\ner/sie/es hasst</br>\r\nwir hassen</br>\r\nihr hasst</br>\r\nSie hassen</br>\r\n<b>Perfekt</b><br>\r\nich habe gehasst<br>\r\ndu hast gehasst<br>\r\ner/sie/es hat gehasst<br>\r\nwir haben gehasst<br>\r\nihr habt gehasst<br>\r\nSie haben gehasst<br>\r\n<b>Präteritum</b></br>\r\nich hasste</br>\r\ndu hasstest</br>\r\ner/sie/es hasste</br>\r\nwir hassten</br>\r\nihr hasstet</br>\r\nSie hassten</br>', '', 2),
(221, 'test', 'test', 'test', 'test', 1),
(222, 'Haben - Mieć /haben/', '', '<b>Präsens</b></br>\r\nich habe</br>\r\ndu hast</br>\r\ner/sie/es hat</br>\r\nwir haben</br>\r\nihr habt</br>\r\nSie haben</br>\r\n<b>Perfekt</b></br>\r\nich habe gehabt</br>\r\ndu hast gehabt</br>\r\ner/sie/es hat gehabt</br>\r\nwir haben gehabt</br>\r\nihr habt gehabt</br>\r\nSie haben gehabt</br>\r\n<b>Präteritum</b></br>\r\nich hatte</br>\r\ndu hattest</br>\r\ner/sie/es hatte</br>\r\nwir hatten</br>\r\nihr hattet</br>\r\nSie hatten</br>', '', 1),
(223, 'bevor - Zanim', '/befoa/', '', '', 3),
(224, 'der Blick, -e | Spojrzenie', '/dea blik/', '', '', 3),
(225, 'Involviert - Uwikłany', '/inwolviet/', '', '', 3),
(226, 'der Quatsch - Brednie', '/de kwacz/', '', '', 3),
(227, 'Der Schuh, -e', '/dea szu/', '', '', 3),
(228, 'Wirken - Działać, pracować', '/wirkyn/', '', '', 3),
(229, 'Deshalb - Dlatego ', '/desalb/', '', '', 3),
(230, 'die Brezel, -n | Precel', '/di brycyl/', '', '', 3),
(231, 'Füttern - Karmić ', '/futen/', ' Füttere die Möwen nicht - Nie  karmić mew', '', 3),
(232, 'die Möwe, -n | Mewa', '/di muwe/', '', '', 3),
(233, 'der/die Dritte, -n | Osoba trzecia, Strona trzecia ', '/di dritte/', '', '', 3),
(234, 'der Traum - Marzenie', '/dea traum/', '', '', 3),
(235, 'das Trauma - Uraz', '/das trauma/', '', '', 3),
(236, 'Aufhören - Przestawać', '/aufhyryn/', '', '', 3),
(237, 'Aufheben - Podnosić, unieważniać, pzechowywać', '/aufhyben/', '', '', 3),
(238, 'Schmecken - Smakować', '/szmeken/', '', '', 3),
(239, 'Denen - Którym', '/deenen/', '', '', 3),
(240, 'Dürfen - Mieć pozwolenie', '/durfyen/', '', '', 3),
(241, 'Einfangen - Złapać', '/ainfagen/', '', '', 3),
(242, 'Wider - Wbrew. przeciw', '/wida/', '', '', 3),
(243, 'Information technology', '/infomeiszyn technolodżi/', 'Information technology is very popular nowadays - informatyka jest obecnie bardzo popularna.', '', 22),
(244, 'Provide - Dostarczać', '/provaid/', 'Please provide more information about the issue - Podaj więcej informacji na temat problemu', '', 22),
(245, 'Relational database management system - System do zarządzania relacyjnymi bazami danych ', '/rileiszynyl deitabeis menedżment system/', 'RDBMS is an efficient way to store data - RDBMS to skuteczny sposób przechowywania danych.', '', 22),
(246, 'Normalized', '/normalaiz/', 'You need to normalize the data - You need to normalize the data', '', 22),
(247, 'Essential - Niezbędny', '/esenszyl/', 'This software is essential for our company - To oprogramowanie jest niezbędne dla naszej firmy', '', 22),
(248, 'Escalation - Wzrost priorytetu, eskalacja', '/eskalejszyn/', 'Could you please escalate the ticket? Czy możesz eskalować to zgłoszenie usterki?', '', 22),
(249, 'Frozen - Zablokowany', '/frouzyn/', 'The screen of the laptop is frozen - Ekran laptopa jest zamrożony/zawieszony', '', 22),
(250, 'Disappeared - Zniknąć, zgubić', '/dysapird/', 'Everyone&#39;s work seems to have disappeared - Wydaje się, że praca wszystkich zniknęła', '', 22),
(251, 'Sort it out - Naprawić', '/sort it aut/', 'Are you able to sort it out? - Czy potrafisz to rozwiązać?', '', 22),
(252, 'Switch it off - Wyłączyć to', '/słicz off/', 'Please switch it off and on again - Proszę to wyłączyć i włączyć ponownie', '', 22),
(253, 'Hold - Czekać', '/hold/', 'I will answer shortly, hold please - Odpowiem niedługo, proszę czekać.', '', 22),
(254, 'Gone - Stracony, skończony', '/gon/', 'All my documents have gone - Wszystkie moje dokumenty zniknęły ', '', 22),
(255, 'Screen - Ekran', '/skrin/', 'The screen just freezes/keeps freezing - Ekran po prostu się zawiesza', '', 22),
(256, 'Reboot - Ponownie uruchomić, zresetować', '/ribuut/', 'May I reboot your computer? - Czy mogę zresetować twój komputer?', '', 22),
(257, 'Problems - Problemy', '/problems/', 'I am having problems with my computer - Mam problemy z komputerem', '', 22),
(258, 'Turn it on - Włączyć to ', '/tern it on/', 'I have turned the PC off and on but that hasn&#39;t fixed it -Wyłączyłem i włączyłem komputer, ale to go nie naprawiło', '', 22),
(259, 'Informationstechnologie -IT', ' /informacionstechnologi/', 'Informationstechnologie ist heutzutage sehr beliebt  - informatyka jest obecnie bardzo popularna.', '', 23),
(260, 'Geben -dawać', '/giben/', 'Bitte geben Sie weitere Informationen zu diesem Problem an - Podaj więcej informacji na temat problemu', '', 23),
(261, 'Relationales Datenbank Management System - RDBMS', '/relacionalez datenbank menadźment system/', 'System zarządzania relacyjną bazą danych', '', 23),
(262, 'Normalisieren - Normalizować ', '/normaliziren/', 'Sie müssen die Daten normalisieren - Musisz znormalizować dane', '', 23),
(263, 'Wesentlich - Ważny, istotny', '/wizentliś/', 'Diese Software ist für unser Unternehmen wesentlich - To oprogramowanie jest niezbędne dla naszej firmy', '', 23),
(264, 'die Eskalation - Wzrost priorytetu, eskalacja', '/di eskalacjon/ ', 'Könnten Sie bitte das Ticket eskalieren? -  Czy możesz eskalować tą zgłoszoną usterke?', '', 23),
(265, 'Eingefroren', '/aingefroryn/', 'Der Bildschirm des Laptops ist eingefroren - Ekran laptopa jest zamrożony/zawieszon', '', 23),
(266, 'Verschwinden - Zniknąć', '/ferszfindyn/', 'Die Arbeit aller scheint verschwunden zu sein - Wydaje się, że praca wszystkich zniknęła', '', 23),
(267, 'Sortiere es aus - Rozwiązać to', '/zortire es aus/ ', 'Können Sie sortiere es aus? - Czy potrafisz to rozwiązać', '', 23),
(268, 'Halten - Czekać', '/halten/', 'Ich werde gleich antworten, bitte halten - Zaraz odpowiem, proszę czekać', '', 23),
(269, 'Weg sein - Odejść, zniknąć', '/weg/', 'Alle meine Dokumente sind weg - Wszystkie moje dokumenty zniknęły', '', 23),
(270, 'der Bildschirm - Ekran', '/dea bildszirm/', 'Der Bildschirm friert einfach weiter - Ekran po prostu się zawiesza', '', 23),
(271, 'der Neustart', '/de noisztart/ ', 'Darf ich Ihren Computer neu starten? - Czy mogę ponownie uruchomić twój komputer?', '', 23),
(272, 'das Problem, -e | Peoblem', '/das problem/', 'Ich habe Probleme mit meinem Computer - Mam problemy z moim komputerem', '', 23),
(273, 'Schalten Sie es ein - Włączyć to', '/szaltyn zi es ain/', 'Ich habe den PC aus und wieder eingeschaltet, aber das hat ihn nicht behoben -  Wyłączyłem i włączyłem komputer, ale to go nie naprawiło', '', 23),
(274, 'trembling - drganie,  roztrzęsiony', '/tremblin/', '', '', 18),
(275, 'Collected - Opanowany, spokojny', '/kolektyd/', '', '', 18),
(276, 'Calmness - Cisza, spokój', '/kaamnys/', '', '', 18),
(277, 'Rub - Pocierać, wcierać', '/rab/', '', '', 18),
(278, 'Rescued - Uratowany', '/reskjud/', '', '', 18),
(279, 'Sinking - Zatonięcie, tonięcie, kopanie szybu', '/sinkin/', '', '', 18),
(280, 'Subsequently - Następnie, potem', '/sabsykłently/', '', '', 18),
(281, 'Condominium - Mieszkanie z prawem własności ', '/kondominium/', '', '', 18),
(282, 'Dashed - Przerywana linia', '/daszt/', '', '', 18),
(283, 'Undoubtedly - Niewątpliwie,', '/andautydli/', '', '', 18),
(284, 'Treated - Leczony', '/ttrityd/', '', '', 18),
(285, 'Indeed - Naprawdę, podkreślenie bardzo', '/indiid/', '', '', 18),
(286, 'Sue - Wnosić pozew', '/suu/', '', '', 18),
(287, 'Refund - Zwracać pieniądze', '/rifand/', '', '', 18),
(288, 'Particularly - Szczególnie', '/partykjylyli/', '', '', 18),
(289, 'Therefore - Zatem', '/derfor/', '', '', 18),
(290, 'Beavers - Bobrowate ', '/bivers/', 'Rodzaj ssaków', '', 18),
(291, 'Cub - Szczeniak', '/kab/', '', '', 18),
(292, 'Jerk -Szarpać, palant', '/dżerk/', '', '', 18),
(293, 'Inexperienced - Niedoświadczony', 'inikspiyruynst/', '', '', 18),
(294, 'Start off - Ruszać', '/start of/', '', '', 18),
(295, 'Stretch - Rozciągać się', '/strecz/', '', '', 18),
(296, 'der Donner - Grzmot', '/dea donna/', '', '', 4),
(297, 'Donnern - grzmieć', '/donan/', '', '', 4),
(298, 'sehen - Oglądać, widzieć', '/zejen/', '', '', 4),
(299, 'Putzen - Sprzątać, czyścić', '/pucyn/', '', '', 4),
(300, 'Obwohl - Chociaż', '/opwol/', '', '', 4),
(301, 'Nicht da sein - Być nieobecnym', '/niśt da zain/', '', '', 4),
(302, 'das Feuer - Ogień', '/das foja/', '', '', 4),
(303, 'der Himmel - Niebo', '/dea himmel/', '', '', 4),
(304, 'der Satz, ä | Zadanie', '/dea zats/', '', '', 4),
(305, 'Wegnehmen - Zabierać', '/wegnimen/', '', '', 4),
(306, 'Stellen - Stawiać', '/sztelen/', '', '', 4),
(307, 'Vorstellen - Przedstawiać', '/forsztelyn/', '', '', 4),
(308, 'Fangen - Łapać', '/fangyn/', '', '', 4),
(309, 'Anfangen - Rozpoczynać', '/anfagen/', '', '', 4),
(310, 'Nehmen - Brać', '/niemen/', '', '', 4),
(311, 'Vergessen - Zapominać', '/fergesyn/', '', '', 4),
(312, 'Achte - Ósmy', '/achte/', '', '', 4),
(313, 'Besuchen - Odwiedzać', '/bezuchen/', '', '', 4),
(314, 'Aufmachen - Otwierać', '/aufmachen/', '', '', 4),
(315, 'Verlassen- Opuszczać', '/ferlasen/', '', '', 4),
(316, 'Verschlafen - Zaspać', '/ferszlafyn/', '', '', 4),
(317, 'Aufstehen - Wstawać', '/aufsztejen/', '', '', 4),
(318, 'Wde - szeroki', '/łaid/', 'This street is wide - - Ta ulica jest szeroka', 'zdjecia/Angielski-A2-1//szeroki.jpg', 13),
(319, 'God - Bóg', '/god/', 'My god what is going on? -  Mój boże, co się dzieje?', 'zdjecia/Angielski-A2-1//bog.jpg', 13),
(320, 'Fish', '/fisz/', 'Nice and big fish - Ładna i duża ryba', 'zdjecia/Angielski-A2-1//ryba.jpg', 13),
(321, 'Bottle - Butelka', '/botyl/', 'One bottle of orangeade, please - Poproszę jedną butelkę oranżady', 'zdjecia/Angielski-A2-2/butelka.jpg', 14),
(322, 'Meat -  Mięso', '/mit/', 'I like chicken meat - Lubię mięso z kurczaka', 'zdjecia/Angielski-A2-2/mieso.jpg', 14),
(323, 'Departure - Wylot', '/duparczer/', 'Departure is at 15.00 - Wylot jest o godzinie 15.00', 'zdjecia/Angielski-A2-2/wylot.jpg', 14),
(324, 'Airport - Lotnisko', '/erport/', 'Can you take me to the airport today at 12.00? - Czy możesz zabrać mnie dzisiaj o 12.00 na lotnisko?', 'zdjecia/Angielski-A2-2/lotnisko.jpg', 14),
(325, 'Plane - Samolot', '/plein/', 'Our plane is about to depart - Nasz samolot zaraz odlatuje', 'zdjecia/Angielski-A2-2/samolot.jpg', 14),
(326, 'Form - Formularz', '/form/', 'I have to fill out a form - Muszę wypełnić jakiś formularz', 'zdjecia/Angielski-A2-2/formularz.jpg', 14),
(327, 'Question - Pytanie', '/kłeszczyn/', 'May I ask you something? - Czy mogę się coś zapytać?', 'zdjecia/Angielski-A2-2/pytac.jpg', 14),
(328, 'Free time - Czas wolny', '/friitaim/', 'I don\'t have free time - Nie mam wolnego czasu', 'zdjecia/Angielski-A2-2/czas.jpg', 14),
(329, 'Friend - Przyjaciel', '/frend/', 'I don&#39;t have many friends here - Nie mam tutaj wielu przyjaciół', 'zdjecia/Angielski-A2-2/przyjaciel.jpg', 14),
(330, 'Before - Wcześniej', '/bifor/ ', 'I was at work before - Wcześniej byłem w pracy', 'zdjecia/Angielski-A2-2//praca.jpg', 14),
(331, 'Breakfast - Śniadanie', '/brekfyst/', 'I always have breakfast at 8.00 am - Jem śniadanie zawsze o godzinie 8.00 rano', 'zdjecia/Angielski-A2-2/sniadanie.jpg', 14),
(332, 'Happiness ', '/hapiness/', 'I have a lot of luck - Mam dużo szczęścia ', 'zdjecia/Niemiecki-B1-2/szczescie.jpg', 15),
(333, 'Happy ', '/hapi/', 'I&#39;m happy - Jestem szczęśliwy', 'zdjecia/Niemiecki-B1-2/szczesliwy.jpg', 15),
(334, 'Congratulate - Gratulować', '/kongraciulejt/', 'I congratulate her - Ja gratuluje jej', 'zdjecia/Niemiecki-B1-2/gratulowac.jpg', 15),
(335, 'Big - Duży', '/big/', 'My sister is big - Moja siostra jest duża', 'zdjecia/Niemiecki-B1-2/duzy.jpg', 15),
(336, 'Size ', '/saiz/', 'What size is this shirt? - Jakiego rozmiaru jest ta koszulka', 'zdjecia/Niemiecki-B1-2/rozmiar.jpg', 15),
(337, 'Grandfather - Dziadek', '/grandfader/', 'My grandparents live in the same city - Moi dziadkowie mieszkają w tym samym mieście', 'zdjecia/Niemiecki-B1-2/dziadkowie.jpg', 15),
(338, 'Group - Grupa', '/grup/', 'I like group work -  Lubię pracę w grupie', 'zdjecia/Niemiecki-B1-2/grupa.jpg', 15),
(339, 'Important - Ważny', '/importynt/', 'This exam is important to me - Ten egzamin jest dla mnie ważny', 'zdjecia/Niemiecki-B1-2/wazny.jpg', 15),
(340, 'Hair - Włosy', '/her/', 'I have long hair - Mam długie włosy', 'zdjecia/Niemiecki-B1-2/wlosy.jpg', 15),
(341, 'Chicken - Kurczak', '/czikyn/', 'I like to eat grilled chicken - Lubię jeść kurczaki z rożna', 'zdjecia/Niemiecki-B1-2/kurczak.jpg', 15);

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
(1, 'Język niemiecki podstawy', 'Zagadnienia podstawowe', NULL),
(2, 'Język niemiecki zagadnienia ogólne', 'Zagadnienia ogólne', NULL),
(3, 'Język angielski podstawy  ', 'Zagadnienia podstawowe', NULL),
(4, 'Język angielski zagadnienia ogólne', 'Zagadnienia ogólne', NULL),
(5, 'Kurs angielskiego, specjalistyczny dla informatyków', 'Kurs dla specjalistów z branży IT', ''),
(6, 'Kurs niemieckiego, specjalistyczny dla informatyków', 'Kurs dla specjalistów z branży IT', '');

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
(3, 'Norwegia'),
(4, 'Anglia');

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
(2, 'Kurs niemieckiego A1-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-A1-2/Niemiecki-A1-2.jpg', '2020-01-23 23:15:00', 2),
(3, 'Kurs niemieckiego  A2-1', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-A2-1/Niemiecki-A2-1.jpg', '2020-01-22 21:02:25', 1),
(4, 'Kurs niemieckiego  A2-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-A2-2/Niemiecki-A2-2.jpg', '2020-01-22 21:02:56', 1),
(5, 'Kurs niemieckiego  B1-1', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-B1-1/Niemiecki-B1-1.jpg', '2020-01-22 21:03:35', 2),
(6, 'Kurs niemieckiego  B1-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-B1-2/Niemiecki-B1-2.jpg', '2020-01-22 21:04:00', 2),
(7, 'Kurs niemieckiego  B2-1', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-B2-1/Niemiecki-B2-1.jpg', '2020-01-22 21:04:22', 1),
(8, 'Kurs niemieckiego  B2-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-B2-2/Niemiecki-B2-2.jpg', '2020-01-22 21:05:27', 1),
(9, 'Kurs niemieckiego C1-1', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-C1-1/Niemiecki-C1-1.jpg', '2020-01-22 21:07:46', 1),
(10, 'Kurs niemieckiego C1-2', 'Kurs niemieckiego ', 30, 'zdjecia/Niemiecki-C1-2/Niemiecki-C1-2.jpg', '2020-01-22 21:08:14', 1),
(11, 'Kurs angielskiego A1-1', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-A1-1/Angielski-A1-1.jpg', '2020-01-22 21:15:57', 4),
(12, 'Kurs angielskiego A1-2', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-A1-2/Angielski-A1-2.jpg', '2020-01-22 21:15:57', 4),
(13, 'Kurs angielskiego A2-1', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-A2-1/Angielski-A2-1.jpg', '2020-01-22 21:15:57', 4),
(14, 'Kurs angielskiego A2-2', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-A2-2/Angielski-A2-2.jpg', '2020-01-22 21:15:57', 4),
(15, 'Kurs angielskiego B2-1', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-B2-1/Angielski-B2-1.jpg', '2020-01-22 21:15:57', 4),
(16, 'Kurs angielskiego B2-2', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-B2-2/Angielski-B2-2.jpg', '2020-01-22 21:15:57', 4),
(18, 'Kurs angielskiego B1-1', 'Kurs angielskiego', 30, 'zdjecia/Angielski-B1-1/Angielski-B1-1.jpg', '2020-05-02 22:07:03', 4),
(19, 'Kurs angielskiego B1-2', 'Kurs angielskiego', 30, 'zdjecia/Angielski-B1-2/Angielski-B1-2.jpg', '2020-05-02 22:07:47', 4),
(20, 'Kurs angielskiego C1-1', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-C1-1/Angielski-C1-1.jpg', '2020-01-22 21:15:57', 4),
(21, 'Kurs angielskiego C1-2', 'Kurs angielskiego ', 30, 'zdjecia/Angielski-C1-2/Kurs-angielskiego-C1-2.jpg', '2020-05-07 23:06:45', 4),
(22, 'Kurs angielskiego - Specjalistyczny dla informatyków', 'Kurs dla specjalistów z branży IT', 60, 'zdjecia/specjalistyczne-dla-informatykow/angielski-dla-informatykow.jpg', '2020-05-10 13:59:42', 5),
(23, 'Kurs niemieckiego- Specjalistyczny dla informatyków', 'Kurs dla specjalistów z branży IT', 60, 'zdjecia/specjalistyczne-dla-informatykow/niemiecki-dla-informatykow.jpg', '2020-05-10 14:03:21', 6);

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
(101, 'Język niemiecki A1-1 lekcja-1', 'Podstawowe zagadnienia', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 1),
(102, 'Język niemiecki A1-lekcja-2', 'Podstawowe zagadnienia', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 2),
(103, 'Język niemiecki A1-lekcja-3', 'Podstawowe zagadnienia', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 3),
(104, 'Język niemiecki A1-lekcja-5', 'Podstawowe zagadnienia', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 4),
(118, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 5),
(119, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 6),
(120, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 7),
(121, 'Język niemiecki A1-lekcja-2', 'Podstawowe zagadnienia	', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 8),
(122, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 9),
(123, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Niemiecki-A1-1/Deutsch-1.pdf', 10),
(124, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 11),
(125, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagadnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 12),
(126, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagawdnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 13),
(127, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagawdnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 14),
(128, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagawdnienia	', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 15),
(129, 'Język niemiecki A1-lekcja-2	', 'Podstawowe zagawdnienia', 'pdf/Angielski-A1-1/Angielski-A1-1.pdf', 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciel`
--

CREATE TABLE `nauczyciel` (
  `nauczyciel_id` int(11) NOT NULL,
  `imie` varchar(100) NOT NULL,
  `nazwisko` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `haslo` varchar(150) NOT NULL,
  `miniaturka_zdjecia` varchar(150) DEFAULT NULL,
  `data_dolaczenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `uprawnienia` varchar(45) DEFAULT 'nauczyciel',
  `umowa_od_dnia` datetime DEFAULT NULL,
  `umowa_do_dnia` datetime DEFAULT NULL,
  `rodzaj_umowy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `nauczyciel`
--

INSERT INTO `nauczyciel` (`nauczyciel_id`, `imie`, `nazwisko`, `email`, `haslo`, `miniaturka_zdjecia`, `data_dolaczenia`, `uprawnienia`, `umowa_od_dnia`, `umowa_do_dnia`, `rodzaj_umowy`) VALUES
(131, '', '', 'nauczyciel@test.pl', '$2y$10$CfMoUbe4GvoC9ROBct0ZTOz26MznT3l4qsZXQOWlovoe9bSeiFjge', 'dd', '2020-03-20 11:50:41', 'nauczyciel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0'),
(132, 'Bartek ', 'Kowalski', 'test@nauczyciel.pl', '$2y$10$SLajqgKVr9YHSb8Ai6BBgudbcFc0hKGVju4zqyBPFyUSaxShs75FS', '', '2020-03-20 12:11:22', 'nauczyciel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');

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
  `nauczyciel_nauczyciel_id` int(11) NOT NULL,
  `adres_zamieszkania` bit(1) NOT NULL,
  `adres_zameldowania` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `nauczyciel_adres`
--

INSERT INTO `nauczyciel_adres` (`nauczyciel_adres_id`, `miasto`, `kod_pocztowy`, `ulica`, `kraj_zamieszkania_id`, `nauczyciel_nauczyciel_id`, `adres_zamieszkania`, `adres_zameldowania`) VALUES
(143, 'Wrocław', '53-319', 'aa', 2, 131, b'0', b'0'),
(144, 'Wrocław', '52-222', 'Hallera', 2, 132, b'0', b'0');

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
  `student_student_id` int(11) DEFAULT NULL,
  `kurs_kurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `opinia`
--

INSERT INTO `opinia` (`opinia_id`, `tytul`, `opis`, `ocena`, `data_wystawienia`, `student_student_id`, `kurs_kurs_id`) VALUES
(37, 'Super kurs', 'Bardzo chciałabym podziękować Szkole za dobre materiały do nauczania on-line oraz za pomyślne ukończenie mojego kursu i certyfikat.', 4, '2020-03-21 15:19:31', 32, 1),
(40, 'Polecam', 'Dziękuję za bardzo ciekawy kurs. Super forma nauki, z której można wynieść trochę ciekawej wiedzy.', 5, '2020-03-22 12:45:40', 18, 1),
(41, 'Jestem zadowolony', 'Całość kursu jest profesjonalnie przygotowana. Platforma jest prosta i wygodna w obsłudze.', 4, '2020-03-22 12:45:40', 18, 2),
(42, 'Super', 'Muszę przyznać, że jestem bardzo zadowolona zarówno z jakości kursów, jak i obsługi.', 5, '2020-03-22 12:45:40', 18, 3),
(43, 'Polecam zdecydowanie', 'Bardzo chciałabym podziękować Szkole za dobre materiały do nauczania on-line oraz za pomyślne ukończenie mojego kursu i certyfikat.', 5, '2020-03-22 12:45:40', 18, 4),
(44, 'dobry kurs ', 'Całość kursu jest profesjonalnie przygotowana.', 5, '2020-03-22 12:45:40', 18, 5),
(45, 'Jestem zadowolony ', 'Platforma jest prosta i wygodna w obsłudze. ', 5, '2020-03-22 12:45:40', 18, 6),
(46, 'dobry kurs ', 'Super forma nauki, z której można wynieść trochę ciekawej wiedzy. ', 5, '2020-03-22 12:45:40', 18, 7),
(47, 'Polecam', 'Dziękuję za bardzo ciekawy kurs.', 5, '2020-03-22 12:45:40', 18, 8),
(48, 'dobry kurs ', 'Super forma nauki, z której można wynieść trochę ciekawej wiedzy. ', 4, '2020-03-22 12:45:40', 18, 9),
(49, 'Polecam', 'Osobiście oceniam kurs bardzo dobrze', 5, '2020-03-22 12:45:40', 18, 10),
(50, 'Super', 'Kurs okazał się bardzo interesujący', 4, '2020-03-22 12:45:40', 18, 11),
(51, 'Zdecydowanie polecam', 'Kurs zawierał dużo cennych i ciekawych zagadnień.', 4, '2020-03-22 12:45:40', 18, 12),
(52, 'Fajni nauczyciele ', 'Prowadząca była bardzo miła i kompetentna.', 5, '2020-03-22 12:45:40', 18, 13),
(53, 'Dobra obsługa', 'Natychmiastowe reakcje na każde zgłoszone zapytanie', 5, '2020-03-22 12:45:40', 18, 14),
(54, 'Polecam', 'Nowoczesny i wygodny sposób to Kursy on-line', 4, '2020-03-22 12:45:40', 18, 15),
(55, 'Zdecydowany pozytyw', 'Skondensowana wiedza w przystępnej cenie.', 5, '2020-03-22 12:45:40', 18, 16),
(59, 'Ekstra kurs', 'Na pewno będę zaglądała na Państwa stronkę i w przyszłości skorzystam jeszcze z Waszej oferty.', 5, '2020-03-22 14:02:11', 19, 1),
(63, 'Fajny kurs', 'Dziękuję za bardzo ciekawy kurs.', 5, '2020-05-08 10:21:57', 32, 3),
(64, 'Bardzo dobry kurs', 'Polecam', 5, '2020-05-08 12:31:50', 32, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `imie` varchar(100) DEFAULT NULL,
  `nazwisko` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `haslo` varchar(150) NOT NULL,
  `miniaturka_zdjecia` varchar(150) DEFAULT NULL,
  `data_dolaczenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `uprawnienia` varchar(45) NOT NULL DEFAULT 'student',
  `nr_telefonu` varchar(20) DEFAULT NULL,
  `data_zamkniecia` timestamp NULL DEFAULT NULL,
  `konto_premium` bit(1) DEFAULT b'0',
  `premium_do_dnia` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `student`
--

INSERT INTO `student` (`student_id`, `imie`, `nazwisko`, `email`, `haslo`, `miniaturka_zdjecia`, `data_dolaczenia`, `uprawnienia`, `nr_telefonu`, `data_zamkniecia`, `konto_premium`, `premium_do_dnia`) VALUES
(18, 'Dawid', 'Marian', 'test@test4.pl', '$2y$10$yUcpb/Sscdmsd5GpNKVSOOn89Nf7NaFi40fxQaKAZ2Gc7TAUg0ZmW', 'zdjecia/dawid.jpggg', '2020-02-09 20:52:39', 'admin', NULL, NULL, b'0', NULL),
(19, 'Wojtek', 'Kowalski', 'test@test.pl', '$2y$10$xlgmp8ZCXeUJ5Yv43lF2KeE546U4AtSQzlPbII0y/KxsAh2wsnTvy', 'zdjecia/dawid.jpg', '2020-02-28 21:54:18', 'student', NULL, NULL, b'0', NULL),
(32, 'Marek', 'Bierotowski', 'student@test.pl', '$2y$10$auc2e5uk9kmoaxOO5LDO9OsexuY8Mxcr8X7f.9GD5rkAMZNU2MWjq', 'zdjecia/marek.jpg', '2020-03-21 15:17:18', 'student', NULL, NULL, b'0', NULL);

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
(37, 'Warszawa', '48-319', 'Kasprowicza 18/1', 2, 18),
(39, 'Kraków', '61-220', 'Powstańców Wielkopolskich 55/1', 2, 19),
(42, 'Wrocław', '53-319', 'Powstańców Śląskich 212/33', 2, 32);

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
(1, 32, NULL, '2020-03-21 17:20:50', NULL, b'0', b'0'),
(2, 19, NULL, '2020-03-19 21:13:58', NULL, b'0', b'0'),
(3, 32, NULL, '2020-05-08 10:53:27', NULL, b'0', b'0'),
(4, 19, NULL, '2020-03-19 21:17:56', NULL, b'0', b'0'),
(4, 32, NULL, '2020-05-08 14:30:48', NULL, b'0', b'0'),
(6, 19, NULL, '2020-03-19 21:17:56', NULL, b'0', b'0'),
(7, 32, NULL, '2020-03-21 20:18:45', NULL, b'0', b'0'),
(9, 32, NULL, '2020-03-21 20:18:45', NULL, b'0', b'0'),
(10, 32, NULL, '2020-03-21 17:27:46', NULL, b'0', b'0'),
(11, 19, NULL, '2020-03-20 18:13:36', NULL, b'0', b'0'),
(11, 32, NULL, '2020-03-21 16:55:18', NULL, b'0', b'0'),
(16, 18, NULL, '2020-03-19 21:17:38', NULL, b'0', b'0'),
(20, 19, NULL, '2020-03-20 23:58:40', NULL, b'0', b'0');

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
  MODIFY `fiszki_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `kategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `kraj_zamieszkania`
--
ALTER TABLE `kraj_zamieszkania`
  MODIFY `kraj_zamieszkania_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `kurs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
  MODIFY `nauczyciel_adres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT dla tabeli `opinia`
--
ALTER TABLE `opinia`
  MODIFY `opinia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT dla tabeli `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `student_adres`
--
ALTER TABLE `student_adres`
  MODIFY `student_adres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  ADD CONSTRAINT `fk_opinia_student1` FOREIGN KEY (`student_student_id`) REFERENCES `student` (`student_id`) ON DELETE SET NULL ON UPDATE SET NULL;

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
