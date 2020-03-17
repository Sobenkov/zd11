-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 17 2020 г., 23:37
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zd11`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(20) NOT NULL,
  `page_id` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `text_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `page_id`, `name`, `text_comment`) VALUES
(23, '2', 'Sobenkov', 'Текст!'),
(24, '1', 'Sobenkov', 'Класс!');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `text_full` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `text`, `price`, `img`, `text_full`) VALUES
(1, 'Платье ALPECORA\r\n\r\n', 'Российский\r\nПроизводитель\r\n44 RU\r\n46 RU\r\n48 RU\r\n50 RU', 4500, 'https://image01.bonprix.ru/assets/1400x1960/0/17202421-9pe5nyDa.jpg', 'Артикул магазина W19082846598 Артикул PG-1 Цвет бежевый Состав 60% хлопок, 25% вискоза, 15% полиэстер. Подкладка - 80% вискоза, 20% полиэстер. Сезон Всесезон Страна дизайна Россия Страна производства Россия Наличие сертификата Товар сертифицирован. Температура комфорта от +20 °С до +7 °С'),
(2, 'Пальто A. Piton', 'Российский\r\nПроизводитель\r\n44 RU\r\n46 RU\r\n48 RU\r\n50 RU', 6870, 'https://girlway.com.ru/img/0/0/c16fbc7dd207c94e2a9a398e92534526.jpg', 'Артикул магазина W19082846598 Артикул PG-1 Цвет бежевый Состав 60% хлопок, 25% вискоза, 15% полиэстер. Подкладка - 80% вискоза, 20% полиэстер. Сезон Всесезон Страна дизайна Россия Страна производства Россия Наличие сертификата Товар сертифицирован. Температура комфорта от +20 °С до +7 °С'),
(3, 'Очки Vogue', 'Российский\r\nПроизводитель\r\n44 RU\r\n46 RU\r\n48 RU\r\n50 RU', 6500, 'https://avatars.mds.yandex.net/get-marketpic/228527/market_tLTzGWMSBh9zyAdP4QPFug/orig', 'Артикул магазина W19082846598 Артикул PG-1 Цвет бежевый Состав 60% хлопок, 25% вискоза, 15% полиэстер. Подкладка - 80% вискоза, 20% полиэстер. Сезон Всесезон Страна дизайна Россия Страна производства Россия Наличие сертификата Товар сертифицирован. Температура комфорта от +20 °С до +7 °С'),
(4, 'Туфли Vitacci', 'Российский\r\nПроизводитель\r\n44 RU\r\n46 RU\r\n48 RU\r\n50 RU', 5200, 'https://ozon-st.cdn.ngenix.net/multimedia/1026145215.jpg', 'Артикул магазина W19082846598 Артикул PG-1 Цвет бежевый Состав 60% хлопок, 25% вискоза, 15% полиэстер. Подкладка - 80% вискоза, 20% полиэстер. Сезон Всесезон Страна дизайна Россия Страна производства Россия Наличие сертификата Товар сертифицирован. Температура комфорта от +20 °С до +7 °С');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
