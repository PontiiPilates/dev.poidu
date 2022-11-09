-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 08 2022 г., 09:36
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Заголовок',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ссылка на источник',
  `tags` json NOT NULL COMMENT 'Теги',
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Форма участия',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Имя файла логотипа организатора',
  `start` timestamp NULL DEFAULT NULL COMMENT 'Дата и время начала мероприятия',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `title`, `url`, `tags`, `payment`, `logo`, `start`, `created_at`, `updated_at`) VALUES
(1, 'Nam ut ut voluptatem dolores in voluptas consequatur. Fuga quo quis omnis est dolorum illo. Enim dolor voluptatibus et officiis voluptatem dolor. Fugiat voluptatem recusandae vel molestiae eum.', 'https://isaeva.net/dolore-earum-consectetur-omnis.html', '{}', '1200', 'http://placeimg.com/240/240/animals', '2022-11-07 22:26:37', '2022-11-06 12:59:08', '2022-11-06 12:59:08'),
(2, 'Aliquam eaque sit nihil accusamus reiciendis. Cum eveniet fugiat error nesciunt facilis. Iste doloremque voluptatem nobis.', 'https://morozov.com/fugiat-neque-omnis-doloribus-soluta-debitis-aut.html', '{\"1\": \"прогулка\"}', 'free', 'http://placeimg.com/240/240/animals', '2022-11-06 21:17:36', '2022-11-06 12:59:08', '2022-11-06 12:59:08'),
(3, 'Iste natus inventore occaecati. Labore quas aliquid saepe autem at. Consectetur velit ut necessitatibus labore rerum iure.', 'http://blinova.ru/', '{}', 'donate', 'http://placeimg.com/240/240/animals', '2022-11-10 09:06:48', '2022-11-06 12:59:08', '2022-11-06 12:59:08'),
(4, 'Ab corporis fuga unde iusto occaecati. Nisi accusamus doloremque velit vel voluptas debitis quae. Accusantium fugiat atque cumque. Nihil quas error illo nesciunt ut et ut quia.', 'http://www.sitnikova.ru/', '{}', '1200', 'http://placeimg.com/240/240/animals', '2022-11-07 09:41:01', '2022-11-06 12:59:08', '2022-11-06 12:59:08'),
(5, 'Praesentium autem aut unde quia voluptas quo adipisci. Facilis accusantium aut sint laborum soluta optio et rerum. Voluptatem harum et quisquam provident. Doloribus itaque est aut.', 'https://www.fomin.net/facere-at-sit-molestias-sit-rerum-maxime-sequi', '{\"1\": \"сплав\", \"2\": \"поход\"}', '1200', 'http://placeimg.com/240/240/animals', '2022-11-07 00:49:38', '2022-11-06 12:59:08', '2022-11-06 12:59:08'),
(6, 'Voluptas eum dolores voluptatibus ipsa praesentium et fugit. Vero illum dolor sequi repellat et sit consequatur.', 'http://pakomov.ru/ut-et-minima-ipsum-et-accusamus.html', '{\"1\": \"поход\", \"2\": \"экскурсия\"}', '1200', 'http://placeimg.com/240/240/animals', '2022-11-12 14:39:05', '2022-11-06 12:59:08', '2022-11-06 12:59:08'),
(7, 'Debitis id adipisci a qui nam in ex omnis. Sunt rerum quasi aperiam voluptas aut ea. Repudiandae amet nobis qui voluptas. Culpa aliquam et facilis. Maxime incidunt quisquam labore.', 'http://www.ydina.net/', '{\"1\": \"поход\", \"2\": \"экскурсия\"}', '1200', 'http://placeimg.com/240/240/animals', '2022-11-13 01:02:36', '2022-11-06 12:59:08', '2022-11-06 12:59:08'),
(8, 'Quia molestiae omnis et facilis provident. At qui sed et ab laboriosam.', 'http://www.semenov.ru/atque-id-odio-ea-ut-ipsum-non.html', '{\"1\": \"сплав\", \"2\": \"поход\"}', '1200', 'http://placeimg.com/240/240/animals', '2022-11-07 08:26:24', '2022-11-06 12:59:08', '2022-11-06 12:59:08'),
(9, 'Qui cupiditate deserunt pariatur voluptatem qui. Ad natus in provident at. Sint consequatur maxime et. Nihil odio et illo velit consequatur reprehenderit.', 'https://www.abramov.com/sunt-distinctio-odit-et-est-sit-laboriosam-ducimus', '{\"1\": \"прогулка\"}', '1200', 'http://placeimg.com/240/240/animals', '2022-11-10 19:08:57', '2022-11-06 12:59:08', '2022-11-06 12:59:08'),
(10, 'Omnis numquam qui veritatis neque. Adipisci consequuntur veritatis quia aut omnis dolorem dolorem ut. Saepe distinctio qui omnis impedit sunt deleniti ut. Vitae ut unde et porro a voluptas.', 'http://www.ignatov.net/aut-voluptatem-voluptatem-laudantium', '{}', '1200', 'http://placeimg.com/240/240/animals', '2022-11-11 16:00:08', '2022-11-06 12:59:08', '2022-11-06 12:59:08');

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
(4, '2022_11_04_065240_create_events_table', 1);

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
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
