-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 27 2018 г., 15:59
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `author` varchar(40) NOT NULL,
  `name` varchar(12) NOT NULL,
  `quantity` int(11) NOT NULL,
  `year_published` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `date_checked_out` date NOT NULL,
  `date_returned` date NOT NULL,
  `returned` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL,
  `surname` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `librarian`
--

CREATE TABLE `librarian` (
  `id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL,
  `surname` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `bookid` (`bookid`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `book` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
