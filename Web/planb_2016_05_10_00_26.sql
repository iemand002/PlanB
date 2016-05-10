-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 10 mei 2016 om 00:26
-- Serverversie: 5.5.49-0ubuntu0.14.04.1
-- PHP-versie: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `planb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `antwoorden`
--

DROP TABLE IF EXISTS `antwoorden`;
CREATE TABLE IF NOT EXISTS `antwoorden` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vraag_id` int(10) unsigned NOT NULL,
  `antwoord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aantal_gekozen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `antwoorden_vraag_id_foreign` (`vraag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gevolgde_projecten`
--

DROP TABLE IF EXISTS `gevolgde_projecten`;
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
-- Tabelstructuur voor tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden uitgevoerd voor tabel `migrations`
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
('2016_05_08_172750_add_user_id_velden_bij_projecten_en_milestones', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `milestones`
--

DROP TABLE IF EXISTS `milestones`;
CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locatie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving` text COLLATE utf8_unicode_ci NOT NULL,
  `afbeelding` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `milestones`
--

INSERT INTO `milestones` (`id`, `naam`, `locatie`, `beschrijving`, `afbeelding`, `likes`, `dislikes`, `project_id`, `user_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Bespreken Ringland', 'ring antwerpen', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum\n            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet\n            id illo nobis qui.', '/Grote_Markt_Antwerpen.jpg', 25, 12, 1, 1, 'bespreken-ringland', '2016-05-09 22:24:07', '2016-05-09 22:24:07'),
(2, 'Uittekenen plannen', 'ring antwerpen', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum\n            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet\n            id illo nobis qui.', '/Grote_Markt_Antwerpen.jpg', 50, 9, 1, 1, 'uittekenen-plannen', '2016-05-09 22:24:07', '2016-05-09 22:24:07'),
(3, 'Uitkiezen bomen', 'groenplaats', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum\n            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet\n            id illo nobis qui.', '/Grote_Markt_Antwerpen.jpg', 18, 1, 2, 1, 'uitkiezen-bomen', '2016-05-09 22:24:07', '2016-05-09 22:24:07');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecten`
--

DROP TABLE IF EXISTS `projecten`;
CREATE TABLE IF NOT EXISTS `projecten` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving` text COLLATE utf8_unicode_ci NOT NULL,
  `publish_till` datetime NOT NULL,
  `publish_from` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thema_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projecten_thema_id_foreign` (`thema_id`),
  KEY `projecten_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `projecten`
--

INSERT INTO `projecten` (`id`, `naam`, `beschrijving`, `publish_till`, `publish_from`, `slug`, `created_at`, `updated_at`, `thema_id`, `user_id`) VALUES
(1, 'Ringland', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum\n            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet\n            id illo nobis qui.', '2016-06-10 00:24:07', '2016-05-10 00:24:07', 'ringland', '2016-05-09 22:24:07', '2016-05-09 22:24:07', 3, 1),
(2, 'Bomen op de Groenplaats', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum\n            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet\n            id illo nobis qui.', '2016-06-10 00:24:07', '2016-05-10 00:24:07', 'bomen-op-de-groenplaats', '2016-05-09 22:24:07', '2016-05-09 22:24:07', 2, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `themas`
--

DROP TABLE IF EXISTS `themas`;
CREATE TABLE IF NOT EXISTS `themas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `themas`
--

INSERT INTO `themas` (`id`, `naam`, `beschrijving`, `created_at`, `updated_at`) VALUES
(1, 'Natuur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum\n            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet\n            id illo nobis qui.', '2016-05-09 22:24:07', '2016-05-09 22:24:07'),
(2, 'Infrastructuur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum\n            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet\n            id illo nobis qui.', '2016-05-09 22:24:07', '2016-05-09 22:24:07'),
(3, 'Mobiliteit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum\n            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet\n            id illo nobis qui.', '2016-05-09 22:24:07', '2016-05-09 22:24:07');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `admin`, `name`, `surname`, `geslacht`, `geboortedatum`, `created_at`, `updated_at`) VALUES
(1, 'ruud.lamers@live.nl', '$2y$10$P/lr1UrEb.Iki4PIi6IjsOWNSUFWF6V3J7DZJFq35to7uo1xK5FBi', NULL, 1, 'Ruud', 'Lamers', 'man', '1993-07-07', '2016-05-09 22:24:07', '2016-05-09 22:24:07');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vragen`
--

DROP TABLE IF EXISTS `vragen`;
CREATE TABLE IF NOT EXISTS `vragen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `milestone_id` int(10) unsigned NOT NULL,
  `vraag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vragen_milestone_id_foreign` (`milestone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `antwoorden`
--
ALTER TABLE `antwoorden`
  ADD CONSTRAINT `antwoorden_vraag_id_foreign` FOREIGN KEY (`vraag_id`) REFERENCES `vragen` (`id`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `gevolgde_projecten`
--
ALTER TABLE `gevolgde_projecten`
  ADD CONSTRAINT `gevolgde_projecten_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gevolgde_projecten_gebruiker_id_foreign` FOREIGN KEY (`gebruiker_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `milestones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `milestones_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`id`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `projecten`
--
ALTER TABLE `projecten`
  ADD CONSTRAINT `projecten_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `projecten_thema_id_foreign` FOREIGN KEY (`thema_id`) REFERENCES `themas` (`id`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `vragen`
--
ALTER TABLE `vragen`
  ADD CONSTRAINT `vragen_milestone_id_foreign` FOREIGN KEY (`milestone_id`) REFERENCES `milestones` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
