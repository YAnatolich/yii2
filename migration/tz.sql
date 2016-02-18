-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2016 at 11:17 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tz`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`code`, `name`, `population`) VALUES
('AU', 'Australia', 18886000),
('BR', 'Brazil', 170115000),
('CA', 'Canada', 1147000),
('CN', 'China', 1277558000),
('DE', 'Germany', 82164700),
('FR', 'France', 59225700),
('GB', 'United Kingdom', 59623400),
('IN', 'India', 1013662000),
('RU', 'Russia', 146934000),
('US', 'United States', 278357000);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id_food` int(11) NOT NULL,
  `name_food` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id_food`, `name_food`, `price`) VALUES
(1, 'Рыба в кляре', 20.7),
(2, 'Котлета по-Киевски', 10),
(3, 'Филе тунца в кляре', 100),
(4, 'Салат по-гречески', 30),
(5, 'Фрикадельки', 10),
(6, 'Свиная отбивная жареная', 30),
(7, 'Запеченные яблоки с меренгой', 20),
(8, 'Кабачки, фаршированные сыром', 40),
(9, 'Запеченные яблоки с меренгой', 20.5),
(10, 'Кабачки, фаршированные сыром', 40),
(11, 'ПРЯНЫЙ РИС С ЯЙЦОМ И БЕКОНОМ', 50),
(12, 'ЧЕРНЫЙ РИС С КОПЧЕНОЙ ФОРЕЛЬЮ', 20),
(13, 'ФРИКАДЕЛЬКИ "ЁЖИКИ"', 60),
(14, 'ЖАРЕНЫЙ РИС С КРЕВЕТКАМИ И КУРИЦЕЙ, ЗАПРАВЛЕННЫЙ ПО-ВОСТОЧНОМУ', 100),
(15, 'БЕХИ-ПАЛОВ С АЙВОЙ', 60),
(16, 'ТЫКВА, ФАРШИРОВАННАЯ РИСОМ И СУХОФРУКТАМИ', 100),
(17, 'Старомодный лимонад', 23),
(18, 'Хорчата (орчата)', 100),
(19, 'Огуречный лимонад', 50),
(20, 'Квас ржаной', 20),
(21, 'Коктейль из огурцов и медовой дыни', 50),
(22, 'Маргарита Гранд', 100),
(23, '"Банановая Маргарита"', 20),
(24, 'Коктейль Банановая Маргарита из Мексики', 20),
(25, 'Маргарита из киви', 30),
(26, 'Освежающий коктейль Маргарита с киви', 150),
(27, 'Классическая испанская Сангрия', 20),
(28, 'Фруктовая сангрия', 30);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL,
  `id_waiter` int(11) NOT NULL,
  `date_order` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_waiter`, `date_order`) VALUES
(1, 15, '2016-02-18'),
(2, 10, '2016-02-17'),
(3, 12, '2016-02-10'),
(4, 13, '2016-02-17'),
(5, 4, '2016-02-09'),
(6, 13, '2016-02-10'),
(7, 14, '2016-02-17'),
(8, 16, '2016-02-12'),
(9, 4, '2016-02-10'),
(10, 7, '2016-02-18'),
(11, 10, '0000-00-00'),
(12, 6, '2016-02-10'),
(13, 8, '2016-02-03'),
(14, 8, '2016-02-17'),
(15, 13, '2016-02-17'),
(16, 12, '2016-02-03'),
(17, 11, '2016-02-16'),
(18, 5, '2016-02-09'),
(19, 11, '2016-02-10'),
(20, 7, '2016-02-10'),
(21, 11, '2016-02-16'),
(22, 10, '2016-02-02'),
(23, 10, '2016-02-10'),
(24, 5, '2016-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE IF NOT EXISTS `order_food` (
  `id_order_food` int(11) NOT NULL,
  `id_food` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`id_order_food`, `id_food`, `id_order`) VALUES
(1, 16, 2),
(2, 13, 2),
(3, 16, 2),
(4, 22, 2),
(5, 13, 1),
(6, 28, 1),
(7, 6, 9),
(8, 4, 12),
(9, 1, 1),
(10, 9, 2),
(11, 2, 2),
(12, 4, 2),
(13, 3, 3),
(14, 4, 3),
(15, 5, 5),
(16, 10, 5),
(17, 6, 11),
(18, 6, 11),
(19, 9, 7),
(20, 7, 7),
(21, 15, 8),
(22, 7, 8),
(23, 10, 7),
(24, 10, 14),
(25, 14, 11),
(26, 15, 11),
(27, 12, 12),
(28, 17, 12),
(29, 5, 14),
(30, 16, 14),
(31, 15, 14),
(32, 14, 14),
(33, 27, 18),
(34, 24, 18),
(35, 16, 4),
(36, 5, 4),
(37, 18, 6),
(38, 8, 6),
(39, 17, 13),
(40, 24, 13),
(41, 16, 15),
(42, 17, 15),
(43, 14, 17),
(44, 14, 17);

-- --------------------------------------------------------

--
-- Table structure for table `waiter`
--

CREATE TABLE IF NOT EXISTS `waiter` (
  `id_waiter` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `waiter`
--

INSERT INTO `waiter` (`id_waiter`, `name`, `surname`) VALUES
(1, 'Василий', 'Пяточкин'),
(2, 'Иванов', 'Новенький'),
(3, 'Петр', 'Каримов'),
(4, 'Нарим', 'Карамазов'),
(5, 'Сергей', 'Золотарев'),
(6, 'Сергей', 'Золотарев'),
(7, 'Снежана', 'Безгубая'),
(8, 'Злата', 'Иванова'),
(9, 'Лев', 'Троцкий'),
(10, 'Лев', 'Толстой'),
(11, 'Зоряна', 'Рижичок'),
(12, 'Карина', 'Серая'),
(13, 'Иванес', 'Оганесян'),
(14, 'Тамара', 'Ганжа'),
(15, 'Лилит', 'Шахназарян'),
(16, 'Лила', 'Огнасенко');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id_food`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_waiter` (`id_waiter`);

--
-- Indexes for table `order_food`
--
ALTER TABLE `order_food`
  ADD PRIMARY KEY (`id_order_food`),
  ADD KEY `id_food` (`id_food`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `waiter`
--
ALTER TABLE `waiter`
  ADD PRIMARY KEY (`id_waiter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id_food` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `order_food`
--
ALTER TABLE `order_food`
  MODIFY `id_order_food` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `waiter`
--
ALTER TABLE `waiter`
  MODIFY `id_waiter` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_waiter`) REFERENCES `waiter` (`id_waiter`);

--
-- Constraints for table `order_food`
--
ALTER TABLE `order_food`
  ADD CONSTRAINT `order_food_ibfk_1` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_food_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
