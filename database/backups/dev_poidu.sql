-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 16 2022 г., 07:41
-- Версия сервера: 5.7.33
-- Версия PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dev.poidu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Заголовок',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ссылка на источник',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Логотип организатора',
  `participation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Форма участия для фронтенда',
  `price` int(11) DEFAULT NULL COMMENT 'Стоимость',
  `begin` timestamp NULL DEFAULT NULL,
  `date` char(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Дата начала для фронтенда',
  `time` char(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Время начала для фронтенда',
  `status` int(11) DEFAULT NULL COMMENT 'Статус публикации',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `title`, `url`, `logo`, `participation`, `price`, `begin`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quo tenetur ea quae aperiam rerum sunt. Esse sed ea accusantium numquam. Rem sit exercitationem et odio sunt et. Aspernatur asperiores molestias a alias.', 'http://sergeeva.net/', 'http://placeimg.com/240/240/animals', '1200 руб.', 1200, '2022-11-21 09:37:21', '21 ноября', '16:37', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39'),
(2, 'Maxime et quaerat minus ratione consectetur hic quia. Neque est quidem qui eum. Aut placeat omnis nisi cumque eius iusto. Excepturi explicabo sed voluptate doloremque.', 'http://www.lazarev.ru/necessitatibus-non-consequatur-quas-similique-iusto-dolorem', 'http://placeimg.com/240/240/animals', 'Бесплатно', NULL, '2022-11-22 21:59:00', '23 ноября', '04:59', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39'),
(3, 'Accusantium est sit soluta iure ducimus occaecati. Accusantium quidem qui amet quibusdam accusantium et voluptatem vel. Beatae veritatis aliquid veniam est sequi dolorum.', 'http://www.vinogradov.org/deserunt-omnis-et-in-autem-ducimus-in-quo.html', 'http://placeimg.com/240/240/animals', 'Бесплатно', NULL, '2022-11-20 12:08:49', '20 ноября', '19:08', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39'),
(4, 'Corrupti tempora ut autem. Praesentium nostrum repudiandae fugiat harum explicabo. Ipsa eum praesentium totam totam temporibus eum. A consequuntur a voluptas odit.', 'http://www.mikailova.com/', 'http://placeimg.com/240/240/animals', '1200 руб.', 1200, '2022-11-19 21:55:24', '20 ноября', '04:55', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39'),
(5, 'Nam velit ut voluptatem iste. Sapiente hic voluptatem occaecati. Id totam voluptatem libero in enim. Unde dicta asperiores minima unde dolorem nihil.', 'http://www.antonova.org/sint-cupiditate-qui-voluptatem', 'http://placeimg.com/240/240/animals', 'Бесплатно', NULL, '2022-11-22 14:01:32', '22 ноября', '21:01', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39'),
(6, 'Autem velit alias occaecati autem recusandae quia. Fugit facilis corporis voluptatem illo harum. Velit voluptatum nisi delectus tenetur exercitationem.', 'https://www.andreeva.com/porro-quidem-veniam-delectus-ratione-aspernatur-corporis', 'http://placeimg.com/240/240/animals', '1200 руб.', 1200, '2022-11-20 16:52:17', '20 ноября', '23:52', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39'),
(7, 'Vel sed eveniet modi omnis beatae modi laborum. Nostrum cumque eaque rerum accusamus est iste nemo dicta. Porro explicabo aut natus dolore quo adipisci ut.', 'http://kapustin.net/ex-quibusdam-odit-doloremque-debitis-quibusdam-iure-nulla.html', 'http://placeimg.com/240/240/animals', '1200 руб.', 1200, '2022-11-17 13:31:24', '17 ноября', '20:31', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39'),
(8, 'Eligendi accusantium soluta possimus ut voluptatem sit est. Ut tenetur culpa harum neque accusamus nulla.', 'https://sidorov.com/odio-iste-dolorem-aut-quas-ipsa.html', 'http://placeimg.com/240/240/animals', '1200 руб.', 1200, '2022-11-19 16:21:20', '19 ноября', '23:21', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39'),
(9, 'Autem sapiente in placeat eveniet qui debitis quas temporibus. Minus optio adipisci quaerat perferendis sed esse rem quos. Sequi vel consequatur vel qui incidunt eos.', 'http://davydov.net/', 'http://placeimg.com/240/240/animals', 'Донат', NULL, '2022-11-22 17:25:19', '23 ноября', '00:25', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39'),
(10, 'Quia numquam voluptatem est minima. Iste eum quidem deleniti debitis est rerum. Aut dolorum dolores esse nihil dignissimos magni reprehenderit. Non libero mollitia esse excepturi iste.', 'http://lobanova.ru/dignissimos-eos-natus-autem-odit-labore-pariatur-dolor', 'http://placeimg.com/240/240/animals', '1200 руб.', 1200, '2022-11-19 23:58:56', '20 ноября', '06:58', 1, '2022-11-16 04:40:39', '2022-11-16 04:40:39');

-- --------------------------------------------------------

--
-- Структура таблицы `event_tags`
--

CREATE TABLE `event_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `event_tags`
--

INSERT INTO `event_tags` (`id`, `event_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 6, 5, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(2, 9, 2, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(3, 8, 3, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(4, 6, 5, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(5, 3, 4, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(6, 4, 6, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(7, 4, 4, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(8, 4, 5, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(9, 1, 2, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(10, 6, 3, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(11, 4, 6, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(12, 4, 1, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(13, 4, 5, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(14, 10, 1, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(15, 9, 4, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(16, 1, 3, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(17, 4, 1, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(18, 3, 2, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(19, 9, 1, '2022-11-16 04:40:40', '2022-11-16 04:40:40'),
(20, 2, 2, '2022-11-16 04:40:40', '2022-11-16 04:40:40');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_11_04_065240_create_events_table', 1),
(5, '2022_11_11_131808_create_tags_table', 1),
(6, '2022_11_11_175524_create_event_tags_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Имя',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Алиас',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'поход', 'hike', NULL, NULL),
(2, 'экскурсия', 'excursion', NULL, NULL),
(3, 'ярмарка', 'fair', NULL, NULL),
(4, 'фестиваль', 'festival', NULL, NULL),
(5, 'сплав', 'rafting', NULL, NULL),
(6, 'сдетьми', 'child', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event_tags`
--
ALTER TABLE `event_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_tag_event_idx` (`event_id`),
  ADD KEY `event_tag_tag_idx` (`tag_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `event_tags`
--
ALTER TABLE `event_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `event_tags`
--
ALTER TABLE `event_tags`
  ADD CONSTRAINT `event_tag_event_fk` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_tag_tag_fk` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
