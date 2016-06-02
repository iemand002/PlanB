-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2016 at 09:28 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `planb`
--

-- --------------------------------------------------------

--
-- Table structure for table `antwoorden`
--

CREATE TABLE IF NOT EXISTS `antwoorden` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vraag_id` int(10) unsigned NOT NULL,
  `antwoord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aantal_gekozen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `antwoorden_vraag_id_foreign` (`vraag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `antwoorden`
--

INSERT INTO `antwoorden` (`id`, `vraag_id`, `antwoord`, `aantal_gekozen`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zeer bekend', 21, '2016-06-01 19:00:34', '2016-06-01 19:02:06'),
(2, 1, 'Matig Bekend', 54, '2016-06-01 19:00:34', '2016-06-01 19:18:48'),
(3, 1, 'De Wattelhoek?', 14, '2016-06-01 19:00:34', '2016-06-01 19:03:19'),
(4, 2, 'Super!', 25, '2016-06-01 19:01:36', '2016-06-01 19:18:50'),
(5, 2, 'Neen dank u', 14, '2016-06-01 19:01:36', '2016-06-01 19:02:07'),
(6, 2, 'Geen Mening', 14, '2016-06-01 19:01:36', '2016-06-01 19:03:20'),
(7, 3, 'Dagelijks', 42, '2016-06-01 19:10:23', '2016-06-01 19:10:23'),
(8, 3, 'Weekelijks', 4, '2016-06-01 19:10:23', '2016-06-01 19:10:23'),
(9, 3, 'Heel af en toe', 5, '2016-06-01 19:10:23', '2016-06-01 19:10:23'),
(10, 3, 'Nooit', 95, '2016-06-01 19:10:23', '2016-06-01 19:10:23'),
(11, 4, 'Ja', 24, '2016-06-01 19:10:46', '2016-06-01 19:10:46'),
(12, 4, 'Nee', 42, '2016-06-01 19:10:46', '2016-06-01 19:10:46'),
(13, 5, 'Ja', 43, '2016-06-01 19:10:57', '2016-06-01 19:10:57'),
(14, 5, 'Nee', 85, '2016-06-01 19:10:57', '2016-06-01 19:10:57'),
(15, 6, 'Nee, ik heb dubbele beglazing', 67, '2016-06-01 19:12:29', '2016-06-01 19:12:29'),
(16, 6, 'Nee, ik ben een diepe slaper', 46, '2016-06-01 19:12:29', '2016-06-01 19:12:29'),
(17, 6, 'Ik woon in de stad, dit hoort erbij', 64, '2016-06-01 19:12:29', '2016-06-01 19:12:29'),
(18, 6, 'Ja, ik haat geluidsoverlast', 368, '2016-06-01 19:12:29', '2016-06-01 19:12:29'),
(19, 7, 'Ja', 4, '2016-06-01 19:14:15', '2016-06-01 19:14:15'),
(20, 7, 'Nee', 68, '2016-06-01 19:14:15', '2016-06-01 19:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `gevolgde_projecten`
--

CREATE TABLE IF NOT EXISTS `gevolgde_projecten` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gebruiker_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gevolgde_projecten_gebruiker_id_foreign` (`gebruiker_id`),
  KEY `gevolgde_projecten_project_id_foreign` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_12_151235_create_antwoorden_table', 1),
('2016_04_12_151235_create_gebruikers_table', 1),
('2016_04_12_151235_create_gevolgde_projecten_table', 1),
('2016_04_12_151235_create_milestones_table', 1),
('2016_04_12_151235_create_projecten_table', 1),
('2016_04_12_151235_create_themas_table', 1),
('2016_04_12_151235_create_vragen_table', 1),
('2016_04_12_151245_create_foreign_keys', 1),
('2016_04_15_165330_add_slug_projecten_table', 1),
('2016_04_15_165707_remove_milestone_int_add__slug_milestones_table', 1),
('2016_04_22_132718_remove_tehma_milestones_table', 1),
('2016_04_22_132757_add_tehma_projecten_table', 1),
('2016_04_26_155038_add_beschijving_projecten_table', 1),
('2016_05_06_001912_remove_geslacht_enum_gebruikers_table', 1),
('2016_05_06_001948_rename_gebruikers_table_to_users_table', 1),
('2016_05_06_002015_rename_columns_users_table', 1),
('2016_05_06_002039_readd_geslacht_users_table', 1),
('2016_05_08_172750_add_user_id_velden_bij_projecten_en_milestones', 1),
('2016_05_11_181003_add_publish_at_milestones_table', 1),
('2016_05_13_101517_edit_locatie_milestones_table', 1),
('2016_05_18_140954_create_sections_table', 1),
('2016_05_18_140954_create_types_table', 1),
('2016_05_18_161444_fk_sections_table', 1),
('2016_06_01_000147_add_slug_themas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locatie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coordinaten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving` text COLLATE utf8_unicode_ci NOT NULL,
  `afbeelding` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish_from` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish_till` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `milestones_project_id_foreign` (`project_id`),
  KEY `milestones_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `naam`, `locatie`, `coordinaten`, `beschrijving`, `afbeelding`, `publish_from`, `publish_till`, `likes`, `dislikes`, `project_id`, `user_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Het definitieve ontwerp voor de Halen- en Viséstraat', 'Halenstraat, Antwerpen, België', '51.227878,4.434213', 'Viséstraat\r\nViséstraat als woonstraat\r\n\r\nDe Viséstraat wordt een woonstraat. U kan ook gemakkelijker naar Park Spoor Noord gaan.\r\n\r\nDe Straat wordt een zone 30. De weg wordt smaller. Zo gaan auto''s trager rijden. Het voetpad aan ke kant van de huizen wordt breder. Op de kruispunten komen verhoogde zebrapaden naar het park. Er komen ook bomen. Zo vallen de kruispunten meer op.', '/Halenstraat_na.jpg', '2016-06-01 17:32:24', '2016-06-15 17:32:24', 50, 9, 1, 5, 'het-definitieve-ontwerp-voor-de-halen-en-visestraat', '2016-06-01 17:32:24', '2016-06-01 18:09:14'),
(2, 'Aanpassingen aan het ontwerp op basis van inspraak', 'Halenstraat, Antwerpen, België', '51.227878,4.434213', 'In het voorjaar van 2012 toonden we de eerste plannen en het schetsontwerp aan de bewoners. Dat gebeurde in een hoorzitting, maar ook in het park, in de moskee en online.\r\n\r\nWe luistereden toen naar de opmerkingen van de bewoners en hebben de plannen veranderd.', '/Halenstraat_na.jpg', '2016-06-01 17:32:24', '2016-06-15 17:32:24', 18, 1, 1, 5, 'aanpassingen-aan-het-ontwerp-op-basis-van-inspraak', '2016-06-01 17:32:24', '2016-06-01 18:08:31'),
(3, 'Conceptplan Distelhoek', 'Oortbroek, Merksem, Antwerp, Belgium', '51.250931,4.43183', 'Het petanqueterrein (1) aan de zijde van Oortbroek blijft liggen. Een vernieuwd pad brengt bezoekers naar het seniorenlokaal. Naast het seniorenlokaal aan de zijde van Oortbroek wordt een nieuw trapveld (2) voorzien. Het trapveld is onverhard. De ondergrond is gras.\r\n\r\nLangs de zijde van Ganzemate wordt het basketbalterrein (3) vernieuwd op een verharde ondergrond. In deze zone staat nu een overdekte schuilplaats (4) die eventueel kan worden vervangen door een nieuwe. Aan het baskebalterrein komt een plek voor calisthenics (5). Dit is een vorm van buitenfitness waarbij u gebruik maakt van uw eigen lichaamsgewicht. Door middel van oefeningen zoals springen, optrekken en squats doet u aan spieropbouw. Dit kan overal worden beoefend op eigen tempo, bijvoorbeeld aan een fiets- of klimrek. Naast het basketterrein aan de zijde van Ganzemate wordt een nieuw skateterrein (6) voorzien. Een groep jonge skaters heeft al nagedacht en ideeën gegeven rond dit terrein. Er wordt een betonnen ondergrond in één geheel voorzien zonder losse toestellen. Het gazon errond wordt glooiend aangelegd zodat het geheel mooi in het landschap past en het gazon aansluit aan het terrein. Er werd al een "zwevend" pad aangelegd op de plaatsen waar wadi''s voorzien worden om water op te vangen. In de wadi is er wisselende waterstand afhankelijk van de regenval. \r\n\r\nAan de kruispunten van het centrale pad in kleiklinkers komen twee nieuwe zitpleintjes (7). Het geheel wordt aangekleed met extra bomen en lage beplanting zodat het een natuurlijke en sportieve uitstraling krijgt. ', '/distelhoek_fase3_knip_aangeduid_groot.jpg', '2016-06-01 18:14:23', '2017-05-05 18:10:03', 123, 54, 2, 5, 'conceptplan-distelhoek', '2016-06-01 18:14:23', '2016-06-01 18:14:23'),
(4, 'Begin Fase', 'Sint-Andriesplaats, Antwerp, Belgium', '51.214926,4.395936', 'District Antwerpen wil de Pachtstraat en het voetpad en rijbaan van de Sint-Andriesplaats vernieuwen.\r\nDe projectdefinitie werd deze zomer goedgekeurd door het districtscollege. \r\n\r\nOversteken wordt veiliger gemaakt door de stoepen ter hoogte van de zijwegen te verbreden. Het plein zelf wordt niet heraangelegd. Het district zal de inrichting van het plein wel herbekijken. Het straatmeubilair en plantvakken zullen worden vernieuwd en herschikt. De bomen blijven behouden. In september 2015 konden bewoners hun mening geven over het concept.\r\n\r\nInfo over dit voorgestelde concept, opmerkingen van de bewoners hierop en een antwoord van de ontwerpers vindt u hieronder bij Documenten (klik op Meer om alles te tonen). \r\n\r\nMede op basis van de opmerkingen van bewoners werd het ontwerp nu aangepast. Ook dit herwerkte plan - het zogenaamde voorontwerp - is nu klaar. U vindt het terug bij Documenten.', '/StAndriesplaats.jpg', '2016-06-01 18:21:19', '2017-03-10 19:17:48', 354, 53, 3, 5, 'begin-fase', '2016-06-01 18:21:19', '2016-06-01 19:20:32'),
(5, 'Van de Appelmansstraat tot de oprit van Mediamarkt', 'Appelmansstraat, Antwerp, Belgium', '51.216445,4.417266', 'Van de Appelmansstraat tot de oprit van Mediamarkt. (13/06 - 17/06)', '/foto_stadindialoog.png', '2016-06-01 18:29:14', '2016-06-01 18:25:43', 453, 1504, 4, 5, 'van-de-appelmansstraat-tot-de-oprit-van-mediamarkt', '2016-06-01 18:29:14', '2016-06-01 18:29:14'),
(6, 'Lange Dijkstraat', 'Lange Dijkstraat, Antwerp, Belgium', '51.227946,4.418788', 'De Lange Dijkstraat ligt op een belangrijke fietsas. Het district Antwerpen wil van deze straat een meer fietsvriendelijke straat maken. \r\n\r\nNa de eerste voorstelling van het concept voor de Lange Dijkstraat als fietsstraat, hebben de ontwerpers dit verder uitgewerkt in een voorontwerp.', '/foto_0.jpg', '2016-05-30 18:45:10', '2016-05-30 18:45:10', 0, 0, 5, 5, 'lange-dijkstraat', '2016-06-01 18:49:58', '2016-06-01 19:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projecten`
--

CREATE TABLE IF NOT EXISTS `projecten` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving` text COLLATE utf8_unicode_ci NOT NULL,
  `publish_till` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `publish_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thema_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projecten_thema_id_foreign` (`thema_id`),
  KEY `projecten_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projecten`
--

INSERT INTO `projecten` (`id`, `naam`, `beschrijving`, `publish_till`, `publish_from`, `slug`, `created_at`, `updated_at`, `thema_id`, `user_id`) VALUES
(1, 'Halenstraat', 'Na het afronden van de Viséstraat, wordt ook de Halenstraat volledig heraangelegd. Zo wordt de nieuwe Halenstraat een stuk comfortabeler voor fietsers. \r\n\r\nTiming en hinder\r\n\r\nDe werken in de Halenstraat starten op 20 juni en zullen, afhankelijk van onvoorziene omstandigheden duren tot eind oktober. Gedurende heel deze periode zal er geen doorgaand verkeer mogelijk zijn.\r\n\r\nTussen 1 juli en 15 augustus zal het kruispunt Schijnpoort volledig worden afgesloten in verband met werken aan de Noordersingel. In deze periode rijdt er ook geen tram door de Halenstraat. Voor meer informatie over deze werken kan u terecht op www.noordersingel.be', '2016-07-01 17:32:24', '2016-05-25 17:32:24', 'halenstraat', '2016-06-01 17:32:24', '2016-06-01 17:32:24', 1, NULL),
(2, 'Heraanleg Distelhoek Fase 3', 'Nadat Distelhoek een nieuw speelplein, speelbos en nieuwe paden kreeg, wordt nu het sportterrein opnieuw ingericht. Tijdens de zomer van 2015 werd een uitgebreide bevraging bij bewoners en gebruikers uitgevoerd. Op basis van deze bevraging werd het concept uitgewerkt. U kan nu uw mening geven over dit concept', '2016-11-05 23:00:00', '2016-05-31 22:00:00', 'heraanleg-distelhoek-fase-3', '2016-06-01 18:14:23', '2016-06-01 18:14:23', 2, 5),
(3, 'Heraanleg Sint Andriesplaats en Pachtstraat', 'District Antwerpen wil de Pachtstraat en het voetpad en rijbaan van de Sint-Andriesplaats vernieuwen.\r\nDe projectdefinitie werd deze zomer goedgekeurd door het districtscollege. \r\n\r\nOversteken wordt veiliger gemaakt door de stoepen ter hoogte van de zijwegen te verbreden. Het plein zelf wordt niet heraangelegd. Het district zal de inrichting van het plein wel herbekijken. Het straatmeubilair en plantvakken zullen worden vernieuwd en herschikt. De bomen blijven behouden. In september 2015 konden bewoners hun mening geven over het concept.\r\n\r\nInfo over dit voorgestelde concept, opmerkingen van de bewoners hierop en een antwoord van de ontwerpers vindt u hieronder bij Documenten (klik op Meer om alles te tonen). \r\n\r\nMede op basis van de opmerkingen van bewoners werd het ontwerp nu aangepast. Ook dit herwerkte plan - het zogenaamde voorontwerp - is nu klaar. U vindt het terug bij Documenten.', '2016-12-04 23:00:00', '2016-05-31 22:00:00', 'heraanleg-sint-andriesplaats-en-pachtstraat', '2016-06-01 18:21:19', '2016-06-01 18:21:19', 3, 5),
(4, 'Heraanleg Vestingstraat', 'Op 1 augustus 2016 starten de werken aan de riolering en het wegdek in de Vestingstraat.\r\nOp dinsdag 28 juni kan u op het kruispunt Vestingstraat - Pelikaanstraat meer info bekomen (16u30 - 19u30).\r\n\r\nDe voorbereidende nutswerken starten op 13 juni.', '2017-01-04 23:00:00', '2016-05-31 22:00:00', 'heraanleg-vestingstraat', '2016-06-01 18:29:14', '2016-06-01 18:29:14', 3, 5),
(5, 'Lange Dijkstraat', 'De Lange Dijkstraat ligt op een belangrijke fietsas. Het district Antwerpen wil van deze straat een meer fietsvriendelijke straat maken. \r\n\r\nNa de eerste voorstelling van het concept voor de Lange Dijkstraat als fietsstraat, hebben de ontwerpers dit verder uitgewerkt in een voorontwerp.', '2016-11-29 23:00:00', '2016-05-31 22:00:00', 'lange-dijkstraat', '2016-06-01 18:49:58', '2016-06-01 18:49:58', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tekst` text COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `milestone_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_type_id_foreign` (`type_id`),
  KEY `sections_milestone_id_foreign` (`milestone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `tekst`, `url`, `position`, `type_id`, `milestone_id`, `created_at`, `updated_at`) VALUES
(1, 'Aanpassingen aan het ontwerp op basis van inspraak', '', 0, 1, 2, '2016-06-01 18:08:31', '2016-06-01 18:08:31'),
(2, '<div>In het voorjaar van 2012 toonden we de eerste plannen en het schetsontwerp aan de bewoners. Dat gebeurde in een hoorzitting, maar ook in het park, in de moskee en online.</div><div><br></div><div>We luistereden toen naar de opmerkingen van de bewoners en hebben de plannen veranderd.</div>', '/Halenstraat_na.jpg', 1, 3, 2, '2016-06-01 18:08:31', '2016-06-01 18:08:31'),
(3, 'Header h1', '', 0, 1, 1, '2016-06-01 18:09:14', '2016-06-01 18:09:14'),
(4, '', '/Halenstraat_na.jpg', 1, 2, 1, '2016-06-01 18:09:14', '2016-06-01 18:09:14'),
(5, '<div>Viséstraat</div><div>Viséstraat als woonstraat</div><div><br></div><div>De Viséstraat wordt een woonstraat. U kan ook gemakkelijker naar Park Spoor Noord gaan.</div><div><br></div><div>De Straat wordt een zone 30. De weg wordt smaller. Zo gaan auto''s trager rijden. Het voetpad aan ke kant van de huizen wordt breder. Op de kruispunten komen verhoogde zebrapaden naar het park. Er komen ook bomen. Zo vallen de kruispunten meer op.</div>', '', 2, 5, 1, '2016-06-01 18:09:14', '2016-06-01 18:09:14'),
(6, 'Conceptplan Distelhoek', '', 0, 1, 3, '2016-06-01 18:14:23', '2016-06-01 18:14:23'),
(7, '', '/distelhoek_fase3_knip_aangeduid_groot.jpg', 1, 2, 3, '2016-06-01 18:14:23', '2016-06-01 18:14:23'),
(8, '<div>Het petanqueterrein (1) aan de zijde van Oortbroek blijft liggen. Een vernieuwd pad brengt bezoekers naar het seniorenlokaal. Naast het seniorenlokaal aan de zijde van Oortbroek wordt een nieuw trapveld (2) voorzien. Het trapveld is onverhard. De ondergrond is gras.</div><div><br></div><div>Langs de zijde van Ganzemate wordt het basketbalterrein (3) vernieuwd op een verharde ondergrond. In deze zone staat nu een overdekte schuilplaats (4) die eventueel kan worden vervangen door een nieuwe. Aan het baskebalterrein komt een plek voor calisthenics (5). Dit is een vorm van buitenfitness waarbij u gebruik maakt van uw eigen lichaamsgewicht. Door middel van oefeningen zoals springen, optrekken en squats doet u aan spieropbouw. Dit kan overal worden beoefend op eigen tempo, bijvoorbeeld aan een fiets- of klimrek. Naast het basketterrein aan de zijde van Ganzemate wordt een nieuw skateterrein (6) voorzien. Een groep jonge skaters heeft al nagedacht en ideeën gegeven rond dit terrein. Er wordt een betonnen ondergrond in één geheel voorzien zonder losse toestellen. Het gazon errond wordt glooiend aangelegd zodat het geheel mooi in het landschap past en het gazon aansluit aan het terrein. Er werd al een "zwevend" pad aangelegd op de plaatsen waar wadi''s voorzien worden om water op te vangen. In de wadi is er wisselende waterstand afhankelijk van de regenval.&nbsp;</div><div><br></div><div>Aan de kruispunten van het centrale pad in kleiklinkers komen twee nieuwe zitpleintjes (7). Het geheel wordt aangekleed met extra bomen en lage beplanting zodat het een natuurlijke en sportieve uitstraling krijgt.&nbsp;</div>', '', 2, 5, 3, '2016-06-01 18:14:23', '2016-06-01 18:14:23'),
(9, 'Sint-Andriesplaats', '', 0, 1, 4, '2016-06-01 18:21:19', '2016-06-01 18:22:33'),
(11, '<p style="margin-bottom: 1.672em; padding: 0px; border: 0px none; outline: none 0px; vertical-align: baseline; font-stretch: inherit; font-size: 16px; line-height: 24px; font-family: ''Droid Sans'', arial, serif; color: rgb(0, 0, 0); background-image: none; background-attachment: scroll; background-size: initial; background-origin: initial; background-clip: initial; background-position: 0px 0px; background-repeat: repeat;">District Antwerpen wil de Pachtstraat en het voetpad en rijbaan van de Sint-Andriesplaats vernieuwen.<br>De projectdefinitie werd deze zomer goedgekeurd door het districtscollege.</p>', '', 1, 5, 4, '2016-06-01 18:21:19', '2016-06-01 18:21:19'),
(12, '<span style="color: rgb(0, 0, 0); font-family: ''Droid Sans'', arial, serif; font-size: 16px; line-height: 24px;">Oversteken wordt veiliger gemaakt door de stoepen ter hoogte van de zijwegen te verbreden. Het plein zelf wordt niet heraangelegd. Het district zal de inrichting van het plein wel herbekijken.</span>', '/StAndriesplaats.jpg', 2, 3, 4, '2016-06-01 18:21:19', '2016-06-01 18:21:54'),
(13, '<span style="color: rgb(0, 0, 0); font-family: ''Droid Sans'', arial, serif; font-size: 16px; line-height: 24px;">Het straatmeubilair en plantvakken zullen worden vernieuwd en herschikt. De bomen blijven behouden. In september 2015 konden bewoners hun mening geven over het concept.</span>', '', 3, 5, 4, '2016-06-01 18:21:19', '2016-06-01 18:21:54'),
(14, 'Heraanleg Vestingstraat', '', 0, 1, 5, '2016-06-01 18:29:14', '2016-06-01 18:33:14'),
(16, '', '/foto_stadindialoog.png', 1, 2, 5, '2016-06-01 18:29:14', '2016-06-01 18:29:14'),
(17, '\r\n                            Van de Appelmansstraat tot de oprit van Mediamarkt. (13/06 - 17/06)', '', 2, 5, 5, '2016-06-01 18:29:14', '2016-06-01 18:29:14'),
(21, 'Lange Dijkstraat', '', 0, 1, 6, '2016-06-01 18:49:58', '2016-06-01 18:49:58'),
(22, '', '/foto_0.jpg', 1, 2, 6, '2016-06-01 18:49:58', '2016-06-01 18:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `themas`
--

CREATE TABLE IF NOT EXISTS `themas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `themas`
--

INSERT INTO `themas` (`id`, `naam`, `beschrijving`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Antwerpen Noord', 'Projecten in gebied Antwerpen Noord', 'antwerpen-noord', '2016-06-01 17:32:24', '2016-06-01 17:32:24'),
(2, 'Merksem', 'Projecten in gebied Merksem', 'merksem', '2016-06-01 17:32:24', '2016-06-01 17:32:24'),
(3, 'Antwerpen', 'Projecten in gebied Antwerpen', 'antwerpen', '2016-06-01 17:32:24', '2016-06-01 17:32:24'),
(4, 'Berchem', 'Projecten in gebied Berchem', 'berchem', '2016-06-01 17:32:24', '2016-06-01 17:32:24'),
(5, 'Hoboken', 'Projecten in gebied Hoboken', 'hoboken', '2016-06-01 17:32:24', '2016-06-01 17:32:24'),
(6, 'Wilrijk', 'Projecten in gebied Wilrijk', 'wilrijk', '2016-06-01 17:32:24', '2016-06-01 17:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `created_at`, `updated_at`, `naam`) VALUES
(1, '2016-06-01 17:32:24', '2016-06-01 17:32:24', 'h1'),
(2, '2016-06-01 17:32:24', '2016-06-01 17:32:24', 'afbeelding'),
(3, '2016-06-01 17:32:24', '2016-06-01 17:32:24', 'rechts afbeelding-links tekst'),
(4, '2016-06-01 17:32:24', '2016-06-01 17:32:24', 'links afbeelding-rechts tekst'),
(5, '2016-06-01 17:32:24', '2016-06-01 17:32:24', 'tekst');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `geslacht` enum('man','vrouw') COLLATE utf8_unicode_ci NOT NULL,
  `geboortedatum` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gebruikers_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `admin`, `name`, `surname`, `geslacht`, `geboortedatum`, `created_at`, `updated_at`) VALUES
(1, 'ruud.lamers@live.nl', '$2y$10$JcZ5bO4Ta9/UpwYNZpdiqOkmjGyToy8udGbehqwK.7tLV0d1T7Tf2', NULL, 1, 'Ruud', 'Lamers', 'man', '1993-07-07', '2016-06-01 17:32:24', '2016-06-01 17:32:24'),
(2, 'kilianvde@gmail.com', '$2y$10$qjgF7bdxzaQ4YaEBvIQ44.nk097b87i7qMBivQprsDqTJnL2grgi.', NULL, 1, 'Kilian', 'van den Eynde', 'man', '0000-00-00', '2016-06-01 17:32:24', '2016-06-01 17:32:24'),
(4, 'seppe.p@hotmail.com', '$2y$10$hELm8.LgzryH6HKdrv3CF.RsHuEc2xEngxuYiPCt.AF3PIugufPiC', NULL, 1, 'Seppe', 'Peelman', 'man', '0000-00-00', '2016-06-01 17:32:24', '2016-06-01 17:32:24'),
(5, 'vanakenk@gmail.com', '$2y$10$iKBcn9Zd0uQJK8ekfvxkz.N6Yn2yObnzJpPtp08onGGq/MG/SHicG', NULL, 1, 'Kristof', 'Van Aken', 'man', '0000-00-00', '2016-06-01 17:37:24', '2016-06-01 17:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `vragen`
--

CREATE TABLE IF NOT EXISTS `vragen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `milestone_id` int(10) unsigned NOT NULL,
  `vraag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vragen_milestone_id_foreign` (`milestone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `vragen`
--

INSERT INTO `vragen` (`id`, `milestone_id`, `vraag`, `created_at`, `updated_at`) VALUES
(1, 3, 'Hoe bekend bent u met de Distelhoek?', '2016-06-01 19:00:34', '2016-06-01 19:00:34'),
(2, 3, 'Wat vindt u van de voorstellen?', '2016-06-01 19:01:36', '2016-06-01 19:01:36'),
(3, 2, 'Hoe vaak neemt u de tram in de Halenstraat?', '2016-06-01 19:10:23', '2016-06-01 19:10:23'),
(4, 2, 'Komt u wel eens met de wagen in de Halenstraat?', '2016-06-01 19:10:46', '2016-06-01 19:10:46'),
(5, 2, 'Woont u in de Halenstraat?', '2016-06-01 19:10:57', '2016-06-01 19:10:57'),
(6, 2, 'Bent u bang van geluidsoverlast?', '2016-06-01 19:12:29', '2016-06-01 19:12:29'),
(7, 6, 'Kijkt u uit naar het project?', '2016-06-01 19:14:15', '2016-06-01 19:14:15');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antwoorden`
--
ALTER TABLE `antwoorden`
  ADD CONSTRAINT `antwoorden_vraag_id_foreign` FOREIGN KEY (`vraag_id`) REFERENCES `vragen` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `gevolgde_projecten`
--
ALTER TABLE `gevolgde_projecten`
  ADD CONSTRAINT `gevolgde_projecten_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gevolgde_projecten_gebruiker_id_foreign` FOREIGN KEY (`gebruiker_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `milestones_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `milestones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `projecten`
--
ALTER TABLE `projecten`
  ADD CONSTRAINT `projecten_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `projecten_thema_id_foreign` FOREIGN KEY (`thema_id`) REFERENCES `themas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_milestone_id_foreign` FOREIGN KEY (`milestone_id`) REFERENCES `milestones` (`id`),
  ADD CONSTRAINT `sections_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `vragen`
--
ALTER TABLE `vragen`
  ADD CONSTRAINT `vragen_milestone_id_foreign` FOREIGN KEY (`milestone_id`) REFERENCES `milestones` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
