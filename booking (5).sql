-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2023 г., 00:12
-- Версия сервера: 10.1.48-MariaDB
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `booking`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(250) NOT NULL,
  `login` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin1', 12345678);

-- --------------------------------------------------------

--
-- Структура таблицы `barber`
--

CREATE TABLE `barber` (
  `barber_id` int(250) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `barber`
--

INSERT INTO `barber` (`barber_id`, `name`, `avatar`) VALUES
(13, 'Лилит', '64934cdce229b.jpg'),
(14, 'Арут', '64934c86057ee.jpg'),
(15, 'Ольга', '6493550bd570f.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `barber_shop`
--

CREATE TABLE `barber_shop` (
  `id` int(250) NOT NULL,
  `barber_id` int(250) NOT NULL,
  `record_id` int(250) NOT NULL,
  `client_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `barber_shop`
--

INSERT INTO `barber_shop` (`id`, `barber_id`, `record_id`, `client_id`) VALUES
(12, 14, 13, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `booking_records`
--

CREATE TABLE `booking_records` (
  `record_id` int(250) NOT NULL,
  `date` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `booking_records`
--

INSERT INTO `booking_records` (`record_id`, `date`, `time`) VALUES
(1, '15.06.2023', '16:30-17:00'),
(3, '20.06.2023', '12:30-13:00'),
(5, '25.06.2023', '16:00-16:30'),
(10, '21.06.2023', '16:00-16:30'),
(11, '21.06.2023', '16:00-16:30'),
(12, '22.06.2023', '16:00-16:30'),
(13, '25.06.2023', '17:30-18:00');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(250) NOT NULL,
  `login` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `login`, `client_name`, `password`, `phone_number`) VALUES
(4, 'archi_777', 'Арчи Паникол', '202cb962ac59075b964b07152d234b70', '+79618168281'),
(9, 'ismail', 'Исмаил Джаватханов', '85427563f49dab7eff10c6ee2f4b450a', '+79054813104'),
(10, 'asadula', 'Эльдар Гамаев', '25d55ad283aa400af464c76d713c07ad', '89618168280'),
(11, 'Ashka', 'Артак Минасян', '25f9e794323b453885f5181f1b624d0b', '89618168385');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`barber_id`);

--
-- Индексы таблицы `barber_shop`
--
ALTER TABLE `barber_shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `barber_shop_ibfk_1` (`barber_id`),
  ADD KEY `record_id` (`record_id`);

--
-- Индексы таблицы `booking_records`
--
ALTER TABLE `booking_records`
  ADD PRIMARY KEY (`record_id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `barber`
--
ALTER TABLE `barber`
  MODIFY `barber_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `barber_shop`
--
ALTER TABLE `barber_shop`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `booking_records`
--
ALTER TABLE `booking_records`
  MODIFY `record_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `barber_shop`
--
ALTER TABLE `barber_shop`
  ADD CONSTRAINT `barber_shop_ibfk_1` FOREIGN KEY (`barber_id`) REFERENCES `barber` (`barber_id`),
  ADD CONSTRAINT `barber_shop_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `barber_shop_ibfk_3` FOREIGN KEY (`record_id`) REFERENCES `booking_records` (`record_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
