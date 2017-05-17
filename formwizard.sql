-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2017 г., 16:03
-- Версия сервера: 5.7.16
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `formwizard`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fw_documents`
--

CREATE TABLE IF NOT EXISTS `fw_documents` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `fw_fields`
--

CREATE TABLE IF NOT EXISTS `fw_fields` (
  `id` int(11) UNSIGNED NOT NULL,
  `templates_id` int(11) UNSIGNED NOT NULL,
  `input_value` text NOT NULL,
  `input_paceholder` varchar(255) NOT NULL,
  `input_type` varchar(255) NOT NULL,
  `input_maxlength` varchar(255) NOT NULL,
  `input_form` varchar(255) NOT NULL,
  `input_formenctype` varchar(255) NOT NULL,
  `input_lable` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `fw_template`
--

CREATE TABLE IF NOT EXISTS `fw_template` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fields_id` int(11) UNSIGNED NOT NULL,
  `users_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `fw_users`
--

CREATE TABLE IF NOT EXISTS `fw_users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `fw_users`
--

INSERT INTO `fw_users` (`id`, `username`, `email`, `password`, `auth_token`, `status`, `created_at`, `updated_at`) VALUES
(3, 'maxshabl', 'maxshabl@yandex.ru', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1493967847, 1493968147);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
