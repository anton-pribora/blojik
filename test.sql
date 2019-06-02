-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 02 2019 г., 19:54
-- Версия сервера: 10.1.38-MariaDB-0+deb9u1
-- Версия PHP: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'Ид поста',
  `name` varchar(511) NOT NULL COMMENT 'Название поста',
  `text` text NOT NULL COMMENT 'Текст поста',
  `image` varchar(511) NOT NULL COMMENT 'Путь к картинке',
  `tags` text NOT NULL COMMENT 'Тэги, через запятую',
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Время добавления поста'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Список постов';

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`, `text`, `image`, `tags`, `creation_time`) VALUES
(1, 'awdwd', 'wadadwe', 'uploads/5cf3d7a36b238_vasyliy milyi drug.png', 'картинка, тэг1, тэг3', '2019-06-02 12:02:20'),
(3, 'Тест кавычки', '2фцвфцвцв', 'uploads/5cf3d8787d587_cat.png', '3', '2019-06-02 12:02:20'),
(4, '1', '2', 'uploads/5cf3b46771611_cat.png', '3', '2019-06-02 12:02:20'),
(5, '1', '2', 'uploads/5cf3b5ae0f236_cat.png', '3', '2019-06-02 12:02:20'),
(6, '1', '2', 'uploads/5cf3b5de1e582_cat.png', '3', '2019-06-02 12:02:20'),
(7, '1', '2', 'uploads/5cf3b6088d219_cat.png', '3', '2019-06-02 12:02:20'),
(8, '1', '2', 'uploads/5cf3b64063307_cat.png', '3', '2019-06-02 12:02:20'),
(9, 'Мой самый классный пост', 'вфывфывфывфыв', 'uploads/5cf3d6ecba0d7_vasyliy.png', 'картинка, тэг1, тэг2', '2019-06-02 12:10:14');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'Ид пользователя',
  `name` varchar(255) NOT NULL COMMENT 'Имя пользователя',
  `email` varchar(255) NOT NULL COMMENT 'Email ',
  `password` varchar(255) NOT NULL COMMENT 'Пароль',
  `del` tinyint(1) UNSIGNED NOT NULL COMMENT 'Флаг "удалён"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Пользователи бложика';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `del`) VALUES
(2, 'asdasasdasd', 'test@sdfsfsef', '123', 0),
(11, 'adasdasdasd', 'test@adawdad', 'ssdadad', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`(40)) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Ид поста', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Ид пользователя', AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
