-- Data Base

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

-- Articles
DROP TABLE IF EXISTS `im_articles`;
CREATE TABLE `im_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `posted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `permalink` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `marker` tinyint(1) NOT NULL,
  `draft` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Categories
DROP TABLE IF EXISTS `im_categories`;
CREATE TABLE `im_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Pages
DROP TABLE IF EXISTS `im_pages`;
CREATE TABLE `im_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '1',
  `route` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth` int(11) NOT NULL DEFAULT '0',
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listed` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_pages` (`id`, `uid`, `title`, `description`, `keywords`, `header`, `content`, `footer`, `created_at`, `updated_at`, `status`, `route`, `template`, `auth`, `users`, `listed`) VALUES
(1,	'soon',	'Volveremos pronto',	'',	'',	'Página en construcción',	'Estamos trabajando para mejorar, volveremos pronto!',	'',	'2015-10-11 18:52:58',	'2015-10-11 17:52:58',	1,	'soon',	'',	0,	'',	0),
(2,	'maintenance',	'Página en mantenimiento',	'',	'',	'Lo sentimos, estamos bajo mantenimiento.',	'Volveremos dentro de muy poco.',	'',	'2015-09-14 04:23:02',	'2015-09-14 03:23:02',	1,	'maintenance',	'',	0,	'',	0),
(3,	'e404',	'404 - Página no encontrada',	'',	'',	'',	'Lo sentimos pero la página que estás buscando no pudo ser encontrada...',	'',	'2015-09-14 01:30:48',	'0000-00-00 00:00:00',	1,	'404',	'',	0,	'',	0),
(4,	'e500',	'500 - Ha ocurrido un error',	'',	'',	'',	'Lo sentimos pero ha ocurrido un error interno en nuestro servidor...',	'',	'2015-09-14 01:52:18',	'0000-00-00 00:00:00',	1,	'500',	'',	0,	'',	0);

-- Pictures
DROP TABLE IF EXISTS `im_pictures`;
CREATE TABLE `im_pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `md5` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `url` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `exif` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_pictures` (`id`, `uid`, `md5`, `content_type`, `width`, `height`, `url`, `created_at`, `updated_at`, `exif`, `group`) VALUES
(0,	'avatar',	'3d50e83f7586325304f88584f699ad33',	'image/png',	147,	147,	'3d50e83f7586325304f88584f699ad33.png',	'2015-09-09 18:33:15',	'2015-09-09 18:33:15',	'null',	'UserProfile'),
(1,	'55f632283dfe8',	'2cb8bdf02fe62b3d548c865606c1ffde',	'image/jpeg',	1920,	1280,	'2cb8bdf02fe62b3d548c865606c1ffde.jpg',	'2015-09-14 01:34:17',	'2015-09-14 01:34:17',	'{\"FileName\":\"2cb8bdf02fe62b3d548c865606c1ffde.jpg\",\"FileDateTime\":1442198056,\"FileSize\":342745,\"FileType\":2,\"MimeType\":\"image\\/jpeg\",\"SectionsFound\":\"\",\"COMPUTED\":{\"html\":\"width=\\\"1920\\\" height=\\\"1280\\\"\",\"Height\":1280,\"Width\":1920,\"IsColor\":1}}',	'Cover');

-- Settings
DROP TABLE IF EXISTS `im_settings`;
CREATE TABLE `im_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `updatedBy`) VALUES
(0,	'page.status',	'soon',	'2015-10-11 18:53:06',	'2015-10-11 17:53:06',	'55f089d48beb5');

-- Subscribers
DROP TABLE IF EXISTS `im_subscribers`;
CREATE TABLE `im_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL,
  `recieve_newsletter` tinyint(1) NOT NULL DEFAULT '1',
  `recieve_promo` tinyint(1) NOT NULL DEFAULT '1',
  `recieve_updates` tinyint(1) NOT NULL DEFAULT '1',
  `recieve_alerts` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tags
DROP TABLE IF EXISTS `im_tags`;
CREATE TABLE `im_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `articles` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Users
DROP TABLE IF EXISTS `im_users`;
CREATE TABLE `im_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `im_users` (`id`, `uid`, `username`, `password`, `name`, `email`, `avatar`, `bio`, `created_at`, `updated_at`, `remember_token`, `permission`) VALUES
(0,	'561ab03c046c2',	'admin',	'$2y$10$RbqkIxoKoUFzU1WJ2A8Nr.Ulzyi.PlpLugA6Dj2QM7xmWCjUhDBsS',	'Administrador',	'admin@mail.co',	'avatar',	'',	'2015-10-11 17:53:48',	'2015-10-11 17:53:48',	'',	'{\"users\":{\"create\":true,\"edit\":true,\"delete\":true},\"notes\":{\"create\":true,\"edit\":true,\"delete\":true},\"categories\":{\"create\":true,\"edit\":true,\"delete\":true}}');

-- END
